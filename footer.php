<div class="footer">
	<div class="container">
		<div class="row">

			<h1 class="text-center"><a href="#myModal" role="button" class="btn btn-primary btn-lg" data-toggle="modal">Contactez moi</a></h1>

		</div>
	</div>

	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Vous voulez me contacter ?</h3>
				</div>
				<div class="modal-body">
					<form class="form-horizontal col-sm-12">
						<div class="form-group"><label>Nom</label><input class="form-control required" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Doit avoir plus de 3 caractères et uniquement des lettres" type="text"></div>
						<div class="form-group"><label>Message</label><textarea class="form-control" placeholder="Votre message ici.." data-placement="top" data-trigger="manual"></textarea></div>
						<div class="form-group"><label>E-Mail</label><input class="form-control email" placeholder="email@vous.com (comme cela je pourrai vous contacter)" data-placement="top" data-trigger="manual" data-content="Doit être une adresse e-mail (utilisateur@gmail.com)" type="text"></div>
						<div class="form-group"><button type="submit" class="btn btn-success pull-right">Envoyer</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; Le formulaire n'est pas valide ! </p></div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
				</div>
			</div>
		</div>
	</div>

</div>

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="javascript/velocity.min.js"></script>
<script src="javascript/animation.js"></script>
<!-- <script src="javascript/contact.js"></script> -->
