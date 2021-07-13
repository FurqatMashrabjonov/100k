<?php $__env->startSection("content"); ?>


    <div class="container m-auto">

        <?php echo $__env->make("components.admin_menu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="lg:m-0 -mx-5 flex justify-between py-4 relative space-x-3 uk-sticky dark-tabs"
             uk-sticky="cls-active: bg-gray-100 bg-opacity-95" style="">
            <div style="padding-bottom: 10px;" class="flex overflow-x-scroll lg:pl-0 pl-5 space-x-3">
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a style="min-width: fit-content;" onclick="searched(<?php echo e($type->id); ?>);return false" href="#"
                       class="bg-white py-2 px-4 rounded inline-block font-bold shadow"><?php echo e($type->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
       
        </div>

        <div class="relative mt-4">

            <div class="uk-slider-container pb-3">

                <div class="list_products uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="padding-bottom:25px;">
                            <a href="<?php echo e(url("product/" . $product->id)); ?>" uk-toggle="target: #offcanvas-preview">
                                <div class="market-list">
                                    <div class="item-media"><img src="<?php echo e(pImgUrl($product)); ?>" alt="" uk-img></div>

                                    <div class="item-inner">
                                        <div class="item-price"> <?php echo e(price_format($product->price)); ?></div>
                                        <div class="item-title"> <?php echo e(substr($product->name, 0, 20)); ?>...</div>
                                        <div class="item-statistic">
                                            <span> <span class="count"></span> To'lov: <?php echo e(price_format($product->pay)); ?> </span>
                                        </div>

                                    </div>
                                </div>
                            </a>
                            <a href="#" onclick="create_referal(<?php echo e($product->id); ?>);return false"
                               class="uk-button uk-button-primary">Oqim yaratish</a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <a class="uk-button uk-button-default" id="open_modal" style="display: none" href="#modal-center" uk-toggle>Open</a>

    <div id="modal-center" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

            <button class="uk-modal-close-default" type="button" uk-close></button>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function searched(id) {
            $.ajax({
                method: 'get',
                url: '<?php echo e(url("searched")); ?>' + '/' + id,
                success: function (data) {
                    if (data.success) {
                        let str = ''
                        products = data.data
                        for (let i = 0; i < products.length; i++) {
                            str += '<div> <a href="product/' + products[i].id + '" uk-toggle="target: #offcanvas-preview"> <div class="market-list">'
                                + '<div class="item-media"><img src="/products/' + products[i].image.name + '" alt="" uk-img></div>'
                                + '<div class="item-inner"> <div class="item-price"> ' + products[i].price + ' so\'m</div> <div class="item-title"> ' + products[i].name.substr(0, 20) + '...</div>'
                                + '<div class="item-statistic"> <span> <span class="count">' + products[i].like + '</span> likes </span></div></div></div></a></div>'
                        }
                        $(".list_products").html(str)
                    }

                },
            })
        }

        function promptName() {
            return prompt("Oqim nomi: ")
        }

        function create_referal(product_id) {
            name = promptName()
            if (name.length !== 0)
                $.ajax({
                    method: "post",
                    url: "<?php echo e(url('profile/admin/referals')); ?>",
                    data: {
                        'product_id': product_id,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'name': name
                    },
                    success: function (data) {
                        if (data.success)
                            window.alert("Oqim muvaffaqiyatli yaratildi")
                    },
                    error: function (err) {
                        console.log(err.responseText)
                    }

                })
            else
                create_referal()
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/profile/market.blade.php ENDPATH**/ ?>