

<?php $__env->startSection('content'); ?>

    <div class="container m-auto">

        <?php echo $__env->make("components.admin_menu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <br><br><br>
        <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">


            <div class="space-y-5 flex-shrink-0 lg:w-7/12">


                <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">

                    <?php if(session()->has("success")): ?>
                    <div class="uk-alert-success" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p style="color: unset"><?php echo e(session()->get("success")); ?></p>
                        <?php session()->forget("success");?>
                    </div>
                    <?php endif; ?>

                    <div class="py-3 px-4 space-y-3">
                        <div uk-alert>
                            <h3 style="font-size: 25px">To'lovga so'rov berish formasi</h3>
                        </div>


                        <?php if($errors->any()): ?>
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><?php echo e($error); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div><?php echo e($error); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <form class="uk-grid-small" method="post" action="<?php echo e(url("profile/payment_sent")); ?>" uk-grid>
                            <?php echo csrf_field(); ?>
                            <label for="card_number1">Karta raqamingiz</label>
                            <input id="card_number1" style="margin:20px" type="text" placeholder="0000 0000 0000 0000">
                            <input id="card_number" style="display: none" type="hidden" name="card_number">

                            <label for="amount">Summa</label>
                            <input id="amount" style="margin:20px" type="text" name="amount">

                            <button style="margin: 20px;" class="uk-button uk-button-primary" type="submit">Jo'natish
                            </button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- right sidebar-->
            <div class="lg:w-5/12">

                <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">

                    <p style="margin:20px;"><strong>Balansingiz: </strong> <?php echo e(price_format(auth()->user()->balance)); ?></p>
                    <p style="margin:20px;"><strong>To'lab berildi: </strong> <?php echo e(price_format($payed)); ?></p>

                </div>

            </div>

        </div>
    </div>


    <script src="<?php echo e(asset('assets/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset("assets/js/jquery.mask.js")); ?>"></script>

    <script>
        $("#card_number1").focusout(function () {
            $("#card_number").val($("#card_number1").val().match(/\d/g).join(""))
        })

        $("#card_number1").mask("0000 0000 0000 0000");
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/profile/payment.blade.php ENDPATH**/ ?>