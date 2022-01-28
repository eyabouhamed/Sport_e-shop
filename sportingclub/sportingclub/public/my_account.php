<?php require_once("../resources/config.php") ?>
<?php if (isset($_SESSION['user_email']) == false) redirect("login.php"); ?>
<?php logout(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Mon Compte | Sporting Club</title>
	<?php include(TEMPLATE_FRONT . DS . "headerpage.php") ?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Bienvenue <?php echo $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name']; ?>
		</h2>
	</section>

	<!-- Content page -->

	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">

			<div class="row" style="width: 800px; margin-left: auto; margin-right: auto;">
				<a href="my_cart.php" style="margin-left: auto; margin-right: auto;">
					<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="width: 200px;" <?php echo isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] ? '' : 'disabled'; ?>>
						Mon panier
					</button>
				</a>

				<a href="my_wishlist.php" style="margin-left: auto; margin-right: auto;">
					<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="width: 200px;" disabled>
						Mes favories
					</button>
				</a>

				<form method="post" enctype="multipart/form-data" style="margin-left: auto; margin-right: auto;">

					<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit" id="submit" name="submit" style="width: 200px;">
						Se déconnecter
					</button>
				</form>
			</div>






			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#informations" role="tab">Mes informations</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#commandes" role="tab">Mes commandes</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#settings" role="tab">Paramètres</a>
						</li>

					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="informations" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<?php update_user_data();
										?>
										<form method="post" onsubmit="return confirm('Effectuer ces changement sur votre compte ?')">
											<?php
											if (isset($_SESSION['user_email'])) {
												$query = query("SELECT * FROM client WHERE email = '{$_SESSION['user_email']}'");
												confirm($query);
												$row = fetch_array($query);
											}

											?>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Titre de civilité
												</span>

												<span class='stext-102 cl6 size-206'>
													<?php echo $row['title'] ?>
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Prénom
												</span>

												<span class='stext-102 cl6 size-206'>
													<?php echo $row['firstname'] ?>
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Nom
												</span>

												<span class='stext-102 cl6 size-206'>
													<?php echo $row['lastname'] ?>
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Cin
												</span>

												<span class='stext-102 cl6 size-206'>
													<?php echo $row['cin'] ?>
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Entreprise
												</span>

												<span class='stext-102 cl6 size-206'>
													<input type="text" name="company" value="<?php echo $row['company'] ?>">
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Ligne d'adresse 1
												</span>

												<span class='stext-102 cl6 size-206'>
													<input type="text" name="address1" value="<?php echo $row['address1'] ?>" size="50" required>
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Ligne d'adresse 2
												</span>

												<span class='stext-102 cl6 size-206'>
													<input type="text" name="address2" value="<?php echo $row['address2'] ?>" size="50" required>
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Code postal
												</span>

												<span class='stext-102 cl6 size-206'>
													<input type="number" name="zipcode" value="<?php echo $row['zipcode'] ?>" required>
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Ville
												</span>

												<span class='stext-102 cl6 size-206'>
													<input type="text" name="city" value="<?php echo $row['city'] ?>" required>
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Pays
												</span>

												<span class='stext-102 cl6 size-206'>
													<input type="text" name="country" value="<?php echo $row['country'] ?>" required>
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Telephone
												</span>

												<span class='stext-102 cl6 size-206'>
													<input type="number" name="phone" value="<?php echo $row['phone'] ?>" required>
												</span>
											</li>

											<li class='flex-w flex-t p-b-7'>
												<span class='stext-102 cl3 size-205'>
													Email
												</span>

												<span class='stext-102 cl6 size-206'>
													<?php echo $row['email'] ?>
												</span>
											</li>
											<br><br>
											<button type='submit' name='update' title='Mettre à jour mes informations' class='flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer' style="float: right;">Mettre à jour</button>
										</form>
									</ul>
								</div>
							</div>
						</div>



						<!-- - -->
						<div class="tab-pane fade" id="commandes" role="tabpanel">
							<div class="row">
								<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
									<div class="m-l-25 m-r--38 m-lr-0-xl" style="margin-left: auto; margin-right: auto;">
										<div class="wrap-table-shopping-cart">
											<table class="table-shopping-cart">
												<tr class="table_head">
													<th class="column-1">#</th>
													<th class="column-2">Date</th>
													<th class="column-2">Livraison</th>
													<th class="column-2">Total</th>
													<th class="column-2">Statut</th>
												</tr>
												<?php
												$order_query = query(" SELECT * FROM orders WHERE client_id = '{$_SESSION['user_id']}' ORDER BY id DESC");
												confirm($order_query);												
												while ($order_row = fetch_array($order_query)) :
												?>
													<?php
													$status_color = "#ff9900";
													switch ($order_row['status']) {
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
													<tr class="table_row" style="height: 50px; padding-bottom: 5px;">
														<td class="column-5" style="padding-bottom: 4px;"><a href="order.php?id=<?php echo $order_row['id']; ?>">#<?php echo $order_row['id']; ?></a></td>
														<td class="column-2" style="padding-bottom: 4px;"><?php echo $order_row['date']; ?></td>
														<td class="column-2" style="width: 350px; padding-bottom: 4px;"><?php echo $order_row['delivery_type']; ?></td>
														<td class="column-2" style="padding-bottom: 4px;"><?php echo $order_row['total']; ?>.000 TND</td>
														<td class="column-2" style="color: <?php echo $status_color; ?>; width: 300px; padding-bottom: 4px;"><?php echo $order_row['status']; ?></td>
													</tr>
												<?php endwhile; ?>

											</table>
											
										</div>
										<?php 
										if (! mysqli_num_rows($order_query)) echo "<br><div class='alert alert-danger'>Vous n'avez effectué aucune commande.</div>";?>
									</div>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="settings" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">

								</div>
							</div>
						</div>



					</div>
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
	<script src="js/map-custom.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

	</body>

</html>