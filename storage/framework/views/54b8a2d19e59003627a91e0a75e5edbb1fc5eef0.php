<?php $__env->startSection("content"); ?>

    <div  class="container m-auto">
    <?php echo $__env->make("components.admin_menu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <br><br>
        <div id="air"></div>

    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/profile/diagrams.blade.php ENDPATH**/ ?>