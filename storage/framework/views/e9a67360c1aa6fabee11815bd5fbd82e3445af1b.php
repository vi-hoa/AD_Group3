
<?php $__env->startSection('page_title', 'View TimeTable'); ?>
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h6 class="card-title"><strong>Name: </strong> <?php echo e($ttr->name); ?></h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Class: </strong> <?php echo e($my_class->name); ?></h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Year: </strong> <?php echo e(($ttr->exam_id) ? 'Exam TimeTable' : 'Class TimeTable'); ?> <?php echo e('('.$ttr->year.')'); ?></h6></div>
            </div>
        </div>
            <div class="card-body">
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th rowspan="2">Time <i class="icon-arrow-right7 ml-2"></i> <br> Date<i class="icon-arrow-down7 ml-2"></i>
                        </th>
                        <?php $__currentLoopData = $time_slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th rowspan="2"><?php echo e($tms->time_from); ?> <br>
                            <?php echo e($tms->time_to); ?>

                            </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php if($ttr->exam_id): ?>
                                <td><strong><?php echo e(date('l', strtotime($day))); ?> <br> <?php echo e(date('d/m/Y', strtotime($day))); ?> </strong></td>
                                <?php else: ?>
                                <td><strong><?php echo e($day); ?></strong></td>
                                <?php endif; ?>
                                <?php $__currentLoopData = $d_time->where('day', $day); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><?php echo e($dt['subject']); ?></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                
                <div class="text-center mt-4">
                    <a target="_blank" href="<?php echo e(route('ttr.print', $ttr->id)); ?>" class="btn btn-danger btn-lg"><i class="icon-printer mr-2"></i> Print Timetable</a>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/timetables/show.blade.php ENDPATH**/ ?>