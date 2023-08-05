<form method="post" action="<?php echo e(route('students.promote_selector')); ?>">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-10">
            <fieldset>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fc" class="col-form-label font-weight-bold">From Class:</label>
                            <select required onchange="getClassSections(this.value, '#fs')" id="fc" name="fc" class="form-control select">
                                <option value="">Select Class</option>
                                <?php $__currentLoopData = $my_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(($selected && $fc == $c->id) ? 'selected' : ''); ?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fs" class="col-form-label font-weight-bold">From Section:</label>
                            <select required id="fs" name="fs" data-placeholder="Select Class First" class="form-control select">
                                <?php if($selected && $fs): ?>
                                    <option value="<?php echo e($fs); ?>"><?php echo e($sections->where('id', $fs)->first()->name); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tc" class="col-form-label font-weight-bold">To Class:</label>
                            <select required onchange="getClassSections(this.value, '#ts')" id="tc" name="tc" class="form-control select">
                                <option value="">Select Class</option>
                                <?php $__currentLoopData = $my_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(($selected && $tc == $c->id) ? 'selected' : ''); ?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ts" class="col-form-label font-weight-bold">To Section:</label>
                            <select required id="ts" name="ts" data-placeholder="Select Class First" class="form-control select">
                                <?php if($selected && $ts): ?>
                                    <option value="<?php echo e($ts); ?>"><?php echo e($sections->where('id', $ts)->first()->name); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                </div>

            </fieldset>
        </div>

        <div class="col-md-2 mt-4">
            <div class="text-right mt-1">
                <button type="submit" class="btn btn-primary">Manage Promotion <i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>

    </div>

</form>
<?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/students/promotion/selector.blade.php ENDPATH**/ ?>