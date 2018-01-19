<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="search-breadcrumb-only">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(route('clients.index')); ?>">Clients</a></li>
                        <li class="active">Edit Client</li>
                    </ol>
                </div>
            </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body">

                        <form method="post" action="<?php echo e(route('clients.update', $id)); ?>" id="clientform">
                            <input name="_method" type="hidden" value="PUT">

                            <?php echo e(csrf_field()); ?>


                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name" class="form-control-label">Client Name<span
                                                class="text-danger">*</span></label>
                                    <input type="text" name="name" placeholder="Enter Client Name."
                                           value="<?php echo e($client['name']); ?>"
                                           class="form-control" id="name" required>
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block text-danger">
                                            <strong>  <?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-6">
                                    <label for="gender" class="form-control-label">Gender
                                        <span class="text-danger">*</span></label>

                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male" <?php if($client['gender']=='Male'): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            Male
                                        </option>
                                        <option value="Female" <?php if($client['gender']=='Female'): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            Female
                                        </option>
                                        <option value="Others" <?php if($client['gender']=='Others'): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            Other
                                        </option>
                                    </select>
                                    <?php if($errors->has('gender')): ?>
                                        <span class="help-block text-danger">
                                            <strong> <?php echo e($errors->first('gender')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="phone">Phone<span class="text-danger">*</span></label>

                                    <input type="text" name="phone" placeholder="Enter Your Phone Number."
                                           value="<?php echo e($client['phone']); ?>"
                                           class="form-control" id="phone" required>
                                    <?php if($errors->has('phone')): ?>
                                        <span class="help-block text-danger">
                                            <strong>  <?php echo e($errors->first('phone')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-6">
                                    <label for="email">Email<span class="text-danger">*</span></label>

                                    <input type="text" name="email" placeholder="Enter your Email. for eg: example@example.com"
                                           value="<?php echo e($client['email']); ?>"
                                           class="form-control" id="email" required>
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block text-danger">
                                            <strong>  <?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <input type="text" name="address" placeholder="Enter your Address."
                                           value="<?php echo e($client['address']); ?>"
                                           class="form-control" id="address" required>
                                    <?php if($errors->has('address')): ?>
                                        <span class="help-block text-danger">
                                            <strong>  <?php echo e($errors->first('address')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-6">
                                    <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                    <input type="text" name="nationality" placeholder="Enter your Nationality."
                                           value="<?php echo e($client['nationality']); ?>"
                                           class="form-control" id="nationality" required>
                                    <?php if($errors->has('nationality')): ?>
                                        <span class="help-block text-danger">
                                            <strong>  <?php echo e($errors->first('nationality')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="date_of_birth">Date Of Birth<span class="text-danger">*</span></label>
                                    <input type="text" name="date_of_birth" placeholder="Enter your Date of Birth."
                                           value="<?php echo e($client['date_of_birth']); ?>" class="form-control" id="date_of_birth" required>
                                    <?php if($errors->has('date_of_birth')): ?>
                                        <span class="help-block text-danger">
                                            <strong>  <?php echo e($errors->first('date_of_birth')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-6">
                                    <label for="education">Education<span class="text-danger">*</span></label>

                                    <select class="form-control" id="education" name="education" required>
                                        <option value="">Select Your Education Background</option>
                                        <option value="SLC" <?php if($client['education']=='SLC'): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            SLC
                                        </option>
                                        <option value="+2" <?php if($client['education']=='+2'): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            +2
                                        </option>
                                        <option value="Bachelor's Degree" <?php if($client['education']=="Bachelor's Degree"): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            Bachelor's Degree
                                        </option>
                                        <option value="Master's Degree" <?php if($client['education']=="Master's Degree"): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            Master's Degree
                                        </option>
                                        <option value="Doctorate or higher" <?php if($client['education']=="Doctorate or higher"): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            Doctorate or higher
                                        </option>
                                    </select>
                                    <?php if($errors->has('education')): ?>
                                        <span class="help-block text-danger">
                                            <strong> <?php echo e($errors->first('education')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="preferred_contact">Preferred Contact<span
                                                class="text-danger">*</span></label>

                                    <select class="form-control" id="preferred_contact" name="preferred_contact" required>
                                        <option value="">Select Your Preferred Contact</option>
                                        <option value="Email" <?php if($client['preferred_contact']=="Email"): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            Email
                                        </option>
                                        <option value="Phone" <?php if($client['preferred_contact']=="Phone"): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            Phone
                                        </option>
                                        <option value="None" <?php if($client['preferred_contact']=="None"): ?> <?php echo 'selected' ?> <?php endif; ?>>
                                            None
                                        </option>
                                    </select>
                                    <?php if($errors->has('preferred_contact')): ?>
                                        <span class="help-block text-danger">
                                            <strong> <?php echo e($errors->first('preferred_contact')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6" style="margin-top: 25px">
                                    <strong>Note: Fields with <span class="text-danger">*</span> are mandatory!</strong>

                                    <a href="<?php echo e(route('clients.index')); ?>" class="btn btn-danger"
                                       style="margin-left: 120px">
                                        Cancel
                                    </a>

                                    <input type="submit" class="btn btn-info pull-right" value="Update Client">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>