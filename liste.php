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

		$url=strtok($_SERVER["REQUEST_URI"],'?');


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
				
				$start = $epp*($current-1);
				
				$reponse->closeCursor(); // Termine le traitement de la requête

				$reponse =  $bdd->query("SELECT * FROM ARTICLES LIMIT $start,$epp");
				
				while ($donnees = $reponse->fetch())
				{
					?>


					<div class="col-sm-6 col-md-4">
						<div class="thumbnail" >
							<h4 class="text-center"><span class="label label-info"><?php   echo $donnees['couleur'];?></span></h4>
							<img src="images/test.jpg" class="img-responsive">
							<div class="caption">
								<div class="row">
									<div class="col-md-8 col-xs-6">
										<h3><?php   echo $donnees['nom'];?></h3>
									</div>
									<div class="col-md-4 col-xs-6 price">
										<h3>
											<label><?php echo $donnees['prix'];?>€</label></h3>
										</div>
									</div>
									<!-- <p><?php   echo $donnees['description'];?></p> -->
									<div class="row">
										<br>
										<div class="col-md-6">
											<a class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span> Aimer</a> 
										</div>
										<div class="col-md-6">
											<a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Acheter</a></div>
										</div>

										<p> </p>
									</div>
								</div>
							</div>


					<!-- <div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<div class="left_block">
								<a href=<?php echo "article.php?id=".$donnees['id'] ?> title="produit">
									<img src="images/test.jpg" alt="">
									<span class="new"><img src="images/new.png"></span>	 
								</a>
							</div>
							<div class="caption">
								<h3><?php   echo $donnees['nom'];?></h3>
								<p><?php   echo $donnees['prix'];?> €</p>
								<p>La couleur est :<?php   echo $donnees['couleur'];?></p>

								<p>
									<a href="#" class="btn btn-primary" role="button">
										Ajouter au panier 
										<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
									</a>
								</p>
							</div>

						</div>
					</div> -->

					<?php 
				}
		$reponse->closeCursor(); // Termine le traitement de la requête
		?>

	</div>
</div>