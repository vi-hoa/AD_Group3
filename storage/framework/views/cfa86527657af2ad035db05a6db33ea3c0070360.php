<div class="tab-pane fade" id="edit-subs">
    
    <?php if($tts->count()): ?>
        <?php $__currentLoopData = $tts->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h6 class="card-title font-weight-bold"><?php echo e(($tt->exam_date ? 'Exam ('.date('D\, d/m/Y', strtotime($tt->exam_date)).')' : $tt->day)); ?> <?php echo e('('.$tt->time_slot->full.')' .' - '.$tt->subject->name); ?></h6>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a onclick="confirmDelete(this.id)" href="#" id="<?php echo e($tt->id); ?>" title="DELETE"
                                           class="list-icons-item text-danger"><i class="icon-trash"></i></a>
                                        <form method="post" id="item-delete-<?php echo e($tt->id); ?>"
                                              action="<?php echo e(route('tt.delete', $tt->id)); ?>"
                                              class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                        </form>
                                        <a class="list-icons-item" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="remove"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body collapse">
                                <div class="col-md-12">
                                    <form  method="post" action="<?php echo e(route('tt.update', $tt->id)); ?>">
                                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

                                        <input name="ttr_id" value="<?php echo e($ttr->id); ?>" type="hidden">

                                        <?php if($ttr->exam_id): ?>
                                            
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label font-weight-semibold">Exam
                                                    Date <span class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <input autocomplete="off" name="exam_date"
                                                           value="<?php echo e($tt->exam_date); ?>" required
                                                           type="text" class="form-control date-pick"
                                                           placeholder="Select Date...">
                                                </div>
                                            </div>

                                        <?php else: ?>
                                            
                                            <div class="form-group row">
                                                <label for="day"
                                                       class="col-lg-3 col-form-label font-weight-semibold">Day
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-9">
                                                    <select id="day" name="day" required type="text"
                                                            class="form-control select"
                                                            data-placeholder="Select Day...">
                                                        <?php $__currentLoopData = Qs::getDaysOfTheWeek(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e($tt->day == $dw ? 'selected' : ''); ?> value="<?php echo e($dw); ?>"><?php echo e($dw); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </select>
                                                </div>
                                            </div>

                                        <?php endif; ?>
                                        
                                        <div class="form-group row">
                                            <label for="subject_id"
                                                   class="col-lg-3 col-form-label font-weight-semibold">Subject
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <select required data-placeholder="Select Subject"
                                                        class="form-control select-search"
                                                        name="subject_id" id="subject_id">
                                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e($tt->subject_id == $sub->id ? 'selected' : ''); ?> value="<?php echo e($sub->id); ?>"><?php echo e($sub->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        
        <div class="form-group row">

                <label for="ts_id" class="col-lg-3 col-form-label font-weight-semibold">Time Slot <span
                            class="text-danger">*</span></label>

                <div class="col-lg-9">
                    <select data-placeholder="Select Time..." required class="select form-control" name="ts_id" id="ts_id">

                        <option value=""></option>
                        <?php $__currentLoopData = $time_slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($tt->ts_id == $tms->id ? 'selected' : ''); ?> value="<?php echo e($tms->id); ?>"><?php echo e($tms->full); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

                                        
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit Form <i class="icon-paperplane ml-2"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div class="alert alert-info text-center">There are NO Records to Display. Add Subjects To The TimeTable Record
            & Refresh the page
        </div>
    <?php endif; ?>
</div>
<?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/timetables/subjects/edit.blade.php ENDPATH**/ ?>