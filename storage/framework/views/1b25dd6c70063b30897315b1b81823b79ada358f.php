<?php $__env->startSection("content"); ?>

    <div class="container">
        <div class="page-header">
            <h1 class="page-header__title">Products</h1>
        </div>
        <div class="page-tools">
            <div class="page-tools__breadcrumbs">
                <div class="breadcrumbs">
                    <div class="breadcrumbs__container">
                        <ol class="breadcrumbs__list">
                            <li class="breadcrumbs__item">
                                <a class="breadcrumbs__link" href="index.html">
                                    <svg class="icon-icon-home breadcrumbs__icon">
                                        <use xlink:href="#icon-home"></use>
                                    </svg>
                                    <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                        <use xlink:href="#icon-keyboard-right"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumbs__item disabled"><a class="breadcrumbs__link" href="#"><span>E-commerce</span>
                                    <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                        <use xlink:href="#icon-keyboard-right"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumbs__item active"><span class="breadcrumbs__link">Products</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="page-tools__right">
                <div class="page-tools__right-row">
                    <div class="page-tools__right-item"><a class="button-icon" href="#"><span class="button-icon__icon">
                      <svg class="icon-icon-print">
                        <use xlink:href="#icon-print"></use>
                      </svg></span></a>
                    </div>
                    <div class="page-tools__right-item"><a class="button-icon" href="#"><span class="button-icon__icon">
                      <svg class="icon-icon-import">
                        <use xlink:href="#icon-import"></use>
                      </svg></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="toolbox">
            <div class="toolbox__row row gutter-bottom-xs">
                <div class="toolbox__left col-12 col-lg">
                    <div class="toolbox__left-row row row--xs gutter-bottom-xs">
                        <div class="form-group form-group--inline col-12 col-sm-auto">
                            <label class="form-label">Show</label>
                            <div class="input-group input-group--white input-group--append">
                                <input class="input input--select" type="text" value="10" size="1"
                                       data-toggle="dropdown" readonly><span class="input-group__arrow">
                        <svg class="icon-icon-keyboard-down">
                          <use xlink:href="#icon-keyboard-down"></use>
                        </svg></span>
                                <div class="dropdown-menu dropdown-menu--right dropdown-menu--fluid js-dropdown-select">
                                    <a class="dropdown-menu__item active" href="#" tabindex="0" data-value="10">10</a><a
                                        class="dropdown-menu__item" href="#" tabindex="0" data-value="15">15</a><a
                                        class="dropdown-menu__item" href="#" tabindex="0" data-value="20">20</a>
                                    <a
                                        class="dropdown-menu__item" href="#" tabindex="0" data-value="25">25</a><a
                                        class="dropdown-menu__item" href="#" tabindex="0" data-value="50">50</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group--inline col col-sm-auto">
                            <div class="input-group input-group--white input-group--append">
                                <select class="input js-input-select" data-placeholder="">
                                    <option value="1" selected="selected">All Categories
                                    </option>
                                    <option value="2">MacBook
                                    </option>
                                    <option value="3">Apple Watch
                                    </option>
                                    <option value="4">AirPods
                                    </option>
                                    <option value="5">iPhone
                                    </option>
                                    <option value="6">IPad
                                    </option>
                                </select><span class="input-group__arrow">
                        <svg class="icon-icon-keyboard-down">
                          <use xlink:href="#icon-keyboard-down"></use>
                        </svg></span>
                            </div>
                        </div>
                        <div class="form-group form-group--inline col-12 col-sm-auto d-none d-sm-block">
                            <div class="toolbox__status input-group input-group--white input-group--append">
                                <input class="input input--select" type="text" value="All status" data-toggle="dropdown"
                                       readonly><span class="input-group__arrow">
                        <svg class="icon-icon-keyboard-down">
                          <use xlink:href="#icon-keyboard-down"></use>
                        </svg></span>
                                <div class="dropdown-menu dropdown-menu--right dropdown-menu--fluid js-dropdown-select">
                                    <a class="dropdown-menu__item active" href="#" tabindex="0" data-value="All status"><span
                                            class="marker-item"></span> All status</a>
                                    <a class="dropdown-menu__item" href="#" tabindex="0" data-value="Published"><span
                                            class="marker-item color-green"></span> Published</a><a
                                        class="dropdown-menu__item" href="#" tabindex="0" data-value="Deleted"><span
                                            class="marker-item color-red"></span> Deleted</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="toolbox__right col-12 col-lg-auto">
                    <div class="toolbox__right-row row row--xs flex-nowrap">
                        <div class="col col-lg-auto">
                            <form class="toolbox__search" method="GET">
                                <div class="input-group input-group--white input-group--prepend">
                                    <div class="input-group__prepend">
                                        <svg class="icon-icon-search">
                                            <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </div>
                                    <input class="input" type="text" placeholder="Search product">
                                </div>
                            </form>
                        </div>
                        <div class="col-auto">
                            <button class="button-add button-add--blue" data-modal="#addProduct"><span
                                    class="button-add__icon">
                        <svg class="icon-icon-plus">
                          <use xlink:href="#icon-plus"></use>
                        </svg></span><span class="button-add__text"></span>
                            </button>
                        </div>
                        <div class="col-auto">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-wrapper">
            <div class="table-wrapper__content table-products table-collapse scrollbar-thin scrollbar-visible"
                 data-simplebar>
                <table class="table table--lines">
                    <colgroup>
                        <col class="colgroup-1">
                        <col class="colgroup-2">
                        <col class="colgroup-3">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead class="table__header">
                    <tr class="table__header-row">
                        <th>
                            <span class="align-middle">Image</span><span class="sort sort--down"></span>
                        </th>
                        <th class="d-none d-lg-table-cell"><span>ID</span>
                        </th>
                        <th class="table__th-sort"><span class="align-middle">Product name</span><span
                                class="sort"></span>
                        </th>
                        <th class="table__th-sort"><span class="align-middle">Type</span><span
                                class="sort"></span>
                        </th>
                        <th class="table__th-sort"><span class="align-middle">Price</span><span
                                class="sort"></span>
                        </th>
                        <th class="table__th-sort d-none d-lg-table-cell"><span class="align-middle">Date</span><span
                                class="sort"></span>
                        </th>
                        <th class="table__th-sort d-none d-sm-table-cell"><span class="align-middle">Status</span><span
                                class="sort"></span>
                        </th>
                        <th class="table__actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="table__row">
                            <td class="table__td">
                                <img src="<?php echo e(pImgUrl($product)); ?>" alt="">
                            </td>
                            <td class="d-none d-lg-table-cell table__td"><span class="text-grey"><?php echo e($product->id); ?></span>
                            </td>
                            <td class="table__td"><?php echo e(substr($product->name, 0, 30) . "..."); ?></td>
                            <td class="table__td"><span class="text-grey"><?php echo e($product->type->name); ?></span>
                            </td>
                            <td class="table__td"><span><?php echo e(price_format($product->price)); ?></span>
                            </td>
                            <td class="d-none d-lg-table-cell table__td"><span
                                    class="text-grey"><?php echo e($product->created_at); ?></span>
                            </td>
                            <td class="d-none d-sm-table-cell table__td">
                                <div class="table__status"><span
                                        class="table__status-icon color-red"></span><?php echo e($product->status->description); ?>

                                </div>
                            </td>
                            <td class="table__td table__actions">
                                <button onclick="updateProduct(<?php echo e(json_encode($product)); ?>)" class="button-add button-add--blue" data-modal="#updateProduct"><span
                                            class="button-add__icon">

                                        
                                        
                                </span><span class="button-add__text">Update</span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="table-wrapper__footer">
                <div class="row">
                    <div class="table-wrapper__show-result col text-grey"><span
                            class="d-none d-sm-inline-block">Showing</span> 1 to 10 <span
                            class="d-none d-sm-inline-block">of 50 items</span>
                    </div>
                    <div class="table-wrapper__pagination col-auto">
                        <ol class="pagination">
                            <li class="pagination__item">
                                <a class="pagination__arrow pagination__arrow--prev" href="#">
                                    <svg class="icon-icon-keyboard-left">
                                        <use xlink:href="#icon-keyboard-left"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="pagination__item active"><a class="pagination__link" href="#">1</a>
                            </li>
                            <li class="pagination__item"><a class="pagination__link" href="#">2</a>
                            </li>
                            <li class="pagination__item"><a class="pagination__link" href="#">3</a>
                            </li>
                            <li class="pagination__item pagination__item--dots">...</li>
                            <li class="pagination__item"><a class="pagination__link" href="#">10</a>
                            </li>
                            <li class="pagination__item">
                                <a class="pagination__arrow pagination__arrow--next" href="#">
                                    <svg class="icon-icon-keyboard-right">
                                        <use xlink:href="#icon-keyboard-right"></use>
                                    </svg>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
    <script>
        function updateProduct(product){
            $(".u_name").val(product.name)
            $(".u_price").val(product.price)
            $(".u_description").html(product.description)
            $(".u_count").val(product.count)
            $(".u_id").val(product.id)

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/admin/products.blade.php ENDPATH**/ ?>