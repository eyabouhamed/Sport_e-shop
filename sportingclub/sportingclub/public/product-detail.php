<?php require_once("../resources/config.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	if (isset($_GET["id"]) == false) {
		redirect('index.php');
	}
	$query = query(" SELECT * FROM product WHERE id = " . escape_string($_GET['id']) . " ");
	confirm($query);
	$row = fetch_array($query);
	$cat=$row['category'];
	$subcat=$row['subcategory'];

	if ($row['label'] == null) {
		redirect('index.php');
	}
	?>
	<title><?php echo $row['label']; ?> | Sporting Club</title>
	<?php include(TEMPLATE_FRONT . DS . "headerproduct.php") ?>

	<?php
	$query = query(" SELECT * FROM product WHERE id = " . escape_string($_GET['id']) . " ");
	confirm($query);

	$query3 = query(" SELECT * FROM category WHERE label = '{$cat}' ");
	confirm($query3);
	$row3 = fetch_array($query3);

	$query4 = query(" SELECT * FROM subcategory WHERE label = '{$subcat}' ");
	confirm($query4);
	$row4 = fetch_array($query4);

	while ($row = fetch_array($query)) :
	?>



		<!-- breadcrumb -->
		<?php
		$breadcrumb = "<div class='container'>
		<div class='bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg'>
			<a href='index.php' class='stext-109 cl8 hov-cl1 trans-04'>
				Accueil
				<i class='fa fa-angle-right m-l-9 m-r-10' aria-hidden='true'></i>
			</a>
	
			<a href='category.php?id={$row3['id']}' class='stext-109 cl8 hov-cl1 trans-04'>
				{$row['category']}
				<i class='fa fa-angle-right m-l-9 m-r-10' aria-hidden='true'></i>
			</a>
	
			<a href='category.php?id={$row3['id']}&subid={$row4['id']}' class='stext-109 cl8 hov-cl1 trans-04'>
				{$row['subcategory']}
				<i class='fa fa-angle-right m-l-9 m-r-10' aria-hidden='true'></i>
			</a>
	
			<span class='stext-109 cl4'>
				{$row['label']}
			</span>
		</div>
		</div>";
		echo $breadcrumb; ?>


		<!-- Product Detail -->
		<section class="sec-product-detail bg0 p-t-65 p-b-60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="<?php echo $row['photo']; ?>">
										<div class="wrap-pic-w pos-relative">
											<img src="<?php echo $row['photo']; ?>" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $row['photo']; ?>">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								<?php echo $row['label']; ?>
							</h4>

							<span class="mtext-106 cl2">
								<?php $new_price = $row['price'] * (100 - $row['promo']) / 100;
								echo $row['promo'] ? "<a class='stext-105 cl3' style='text-decoration: line-through; font-size: 18px; color:silver;'>{$row['price']} TND</a>" . "&nbsp&nbsp" . "{$new_price}"  : $row['price']; ?> TND
								<?php if ($row['promo']) echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "<b class='label1' data-label1='-{$row['promo']}%'></b>"; ?>
							</span>

							<p class="stext-102 cl3 p-t-23">
								<?php echo $row['description']; ?>
							</p>

							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Taille
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choisir une option</option>
												<option>Taille S</option>
												<option>Taille M</option>
												<option>Taille L</option>
												<option>Taille XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Couleur
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choisir une option</option>
												<option>Rouge</option>
												<option>Bleu</option>
												<option>Blanc</option>
												<option>Gris</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										
										<a href='../resources/cart.php?add=<?php echo $row['id']; ?>'>
											<button class='flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail' <?php echo $row['quantity'] ? '' : 'disabled' ;?>>
												Ajouter au panier
											</button>
										</a>
										
										
										
									</div>
								</div>
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
				<span class="stext-107 cl6 p-lr-25">
					<b>Référence:</b> <?php echo $row['reference']; ?>
				</span>

				<span class="stext-107 cl6 p-lr-25" style="text-transform: capitalize;">
					<b>Fabricant:</b> <?php echo $row['manufacturer']; ?>
				</span>

				<span class="stext-107 cl6 p-lr-25">
					<b>Categories:</b> <?php echo $row['category']; ?>, <?php echo $row['subcategory']; ?>
				</span>

				<span class="stext-107 cl6 p-lr-25">
					<b>Statut:</b> <?php echo $row['quantity'] > 0 ? "<a style='color: #00db00;'>Disponible</a>" : "<a style='color: #ff2424;'>Epuisé</a>"; ?>
				</span>

				<span class="stext-107 cl6 p-lr-25">
					<b>Réduction:</b> <?php echo $row['promo'] ? "<a style='color: #ff2424;'>{$row['promo']} %</a>" : "<a'>Non</a>"; ?>
				</span>
			</div>
		</section>

		<!-- Related Products -->
		<section class="sec-relate-product bg0 p-t-45 p-b-105">
			<div class="container">
				<div class="p-b-45">
					<h3 class="ltext-106 cl5 txt-center">
						Produits similaires
					</h3>
				</div>

				<!-- Slide2 -->
				<div class="wrap-slick2">
					<div class="slick2">
						<?php
						$query1 = query(" SELECT * FROM product WHERE category = '{$row['category']}' AND subcategory = '{$row['subcategory']}' AND id  != '{$row['id']}' ORDER BY addeddate DESC");
						confirm($query1);
						while ($row1 = fetch_array($query1)) :
							$label = "";
							$query2 = query(" SELECT * FROM product WHERE DATEDIFF(NOW(),addeddate) <=30 AND id = {$row1['id']}");
							confirm($query2);
							if ($row2 = fetch_array($query2)) $label = " label-new' data-label='New";
						?>
							<div class='item-slick2 p-l-15 p-r-15 p-t-15 p-b-15 <?php echo $label ; ?>'>
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="<?php echo $row1['photo']; ?>" alt="IMG-PRODUCT">

										<a href="product-detail.php?id=<?php echo $row1['id']; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
											Aperçu
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="product-detail.php?id=<?php echo $row1['id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												<?php echo $row1['label']; ?>
											</a>

											<span class="stext-105 cl3">
												<?php
												$new_price = $row1['price'] * (100 - $row1['promo']) / 100;
												echo $row1['promo'] ? "<a style='text-decoration: line-through; color:silver;'>{$row1['price']} TND</a>" . "&nbsp&nbsp" . "{$new_price}"  : $row1['price']; ?> TND
												<?php if ($row1['promo']) echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "<b class='label1' data-label1='-{$row1['promo']}%'></b>"; ?>
											</span>
										</div>

										<div class="block2-txt-child2 flex-r p-t-3">
											<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
												<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
												<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
											</a>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>

					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>

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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
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