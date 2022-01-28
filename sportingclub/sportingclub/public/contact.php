<?php require_once("../resources/config.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact | Sporting Club</title>
	<?php include(TEMPLATE_FRONT.DS."headerpage.php")?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Contact
		</h2>
	</section>	

	<?php display_message(); ?>
	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form method="post" enctype="multipart/form-data">
						<?php send_message(); ?>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Laissez-nous un message
						</h4>
						<span class="stext-112 cl8">Nom *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" required>
						</div>

						<span class="stext-112 cl8">Email *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email" required>
						</div>

						<span class="stext-112 cl8">Sujet *</span>
						<div class="bor8 bg0 m-b-12">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="subject" required>
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Comment pouvons nous aider?" required></textarea>
						</div>
						<center>
						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit" name="submit" style="width: 200px;">
							Envoyer
						</button>
						</center>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">

						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Adresse
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Imm. Al Ridha rue Ahmed Aloulou - Sfax al Jadida <br> <b>Sfax, Tunisie</b>
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Appelez-nous
							</span>
							<p class="stext-115 cl1 size-213 p-t-18"></p>
								<a href="tel:+216 74 401 378" class="stext-115 cl1 size-213 p-t-18">+216 74 401 378</a>
							</p>
							
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Support de vente
							</span>

							<p class="stext-115 cl1 size-213 p-t-18"></p>
									<a href="mailto:contact@sportingclub.tn" class="stext-115 cl1 size-213 p-t-18">contact@sportingclub.tn</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3278.7552098041206!2d10.74999301559471!3d34.736564188803655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13002cd51e43b7f5%3A0x600b8ad61c35301c!2sSporting%20Club!5e0!3m2!1sen!2stn!4v1574536105102!5m2!1sen!2stn" 
		width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" data-pin="images/icons/pin.png"></iframe>
	</div>



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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>