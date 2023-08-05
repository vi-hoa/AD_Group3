
<?php $__env->startSection('page_title', 'Edit Section of '.$s->my_class->name); ?>
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Section of <?php echo e($s->my_class->name); ?></h6>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="ajax-update" method="post" action="<?php echo e(route('sections.update', $s->id)); ?>">
                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="name" value="<?php echo e($s->name); ?>" required type="text" class="form-control" placeholder="Name of Class">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Class </label>
                            <div class="col-lg-9">
                                <input class="form-control" id="my_class_id" disabled="disabled" type="text" value="<?php echo e($s->my_class->name); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Trainer</label>
                            <div class="col-lg-9">
                                <select data-placeholder="Select Trainer" class="form-control select-search" name="teacher_id" id="teacher_id">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($s->teacher_id == $t->id ? 'selected' : ''); ?> value="<?php echo e(Qs::hash($t->id)); ?>"><?php echo e($t->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/sections/edit.blade.php ENDPATH**/ ?>