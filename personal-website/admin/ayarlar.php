<?php include 'include/header.php'; ?>


<?php 
$ayarlar = $db->prepare("SELECT * FROM ayarlar WHERE id=:id");
$ayarlar->execute(["id" => 1]);
$row = $ayarlar->fetch(PDO::FETCH_OBJ);

?>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
                <div class="box">
                    <div class="box-header">
                        Site Ayarları
                    </div>
                    <div class="box-body">
                        <?php
                            if(@$_GET["durum"] == "ok") {
                        ?>
                            <div class="alert alert-success">
                            Bilgileriniz Güncellenmiştir.
                            </div>
                            <?php
                        }
                            if(@$_GET["durum"]=="no"){
                            ?>
                                <div class="alert alert-danger">
                                Bir hata oluştu.
                                </div>
                                <?php
                            }
                                ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Site Başlığı</label>
                                <input name="site_baslik" class="form-control" value="<?= $row->site_baslik ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Site Anahtar Kelimeler</label>
                                <input name="site_keywords" class="form-control" value="<?= $row->site_keywords ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Site Açıklama</label>
                                <input name="site_description" class="form-control" value="<?= $row->site_description ?>"/>
                            </div>
                            <div class="form-group ">
                                <label>Site Email Adresi</label>
                                <input name="site_email" class="form-control" value="<?= $row->site_email ?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Site Facebook</label>
                                <input name="site_facebook" class="form-control" value="<?= $row->site_facebook ?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Site Twitter</label>
                                <input name="site_twitter" class="form-control" value="<?= $row->site_twitter ?>"/>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Site Kullanıcı Adı</label>
                                <input name="site_kad" class="form-control" value="<?= $row->site_kad ?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Site Şifre</label>
                                <input name="site_pass" class="form-control" value="<?= $row->site_pass ?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Site Ad Soyad</label>
                                <input name="site_adSoyad" class="form-control" value="<?= $row->site_adSoyad ?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Site Meslek</label>
                                <input name="site_meslek" class="form-control" value="<?= $row->site_meslek ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Site Resim</label>
                                <input name="site_resim" type="file"/>
                            </div>
                            <div class="form-group">
                            <label>Site Durum</label>
                                <select class="form-control" name="site_durum">
                                <option value="1" <?= $row->site_durum == 1 ? "selected": "" ?>>Açık</option>
                                <option value="0" <?= $row->site_durum == 0 ? "selected": "" ?>>Kapalı</option>
                                </select>
                            </div>

                        
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                            </div>
                        </form>
                    </div>
                </div>        
            

            </div>
        </div>

    </section>

<?php 
    if($_POST){
        if($_FILES["site_resim"]["name"]) {
            $resimAdi=$_FILES["site_resim"]["name"];
            $resimYolu="../assets/upload/".$resimAdi;
            if(move_uploaded_file($_FILES["site_resim"]["tmp_name"],$resimYolu)){
                $guncelle=$db->prepare("UPDATE ayarlar SET 
                site_baslik=:site_baslik,
                site_keywords=:site_keywords,
                site_description=:site_description,
                site_durum=:site_durum,
                site_email=:site_email,
                site_facebook=:site_facebook,
                site_twitter=:site_twitter,
                site_kad=:site_kad,
                site_pass=:site_pass,
                site_adSoyad=:site_adSoyad,
                site_meslek=:site_meslek,
                site_resim=:site_resim
                WHERE id=:id");
                $guncelle->execute([
                    "site_baslik"=>$_POST["site_baslik"],
                    "site_keywords"=>$_POST["site_keywords"],
                    "site_description"=>$_POST["site_description"],
                    "site_durum"=>$_POST["site_durum"],
                    "site_email"=>$_POST["site_email"],
                    "site_facebook"=>$_POST["site_facebook"],
                    "site_twitter"=>$_POST["site_twitter"],
                    "site_kad"=>$_POST["site_kad"],
                    "site_pass"=>$_POST["site_pass"],
                    "site_adSoyad"=>$_POST["site_adSoyad"],
                    "site_meslek"=>$_POST["site_meslek"],
                    "site_resim"=>$resimAdi,
                    "id"   => 1

                ]);
                if($guncelle){
                    header("location:ayarlar.php?durum=ok");

                }   else{
                    header("location:ayarlar.php?durum=no");
                }
            }
        }else{
            $guncelle=$db->prepare("UPDATE ayarlar SET 
                site_baslik=:site_baslik,
                site_keywords=:site_keywords,
                site_description=:site_description,
                site_durum=:site_durum,
                site_email=:site_email,
                site_facebook=:site_facebook,
                site_twitter=:site_twitter,
                site_kad=:site_kad,
                site_pass=:site_pass,
                site_adSoyad=:site_adSoyad,
                site_meslek=:site_meslek
                WHERE id=:id");
                $guncelle->execute([
                    "site_baslik"=>$_POST["site_baslik"],
                    "site_keywords"=>$_POST["site_keywords"],
                    "site_description"=>$_POST["site_description"],
                    "site_durum"=>$_POST["site_durum"],
                    "site_email"=>$_POST["site_email"],
                    "site_facebook"=>$_POST["site_facebook"],
                    "site_twitter"=>$_POST["site_twitter"],
                    "site_kad"=>$_POST["site_kad"],
                    "site_pass"=>$_POST["site_pass"],
                    "site_adSoyad"=>$_POST["site_adSoyad"],
                    "site_meslek"=>$_POST["site_meslek"],
                    "id"   => 1

                ]);
                if($guncelle){
                    header("location:ayarlar.php?durum=ok");

                }   else{
                    header("location:ayarlar.php?durum=no");
                }
        }
    }
?>

    <!-- /.content -->
<?php include 'include/footer.php'; ?>
