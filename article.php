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

		$article_id = $_GET['id'];
		$reponse = $bdd->query("SELECT * FROM ARTICLES WHERE id = $article_id");

		while ($donnees = $reponse->fetch())
		{
			
			?>
			<div>


			</div>


			<?php 
		}
		?>

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="images/image1.jpg" alt="Chania">
				</div>

				<div class="item">
					<img src="images/image2.jpg" alt="Chania">
				</div>
				<div class="item">
					<img src="images/image3.jpg" alt="Flower">
				</div>

				<div class="item">
					<img src="images/image4.jpg" alt="Flower">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<div class="carousel slide article-slide" id="article-photo-carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner cont-slider">

    <div class="item active">
      <img alt="" title="" src="http://placehold.it/600x400">
    </div>
    <div class="item">
      <img alt="" title="" src="http://placehold.it/600x400">
    </div>
    <div class="item">
      <img alt="" title="" src="http://placehold.it/600x400">
    </div>
    <div class="item">
      <img alt="" title="" src="http://placehold.it/600x400">
    </div>
  </div>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li class="active" data-slide-to="0" data-target="#article-photo-carousel">
      <img alt="" src="http://placehold.it/250x180">
    </li>
    <li class="" data-slide-to="1" data-target="#article-photo-carousel">
      <img alt="" src="http://placehold.it/250x180">
    </li>
    <li class="" data-slide-to="2" data-target="#article-photo-carousel">
      <img alt="" src="http://placehold.it/250x180">
    </li>
    <li class="" data-slide-to="3" data-target="#article-photo-carousel">
      <img alt="" src="http://placehold.it/250x180">
    </li>
  </ol>
</div>

	</div>
</body>

<body>
	<?php include("footer.php"); ?>

</body>

</html>