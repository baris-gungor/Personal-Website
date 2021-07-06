<?php include 'include/header.php'; ?>
   

<?php
if($_GET["id"]){
    $mesaj=$db->prepare("SELECT * FROM iletisim WHERE id=:id");
    $mesaj->execute(["id"=>$_GET["id"]]);
    $row=$mesaj->fetch(PDO::FETCH_OBJ);

    $guncelle=$db->prepare("UPDATE iletisim SET durum=:durum WHERE id=:id");
    $guncelle->execute(["durum"=> 1,"id"=> $_GET["id"]]);
    

}
?>

    
    <!-- Main content list -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
                <div class="box">
                    <div class="box-header">
                        "<?= $row->isim ?>" adlı kişiden gelen mesaj
                    </div>
                    <div class="box-body">
                       <table class="table table-striped">
                       <tr>
                       <td>Adı Soyadı :</td>
                       <td><?=$row->isim?></td>
                       </tr>
                       <tr>
                       <td>Email :</td>
                       <td><?=$row->email?></td>
                       </tr>
                       <tr>
                       <td>Mesajı :</td>
                       <td><?=$row->mesaj?></td>
                       </tr>
                       
                       </table>
                        

                        
                    </div>
                </div>        
            

            </div>
        </div>

    </section>

<?php 


if(@$_GET["sil"]) {
    $sil=$db->prepare("DELETE FROM iletisim WHERE id=:silinecekid");
    $sil->execute(["silinecekid" => $_GET["sil"]]);

    if($sil) {
        header("Location:iletisim.php");
    }
}
    
?>

    <!-- /.content -->
<?php include 'include/footer.php'; ?>
