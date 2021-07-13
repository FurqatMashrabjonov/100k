<style>
  .card-balance_terminal {
    background: #fff;
   
    color: #000;
    border-radius: 5px;
    padding: 20px 30px;
  }

  .card-balance_terminal p {
    font-size: 14px;
    letter-spacing: 1px;
    white-space: pre;
  }

  .card-balance_main {
    padding: 20px 0;
  }

  .card-balance_block {
    margin: 10px 0;
    padding: 20px;
    display: flex;
    border-radius: 10px;
    flex-direction: column;
    align-items: center;
    background-color: #fff;
    transition: background-color 0.3s ease-out;
    width: 100%;
  }

  .card-balance_block_img {
    padding: 10px;
    border-radius: 50%;
    overflow: hidden;
    position: relative;
    background: #D1D5DB;
    display: flex;
  }

  .card-balance_block_name {
    padding-top: 15px;
    color: #000;
    text-align: center;
  }

  .card-balance_block:hover {
    box-shadow: 0 5px 15px 0 rgba(0,0,0,0.2);
    transition: box-shadow 0.3s ease-out;
  }

  .card-balance_block_img ion-icon {
    background: rgba(31, 90, 160, 1.0);
    background: -webkit-linear-gradient(top right, rgba(31, 90, 160, 1.0), rgba(179, 131, 217, 1.0));
    background: -moz-linear-gradient(top right, rgba(31, 90, 160, 1.0), rgba(179, 131, 217, 1.0));
    background: linear-gradient(to bottom left, rgba(31, 90, 160, 1.0), rgba(179, 131, 217, 1.0));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .card-balance_block_img ion-icon {
    font-size: 25px;
  }
</style>


<?php $__env->startSection("content"); ?>


<div class="container pro-container m-auto">
  <?php echo $__env->make("components.admin_menu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
  <div class="card-balance">

    <div class="card-balance_main">
      <div class="card-balance_terminal">
        <p><ion-icon style="font-size: 16px;
    position: relative;
    top: 3px;" name="wallet-outline"></ion-icon> Hisobingizda </p>
        <h2> <?php echo e(price_format(auth()->user()->balance)); ?> </h2>
        <div class="card-balance_terminal_bottom">
       
        </div>
      </div>
    </div>
    <div class="card-balance_main">
      <div class="uk-child-width-expand@s uk-text-center" uk-grid>

        <div class="uk-width-1-4@m">
          <a href="<?php echo e(url("profile/about")); ?>" target="_blank" class="card-balance_block">
            <div class="card-balance_block_img">
              <ion-icon name="information-circle-outline"></ion-icon>
            </div>
            <div class="card-balance_block_name">
              <p> Dastur haqida </p>
            </div>
          </a>
        </div>

        <div class="uk-width-1-4@m">
          <a href="<?php echo e(url("profile/team")); ?>" class="card-balance_block">
            <div class="card-balance_block_img">
              <ion-icon name="people-outline"></ion-icon>
            </div>
            <div class="card-balance_block_name">
              <p> Mening jamoam </p>
            </div>
          </a>
        </div>

        <div class="uk-width-1-4@m">
          <a href="<?php echo e(url('profile/requests')); ?>" class="card-balance_block">
            <div class="card-balance_block_img">
              <ion-icon name="grid-outline"></ion-icon>
            </div>
            <div class="card-balance_block_name">
              <p>So'rovlar

              </p>
            </div>
          </a>
        </div>

        <div class="uk-width-1-4@m">
          <a href="<?php echo e(url("profile/balance_history")); ?>" class="card-balance_block">
            <div class="card-balance_block_img">
              <ion-icon name="wallet-outline"></ion-icon>
            </div>
            <div class="card-balance_block_name">
              <p> Balans tarixi </p>
            </div>
          </a>
        </div>

        <div class="uk-width-1-4@m">
          <a href="<?php echo e(url("profile/subway")); ?>" class="card-balance_block">
            <div class="card-balance_block_img">
              <ion-icon name="subway-outline"></ion-icon>
            </div>
            <div class="card-balance_block_name">
              <p> SUPER SUBWAY </p>
            </div>
          </a>
        </div>












        <div class="uk-width-1-4@m">
          <a href="<?php echo e(url("profile/diagrams")); ?>" class="card-balance_block">
            <div class="card-balance_block_img">
              <ion-icon name="stats-chart-outline"></ion-icon>
            </div>
            <div class="card-balance_block_name">
              <p> Diagrammalar </p>
            </div>
          </a>
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
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/profile/admin.blade.php ENDPATH**/ ?>