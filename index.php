<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="style/styles.css" />


	<title>Les créations de Nine</title>

</head>


<?php include("header.php"); ?>





<body>



	<div class="container-fluid">
		<div class="row">

			
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
					Articles par pages
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">10</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">20</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">50</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">100</a></li>
				</ul>
			</div>


			<?php
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=nine;charset=utf8', 'root', '');
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}


			$reponse = $bdd->query("SELECT * FROM ARTICLES ");
			$tot = $reponse->rowCount();


			if(isset($_GET['epp'])){
					$epp = intval($_GET['epp']); // Nombre d'articles par pages
				} else {
					$epp = 9;
				}

				$nbPages = ceil($tot/$epp);

				$current = 1;
				if(isset($_GET['page']) AND is_numeric($_GET['page'])){
					$page = intval($_GET['page']);// Numéro de page
					if($page>=1 && $page<= $nbPages){
						$current = $page;
					} else if ($page<1){
						$current = 1;
					} else {
						$current = $nbPages;
					}
				}
				
				$start = $epp*$current;
				
				$reponse->closeCursor(); // Termine le traitement de la requête

				$reponse =  $bdd->query("SELECT * FROM ARTICLES LIMIT $start,$epp");
				
				while ($donnees = $reponse->fetch())
				{
					?>

					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<div class="left_block">
								<a href="#" title="produit">
									<img src="images/test.jpg" alt="">
									<span class="new"><img src="images/new.png"></span>	 
								</a>
							</div>
							<div class="caption">
								<h3><?php   echo $donnees['nom'];?></h3>
								<p><?php   echo $donnees['prix'];?> €</p>
								<p>La couleur est :<?php   echo $donnees['couleur'];?></p>

								<p><a href="#" class="btn btn-primary" role="button">
									Ajouter au panier 
									<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
								</div>
							</div>
						</div>

						<?php 

						
					}

$reponse->closeCursor(); // Termine le traitement de la requête
?>

</div>

<nav>
	<div class="text-center">
		<ul class="pagination" style=center>
			<?php 
			$url=strtok($_SERVER["REQUEST_URI"],'?');

			if($current > 1) {
				?>
				<li>
					<a href=<?php ?> aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<?php
			}
			for ($i=1; $i <= $nbPages; $i++) { 

				if ($i == $current) {
					?>
					<li class="active"><a href="#"><?php echo $i?></a></li>
					<?php
				} else {
					?>
					<li><a href=<?php echo $url."?page=".$i."&epp=".$epp ?> ><?php echo $i?></a></li>
					<?php
				}
			}
			if($current<$nbPages){
				?>
				<li>
					<a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
				<?php
			}
			?>

		</ul>
	</div>
</nav>
</div>







</body>

<?php include("footer.php"); ?>

<!-- FOOTER -->>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="javascript/velocity.min.js"></script>
<script src="javascript/animation.js"></script>
<script src="javascript/contact.js"></script>
<script src="//raw.github.com/botmonster/jquery-bootpag/master/lib/jquery.bootpag.min.js"></script>


</html>