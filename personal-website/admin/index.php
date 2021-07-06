
<?php include 'include/header.php'; ?>
    

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>

<?php
    $toplam=$db->query("SELECT * FROM calismalar");
    $topmsj=$db->query("SELECT * FROM iletisim WHERE durum=1 OR durum=0");
    $topok=$db->query("SELECT * FROM iletisim WHERE durum=0");
?>

                        <div class="info-box-content">
                            <span class="info-box-text">Çalışmalarım</span>
                            <span class="info-box-number"><?=$toplam->rowCount();?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-bars"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Toplam Mesajlar</span>
                            <span class="info-box-number"><?= $topmsj->rowCount(); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-bell"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Okunmamış Msj</span>
                            <span class="info-box-number"><?= $topok->rowCount(); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
<?php include 'include/footer.php'; ?>
