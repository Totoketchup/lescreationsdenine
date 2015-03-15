<?php 
session.start();
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