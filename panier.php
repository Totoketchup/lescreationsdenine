<?php 

// On initialialise le panier
$_SESSION['panier']= array();
// Configuration du panier
$_SESSION['panier']['id_articl'] = array();
$_SESSION['panier']['qtee'] = array(); 
?>

<?php
function ajout($select) 
{ 
	array_push($_SESSION['panier']['id_article'],$select['id']); 
	array_push($_SESSION['panier']['qte'],$select['qte']); 
}
?>

<?php 
/** 
 * Vérifie la présence d'un article dans le panier 
 */ 
function verif_panier($ref_article) 
{ 
    /* On initialise la variable de retour */ 
    $present = false; 
    /* On vérifie les numéros de références des articles et on compare avec l'article à vérifier */
    if( count($_SESSION['panier']['id_article']) > 0 && array_search($ref_article,$_SESSION['panier']['id_article']) !== false) 
    { 
        $present = true; 
    } 
    return $present; 
}  
?> 


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/styles.css" />


    <title>Les créations de Nine</title>

</head>

<?php include("header.php") ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                </div>
                                <div class="col-xs-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block">
                                        <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                            </div>
                            <div class="col-xs-4">
                                <h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
                            </div>
                            <div class="col-xs-6">
                                <div class="col-xs-6 text-right">
                                    <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control input-sm" value="1">
                                </div>
                                <div class="col-xs-2">
                                    <button type="button" class="btn btn-link btn-xs">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                            </div>
                            <div class="col-xs-4">
                                <h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
                            </div>
                            <div class="col-xs-6">
                                <div class="col-xs-6 text-right">
                                    <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control input-sm" value="1">
                                </div>
                                <div class="col-xs-2">
                                    <button type="button" class="btn btn-link btn-xs">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="text-center">
                                <div class="col-xs-9">
                                    <h6 class="text-right">Added items?</h6>
                                </div>
                                <div class="col-xs-3">
                                    <button type="button" class="btn btn-default btn-sm btn-block">
                                        Update cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-xs-9">
                                <h4 class="text-right">Total <strong>$50.00</strong></h4>
                            </div>
                            <div class="col-xs-3">
                                <button type="button" class="btn btn-success btn-block">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <?php include("footer.php") ?>