<?php $__env->startSection('content'); ?>


    <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
        <h1 class="lg:text-3xl text-xl font-semibold  mb-6"> Tasdiqlash</h1>
        <form action="<?php echo e(route("verify")); ?>" method="post">
            <?php echo csrf_field(); ?>
            <label for="phone1"> <p class="mb-2 text-black text-lg">SMS kodni kiriting</p></label>
            <input type="text" id="phone_token" name="phone_token" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
            <?php if(isset($token_error)): ?>
                <span style="color: red"><?php echo e($token_error); ?></span><br>
            <?php endif; ?>
            <button type="submit" class="bg-gradient-to-br  py-3 rounded-md text-white text-xl to-red-400 w-full" style="background: #C73632;">Yuborish</button>
            <div class="text-center mt-5 space-x-2">
                <p class="text-base"><a href="<?php echo e(url("verify")); ?>" class=""> Kodni qayta yuborish </a></p>
            </div>
        </form>
    </div>

















































<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/auth/verify.blade.php ENDPATH**/ ?>