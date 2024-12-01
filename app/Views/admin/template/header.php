<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("../public/assets/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>"
        rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="<?php echo base_url("../public/assets/vendors/font-awesome/css/font-awesome.min.css"); ?>"
        rel="stylesheet" />
    <!-- NProgress -->
    <link href="<?php echo base_url("../public/assets/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url("../public/assets/vendors/bootstrap-daterangepicker/daterangepicker.css"); ?>"
        rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("../public/assets/build/css/custom.min.css"); ?>" rel="stylesheet" />
    <!-- css by ritika -->
    <!-- <link href="<?php //echo base_url("../public/assets/build/css/sweetalert2.min .css"); ?>" rel="stylesheet" /> -->
    <style>
        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
        }

        #datatable-responsive {
            table-layout: fixed;
            width: 100%;
        }
    </style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0">
                        <a href="index.html" class="site_title"><i class="fa fa-file"></i> <span>Programme</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a><i class="fa fa-home"></i> Home
                                        <!-- <span class="fa fa-chevron-down"></span></a> -->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->


                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class="navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px">
                                <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false"
                                    style="font-size: 1.0rem;">
                                    <?= ucfirst(session()->get('name')); ?>
                                    <!-- Dynamically display the logged-in user's name with the first letter capitalized -->
                                </a>


                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"> Profile</a>
                                    <a class="dropdown-item" href="#">
                                        <!-- <span class="badge bg-red pull-right">50%</span> -->
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="#">Help</a>
                                    <a class="dropdown-item" href="<?php echo base_url('admin/logout'); ?>"><i
                                            class="fa fa-sign-out pull-right"></i>
                                        Log Out</a>
                                </div>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->