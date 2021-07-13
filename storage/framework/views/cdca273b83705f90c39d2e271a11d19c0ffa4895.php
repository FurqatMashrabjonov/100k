<h1 class="text-2xl leading-none text-gray-900 tracking-tight mt-3">Admin </h1>
<ul class="mt-5 -mr-3 flex-nowrap lg:overflow-hidden overflow-x-scroll uk-tab">
    <li class=""><a href="<?php echo e(url('profile/admin')); ?>"><ion-icon name="settings-outline" class="menu-icon"></ion-icon>Boshqaruv paneli</a></li>
    <li><a href="<?php echo e(url("profile/admin/market")); ?>"><ion-icon name="storefront-outline" class="menu-icon" ></ion-icon>Market</a></li>
    <li class=""><a href="<?php echo e(url('profile/admin/referals')); ?>"><ion-icon name="share-social-outline" class="menu-icon"></ion-icon>Oqim</a></li>
    <li><a href="<?php echo e(url("profile/admin/statistika")); ?>"><ion-icon name="bar-chart-outline" class="menu-icon"></ion-icon>Statistika</a></li>
    <li><a href="<?php echo e(url("profile/payment")); ?>"><ion-icon name="card-outline" class="menu-icon"></ion-icon>To'lov</a></li>
</ul>

<style>
    .menu-icon{
        margin-right:5px;
        font-size: 15px;
    }
</style><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/components/admin_menu.blade.php ENDPATH**/ ?>