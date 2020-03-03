<main id="usuarios">
	<figure id="D-O-G" style="position: fixed; top: 30px; right: 30px; z-index: 1000;">
		<img src="img/logo.svg" style="height: 50px;">
	</figure>
	<section class="bg-cream" style="text-align: left; padding: 30px; min-height: 100vh;">
		<h2>USUARIOS</h2>
		<br>
		<div style="display: inline-block;">
			<? foreach ($data['usuarios'] as $singleUsuario): ?>
				<h5><?= $singleUsuario->nombre . ' ' . $singleUsuario->apellido ?></h5>
				<p>ID: <?= $singleUsuario->id ?></p>
				<p><?= $singleUsuario->email ?></p>
				<p>Origen: <?= $singleUsuario->origen ?></p>
				<br>
				<hr style="border-top: 1px solid lightgrey;">
				<br>
			<? endforeach; ?>
		</div>
	</section>
	<form action="admin/logout" method="POST" style="position: fixed;bottom: 30px; right: 30px;">
		<button name="logout">Logout</button>
	</form>
</main>