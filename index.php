<!DOCTYPE html>
<?php

include "config/db_connect.php";

$sql = "Select label,description,img,price,tags,stock from produit";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();


?>
<html lang="fr">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pullshoes</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script type="text/javascript" src="checkout.js"></script>
   </head>
   <!-- body -->
   <body class="main-layout">
	<!-- header section start -->
	<div class="header_section">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="logo"><a href="#"><img src="images/ABC-Logo.png"></a></div>
				</div>
				<div class="col-sm-9">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                           <a class="nav-item nav-link" href="index.php">Home</a>
                           <a class="nav-item nav-link last" href="#"><img src="images/search_icon.png"></a>
                           <a class="nav-item nav-link last" href="panier/panier.php"><img src="images/shop_icon.png"></a>
                        </div>
                    </div>
                    </nav>
				</div>
			</div>
		</div>
		<div class="banner_section">
			<div class="container-fluid">
				<section class="slide-wrapper">
    <div class="container-fluid">
	    <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
					<div class="col-sm-5">
						<div class="banner_taital">
							<h1 class="banner_text">ABC Design </h1>
							<h1 class="mens_text"><strong>La déco devient un jeu d'enfant</strong></h1>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="shoes_img"><img src="images/ABC-Logo.png"></div>
					</div>
				</div>
                </div>

                </div>
            </div>
        </div>
                </section>
            </div>
        </div>

			</div>

	<!-- header section end -->

	<!-- New Arrivals section start -->
    <div class="layout_padding gallery_section" style="background-color:white">
    	<div class="container">
                <div class="row">
                    <?php
                    foreach($result as $product)
                    {
                        echo "<div class=col-sm-4>";
                        $label = $product['label'];
                        $description = $product['description'];
                        $price = $product['price'];
                        $tags = $product['tags'];
                        $qte = 1;
                        $stock = $product['stock'];
                        echo "<div class=best_shoes>";
                            echo "<p class=best_text><b>".$label."</b></p>";
                            echo "<div class=shoes_icon><img src=".$IMG_URL.$product['img'].".jpg></div>";
                            echo "<div class=star_text>";
                                echo "<div>";
                                echo "<br><p>".$description."</p>";
                                echo "</div>";
                                echo "<div class='right_part'>";
                                    echo "<div class='shoes_price'><span style='color: #ff4e5b;'>".$price."</span> €</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "<form method=POST id=form action=identification.php>";
                        echo "<input type=hidden name=label value=$label>";
                        echo "<input type=hidden name=description value=$description>";
                        echo "<input type=hidden name=price value=$price>";
                        echo "<input type=hidden name=tags value=$tags>";
                        echo "<input type=hidden name=qte value=$qte>";
                        echo "<input type=hidden name=stock value=$stock>";
                            echo "<div class='button-buy'>";
                            echo "<button class='btn btn-primary' type='submit' value='Ajouter au panier'>Ajouter au panier</button>";
                            echo "</div>";
                        echo "</div>";
                        echo "</form>";
                    echo "</div>";
                    }
                    ?>

                </div>
    		</div>
    	</div>
    </div>
   	<!-- New Arrivals section end -->

	<!-- section footer start -->
    <div class="section_footer">

    	<div class="container">
    		<div class="mail_section">
    			<div class="row">
    				<div class="col-sm-6 col-lg-2">
    					<div><a href="#"><img src="images/ABC-Logo.png"></a></div>
    				</div>
    				<div class="col-sm-6 col-lg-2">
    					<div class="footer-logo"><img src="images/phone-icon.png"><span class="map_text">(71) 1234567890</span></div>
    				</div>
    				<div class="col-sm-6 col-lg-3">
    					<div class="footer-logo"><img src="images/email-icon.png"><span class="map_text">Demo@gmail.com</span></div>
    				</div>
    				<div class="col-sm-6 col-lg-3">
    					<div class="social_icon">
    						<ul>
    							<li><a href="#"><img src="images/fb-icon.png"></a></li>
    							<li><a href="#"><img src="images/twitter-icon.png"></a></li>
    							<li><a href="#"><img src="images/in-icon.png"></a></li>
    							<li><a href="#"><img src="images/google-icon.png"></a></li>
    						</ul>
    					</div>
    				</div>
    				<div class="col-sm-2"></div>
    			</div>
    	    </div> 
    	    <div class="footer_section_2">
		        <div class="row">
    		        <div class="col-sm-4 col-lg-2">
    		        	<p class="dummy_text"> ipsum dolor sit amet, consectetur ipsum dolor sit amet, consectetur  ipsum dolor sit amet,</p>
    		        </div>
    		        <div class="col-sm-4 col-lg-2">
    		        	<h2 class="shop_text">Address </h2>
    		        	<div class="image-icon"><img src="images/map-icon.png"><span class="pet_text">No 40 Baria Sreet 15/2 NewYork City, NY, United States.</span></div>
    		        </div>
    		        <div class="col-sm-4 col-md-6 col-lg-3">
    				    <h2 class="shop_text">Our Company </h2>
    				    <div class="delivery_text">

    				    </div>
    		        </div>
    			<div class="col-sm-6 col-lg-3">
    				<h2 class="adderess_text">Products</h2>
    				<div class="delivery_text">

    				    </div>
    			</div>
    			<div class="col-sm-6 col-lg-2">
    				<h2 class="adderess_text">Newsletter</h2>
    				<div class="form-group">
                        <input type="text" class="enter_email" placeholder="Enter Your email" name="Name">
                    </div>
                    <button class="subscribr_bt">Subscribe</button>
                    <?php echo(get_current_user());?>
    			</div>
    			</div>
    	        </div> 
	        </div>
    	</div>
    </div>
	<!-- section footer end -->
	<div class="copyright">2019 All Rights Reserved. <a href="https://html.design">Free html  Templates</a></div>


      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function() {
			 $(".fancybox").fancybox({
				 openEffect: "none",
				 closeEffect: "none"
			 });


			 $('#myCarousel').carousel({
				 interval: false
			 });

			 //scroll slides on swipe for touch enabled devices

			 $("#myCarousel").on("touchstart", function (event) {

				 var yClick = event.originalEvent.touches[0].pageY;
				 $(this).one("touchmove", function (event) {

					 var yMove = event.originalEvent.touches[0].pageY;
					 if (Math.floor(yClick - yMove) > 1) {
						 $(".carousel").carousel('next');
					 } else if (Math.floor(yClick - yMove) < -1) {
						 $(".carousel").carousel('prev');
					 }
				 });
				 $(".carousel").on("touchend", function () {
					 $(this).off("touchmove");
				 });
			 })
		 });
      </script> 
   </body>
</html>