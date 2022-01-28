<?php require_once("../resources/config.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Mon panier | Sporting Club</title>
	<?php include(TEMPLATE_FRONT . DS . "headerpage.php") ?>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Accueil
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Mon Panier
			</span>
		</div>
	</div>
	<div style="text-align: center;">
		<a class="stext-115 cl1 size-213 p-t-18"><?php display_message(); ?></a>
	</div>


	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" onsubmit="return confirm('Voulez vous vraiment passer cette commande ?')" action="../resources/checkout.php">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Produit</th>
									<th class="column-2"></th>
									<th class="column-3">Prix</th>
									<th class="column-4" style="text-align: center;">Quantité</th>
									<th class="column-5">Total</th>
								</tr>

								<?php cart(); ?>

							</table>
						</div>

					</div>
				</div>


				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">

						<h4 class="mtext-109 cl2 p-b-30">
							Détails de commande
						</h4>

						<br>
						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Sous-total:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<input id='sub_total' type="hidden" value="<?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>"><?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?></input>.000 TND
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Frais livraison:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<span class="mtext-110 cl2">
									<a id='delivery_fees'>GRATUIT</a>
								</span>

								<div class="p-t-15">
									<span class="stext-112 cl8">
										méthode de livraison
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="delivery_type" id="delivery_type" required onchange="delivery_fees_set()">
											<option disabled>Choisir une option</option>
											<option value="0">Retrait magasin</option>
											<option value="1">Paiement à la livraison</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>



								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2" id='cart_total'>
									<?php
									echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>.000
								</span>
								<a class="mtext-110 cl2">
									TND
								</a>
							</div>
						</div>



						<button type='submit' name='commander' title='Confirmer la commande' class='flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer' <?php echo isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] ? '' : 'disabled'; ?>>Commander</button>
					



					</div>
				</div>
			</div>
		</div>
	</form>


	<script>
		function delivery_fees_set() {
			if (parseFloat(document.getElementById("sub_total").value) >= 300) {
				document.getElementById("delivery_fees").innerHTML = "GRATUIT";
				document.getElementById("cart_total").innerHTML = parseFloat(document.getElementById("sub_total").value).toFixed(3);
			} else {
				switch (document.getElementById("delivery_type").value) {
					case "1":
						document.getElementById("delivery_fees").innerHTML = "7.000 TND";
						document.getElementById("cart_total").innerHTML = (parseFloat(document.getElementById("sub_total").value) + 7).toFixed(3);
						break;
					default:
						document.getElementById("delivery_fees").innerHTML = "GRATUIT";
						document.getElementById("cart_total").innerHTML = parseFloat(document.getElementById("sub_total").value).toFixed(3);
						break;
				}
			}
		}
	</script>

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
	<script src="js/main.js"></script>

	</body>

</html>