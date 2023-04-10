<?php $__env->startSection('content'); ?>

    <!--DASHBOARD-->
    <section>
        <div class="tr-register">
            <div class="tr-regi-form">
                <h4>Sign In</h4>
                <p>It's free and always will be.</p>
                
              			    <?php if(session()->has('status')): ?>
							<div class="alert alert-success contact__msg"  role="alert">
							        Please Check Your Email To get Your Email and Password
							</div>
							<?php endif; ?>

					    <?php if(session()->has('notvertfied') ): ?>

                            <p class="alert alert-danger"> You must verify you are not a robot </p>
                        <?php endif; ?>
        
                        <?php if(session()->has('completeverfied') ): ?>

                            <p class="alert alert-success"> Please activate your account from your email </p>
                        <?php endif; ?>

                
                <form class="col s12" method="POST" action="<?php echo e(route('login')); ?>">
                   <?php echo csrf_field(); ?>
                        <div class="input-field col s12">
                            <input type="email" name="email" class="validate" required>
                            <label>email</label>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="input-field col s12">
                            <input type="password" class="validate" name="password" required>
                            <label>Password</label>
                               <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                   <span class="invalid-feedback" role="alert">
                                       <strong><?php echo e($message); ?></strong>
                                   </span>
                               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                        </div>
                        <div class="input-field col s12">
                            <div class="g-recaptcha" data-sitekey="<?php echo e(env('recaptchSiteKey')); ?>"></div>

                        </div>

                        <div class="input-field col s12">
                            <input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn" > </div>
                </form>
                <p> <a href="/forgetPassword">Forgot Password ?</a>  |  Are you a new user ? <a href="/register">Register</a>
                </p>
              <!--   <div class="soc-login">
                    <h4>Sign in using</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook fb1"></i> Facebook</a> </li>
                        <li><a href="#"><i class="fa fa-twitter tw1"></i> Twitter</a> </li>
                        <li><a href="#"><i class="fa fa-google-plus gp1"></i> Google</a> </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </section>
    <!--END DASHBOARD-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Baraka Project\last update abdo\new barakaa10_4_2023\resources\views/auth/login.blade.php ENDPATH**/ ?>