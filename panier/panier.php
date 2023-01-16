
<!DOCTYPE html>
<?php

session_start();
include_once("fonctions-panier.php");
include "../config/db_connect.php";



$label=$_POST['label'];
$description=$_POST['description'];
$price=$_POST['price'];
$tags=$_POST['tags'];
$qte=$_POST['qte'];
$stock=$_POST['stock'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse=$_POST['adresse'];

// on crée la requête SQL pour ajouter le panier dans la bdd afin d'avoir un historique
$sql3 = "INSERT INTO historique_commande (label, prix, nom, prenom, adresse)
        VALUES  ('$label', '$price', '$nom', '$prenom', '$adresse' )";
//echo "zz $sql zz";
$stmt = $db->prepare($sql3);
$stmt->execute();


if( $stock == 0)
{
    echo "L'article n'est pas en stock , la livraison va être de 7 jours";
    $qte = 1;
}


// CROSS SELL

if ($tags == "commode")
{
    $sql = "Select label,description,img,price from produit WHERE tags='miroir' LIMIT 1";
}
elseif ($tags == "support_tv")
{
    $sql = "Select label,description,img,price from produit WHERE tags='tv'  LIMIT 1";
}
elseif ($tags == "tv")
{
    $sql = "Select label,description,img,price from produit WHERE tags='support_tv' LIMIT 1";
}
elseif ($tags == "miroir")
{
    $sql = "Select label,description,img,price from produit WHERE tags='commode' or tags='etagere' LIMIT 1";
}
elseif ($tags == "etagere")
{
    $sql = "Select label,description,img,price from produit WHERE tags='miroir' LIMIT 1";
}

$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

// UPSELL

if ($tags == "commode")
{
    $sql2 = "Select label,description,img,price from produit WHERE tags='$tags' AND price > '$price' LIMIT 1";
}
elseif ($tags == "support_tv")
{
    $sql2 = "Select label,description,img,price from produit WHERE tags='$tags' AND price > '$price' LIMIT 1";
}
elseif ($tags == "tv")
{
    $sql2 = "Select label,description,img,price from produit WHERE tags='$tags' AND price > '$price' LIMIT 1";
}
elseif ($tags == "miroir")
{
    $sql2 = "Select label,description,img,price from produit WHERE tags='$tags' AND price > '$price'  LIMIT 1";
}
elseif ($tags == "etagere")
{
    $sql2 = "Select label,description,img,price from produit WHERE tags='$tags' AND price > '$price'  LIMIT 1";
}

$stmt = $db->prepare($sql2);
$stmt->execute();
$result2 = $stmt->fetchAll();

/*
$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
    if(!in_array($action,array('ajout', 'suppression', 'refresh')))
    {
        $erreur=true;

    //récuperation des variables en POST ou GET
    $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
    $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
    $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
    $d = (isset($_POST['d'])? $_POST['d']:  (isset($_GET['d'])? $_GET['d']:null )) ;
    $tags = (isset($_POST['t'])? $_POST['t']:  (isset($_GET['t'])? $_GET['t']:null )) ;


        //Suppression des espaces verticaux
        $l = preg_replace('#\v#', '',$l);
        //On vérifie que $p soit un float
        $p = floatval($p);

        //On traite $q qui peut être un entier simple ou un tableau d'entiers

        if (is_array($q)){
            $QteArticle = array();
            $i=0;
            foreach ($q as $contenu){
                $QteArticle[$i++] = intval($contenu);
            }
        }
        else {
            $q = intval($q);
        }
    }

if (!$erreur){
    switch($action){
        Case "ajout":
            ajouterArticle($l,$q,$p,$d);
            break;

        Case "suppression":
            supprimerArticle($l);
            break;

        Case "refresh" :
            for ($i = 0 ; $i < count($QteArticle) ; $i++)
            {
                modifierQTeArticle($_SESSION['panier']['label'][$i], round($QteArticle[$i]));
            }
            break;

        Default:
            break;
    }
}
}*/

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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../checkout.js"></script>
</head>
<!-- body -->
<body class="main-layout">

    <!-- New Arrivals section start -->
    <div class="layout_padding gallery_section" style="background-color:white">
        <div class="container">
            <div class="row">
                <form method="post" action="panier.php">
                    <table style="width: 400px">
                        <tr>
                            <td colspan="4">Votre panier</td>
                        </tr>
                        <tr>
                            <td>Libellé</td>
                            <td>Description</td>
                            <td>Prix</td>
                            <td>Quantité</td>
                        </tr>


                        <?php
                        /*if (creationPanier())
                        {
                            $nbArticles=count($_SESSION['panier']['label']);
                            if ($nbArticles <= 0)
                                echo "<tr><td>Votre panier est vide </ td></tr>";
                            else
                            {
                                for ($i=0 ;$i < $nbArticles ; $i++)
                                {
                                    echo "<tr>";
                                    echo "<td>".htmlspecialchars($_SESSION['panier']['label'][$i])."</ td>";
                                    echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['quantity'][$i])."\"/></td>";
                                    echo "<td>".htmlspecialchars($_SESSION['panier']['price'][$i])."</td>";
                                    echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['label'][$i]))."\">XX</a></td>";
                                    echo "</tr>";
                                }

                                echo "<tr><td colspan=\"2\"> </td>";
                                echo "<td colspan=\"2\">";
                                echo "Total : ".MontantGlobal();
                                echo "</td></tr>";

                                echo "<tr><td colspan=\"4\">";
                                echo "<input type=\"submit\" value=\"Rafraichir\"/>";
                                echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

                                echo "</td></tr>";
                            }
                        }*/

                        echo "<tr>";
                        echo "<td><p>$label</p></td>";
                        echo "<td><p>$description</p></td>";
                        echo "<td><p>$price € </p></td>";
                        echo "<td><p>$qte </p></td>";
                        echo "<form method=post action=panier.php>";
                        echo "</tr>";
                        $total = $qte * $price;
                        echo "<tr>";
                        echo "<th colspan=5 style=text-align:right;>Totaux</th>";
                        echo "<td style=text-align:right;font-weight:bold>".$total." €</td>";
                        echo "</tr>";


                        echo "<button class='btn btn-primary' type='button' onClick=getPrice($total,'$label') value='Payer'>Payer</button>";
                        ?>
                    </table>
                </form>
            </div>
            <!-- Produit cross sell et upsell -->
            <div class="row">
                <?php
                //Cross Sell
                foreach($result as $product)
                {
                    echo "<div class=col-sm-4>";
                    echo "<form method=POST id=form action=/panier.php>";
                    echo "<div class=best_shoes>";
                    echo "<p> Produit complémentaire</p>";
                    echo "<p class=best_text><b>".$product['label']."</b></p>";
                    echo "<div class=shoes_icon><img src=../".$IMG_URL.$product['img'].".jpg></div>";
                    echo "<div class=star_text>";
                    echo "<div>";
                    echo "<br><p>".$product['description']."</p>";
                    echo "</div>";
                    echo "<div class='right_part'>";
                    echo "<div class='shoes_price'><span style='color: #ff4e5b;'>".$product['price']."</span> €</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='button-buy'>";
                    echo "<button class='btn btn-primary' type='submit' value='Ajouter au panier'>Ajouter au panier</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</form>";
                    echo "</div>";
                }
                // Upsell
                foreach($result2 as $product2)
                {
                    echo "<div class=col-sm-4>";
                    echo "<form method=POST id=form action=/panier.php>";
                    echo "<div class=best_shoes>";
                    echo "<p> Produit de gamme supérieur</p>";
                    echo "<p class=best_text><b>".$product2['label']."</b></p>";
                    echo "<div class=shoes_icon><img src=../".$IMG_URL.$product2['img'].".jpg></div>";
                    echo "<div class=star_text>";
                    echo "<div>";
                    echo "<br><p>".$product2['description']."</p>";
                    echo "</div>";
                    echo "<div class='right_part'>";
                    echo "<div class='shoes_price'><span style='color: #ff4e5b;'>".$product2['price']."</span> €</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='button-buy'>";
                    echo "<button class='btn btn-primary' type='submit' value='Ajouter au panier'>Ajouter au panier</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</form>";
                    echo "</div>";
                }
                ?>

            </div>

            <!-- FIN Produit cross sell et upsell -->
        </div>
    </div>

<!-- section footer start -->
<div class="section_footer">
    <div class="container">
        <div class="mail_section">
            <div class="row">
                <div class="col-sm-6 col-lg-2">
                    <div><a href="#"><img src="../images/ABC-Logo.png"></a></div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="footer-logo"><img src="../images/phone-icon.png"><span class="map_text">(71) 1234567890</span></div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="footer-logo"><img src="../images/email-icon.png"><span class="map_text">Demo@gmail.com</span></div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="social_icon">
                        <ul>
                            <li><a href="#"><img src="../images/fb-icon.png"></a></li>
                            <li><a href="#"><img src="../images/twitter-icon.png"></a></li>
                            <li><a href="#"><img src="../images/in-icon.png"></a></li>
                            <li><a href="#"><img src="../images/google-icon.png"></a></li>
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
                    <div class="image-icon"><img src="../images/map-icon.png"><span class="pet_text">No 40 Baria Sreet 15/2 NewYork City, NY, United States.</span></div>
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
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/jquery-3.0.0.min.js"></script>
<script src="../js/plugin.js"></script>
<!-- sidebar -->
<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../js/custom.js"></script>
<!-- javascript -->
<script src="../js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>