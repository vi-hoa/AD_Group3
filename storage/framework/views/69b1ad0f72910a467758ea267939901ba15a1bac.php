
<?php $__env->startSection('page_title', 'Tabulation Sheet'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-books mr-2"></i> Tabulation Sheet</h5>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
        <form method="post" action="<?php echo e(route('marks.tabulation_select')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exam_id" class="col-form-label font-weight-bold">Exam:</label>
                                            <select required id="exam_id" name="exam_id" class="form-control select" data-placeholder="Select Exam">
                                                <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(($selected && $exam_id == $exm->id) ? 'selected' : ''); ?> value="<?php echo e($exm->id); ?>"><?php echo e($exm->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="my_class_id" class="col-form-label font-weight-bold">Class:</label>
                                            <select onchange="getClassSections(this.value)" required id="my_class_id" name="my_class_id" class="form-control select" data-placeholder="Select Class">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $my_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(($selected && $my_class_id == $c->id) ? 'selected' : ''); ?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id" class="col-form-label font-weight-bold">Section:</label>
                                <select required id="section_id" name="section_id" data-placeholder="Select Class First" class="form-control select">
                                    <?php if($selected): ?>
                                        <?php $__currentLoopData = $sections->where('my_class_id', $my_class_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($section_id == $s->id ? 'selected' : ''); ?> value="<?php echo e($s->id); ?>"><?php echo e($s->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-2 mt-4">
                            <div class="text-right mt-1">
                                <button type="submit" class="btn btn-primary">View Sheet <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>

                    </div>

                </form>
        </div>
    </div>

    

    <?php if($selected): ?>
        <div class="card">
            <div class="card-header">
                <h6 class="card-title font-weight-bold">Tabulation Sheet for <?php echo e($my_class->name.' '.$section->name.' - '.$ex->name.' ('.$year.')'); ?></h6>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>NAMES_OF_STUDENTS_IN_CLASS</th>
                       <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <th title="<?php echo e($sub->name); ?>" rowspan="2"><?php echo e(strtoupper($sub->slug ?: $sub->name)); ?></th>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <th style="color: darkred">Total</th>
                        <th style="color: darkblue">Average</th>
                        <th style="color: darkgreen">Position</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td style="text-align: center"><?php echo e($s->user->name); ?></td>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($marks->where('student_id', $s->user_id)->where('subject_id', $sub->id)->first()->$tex ?? '-' ?: '-'); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            

                            <td style="color: darkred"><?php echo e($exr->where('student_id', $s->user_id)->first()->total ?: '-'); ?></td>
                            <td style="color: darkblue"><?php echo e($exr->where('student_id', $s->user_id)->first()->ave ?: '-'); ?></td>
                            <td style="color: darkgreen"><?php echo Mk::getSuffix($exr->where('student_id', $s->user_id)->first()->pos) ?: '-'; ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                
                <div class="text-center mt-4">
                    <a target="_blank" href="<?php echo e(route('marks.print_tabulation', [$exam_id, $my_class_id, $section_id])); ?>" class="btn btn-danger btn-lg"><i class="icon-printer mr-2"></i> Print Tabulation Sheet</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/marks/tabulation/index.blade.php ENDPATH**/ ?>