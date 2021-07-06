<?php include 'include/header.php'; ?>
    



    
    <!-- Main content list -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
                <div class="box">
                    <div class="box-header">
                        Mesajlar
                    </div>
                    <div class="box-body">
                       
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Adı Soyadı</th>
                                <th>Email</th>
                                <th>Tarih</th>
                                <th>Durum</th>
                                <th>Mesaj</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $iletisim=$db->query("SELECT * FROM iletisim")->fetchAll(PDO::FETCH_OBJ);
                                    foreach($iletisim as $row) {
                                ?>
                                        <tr>
                                            <td><?=$row->id ?></td>
                                            <td><?=$row->isim ?></td>
                                            <td><?=$row->email ?></td>
                                            <td><?=$row->tarih ?></td>
                                            <td>
                                            <?php
                                            if($row->durum==0){
                                                echo '<span class="label label-danger">Okunmadı</span>';
                                            } else{ echo '<span class="label label-success">Okundu</span>';
                                            }   
                                            ?></td>
                                            <td><?=$row->mesaj ?></td>

                                            <td>
                                                <a href="oku.php?id=<?= $row->id ?>"><i class="fa fa-eye text-primary"></i></a>    
                                                <a href="?sil=<?= $row->id ?>"><i class="fa fa-trash text-danger"></i></a>  
                                            </td>

                                        </tr>
                                   <?php } ?>
                                
                            </tbody>


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
