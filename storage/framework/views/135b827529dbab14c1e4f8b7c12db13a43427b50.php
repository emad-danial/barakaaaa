<?php $__env->startSection('page_title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('small_title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-1">
                        <div class="inner">
                            <h3><?php echo e($umrahPackages); ?></h3>

                            <p>Umrah Packages</p>
                        </div>
                        <div class="icon" style="width: 55px">
                            <i class="ion ion-ios-moon-outline" style="font-size: 110px"></i>
                        </div>
                        <a href="<?php echo e(url('admin/umrahs')); ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-2">
                        <div class="inner">
                            <h3><?php echo e($hajjPackages); ?></h3>

                            <p>Hajj Packages</p>
                        </div>
                        <div class="icon">
                            <i class="ion-ios-albums-outline"></i>
                        </div>
                        <a href="<?php echo e(url('admin/hajjs')); ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-3">
                        <div class="inner">
                            <h3><?php echo e($flights); ?></h3>

                            <p>Flights</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-paper-airplane"></i>
                        </div>
                        <a href="<?php echo e(url('admin/flights')); ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-4">
                        <div class="inner">
                            <h3><?php echo e($hotels); ?></h3>

                            <p>Hotels</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-home"></i>
                        </div>
                        <a href="<?php echo e(url('admin/hotels')); ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-o-right"></i></a>

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-1 elevation-1"><i class="fa fa-moon-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">New Umrah Orders</span>

                            <span class="info-box-number"><?php echo e($ordersUmrh); ?></span>
                            <!-- <span class="info-box-number">
                                <a href="<?php echo e(url('admin/packages_orders/pendingOrderUmrah')); ?>">
                                <i class="fa fa-angle-double-right"></i>
                                </a>
                            </span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-2 elevation-1"><i class="fa fa-first-order"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">New Hajj Orders</span>

                            <span class="info-box-number"><?php echo e($ordersHajj); ?></span>
                            <!-- <span class="info-box-number">
                                <a href="<?php echo e(url('admin/hajj_orders/pendingOrderHajj')); ?>">
                                <i class="fa fa-angle-double-right"></i>
                                </a>
                            </span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-3 elevation-1"><i class="fa fa-plane"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Flights Orders</span>
                            <span class="info-box-number"><?php echo e($flightsOrders); ?></span>
                            <!-- <a href="<?php echo e(url('admin/f_orders')); ?>">
                                <i class="fa fa-angle-double-right"></i>
                            </a> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>


                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-4 elevation-1"><i class="fa fa-building"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Hotel Orders</span>

                            <span class="info-box-number"><?php echo e($hotelOrders); ?></span>
                            <!-- <span class="info-box-number">
                                 <a href="<?php echo e(url('admin/order_h')); ?>">
                                <i class="fa fa-angle-double-right"></i>
                                </a>
                            </span> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- /.col -->


                  <div class="col-lg-3 col-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-5 elevation-1"><i class="fa fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number"><?php echo e($users); ?></span>
                            <!-- <a href="<?php echo e(url('admin/users')); ?>">
                                <i class="fa fa-angle-double-right"></i>
                            </a> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
               
                <!-- /.col -->
                <div class="col-lg-3 col-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-6 elevation-1"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Brokers</span>
                            <span class="info-box-number"><?php echo e($brokers); ?></span>
                            <!-- <a href="<?php echo e(url('admin/brokers')); ?>">
                                <i class="fa fa-angle-double-right"></i>
                            </a> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-7 elevation-1"><i class="fa fa-money"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">E_Visa</span>
                            <span class="info-box-number"><?php echo e($evisa); ?></span>
                            <!-- <a href="<?php echo e(url('admin/evisa')); ?>">
                                <i class="fa fa-angle-double-right"></i>
                            </a> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-lg-3 col-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-8 elevation-1"><i class="fa fa-percent"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Rating</span>
                            <span class="info-box-number"><?php echo e($rates); ?></span>
                            <!-- <a href="<?php echo e(url('admin/rates')); ?>">
                                <i class="fa fa-angle-double-right"></i>
                            </a> -->
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

               
                
                  <div class="col-lg-12 col-12">
                    <div class="info-box mb-3" style="display: flex">
                        <span class="info-box-icon bg-1 elevation-1"><i class="fa fa-shopping-cart"></i></span>


                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Umrahs</span>
                            <span class="info-box-number">&dollar; <?php echo e($umrahprice); ?> </span>
                            <!-- <a href="<?php echo e(url('admin/packages_orders/completeOrderUmrah')); ?>">
                                <i class="fa fa-angle-double-right"></i> Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">+</div>
                       <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Hajjs</span>
                            <span class="info-box-number">&dollar; <?php echo e($hajjprice); ?> </span>
                            <!-- <a href="<?php echo e(url('admin/hajj_orders/completeOrderHajj')); ?>">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">+</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Hotels</span>
                            <span class="info-box-number">&dollar; <?php echo e($hotelsprice); ?> </span>
                            <!-- <a href="<?php echo e(url('admin/order_h/complete')); ?>">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">+</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Flights</span>
                            <span class="info-box-number">&dollar; <?php echo e($flightssprice); ?> </span>
                            <!-- <a href="<?php echo e(url('admin/f_orders/complete')); ?>">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 15px;">=</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Sales</span>
                            <span class="info-box-number">&dollar; <?php echo e($total_sales); ?> </span>
                        </div>

                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
<div class="col-lg-12 col-12">
                    <div class="info-box" style="display: flex">
                        <span class="info-box-icon bg-2 elevation-1"><i class="fa fa-eye"></i></span>


                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Umrah Views</span>
                            <span class="info-box-number"><?php echo e($umrahviews); ?> </span>
                            <!-- <a href="<?php echo e(url('admin/packages_views/umrah')); ?>">
                                <i class="fa fa-angle-double-right"></i> Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 25px;">+</div>
                       <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Hajj Views</span>
                            <span class="info-box-number"><?php echo e($hajjviews); ?> </span>
                            <!-- <a href="<?php echo e(url('admin/packages_views/hajj')); ?>">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 25px;">+</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Hotel Views</span>
                            <span class="info-box-number"><?php echo e($hotelsprice); ?> </span>
                            <!-- <a href="<?php echo e(url('admin/packages_views/hotel')); ?>">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 25px;">+</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Flight Views</span>
                            <span class="info-box-number"><?php echo e($flightviews); ?> </span>
                            <!-- <a href="<?php echo e(url('admin/packages_views/flight')); ?>">
                                <i class="fa fa-angle-double-right"></i>Go Details
                            </a> -->
                        </div>
                        <div style="padding-top: 25px;font-size: 24px;padding-left: 25px;">=</div>
                        <div class="info-box-content" style="margin-left: 50px;">
                            <span class="info-box-text">Total Views</span>
                            <span class="info-box-number"><?php echo e($total_views); ?> </span>
                        </div>

                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>


            </div>

        </div><!-- /.container-fluid -->
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Baraka Project\last update abdo\new barakaa10_4_2023\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>