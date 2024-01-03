<?php require_once '../includes/init.php';
if (!isset($_SESSION['AdminId'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>پنل مدیریت وبلاگ</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/global/plugins.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
</head>

<body id="kt_body" class="header-fixed subheader-enabled page-loading">

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
<div id="kt_header_mobile" class="header-mobile ">
                    <a href="index.html">
                        <img alt="Logo" src="assets/media/logos/logo.png" class="max-h-30px" />
                    </a>
                    <div class="d-flex align-items-center">

                        <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
                            <span></span>
                        </button>

                        <button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                            <span class="svg-icon svg-icon-xl"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg></span> </button>
                    </div>
                </div>
                <div id="kt_header" class="header  header-fixed ">
                    <div class=" container ">
                        <div class="topbar  topbar-minimize ">
                            <div class="dropdown">
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                    <div class="d-flex flex-column flex-center py-10 bg-dark-o-5 rounded-top bg-light">
                                        <h4 class="text-dark font-weight-bold">
                                            خوش آمدید مدیر عزیز
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                    <div class=" container ">
                        <div class="header-menu header-menu-left header-menu-mobile  header-menu-layout-default header-menu-root-arrow ">
                            <ul class="menu-nav ">
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true"><a href="index.php" class="menu-link menu-toggle"><span class="menu-text">داشبورد</span><i class="menu-arrow"></i></a>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true"><a href="Categories.php" class="menu-link menu-toggle"><span class="menu-text">دسته بندی</span><i class="menu-arrow"></i></a>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true"><a href="Posts.php" class="menu-link menu-toggle"><span class="menu-text">مدیریت مطالب</span><i class="menu-arrow"></i></a>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true"><a href="Comments.php" class="menu-link menu-toggle"><span class="menu-text">نظرات</span><i class="menu-arrow"></i></a>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true"><a href="logout.php" class="menu-link menu-toggle"><span class="menu-text">خروج</span><i class="menu-arrow"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row flex-column-fluid  container ">
                    <div class="main d-flex flex-column flex-row-fluid">
                        <div class="subheader py-2 py-lg-6 " id="kt_subheader">
                            <div class=" w-100  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <div class="d-flex align-items-center flex-wrap mr-1">
                                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                                        <h5 class="text-dark font-weight-bold my-1 mr-5">خوش آمدید مدیر عزیز</h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="btn btn-light-primary btn-sm font-weight-bold mr-2" id="" data-toggle="tooltip" title="انتخاب تاریخ" data-placement="left">
                                        <span class="opacity-60 font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">امروز</span>
                                        <span class="font-weight-bold" id="kt_dashboard_daterangepicker_date"><?= jdate('j F Y'); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>