<?php $__env->startSection('page_title'); ?>
    Events
<?php $__env->stopSection(); ?>
<?php $__env->startSection('small_title'); ?>
    Events
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Events</h3>
                <a class="btn btn-primary" href="<?php echo e(url(route('events.create'))); ?>"><i class="fa fa-plus"></i> Create Event </a>
            </div>
            <div class="box-body">
                <?php if(count($records)): ?>
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delate</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr id="removable<?php echo e($record->id); ?>">
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($record->title); ?></td>
                                                        <td class=" text-center">
                                                            <a class="btn btn-primary" href="<?php echo e(route('events.edit',$record->id)); ?>" role="button"><i class="fa fa-edit"></i></a>
                                                        </td>
                                                        <td class="text-center">
                                                            <!-- Trigger the modal with a button -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal"   data-target="#del_app_gallery<?php echo e($record->id); ?>"><i class="fa fa-trash"></i></button>
                                                        </td>

                                                        <!-- Modal -->
                                                        <div id="del_app_gallery<?php echo e($record->id); ?>" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Delate</h4>
                                                                    </div>

                            <form action="<?php echo e(route('events.destroy',$record->id)); ?>" method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                        <div class="modal-body">
                                                                                                                                          <h4><?php echo e($record->title); ?></h4>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                                                                            <button type="submit" class="btn btn-danger">Yes</button>

                                                                    </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div class="text-center"><?php echo e($records->links()); ?></div>
                <?php else: ?>
                    <div class="alert alert-danger">
                        No Data
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Baraka Project\last update abdo\new barakaa10_4_2023\resources\views/admin/event_gallery/index.blade.php ENDPATH**/ ?>