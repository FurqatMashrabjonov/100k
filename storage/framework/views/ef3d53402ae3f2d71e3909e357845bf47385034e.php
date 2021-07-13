<?php $__env->startSection('content'); ?>




    <div class="container m-auto">
        <?php if($errors->any()): ?>
            <div style="color: #ff4f4a" class="alert alert-danger">
                <ol>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </div>
        <?php endif; ?>
        <form method="post" action="<?php echo e(url()->current()); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="grid lg:grid-cols-3 mt-12 gap-8">
                <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">
                    <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                        <div class="col-span-2">
                            <div class="flex flex-col items-center my-6 uk-visible@s">
                                <div
                                    class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transition m-0.5 mr-2  w-24 h-24">
                                    <img src="<?php echo e(asset("img/user.png")); ?>"
                                         class="preview_avatar bg-gray-200 border-4 border-white rounded-full w-full h-full">
                                </div>
                                <input type="file" name="avatar" id="avatar" onchange="previewFile(this)" style="display: none">
                                <a href="#" class="text-xl font-medium capitalize mt-4 uk-link-reset btn"> <label style="cursor: pointer;"
                                        for="avatar">Rasm yuklash</label>
                                </a>
                            </div>
                        </div>
                        <div>
                            <label for=""> Ismingiz</label>
                            <input type="text" name="first_name" placeholder="Ismingizni kiriting.."
                                   class="shadow-none bg-gray-100">
                        </div>
                        <div>
                            <label for=""> Familyangiz</label>
                            <input type="text" name="last_name" placeholder="Familyangizni kiriting.."
                                   class="shadow-none bg-gray-100">
                        </div>
                        <div>
                            <label for=""> Viloyatingiz </label>
                            <select id="relationship" class="region shadow-none bg-gray-100">
                                <option>Tanlash</option>
                                <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($region->id); ?>"><?php echo e($region->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div>
                            <label for=""> Tumaningiz </label>
                            <select name="city_id" id="city_id" class="shadow-none bg-gray-100">

                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for=""> Manzilingiz </label>
                            <input type="text" name="address" placeholder="Manzilingizni kiriting.." class="shadow-none bg-gray-100">
                        </div>
                    </div>

                    <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                        <button type="submit" class="button bg-blue-700"> Saqlash</button>
                    </div>

                </div>

            </div>
        </form>
    </div>




    <script>
        function previewFile(input) {
            var file = $("#avatar").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function () {
                    console.log(reader.result)
                    $(".preview_avatar").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }

    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            $(".region").change(function () {
                $.ajax({
                    'method': 'get',
                    'url': '<?php echo e(route("get_cities")); ?>',
                    data: {
                        'region_id': this.value
                    },
                    success: function (data) {
                        if (data.success)
                            innerCities(data.data)
                    },
                })
            })
        })

        function innerCities(cities) {
            let str = ''
            for (let i = 0; i < cities.length; i++) {
                str += '<option value="' + cities[i].id + '">'
                str += cities[i].name
                str += '</option>'
            }
            $("#city_id").html(str)
        }

        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                $(".preview_avatar").css("background-image", reader.result)
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1382474/baraka-shop.uz/resources/views/auth/profile_items.blade.php ENDPATH**/ ?>