<?php include 'include/header.php'; ?>

<?php
if($_GET["id"]) {
    $calismalar=$db->prepare("SELECT * FROM calismalar WHERE id=:gelenid");
    $calismalar->execute(["gelenid" => $_GET["id"]]);
    $row= $calismalar->fetch(PDO::FETCH_OBJ);
}
?>



    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
                <div class="box">
                    <div class="box-header">
                        Çalışmalarım Ekle
                    </div>
                    <div class="box-body">
                       

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Başlık</label>
                                <input type="text" name="baslik" class="form-control" placeholder="Başlığı Giriniz" value="<?= $row->baslik ?>" />
                            </div>
                            <div class="form-group">
                                <label>Resim</label>
                                <input type="file" name="resim" />
                            </div>
                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea name="aciklama" class="form-control" placeholder="Açıklama Giriniz" ><?= $row->aciklama ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                            </div>
                        </form>
                        <img src="../assets/upload/<?= $row->resim ?>" alt="" height="100">
                    </div>
                </div>        
            

            </div>
        </div>

    </section>




<?php 



    if($_POST) {
        if($_FILES["resim"]["name"]) {
        $resimAdi= $_FILES["resim"]["name"];
        $resimYolu= "../assets/upload/".$resimAdi;
        
        if(move_uploaded_file($_FILES["resim"]["tmp_name"],$resimYolu)) {
            $ekle=$db->prepare("UPDATE calismalar SET
            baslik=:baslik,
            resim=:resim,
            aciklama=:aciklama
            WHERE id=:id");
            $ekle->execute([
                "baslik"  => $_POST["baslik"],
                "resim"   => $resimAdi,
                "aciklama"=> $_POST["aciklama"],
                "id"      => $_GET["id"]
            ]);
            
            if($ekle) {
                echo "Güncelleme Başarılı";
            } else {
                echo "Bir Hata Oluştu";
            }
            header("Location:calismalarim.php");
        }
        } else {
            $ekle=$db->prepare("UPDATE calismalar SET
            baslik=:baslik,
            aciklama=:aciklama
            WHERE id=:id");
            $ekle->execute([
                "baslik" => $_POST["baslik"],
                "aciklama"=> $_POST["aciklama"],
                "id"      => $_GET["id"]
            ]);
            
            if($ekle) {
                echo "Güncelleme Başarılı";
                
            } else {
                echo "Bir Hata Oluştu";
            }
            header("Location:calismalarim.php");
        }
    }    
?>

    <!-- /.content -->
<?php include 'include/footer.php'; ?>
