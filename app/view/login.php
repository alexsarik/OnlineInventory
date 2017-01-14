<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-4 col-xs-push-2 col-sm-push-2 col-md-push-2 col-lg-push-4">
        <form action="index.php?controller=index&action=login" method="POST">
            <img src="assets/img/logo_multivendor_white_250.png" class="img-responsive img-logo" alt="logo">
            <div class="form-group">
                <label for="name">Usuario:</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Nombre de Usuario" required
                       autofocus>
            </div>
            <div class="form-group">
                <label for="password">Contraseña: </label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password"
                       required>
            </div>
            <button class="btn btn-primary pull-right" type="submit" id="action" name="action" value="login">Login
            </button>
        </form>
        <section class="login-form">
        </section>
    </div>
</div>
