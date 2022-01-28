<?php require_once("../resources/config.php") ?>
<?php
if (!isset($_GET["id"]) || !isset($_SESSION["user_id"])) {
	redirect('index.php');
} else {
	$query = query(" SELECT * FROM orders WHERE id = " . escape_string($_GET['id']) . " ");
	confirm($query);
	$row = fetch_array($query);
	if (!$row  || ($row['client_id'] != $_SESSION["user_id"])) {
		redirect('index.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Commande #<?php echo $row['id']; ?> | Sporting Club</title>
	<?php include(TEMPLATE_FRONT . DS . "headerpage.php") ?>

	<?php
	$query = query(" SELECT * FROM orders WHERE id = " . escape_string($_GET['id']) . " ");
	confirm($query);
	$row = fetch_array($query);

	$client_query = query(" SELECT * FROM client WHERE id = '{$row['client_id']}' ");
	confirm($client_query);
	$client_row = fetch_array($client_query);

	?>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Accueil
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="my_account.php" class="stext-109 cl8 hov-cl1 trans-04">
				Mon Compte
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="my_account.php#commandes" class="stext-109 cl8 hov-cl1 trans-04">
				Mes Commandes
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Commande #<?php echo $row['id']; ?>
			</span>
		</div>
	</div>
	<div style="text-align: center;">
		<a class="stext-115 cl1 size-213 p-t-18"><?php echo"<br>"; display_message(); ?></a>
	</div>
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">#</th>
									<th class="column-2">Produit</th>
									<th class="column-3">Prix</th>
									<th class="column-4" style="text-align: center;">Quantité</th>
									<th class="column-5">Total</th>
								</tr>
								<?php
								$item_query = query(" SELECT * FROM order_line WHERE order_id = '{$row['id']}' ");
								confirm($item_query);
								while ($item_row = fetch_array($item_query)) :
								?>
									<tr class="table_row"  style="height: 50px;">
										<td class="column-1" style="padding-bottom: 4px;"><?php echo $item_row['product_id']; ?></td>
										<td class="column-2" style="padding-bottom: 4px; width: 450px;"><?php echo $item_row['product_name']; ?></td>
										<td class="column-3" style="padding-bottom: 4px; width: 100px;"><?php echo $item_row['product_price']; ?>.000</td>
										<td class="column-5" style="padding-bottom: 4px;"><?php echo $item_row['product_quantity']; ?></td>
										<td class="column-5" style="padding-bottom: 4px;"><?php echo $item_row['line_total']; ?>.000</td>
									</tr>
								<?php endwhile; ?>

							</table>
						</div>

					</div>
				</div>


				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Détails de commande #<?php echo $row['id']; ?>
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Date:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $row['date']; ?>
								</span>
							</div>
							<div class="size-208">
								<span class="stext-110 cl2">
									A l'ordre de:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $client_row['title'] . " " . $client_row['firstname'] . " " . $client_row['lastname']; ?>
								</span>
							</div>
							<div class="size-208">
								<span class="stext-110 cl2">
									Statut:
								</span>
							</div>

							<?php
							$status_color = "#ff9900";
							switch ($row['status']) {
								case 'Confirmé':
									$status_color = "#33ff33";
									break;
								case 'Livré':
									$status_color = "#009900";
									break;
								case 'Annulé':
									$status_color = "#cc0000";
									break;
							} ?>
							<div class="size-209">
								<span class="mtext-110 cl2" style="color: <?php echo $status_color; ?>">
									<?php echo $row['status']; ?>
								</span>
							</div>
						</div>

						<br>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Sous-total:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $row['total'] - $row['delivery_fees']; ?>.000 TND
								</span>
							</div>
							<div class="size-208">
								<span class="stext-110 cl2">
									Livraison:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $row['delivery_type']; ?>
								</span>
							</div>
							<div class="size-208">
								<span class="stext-110 cl2">
									Frais livraison:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $row['delivery_fees'] ? $row['delivery_fees'] . ".000 TND" : "GRATUIT"; ?>
								</span>
							</div>
						</div>



						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo $row['total']; ?>.000 TND
								</span>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</form>




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