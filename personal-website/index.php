<?php include 'include/header.php'; ?>

<?php
	$anasayfa = $db ->prepare("SELECT * FROM anasayfa WHERE id=:idd");
	$anasayfa->execute(["idd"=>1]);
	$anasayfarow = $anasayfa->fetch(PDO::FETCH_OBJ);

?>
<style>
.resimoran{
	object-fit:contain;
}
</style>
				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt"> <?= $anasayfarow->yazi1 ?> </h2>
								<p><?= $anasayfarow->yazi2 ?></p>
							</header>

							<footer>
								<a href="#portfolio" class="button scrolly">Başlayalım</a>
							</footer>

						</div>
					</section>

				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">

							<header>
								<h2>İçerikler</h2>
							</header>

							<!-- <p>İçerikleri görebilirsiniz</p> -->


<?php 
	$calismalarim = $db->query("SELECT * FROM calismalar")->fetchAll(PDO::FETCH_OBJ);
?>

							<div class="row">
								<?php 
									foreach($calismalarim as $row){
								?>

								<div class="4u 12u$(mobile)">
									<article class="item">
										<a href="detay.php?id=<?=$row->id?>" class="image fit"><img src="assets/upload/<?= $row->resim ?>" alt="" /></a>
										<header>
											<h3><?= $row->baslik?></h3>
										</header>
									</article>
								</div>
							<?php  } ?>


							</div>

						</div>
					</section>

<?php 
	
	$hakkimizda=$db->prepare("SELECT * FROM hakkimda WHERE id=:id");
	$hakkimizda->execute(["id"=>1]);
	$hakkimdaRow= $hakkimizda->fetch(PDO::FETCH_OBJ);

?>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>Hakkımda</h2>
							</header>

							<a href="#" class=" image featured">
							<img src="assets/upload/<?=$hakkimdaRow->resim?>" 
							class="resimoran" width="100%" height="700" alt="" /></a>

							<p><?=$hakkimdaRow->yazi?> </p>

						</div>
					</section>

				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<header>
								<h2>İletişim</h2>
							</header>

							<p></p>

							<form method="post" action="#">
								<div class="row">
									<div class="6u 12u$(mobile)"><input type="text" name="name" placeholder="Adınız Soyadınız" /></div>
									<div class="6u$ 12u$(mobile)"><input type="text" name="email" placeholder="Email Adresiniz" /></div>
									<div class="12u$">
										<textarea name="message" placeholder="Mesajınız"></textarea>
									</div>
									<div class="12u$">
										<input type="submit" value="Gönder" />
									</div>
								</div>
							</form>

<?php 
	if($_POST) {
		$kaydet=$db->prepare("INSERT INTO iletisim SET
		isim=:isim,
		email=:email,
		mesaj=:mesaj");
		$kaydet->execute([
			"isim" => $_POST["name"],
			"email"=> $_POST["email"],
			"mesaj"=> $_POST["message"]
		]);

		if($kaydet){
			echo "";
		}else{
			echo "Bir hata oluştu.";
		}
	}
?>

						</div>
					</section>

		<?php include 'include/footer.php'; ?>
