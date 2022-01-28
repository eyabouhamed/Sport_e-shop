<?php require_once("../resources/config.php") ?>
<?php if (isset($_SESSION['user_email'])) redirect("my_account.php"); ?>
<?php register(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>S'inscrire | Sporting Club</title>
	<?php include(TEMPLATE_FRONT . DS . "headerregister.php") ?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			S'inscrire
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<br><br><br><br>
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						<b>Vous avez déjà un compte? </b>
					</h4>
					<center>
						<p class="stext-115 cl6 size-213 p-t-18">Retrouver votre compte</p>

						<br>
						<a class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" href="login.php" role="button" style="width: 200px;">Se connecter</a>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md" style="background-image: url('images/kappa.jpg');">
					<form method="post" enctype="multipart/form-data">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Créer un compte
						</h4>

						<span class="stext-112 cl8">Titre de civilité *</span>
						<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
							<select class="js-select2" name="title">
								<option>M.</option>
								<option>Mme.</option>
							</select>
							<div class="dropDownSelect2"></div>
						</div>
						<span class="stext-112 cl8">Prénom *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="firstname" required>
						</div>
						<span class="stext-112 cl8">Nom *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="lastname" required>
						</div>
						<span class="stext-112 cl8">CIN *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" name="cin" required>
						</div>
						<span class="stext-112 cl8">Entreprise</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="company">
						</div>
						<span class="stext-112 cl8">Ligne d'adresse 1 *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address1" required>
						</div>
						<span class="stext-112 cl8">Ligne d'adresse 2 *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address2" required>
						</div>
						<span class="stext-112 cl8">Code postal *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" name="zipcode" required>
						</div>
						<span class="stext-112 cl8">Ville *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="city" required>
						</div>
						<span class="stext-112 cl8">Pays *</span>
						<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
							<select class="js-select2" name="country">
								<option>Tunisie</option>
							</select>
							<div class="dropDownSelect2"></div>
						</div>
						<span class="stext-112 cl8">Telephone *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" required>
						</div>
						<span class="stext-112 cl8">Email *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email" required>
						</div>
						<span class="stext-112 cl8">Mot de passe *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="password" name="passwd" required>
						</div>
						<span class="stext-112 cl8">Re-saisie de Mot de passe *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="password" name="retype_password" required>
						</div>
						<div class="d-flex align-items-center"><input type="checkbox" id="terms" onchange="activateButton(this)"><label class="stext-115 cl6" for="terms">&nbsp&nbspJ'ai lu et j'accepte <a href="terms.php" class="stext-115 cl1 size-213 p-t-18">les termes et conditions</a></label></div>
						<br><br>
						<center>
							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit" id="submit" name="submit" style="width: 200px;">
								S'inscrire
							</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</section>



	<!-- Footer -->
	<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>


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
		$(".js-select2").each(function() {
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
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

	</body>

</html>