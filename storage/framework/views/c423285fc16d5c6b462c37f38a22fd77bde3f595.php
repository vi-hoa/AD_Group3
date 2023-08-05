<div class="card">
    <div class="card-header header-elements-inline bg-success">
        <h6 class="font-weight-bold card-title">Manage Time Slots - <?php echo e($ttr->name); ?></h6>
        <?php echo Qs::getPanelOptions(); ?>

    </div>

    <div class="card-body collapse">
        <table id="time_slots_table" class="table datatable-button-html5-columns">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $time_slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($tms->time_from); ?></td>
                    <td><?php echo e($tms->time_to); ?></td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    
                                    <a href="<?php echo e(route('ts.edit', $tms->id)); ?>" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>

                                    
                                    <?php if(Qs::userIsSuperAdmin()): ?>
                                        <a id="<?php echo e($tms->id); ?>" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                        <form method="post" id="item-delete-<?php echo e($tms->id); ?>" action="<?php echo e(route('ts.destroy', $tms->id)); ?>" class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('delete'); ?></form>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>

</div>
<?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/timetables/time_slots/manage.blade.php ENDPATH**/ ?>