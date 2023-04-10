<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Baraka Travel System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/Ionicons/css/ionicons.min.css')); ?>">

    <!-- Theme style -->

    <link rel="stylesheet" href="<?php echo e(asset('adminlte/css/AdminLTE.css')); ?>">

    
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="<?php echo e(asset('adminlte/css/skins/_all-skins.min.css')); ?>"> -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/sweetalert/sweetalert.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/plugins/lightbox2/css/lightbox.min.css')); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css"></script>


    <![endif]-->
    

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        .bg-danger {
            background-color: #dc3545 !important;
            color: white;
        }

        .bg-warning {
            background-color: #ffc107 !important;
            color: white;
        }

        .bg-success {
            background-color: #28a745 !important;
            color: white;
        }

        .bg-info {
            background-color: #17a2b8 !important;
            color: white;
        }

        .bg-danger .small-box-footer,
        .bg-warning .small-box-footer,
        .bg-success .small-box-footer,
        .bg-info .small-box-footer {
            color: white;
        }

    </style>
    <?php echo $__env->yieldContent('style'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo e(url('/admin')); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">Baraka</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Baraka Travel System</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo e(asset(auth()->user()->image)); ?>" class="user-image" alt="User Image">
                                <?php if(auth()->guard()->guest()): ?>
                                <?php else: ?>
                                <span class="hidden-xs"><?php echo e(auth()->user()->first_name); ?>

                                    <?php echo e(auth()->user()->last_name); ?></span>
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo e(asset(auth()->user()->image)); ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?php if(auth()->guard()->guest()): ?>
                                        <?php else: ?>
                                        <?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?>

                                        <?php endif; ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right btn btn-danger">

                                        <a href="<?php echo e(route('logout')); ?>" style="color: white" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-btn fa-sign"></i> Logout
                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                            style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <!-- <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(asset(auth()->user()->image)); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <?php if(auth()->guard()->guest()): ?>
                    <?php else: ?>
                        <p><?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></p>
                    <?php endif; ?>
                </div>
            </div> -->

                <?php echo $__env->make('admin.layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="inner-body">
                    <!-- <section class="content-header">
                        <h1>
                            <?php echo $__env->yieldContent('page_title'); ?>
                            <small><?php echo $__env->yieldContent('small_title'); ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li class="active"><?php echo $__env->yieldContent('small_title'); ?></li>
                        </ol>
                    </section> -->
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.13
        </div>
        <strong>Copyright &copy; 2020 .</strong> All rights
        reserved.
    </footer> -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i
                                        class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo e(asset('')); ?>adminlte/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo e(asset('')); ?>adminlte/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo e(asset('')); ?>adminlte/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="<?php echo e(asset('')); ?>adminlte/plugins/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo e(asset('adminlte/plugins/jquery-confirm/jquery.confirm.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminlte/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminlte/plugins/lightbox2/js/lightbox.min.js')); ?>"></script>


    <link rel="stylesheet"
        href="<?php echo e(url('design/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
    <!-- DataTables -->
    <script src="<?php echo e(url('design/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('design/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>">
    </script>
    <script src="<?php echo e(url('design/adminlte/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(url('vendor/datatables/buttons.server-side.js')); ?>"></script>
    
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');

    </script>

    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('')); ?>adminlte/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    
    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree();
            $("#dataTableBuilder_wrapper .dt-buttons").css("text-align", "end");
        })

    </script>
    <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script>
    <script src="<?php echo e(asset('js/helper.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('js'); ?>
</body>

</html>
<?php /**PATH G:\Baraka Project\last update abdo\new barakaa10_4_2023\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>