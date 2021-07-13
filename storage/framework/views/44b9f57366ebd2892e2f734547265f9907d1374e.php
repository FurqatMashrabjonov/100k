<?php $__env->startSection("content"); ?>

    <div class="container m-auto">

        <?php echo $__env->make("components.admin_menu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <br>
        <br>
        <?php if(count($requests) !== 0): ?>
            <table style="background-color: white;border-radius: 10px" class="uk-table  uk-table-divider">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Mahsulot</th>
                    <th>Buyurtmachi/Manzil</th>
                    <th>Holat</th>
                    <th>Izoh</th>
                    <th>Sana</th>
                    <th>Oqim</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                    Operator: <?php echo e($request->admin->id); ?>

                    </td>
                    <td><?php echo e($request->checkout->product->name); ?></td>
                    <td><?php echo e($request->checkout->name); ?> - <?php echo e(phone_hidden($request->checkout->phone)); ?> - <?php echo e($request->checkout->address); ?></td>
                    <td><?php echo e(($request->checkout->with_status->id === \App\Models\Checkout::IGNORE) ? $request->checkout->with_status->description . '(' . $request->checkout->reason->description . ')' : $request->checkout->with_status->description); ?></td>
                    <td><?php echo e($request->description); ?></td>
                    <td><?php echo e($request->created_at); ?></td>
                    <td><?php echo e($request->checkout->referal->name); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
    <?php else: ?>
            <div uk-alert>
                <a class="uk-alert-close" ></a>
                <h3>Sizda So'rovlar mavjud emas</h3>

            </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/profile/requests.blade.php ENDPATH**/ ?>