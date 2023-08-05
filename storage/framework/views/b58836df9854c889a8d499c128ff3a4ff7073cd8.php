
<?php $__env->startSection('page_title', 'Student Promotion'); ?>
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title font-weight-bold">Student Promotion From <span class="text-danger"><?php echo e($old_year); ?></span> TO <span class="text-success"><?php echo e($new_year); ?></span> Session</h5>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
            <?php echo $__env->make('pages.support_team.students.promotion.selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php if($selected): ?>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title font-weight-bold">Promote Students From <span class="text-teal"><?php echo e($my_classes->where('id', $fc)->first()->name.' '.$sections->where('id', $fs)->first()->name); ?></span> TO <span class="text-purple"><?php echo e($my_classes->where('id', $tc)->first()->name.' '.$sections->where('id', $ts)->first()->name); ?></span> </h5>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
            <?php echo $__env->make('pages.support_team.students.promotion.promote', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php endif; ?>


    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/students/promotion/index.blade.php ENDPATH**/ ?>