
<?php $__env->startSection('page_title', 'Manage Promotions'); ?>
<?php $__env->startSection('content'); ?>

    
    <div class="card">
        <div class="card-body text-center
">
            <button id="promotion-reset-all" class="btn btn-danger btn-large">Reset All Promotions for the Session</button>
        </div>
    </div>


    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title font-weight-bold">Manage Promotions - Students Who Were Promoted From <span class="text-danger"><?php echo e($old_year); ?></span> TO <span class="text-success"><?php echo e($new_year); ?></span> Session</h5>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">

            <table id="promotions-list" class="table datatable-button-html5-columns">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>From Class</th>
                    <th>To Class</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $promotions->sortBy('fc.name')->sortBy('student.name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="<?php echo e($p->student->photo); ?>" alt="photo"></td>
                        <td><?php echo e($p->student->name); ?></td>
                        <td><?php echo e($p->fc->name.' '.$p->fs->name); ?></td>
                        <td><?php echo e($p->tc->name.' '.$p->ts->name); ?></td>
                        <?php if($p->status === 'P'): ?>
                            <td><span class="text-success">Promoted</span></td>
                        <?php elseif($p->status === 'D'): ?>
                            <td><span class="text-danger">Not Promoted</span></td>
                        <?php else: ?>
                            <td><span class="text-primary">Graduated</span></td>
                        <?php endif; ?>
                        <td class="text-center">
                            <button data-id="<?php echo e($p->id); ?>" class="btn btn-danger promotion-reset">Reset</button>
                            <form id="promotion-reset-<?php echo e($p->id); ?>" method="post" action="<?php echo e(route('students.promotion_reset', $p->id)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?></form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        /* Single Reset */
        $('.promotion-reset').on('click', function () {
            let pid = $(this).data('id');
            if (confirm('Are You Sure you want to proceed?')){
                $('form#promotion-reset-'+pid).submit();
            }
            return false;
        });

        /* Reset All Promotions */
        $('#promotion-reset-all').on('click', function () {
            if (confirm('Are You Sure you want to proceed?')){
                $.ajax({
                    url:"<?php echo e(route('students.promotion_reset_all')); ?>",
                    type:'DELETE',
                    data:{ '_token' : $('#csrf-token').attr('content') },
                    success:function (resp) {
                        $('table#promotions-list > tbody').fadeOut().remove();
                        flash({msg : resp.msg, type : 'success'});
                    }
                })
            }
            return false;
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/students/promotion/reset.blade.php ENDPATH**/ ?>