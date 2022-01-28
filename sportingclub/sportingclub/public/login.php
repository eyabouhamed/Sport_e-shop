<?php require_once("../resources/config.php")?>
<?php if (isset($_SESSION['user_email'])) redirect("my_account.php"); ?>
<?php login(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>S'identifier | Sporting Club</title>
	<?php include(TEMPLATE_FRONT.DS."headerpage.php")?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			S'identifier
		</h2>
	</section>	


	<!-- Content page -->
	<center>
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr" style="max-width: 80%;">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="background-image: url('images/login.jpg');">
					<form>
						<br><br><br><br>
						<h4 class="mtext-105 cl2 txt-center p-b-30" style="color: white;">
							<b>Nouveau sur notre site? </b>
						</h4>
						<center><p class="stext-115 cl6 size-213 p-t-18" style="color: white;"> Créez votre propre compte</p>
						
						<br>
						<a class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" href="register.php" role="button" style="width: 200px;">Créer un compte</a>

					</center>
					</form>
					
				</div>
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="background-image: url('images/bg-03.jpg');">
					<form method="post" enctype="multipart/form-data">
						
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Connectez-vous
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Email" required>
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="passwd" placeholder="Mot de passe" required>
							<img class="how-pos4 pointer-none" src="images/icons/passwd.png" alt="ICON">
						</div>
						
						<div class="d-flex align-items-center"><input type="checkbox" id="login-1"><label class="stext-115 cl6" for="login-1">&nbsp&nbspRester connecté</label></div>
						
						<br>
						<center>
						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="width: 200px;" type="submit" name="submit">
							Se connecter
						</button>
						
						<br>
						<a class="stext-115 cl1 size-213 p-t-18"><?php display_message(); ?></a>
						<br>
						<a href="#" class="stext-115 cl1 size-213 p-t-18">Mot de passe oublié?</a>
						
						
						
					</center>
					</form>
				</div>
			</div>
		</div>
	</section>	
	</center>



	<!-- Footer -->
<?php include(TEMPLATE_FRONT.DS."footer.php")?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>