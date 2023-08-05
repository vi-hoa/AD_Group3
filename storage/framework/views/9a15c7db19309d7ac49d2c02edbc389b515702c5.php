<div class="tab-pane fade" id="add-sub">
    <div class="col-md-8">
        <form class="ajax-store" method="post" action="<?php echo e(route('tt.store')); ?>">
            <?php echo csrf_field(); ?> <input name="ttr_id" value="<?php echo e($ttr->id); ?>" type="hidden">

            <?php if($ttr->exam_id): ?>
                
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label font-weight-semibold">Exam Date <span
                                class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input autocomplete="off" name="exam_date" value="<?php echo e(old('exam_date')); ?>" required type="text" class="form-control date-pick" placeholder="Select Date...">
                    </div>
                </div>

            <?php else: ?>
                
                <div class="form-group row">
                    <label for="day" class="col-lg-3 col-form-label font-weight-semibold">Day <span class="text-danger">*</span></label>

                    <div class="col-lg-9">
                        <select id="day" name="day" required type="text" class="form-control select"
                                data-placeholder="Select Day...">
                            <option value=""></option>
                            <?php $__currentLoopData = Qs::getDaysOfTheWeek(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(old('day') == $dw ? 'selected' : ''); ?> value="<?php echo e($dw); ?>"><?php echo e($dw); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                </div>

            <?php endif; ?>

            
            <div class="form-group row">
                <label for="subject_id" class="col-lg-3 col-form-label font-weight-semibold">Subject
                    <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <select required data-placeholder="Select Subject"
                            class="form-control select-search" name="subject_id" id="subject_id">
                        <option value=""></option>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e(old('subject_id') == $sub->id ? 'selected' : ''); ?> value="<?php echo e($sub->id); ?>"><?php echo e($sub->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            
            <div class="form-group row">

                <label for="ts_id" class="col-lg-3 col-form-label font-weight-semibold">Time Slot <span
                            class="text-danger">*</span></label>

                <div class="col-lg-9">
                    <select data-placeholder="Select Time..." required class="select form-control" name="ts_id"
                            id="ts_id">

                        <option value=""></option>
                        <?php $__currentLoopData = $time_slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e(old('ts_id') == $tms->full ? 'selected' : ''); ?> value="<?php echo e($tms->id); ?>"><?php echo e($tms->full); ?></option>
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
<?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/timetables/subjects/add.blade.php ENDPATH**/ ?>