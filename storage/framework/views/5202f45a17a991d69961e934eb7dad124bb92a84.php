<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="search-breadcrumb-only">
            <div class="row">
                <div class="col-lg-8">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(route('clients.index')); ?>">Clients</a></li>
                    </ol>
                </div>

                <div class="col-lg-4 header-button">
                    <a href="<?php echo e(route('clients.create')); ?>" class="pull-right btn btn-info">
                        <i class="fa fa-plus"></i> Add Client
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">

                    <div class="box-body">
                        <table class="table table-striped table-hover" id="clientTable">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Nationality</th>
                                <th>Date Of Birth</th>
                                <th>Education</th>
                                <th>Preferred Contact</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($client['name'] == ''): ?>
                                    <tr class="danger">
                                        <td><?php echo e($i); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">Record Deleted</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="<?php echo e(route('clients.edit',$i)); ?>">
                                                <i class="fa fa-plus"></i> Add Record
                                            </a>
                                        </td>
                                    </tr>
                                    <?php ++$i;  ?>
                                <?php else: ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($client['name']); ?></td>
                                        <td><?php echo e($client['email']); ?></td>
                                        <td><?php echo e($client['phone']); ?></td>
                                        <td><?php echo e($client['address']); ?></td>
                                        <td><?php echo e($client['nationality']); ?></td>
                                        <td><?php echo e($client['date_of_birth']); ?></td>
                                        <td><?php echo e($client['education']); ?></td>
                                        <td><?php echo e($client['preferred_contact']); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('clients.show', $i)); ?>"
                                               title="View Client Record" data-rel="tooltip">
                                                <i class="icon fa fa-eye"></i>
                                            </a>

                                            <a href="<?php echo e(route('clients.edit', $i)); ?>"
                                               title="Edit Client Record" data-rel="tooltip">
                                                <i class="icon fa fa-edit"></i>
                                            </a>

                                            <a href="<?php echo e(URL::to('clients/destroy/'.$i)); ?>"
                                               title="Delete Client Record" data-rel="tooltip"
                                               onclick="return ConfirmDelete()">
                                                <i class="icon fa fa-trash"></i>
                                            </a>
                                        </td>

                                        <?php ++$i;  ?>
                                    </tr>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete this record?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>