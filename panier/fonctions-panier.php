<?php

function creationPanier(){
    if (!isset($_SESSION['panier'])){
        $_SESSION['panier']=array();
        $_SESSION['panier']['label'] = array();
        $_SESSION['panier']['quantity'] = array();
        $_SESSION['panier']['price'] = array();
        $_SESSION['panier']['description'] = array();
        $_SESSION['panier']['verrou'] = false;
    }
    return true;
}

function ajouterArticle($label, $quantity, $price, $description){

    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
        //Si le produit existe déjà on ajoute seulement la quantité
        $positionProduit = array_search($label,  $_SESSION['panier']['label']);

        if ($positionProduit !== false)
        {
            $_SESSION['panier']['quantity'][$positionProduit] += $quantity ;
        }
        else
        {
            //Sinon on ajoute le produit
            array_push( $_SESSION['panier']['label'], $label);
            array_push( $_SESSION['panier']['quantity'], $quantity);
            array_push( $_SESSION['panier']['price'], $price);
            array_push( $_SESSION['panier']['description'], $description);
        }
    }
    else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function supprimerArticle($label){
    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
        //Nous allons passer par un panier temporaire
        $tmp=array();
        $tmp['label'] = array();
        $tmp['quantity'] = array();
        $tmp['price'] = array();
        $tmp['verrou'] = $_SESSION['panier']['verrou'];

        for($i = 0; $i < count($_SESSION['panier']['label']); $i++)
        {
            if ($_SESSION['panier']['label'][$i] !== $label)
            {
                array_push( $tmp['label'],$_SESSION['panier']['label'][$i]);
                array_push( $tmp['quantity'],$_SESSION['panier']['quantity'][$i]);
                array_push( $tmp['price'],$_SESSION['panier']['price'][$i]);
                array_push( $tmp['description'],$_SESSION['panier']['description'][$i]);
            }

        }
        //On remplace le panier en session par notre panier temporaire à jour
        $_SESSION['panier'] =  $tmp;
        //On efface notre panier temporaire
        unset($tmp);
    }
    else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function modifierQTeArticle($label, $quantity){
    //Si le panier existe
    /*if (creationPanier() && !isVerrouille())
    {*/
        //Si la quantité est positive on modifie sinon on supprime l'article
        if ($quantity > 0)
        {
            //Recherche du produit dans le panier
            $positionProduit = array_search($label,  $_SESSION['panier']['label']);

            if ($positionProduit !== false)
            {
                $_SESSION['panier']['quantity'][$positionProduit] = $quantity ;
            }
        }
        else
            supprimerArticle($label);
    /*}
    else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";*/
}

function MontantGlobal(){
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['label']); $i++)
    {
        $total += $_SESSION['panier']['quantity'][$i] * $_SESSION['panier']['price'][$i];
    }
    return $total;
}

function isVerrouille(){
    if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
        return true;
    else
        return false;
}

function compterArticles()
{
    if (isset($_SESSION['panier']))
        return count($_SESSION['panier']['libelleProduit']);
    else
        return 0;

}

function supprimePanier(){
    unset($_SESSION['panier']);
}