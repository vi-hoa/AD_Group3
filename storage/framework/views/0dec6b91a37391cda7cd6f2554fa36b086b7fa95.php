
<?php $__env->startSection('page_title', 'Edit Dorm - '.$dorm->name); ?>
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Dorm</h6>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="ajax-update" data-reload="#page-header" method="post" action="<?php echo e(route('dorms.update', $dorm->id)); ?>">
                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="name" value="<?php echo e($dorm->name); ?>" required type="text" class="form-control" placeholder="Name of Dormitory">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Description</label>
                            <div class="col-lg-9">
                                <input name="description" value="<?php echo e($dorm->description); ?>"  type="text" class="form-control" placeholder="Description of Dormitory">
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/dorms/edit.blade.php ENDPATH**/ ?>