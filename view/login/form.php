<?php require __DIR__ . '/../header.php'; ?>

    <form action="sign-in" method="post">
        <div class="form-group">
            <label for="email">Email</label>
	    <input type="email" name="email" id="email" class="form-control">
        </div>

	<div class="form-group">
	    <label for="password">Senha</label>
	    <input type="password" name="password" id="password" class="form-control">
	</div>
	<button class="btn btn-primary">
	    Log In
	</button>
    </form>

<?php require __DIR__ . '/../footer.php'; ?>
