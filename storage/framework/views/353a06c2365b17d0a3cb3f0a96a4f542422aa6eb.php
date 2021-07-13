<?php $__env->startSection("content"); ?>

    <div class="container m-auto">

        <?php echo $__env->make("components.admin_menu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <br>
        <br>
        <?php if(count($referals) !== 0): ?>
            <table style="background-color: white;border-radius: 10px" class="uk-table  uk-table-divider">
                <thead>
                <tr >
                    <th>Oqim</th>
                    <th>Ko'rildi</th>
                    <th>Mijoz raqamini qoldirdi</th>
                    <th>Qabul qilindi</th>
                    <th>Yetkazilmoqda</th>
                    <th>Yetqazib berildi</th>
                    <th>Bekor qilindi</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $referals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $referal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($referal['name']); ?></td>
                    <td><?php echo e($referal['view']); ?></td>
                    <td><?php echo e($referal['not_accepted']); ?></td>
                    <td><?php echo e($referal['not_saled']); ?></td>
                    <td><?php echo e($referal['deliving']); ?></td>
                    <td><?php echo e($referal['saled']); ?></td>
                    <td><?php echo e($referal['ignore']); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr style="background-color: #C73632;font-weight: bold;color: white;">
                    <td>Jami</td>
                    <td><?php echo e($all['view']); ?></td>
                    <td><?php echo e($all['not_accepted']); ?></td>
                    <td><?php echo e($all['not_saled']); ?></td>
                    <td><?php echo e($all['deliving']); ?></td>
                    <td><?php echo e($all['saled']); ?></td>
                    <td><?php echo e($all['ignore']); ?></td>
                </tr>
                </tbody>
            </table>
    <?php else: ?>
            <div uk-alert>
                <a class="uk-alert-close" ></a>
                <h3>Sizda statistika mavjud emas</h3>

            </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/profile/statistika.blade.php ENDPATH**/ ?>