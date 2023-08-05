<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info text-center">
            <span>You can Add New Time Slots or Choose To Use Existing Time Slots of Another Timetable. <strong>NB:</strong> Using Exisiting Time Slots Resets The Current Timetable</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header header-elements-inline bg-danger">
                <h6 class="font-weight-bold card-title">Add Time Slots</h6>
                <?php echo Qs::getPanelOptions(); ?>

            </div>

            <div class="card-body collapse">
                <div class="col-md-12">
                    <form data-reload="#time_slots_table" class="ajax-store" method="post" action="<?php echo e(route('ts.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <input name="ttr_id" value="<?php echo e($ttr->id); ?>" type="hidden">

                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Start Time <span
                                        class="text-danger">*</span></label>

                            <div class="col-lg-3">
                                <select data-placeholder="Hour" required class="select-search form-control" name="hour_from" id="hour_from">

                                    <option value=""></option>
                                    <?php for($t=1; $t<=12; $t++): ?>
                                        <option <?php echo e(old('hour_from') == $t ? 'selected' : ''); ?> value="<?php echo e($t); ?>"><?php echo e($t); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <select data-placeholder="Minute" required class="select-search form-control" name="min_from" id="min_from">

                                    <option value=""></option>
                                    <option value="00">00</option>
                                    <option value="05">05</option>
                                    <?php for($t=10; $t<=55; $t+=5): ?>
                                        <option <?php echo e(old('min_from') == $t ? 'selected' : ''); ?> value="<?php echo e($t); ?>"><?php echo e($t); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <select data-placeholder="Meridian" required class="select form-control" name="meridian_from" id="meridian_from">

                                    <option value=""></option>
                                    <option <?php echo e(old('meridian_from') == 'AM' ? 'selected' : ''); ?> value="AM">AM
                                    </option>
                                    <option <?php echo e(old('meridian_from') == 'PM' ? 'selected' : ''); ?> value="PM">PM
                                    </option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">End Time <span class="text-danger">*</span></label>

                            <div class="col-lg-3">
                                <select data-placeholder="Hour" required class="select-search form-control" name="hour_to" id="hour_to">

                                    <option value=""></option>
                                    <?php for($t=1; $t<=12; $t++): ?>
                                        <option <?php echo e(old('hour_to') == $t ? 'selected' : ''); ?> value="<?php echo e($t); ?>"><?php echo e($t); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <select data-placeholder="Minute" required class="select-search form-control" name="min_to" id="min_to">

                                    <option value=""></option>
                                    <option value="00">00</option>
                                    <option value="05">05</option>
                                    <?php for($t=10; $t<=55; $t+=5): ?>
                                        <option <?php echo e(old('min_to') == $t ? 'selected' : ''); ?> value="<?php echo e($t); ?>"><?php echo e($t); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <select data-placeholder="Meridian" required class="select form-control"
                                        name="meridian_to" id="meridian_to">

                                    <option value=""></option>
                                    <option <?php echo e(old('meridian_to') == 'AM' ? 'selected' : ''); ?> value="AM">AM
                                    </option>
                                    <option <?php echo e(old('meridian_to') == 'PM' ? 'selected' : ''); ?> value="PM">PM
                                    </option>
                                </select>
                            </div>
                        </div>


                        <div class="text-right">
                            <button  type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header header-elements-inline bg-dark">
                <h6 class="font-weight-bold card-title">Use Existing Time Slots</h6>
                <?php echo Qs::getPanelOptions(); ?>

            </div>

            <div class="card-body collapse">
                <div class="col-md-12">
                    <form method="post" action="<?php echo e(route('ts.use', $ttr->id)); ?>">
                        <?php echo csrf_field(); ?>

                        
                        <div class="form-group">
                            <label for="ttr_id" class="col-form-label-lg font-weight-semibold mb-lg-2">Select Existing Time Slots <span class="text-danger">*</span></label>

                            <div class="col-lg-8">
                                <select id="ttr_id" data-placeholder="Select..." required class="select-search form-control-lg" name="ttr_id">

                                    <option value=""></option>
                                    <?php $__currentLoopData = $ts_existing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ttr_ts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ttr_ts->id); ?>"><?php echo e($ttr_ts->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-lg btn-success">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/pages/support_team/timetables/time_slots/add.blade.php ENDPATH**/ ?>