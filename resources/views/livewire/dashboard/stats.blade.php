<div class="h-full">
    <h1 class="text-center text-4xl zoom-in my-8 fade-top">{{__('ui.fraseHStatistiche')}}</h1>
    <div id="chart_div"></div>
    <script>
        google.charts.load("current", {
            packages: ["corechart"]
        });

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Topping");
            data.addColumn("number", "{{__('ui.numeroAnnunci')}}");
            data.addRows(@json($data));

            var options = {
                animation: {
                    startup:true,
                    duration: 1000,
                    easing: 'out',
                },
                title: "{{__('ui.iTuoiAnnunci')}}",
                titleTextStyle: {
                    fontSize: 18,
                    fontName: "Montserrat",
                    color: "#333"
                },
                legend: {
                    textStyle: {
                        fontSize: 14,
                        fontName: "Montserrat",
                        color: "#666"
                    }
                },
                colors: ['#13c1ac'],
                hAxis: {
                    textStyle: {
                        fontSize: 12,
                        fontName: "Montserrat",
                        color: "#666"
                    },
                },
                backgroundColor: 'rgb(249,250,251)'
            };

            var chart = new google.visualization.ColumnChart(
                document.getElementById("chart_div")
            );
            chart.draw(data, options);
        }
    </script>

</div>
