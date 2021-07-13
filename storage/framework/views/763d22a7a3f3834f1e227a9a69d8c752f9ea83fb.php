<?php $__env->startSection("content"); ?>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    

    
    
    
    
    

    
    
    
    
    
    

    
    
    

    
    
    
    
    

    

    
    
    

    

    
    
    

    
    
    
    
    

    
    
    

    
    
    
    
    
    

    <div class="container m-auto">
        <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">
            <div class="space-y-5 flex-shrink-0 lg:w-8/12">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">

            <!-- post header-->
            <div class="flex justify-between items-center px-4 py-3">
                <div class="flex flex-1 items-center space-x-4">
                    <a href="#">
                        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-0.5 rounded-full">
                            <img src="<?php echo e(uImgUrl($product->user)); ?>"
                                 class="bg-gray-200 border border-white rounded-full w-8 h-8">
                        </div>
                    </a>
                    <span
                        class="block capitalize font-semibold dark:text-gray-100"> <?php echo e($product->user->full_name); ?> </span>
                </div>
                <div>
                    <span class=""><?php echo e(price_format($product->price)); ?></span>

                </div>
            </div>

            <div >
                <a href="<?php echo e(url("product/" . $product->id)); ?>">
                    <img src="<?php echo e(pImgUrl($product)); ?>" alt="">
                </a>
            </div>


            <div class="py-3 px-4 space-y-3">
                <div class="flex space-x-4 lg:font-bold">
                    <?php
                    if (auth()->check()) {
                        ?>
                    <a href="#" onclick="like(this, <?php echo e($product->id); ?>);return false" class="flex items-center space-x-2">
                        <div class="p-2 rounded-full text-<?php echo e(($product->liked) ? 'danger' : 'black'); ?>">
                            <ion-icon name="heart" style="color: red !important"></ion-icon>
                        </div>
                        <div>
                            <?php echo e($product->like); ?> Layklar
                        </div>
                    </a>
                        <?php } else { ?>
                        <a href="<?php echo e(route('login')); ?>"  class="flex items-center space-x-2">
                            <div class="p-2 rounded-full text-<?php echo e(($product->liked) ? 'danger' : 'black'); ?>">
                                <ion-icon name="heart-outline" style="color: red !important"></ion-icon>
                            </div>
                            <div class="like_button">
                                <?php echo e($product->like); ?> Layklar
                            </div>
                        </a>
                        <?php } ?>
                </div>
                <div class="flex items-center space-x-3">

                    <div class="dark:text-gray-100">
                     <?php echo e($product->name); ?> ...
                        <a href="<?php echo e(url("product/" . $product->id)); ?>"><strong>batafsil</strong></a>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function like(el, product_id) {

            $.ajax({
                method: 'post',
                url: '<?php echo e(route('like')); ?>',
                data: {
                    product_id: product_id,
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.success) {
                        el.children[0].classList.add('text-danger')
                        el.children[1].innerHTML = data.data.like + "Layklar"
                    }
                },
                error: function (err) {
                    console.log(err.responseText)
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/welcome.blade.php ENDPATH**/ ?>