<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['object','price','about', 'category_id', 'user_id'];
    

    public function toSearchableArray()
    {
        $category=$this->category;
        $array=[
            'id'=> $this->id,
            'object'=>$this->object,
            'about'=>$this->about,
            'category'=>$category
        ];
        return $array;
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setAccepted ($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount()
    {
        return Product::where('is_accepted', null)->count();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
