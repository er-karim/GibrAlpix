<?php require 'partials/head.php';?>
<div class="container">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<div class="alert alert-info">
			<p><strong>Nom</strong>: <?php echo $firstname; ?></p>
			<p><strong>Prénom</strong>: <?php echo $lastname; ?></p>
			<p><strong>Email</strong>: <?php echo $email; ?></p>
			<p><strong>Déscription</strong>: <?php echo $resume; ?></p>
			<p><strong>Niveau</strong>: <?php echo $level; ?></p>
		</div>
	</div>
</div>
<?php require 'partials/footer.php';?>