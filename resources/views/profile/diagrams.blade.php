@extends("layouts.app")
@section("content")

    <div  class="container m-auto">
    @include("components.admin_menu")
        <br><br>
        <div id="air"></div>

    </div>


@endsection

@section("scripts")
    <script src="https://www.google.com/jsapi"></script>
    <script>
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Газ', 'Объём'],
                ['Азот',     50.09],
                ['Кислород', 20.95],
                ['Аргон',    5.93],
                ['Углекислый газ', 0.03]
            ]);
            var options = {
                title: 'Состав воздуха',
                is3D: true,
                pieResidueSliceLabel: 'Остальное'
            };
            var chart = new google.visualization.PieChart(document.getElementById('air'));
            chart.draw(data, options);
        }
    </script>
@endsection
