<?php $__env->startSection('content'); ?>






































































<div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
    <h1 class="lg:text-3xl text-xl font-semibold  mb-6"> Tizimga kirish</h1>
    <form action="<?php echo e(route("before_login")); ?>" id="login_form" method="post">
        <?php echo csrf_field(); ?>
        <label for="phone1"> <p class="mb-2 text-black text-lg">Telefon raqamningizni kiriting </p></label>
        <input type="text" id="phone1" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
        <input type="hidden" style="display: none" id="phone" name="phone">
        <div class="flex justify-between my-4">
            <div class="checkbox">
                <input type="checkbox" name="remember" id="chekcbox1" checked>
                <label for="chekcbox1"><span class="checkbox-icon"></span>Eslab qolish</label>
            </div>
        </div>
        <button type="submit" id="login" class="bg-gradient-to-br py-3 rounded-md text-white text-xl to-red-400 w-full" style="background: #C73632;">Kirish</button>
       
    </form>
</div>





































<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
    <script src="<?php echo e(asset("assets/js/jquery.mask.js")); ?>"></script>
    <script>
        $(document).ready(function($){

            document.getElementById("phone1").addEventListener("keydown", e => {
                if (e.keyCode === 13){
                    $("#login_form").submit()
                }
            })


            $("#phone1").mask("(99) 000 00 00");

            $("#phone1").focusout(function (){
                if ($("#phone1").val().length > 0)
                $("#phone").val($("#phone1").val().match(/\d/g).join(""))
                console.log( $("#phone").val())
            })

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/auth/login.blade.php ENDPATH**/ ?>