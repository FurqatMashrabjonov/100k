<?php $__env->startSection("content"); ?>


    <div class="container pro-container m-auto">

        <!-- profile-cover-->
        <div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

            <div>
                <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">
                    <img src="<?php echo e(uImgUrl(auth()->user())); ?>" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">

                </div>
            </div>

            <div class="lg:w/8/12 flex-1 flex flex-col lg:items-start items-center">

                <h2 class="font-semibold lg:text-2xl text-lg mb-2"><?php echo e(auth()->user()->full_name); ?></h2>
                <p class="lg:text-left mb-2 text-center  dark:text-gray-100"><?php echo e(auth()->user()->address); ?></p>
                <p class="lg:text-left mb-2 text-center  dark:text-gray-100"><?php echo e(phone_format(auth()->user()->phone)); ?></p>
                <p class="lg:text-left mb-2 text-center  dark:text-gray-100"><?php echo e(phone_format(auth()->user()->created_at)); ?> chi sanada ro'yxatdan o'tilgan</p>
                <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">
                    <a href="<?php echo e(url('profile/settings')); ?>" class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700">Sozlamalar</a>
                </div>

            </div>
            
            <div class="w-20"></div>

        </div>


        <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

            <div class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:border-gray-800">

            </div>

            <div class="divide-gray-300 divide-gray-50 divide-opacity-50 divide-y px-4 dark:divide-gray-800 dark:text-gray-100">
                <div class="flex items-center justify-between py-3">
                    <div class="flex flex-1 items-center space-x-4">

                        <div class="flex">

                            <img class="img_icon" src="<?php echo e(asset("icons/heart.png")); ?>" alt="">
                            <a href="<?php echo e(url('profile/my_likes')); ?>">Mening sevimlilarim</a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between py-3">
                    <div class="flex flex-1 items-center space-x-4">

                        <div class="flex">
                            <img class="img_icon" src="<?php echo e(asset("icons/clipboard.png")); ?>" alt="">
                            <a href="<?php echo e(url("profile/my_orders")); ?>">Mening buyurtmalarim</a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between py-3">
                    <div class="flex flex-1 items-center space-x-4">

                        <div class="flex">
                            <img class="img_icon" src="<?php echo e(asset("icons/call-center.png")); ?>" alt="">
                            <a href="">Mijozlarni qo'llab-quvvatlash</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>


    <style>
        .img_icon {
            width: 20px;
            margin-right: 10px;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/profile/index.blade.php ENDPATH**/ ?>