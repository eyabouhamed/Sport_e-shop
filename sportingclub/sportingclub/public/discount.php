<?php require_once("../resources/config.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	if (isset($_GET["id"])) {
		$query = query(" SELECT * FROM category WHERE id = " . escape_string($_GET['id']) . " ");
		confirm($query);
		$row = fetch_array($query);

		if ($row['label'] == null) {
			redirect('discount.php');
		} else $title_page = $row['label'];
	} else $title_page = "Promotions";


	?>
	<title><?php echo $title_page; ?> | Sporting Club</title>
	<?php include(TEMPLATE_FRONT . DS . "headerproduct.php") ?>

	<!-- breadcrumb -->
	<?php

	if (isset($_GET["id"])) {
		$query = query(" SELECT * FROM category WHERE id = " . escape_string($_GET['id']) . " ");
		confirm($query);
		$row = fetch_array($query);
		$breadcrumb = "<div class='container'>
    <div class='bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg'>
        <a href='index.php' class='stext-109 cl8 hov-cl1 trans-04'>
            Accueil
            <i class='fa fa-angle-right m-l-9 m-r-10' aria-hidden='true'></i>
        </a>

        <a href='discount.php' class='stext-109 cl8 hov-cl1 trans-04'>
			PROMOTIONS
            <i class='fa fa-angle-right m-l-9 m-r-10' aria-hidden='true'></i>
        </a>

        <a href='discount.php?id={$row['id']}' class='stext-109 cl8 hov-cl1 trans-04'>
			{$row['label']}
            <i class='fa fa-angle-right m-l-9 m-r-10' aria-hidden='true'></i>
        </a>
    </div>
	</div>";
	} else {
		$breadcrumb = "<div class='container'>
    <div class='bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg'>
        <a href='index.php' class='stext-109 cl8 hov-cl1 trans-04'>
            Accueil
            <i class='fa fa-angle-right m-l-9 m-r-10' aria-hidden='true'></i>
        </a>

        <a href='discount.php' class='stext-109 cl8 hov-cl1 trans-04'>
		PROMOTIONS
            <i class='fa fa-angle-right m-l-9 m-r-10' aria-hidden='true'></i>
        </a>
    </div>
	</div>";
	}
	echo $breadcrumb;
	?>

	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<br><br>
			<div class="row isotope-grid">
				<?php
				if (isset($_GET["id"])) {
					$query1 = query(" SELECT * FROM product WHERE category = '{$row['label']}' AND promo > '0' ORDER BY promo DESC");
				} else {
					$query1 = query(" SELECT * FROM product WHERE promo > '0' ORDER BY promo DESC");
				}

				confirm($query1);
				while ($row1 = fetch_array($query1)) :
				?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
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
												<?php if ($row1['promo']) echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "<b class='label1' data-label1='-{$row1['promo']}%'></b>";?>
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

			<div>
				<center>
					<a class="stext-115 cl1 size-213 p-t-18"><?php if (mysqli_num_rows($query1) == 0) echo "Désolé! Pas d'articles en promotion pour cette catégorie pour le moment." ?></a>
				</center>
				<div class='row'>
					<?php if (mysqli_num_rows($query1) == 0) echo "<img src='https://nsa40.casimages.com/img/2020/01/12/200112101823850201.jpg' width='400px' style='margin-left: auto; margin-right: auto; padding-top: 50px;'> " ?>
				</div>
			</div>

			<!-- Load more -->
			<?php if (mysqli_num_rows($query1) != 0) echo
				"<div class='flex-c-m flex-w w-full p-t-45'>
				<a href='#' class='flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04'>
					charger plus
				</a>
			</div>";
			?>
		</div>
	</div>


	<div class="chtabot">
				<button type="submit"  name="editerCat" title="chatbot" class="btn btn-just-icon btn-round btn-dark" data-toggle="modal" data-target="#exampleModal" style="margin-left: 1100px;">
					<i class="fa fa-edit" style="background-color:gray;"></i> Chat with us now!

				</button>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 150px;margin-left:800px;" >
					<div class="modal-content">
					
					<div class="modal-body">
							<link rel="icon" href="../public/chatbot1/bot.png" />
							<link rel="stylesheet" href="../public/chatbot1/style.css" />
							<div id="container" class="container">
							<div id="chat" class="chat">
								<div id="messages" class="messages"></div>
								<input id="input" type="text" placeholder="Say something..." autocomplete="off" autofocus="true" />
							</div>
									<!-- <img src="bot.png" alt="Robot cartoon" height="500vh"> -->
							</div>
				
							<script type="text/javascript" src="../public/chatbot1/index.js" ></script>
							<script type="text/javascript" src="../public/chatbot1/constants.js" ></script>
						<script type="text/javascript" src="../public/chatbot1/speech.js" ></script>
					</div>
					</div>
				</div>
				
				<br/>
	</div>
	<br/>
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