<div class="navbar navbar-expand-lg navbar-light">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            More Links
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; <?php echo e(date('Y')); ?>. <a href="#"><?php echo e(Qs::getSystemName()); ?></a> by <a href="#" >CJ Inspired</a>
					</span>

        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item"><a href="<?php echo e(route('privacy_policy')); ?>" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Privacy Policy</a></li>
            <li class="nav-item"><a href="<?php echo e(route('terms_of_use')); ?>" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Terms of Use </a></li>

        </ul>
    </div>
</div>
<?php /**PATH E:\btec\Application-Development\app\lav_sms\resources\views/partials/login/footer.blade.php ENDPATH**/ ?>