<?php

namespace App\Livewire\Product;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;


class Form extends Component
{

    use WithFileUploads;

    public $category_id = null;
    public $object = '';
    public $price = '';
    public $about = '';
    public $temporary_images;
    public $images = [];
    public $image;
    public $product;
    public $form_id;


    public function rules(){
        return [
            'category_id' => 'required',
            'object' => 'string|required|min:3',
            'price' => 'required|decimal:2',
            'about' => 'required|min:10',
            'images.*' => 'image|max:4096',
            'temporary_images.*' => 'image|max:4096',
        ];
    }

    public function store(){
        //dd($this->validate());
        $this->validate();
        $this->product = Product::create([
                'user_id' => Auth::user()->id,
                'category_id' => $this->category_id,
                'object' => $this->object,
                'price' => $this->price,
                'about' => $this->about
            ]);

        if(count($this->images)){
            foreach ($this->images as $image) {
                // $this->product->images()->create(['path' => $image->store('image','public')]);
                $newFileName = "products/{$this->product->id}";
                $newImage =$this->product-> images()->create(['path' => $image->store($newFileName,'public')]);
                
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 400,300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
      
        $this->cleanForm();

        session()->flash('success', __('ui.prodottoInRevisione'));
    }

    public function cleanForm(){
        $this->category_id = null;
        $this->object = '';
        $this->price = '';
        $this->about = '';
        $this->images = [];
        $this->temporary_images = [];
        $this->form_id = rand();
    }

    public function render()
    {
        if(Category::all()->isEmpty()){
            $categories = ['Motori', 'Informatica', 'Elettrodomestici', 'Libri', 'Giochi', 'Sport', 'Immobili', 'Telefoni', 'Arredamento', 'Gioielli'];

            foreach($categories as $category){
                Category::create([
                    'title' => $category
                ]);
            }
        }

        $categories = Category::all();

        return view('livewire.product.form', compact('categories'));
    }

    public function updatedTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*' => 'image|max:4096'
        ])) {
            foreach($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
    public function removeImage ($key)
    {
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
}
