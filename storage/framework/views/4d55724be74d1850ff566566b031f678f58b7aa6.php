<?php $__env->startSection("content"); ?>

    <div class="container m-auto">

        <?php echo $__env->make("components.admin_menu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="uk-child-width-1-3@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid" uk-grid>
            <?php if(count($referals) !== 0): ?>
                <?php $__currentLoopData = $referals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $referal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body" style="margin-top: 3em; padding: 20px !important; border-radius: 15px">

                            <p><?php echo e((isset($referal->name) ? $referal->name : 'No name')); ?></p>
							   <a href="<?php echo e(url("profile/admin/referals/delete/" . $referal->id)); ?>"
                                   class="delete_ref2 uk-button-danger">
                                    <ion-icon style="position:relative;top:-1px;" name="trash-outline" ></ion-icon></a>
                            <div class="flex" style="justify-content: start; align-items: center;">
                            <p style="font-weight: 900;"> <?php echo e($referal->view); ?></p>
                                <img src="<?php echo e(asset("icons/view.png")); ?>" alt="" width="20px" style="margin-left: 5px">
                            </div>
                          
                            <div class="flex" style="justify-content: space-between; align-items: center;">
                             
								
								
								
								
								   <div class="card-body">
                            
                           
                            <div style="padding-top: 10px;" class="form-group">
                                <input type="text" value="<?php echo e(referalUrlMaker($referal->token)); ?>" readonly="" class="ref_link form-control">
                            </div>
                        
                            
                            <hr>
                            
                            <button style="width:100%;    margin-bottom: 10px;
    margin-top: 10px;" class="copy_ref_bn btn btn-primary uk-button uk-button-primary copy_button"><ion-icon style="position:relative;top:2px;" name="copy-outline"></ion-icon> Nusxa olish</button><br>
							   <a href="https://xn--r1a.link/share/url?url=<?php echo e(referalUrlMaker($referal->token)); ?>"
                                   class="delete_ref uk-button-danger" style="display: flex; justify-content: center;background:#1e87f0; align-items: center; padding: 5px; border-radius: 5px">
                                    <ion-icon style="position:relative;top:-1px;" name="paper-plane-outline" ></ion-icon> Telegramda ulashish</a>
                        </div>
								
							
								
								
								
								
                             
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div uk-alert>
                    <a class="uk-alert-close"></a>
                    <h3>Sizda oqimlar mavjud emas</h3>
                    <p>Oqim yaratish uchun <a href="<?php echo e(url("profile/admin/market")); ?>" style="color: #0e6dcd">ushbu</a>
                        havola orqali oqimlar
                        bo'limiga o'ting!</p>
                </div>
            <?php endif; ?>
        </div>

        <script src="<?php echo e(asset('assets/js/jquery-3.3.1.min.js')); ?>"></script>
      

        
    </div>

        
        
        
        
        


        
<script>
$(".card-body .copy_ref_bn").on('click', function() {
    var copyText = $(this).parent().find('.ref_link').get(0);
    
    copyText.select();
    document.execCommand("copy");
    $(this).text('✓ Nusxa olindi');
});
</script>        
        

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/profile/referals.blade.php ENDPATH**/ ?>