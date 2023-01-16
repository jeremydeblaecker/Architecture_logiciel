
<!DOCTYPE html>
<?php




$label=$_POST['label'];
$description=$_POST['description'];
$price=$_POST['price'];
$tags=$_POST['tags'];
$qte=$_POST['qte'];
$stock=$_POST['stock'];


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

<!-- New Arrivals section start -->
<div class="layout_padding gallery_section" style="background-color:white">
    <div class="container">
        <div class="row">
            <div class="form-container">
                <form method=POST enctype=multipart/form-data action="panier/panier.php">
                        <?php
                        echo "<form method=POST id=form action=panier/panier.php>";
                        echo "<input type=hidden name=label value=$label>";
                        echo "<input type=hidden name=description value=$description>";
                        echo "<input type=hidden name=price value=$price>";
                        echo "<input type=hidden name=tags value=$tags>";
                        echo "<input type=hidden name=qte value=$qte>";
                        echo "<input type=hidden name=stock value=$stock>";
                        ?>
                    <div class="form-group">
                        <label for="nom">Votre Nom :</label>
                       <?php echo "<input type='text' name='nom' value='' class='form-control' placeholder='Nom' required>"; ?>
                    </div>
                    <div class="form-group">
                        <label for="nom">Votre Prénom :</label>
                        <?php echo "<input type='text' name='prenom' value='' class='form-control' placeholder='Prenom' required>"; ?>
                    </div>
                    <div class="form-group">
                        <label for="nom">Votre adresse :</label>
                        <?php echo "<input type='text' name='adresse' value='' class='form-control' placeholder='Adresse' required>"; ?>
                    </div>
                    <input name=submit type=submit id=submit value=Envoyer>
                </form>
            </div>
        </div>
    </div>
</div>

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
</body>
</html>