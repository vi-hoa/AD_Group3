
<?php $__env->startSection('page_title', 'Manage TimeTable Record'); ?>
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-bold"><?php echo e($ttr->name.' ('.$my_class->name.')'.' '.$ttr->year); ?></h6>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#manage-ts" class="nav-link active" data-toggle="tab">Manage Time Slots</a></li>
                <li class="nav-item"><a href="#add-sub" class="nav-link" data-toggle="tab">Add Subject</a></li>
                <li class="nav-item"><a href="#edit-subs" class="nav-link " data-toggle="tab">Edit Subjects</a></li>
                <li class="nav-item"><a target="_blank" href="<?php echo e(route('ttr.show', $ttr->id)); ?>" class="nav-link" >View TImeTable</a></li>
            </ul>

            <div class="tab-content">
                
                <?php echo $__env->make('pages.support_team.timetables.time_slots.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php echo $__env->make('pages.support_team.timetables.subjects.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php echo $__env->make('pages.support_team.timetables.subjects.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/timetables/manage.blade.php ENDPATH**/ ?>