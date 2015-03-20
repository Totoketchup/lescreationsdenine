<div class="container-fluid">

	<div class="row">
		<form>
			<p>
				<select name="epp">
					<option value="6">6</option>
					<option value="9">9</option>
					<option value="12">12</option>
					<option value="15">15</option>
				</select>

				<select name="tri">
					<option value="prix">Prix</option>
					<option value="nom">Nom</option>
					<option value="couleur">Couleur</option>
					<option value="date">Date de publication</option>
				</select>

				<select name="s">
					<option value="ASC">Ascendant</option>
					<option value="DESC">Descendant</option>
				</select>

				<input type="submit" value="Valider" />
			</p>
		</form>
	</div>
	<br>
	<div class="row">
		
		

		<?php

		// Afficher les erreurs à l'écran
		ini_set('display_errors', 1);

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=nine;charset=utf8', 'root','');
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

		$tri ='nom';
		if(isset($_GET['tri'])){
			$tri =$_GET['tri'];
		}

		$sens ='ASC';
		if(isset($_GET['s'])){
			$sens =$_GET['s'];
		}

		$req = $bdd->prepare('SELECT * FROM ARTICLES WHERE prix>= :prixmin AND prix<= :prixmax ORDER BY '.$tri.' '.$sens.' LIMIT :start,:epp ');
		// 1? : prix sup à 
		// 2? : prix inf
		// 3? : Ordonné par nom , prix, couleur, date de publication( a faire ! )
		// 4? : DESC ASC DESC
		// 5? : start
		// 6? : plage
		$req->bindValue(':prixmin',0,PDO::PARAM_INT);
		$req->bindValue(':prixmax',100,PDO::PARAM_INT);
		$req->bindValue(':start',$start,PDO::PARAM_INT);
		$req->bindValue(':epp',$epp,PDO::PARAM_INT);

		$req->execute();

		while ($donnees = $req->fetch())
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
					<?php 
				}
		$req->closeCursor(); // Termine le traitement de la requête
		?>

	</div>
</div>