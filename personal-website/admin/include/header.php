<?php require 'include/database.php'; 


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Paneli</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/skin-green.min.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>P</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b> Paneli</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <i class="fa fa-bars"></i>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        
                        
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="">Çıkış Yap</a>

                        

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../assets/upload/<?= $ayar->site_resim ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p> <?=$ayar->site_adSoyad?> </p>
                    <p> <?=$ayar->site_meslek?> </p>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menüler</li>
                <li class="">
                     <a href="index.php">
                        <i class="fa fa-th"></i> <span>Dashboard</span>
					</a>
                </li>
				<li>
                     <a href="anasayfa.php">
                        <i class="fa fa-th"></i> <span>Anasayfa</span>
					</a>
                </li>
                <li>
                     <a href="calismalarim.php">
                        <i class="fa fa-th"></i> <span>Çalışmalarım</span>
					</a>
                </li>
                <li>
                     <a href="hakkimda.php">
                        <i class="fa fa-th"></i> <span>Hakkımda</span>
					</a>
                </li>
               

<?php 

$okunmamis=$db->prepare("SELECT * FROM iletisim WHERE durum=:durum");
$okunmamis->execute(["durum"=>0]);

$sayi=$okunmamis->rowCount();

?>


                <li>
                     <a href="iletisim.php">
                        <i class="fa fa-th"></i> <span>İletişim</span>
                        <span class="pull-right-container"></span>
                        <small class="label pull-right bg-red"><?= $sayi ?></small>
					</a>
                </li>
                <li>
                     <a href="ayarlar.php">
                        <i class="fa fa-th"></i> <span>Ayarlar</span>
					</a>
                </li>
			</ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
