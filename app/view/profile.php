<div class="col-xs-8 col-sm-8 col-md-8 col-lg-4 col-xs-push-2 col-sm-push-2 col-md-push-2 col-lg-push-4">
    <form action="index.php?c=dashboard&a=profile" method="POST">
        <div class="form-group">
            <label for="name">Usuario: </label>
            <input class="form-control" type="text" name="username" id="username" value="<?= $data['name'] ?>"
                   placeholder="Username" disabled>
        </div>

        <div class="form-group">
            <label for="name">Contraseña antigua: </label>
            <input class="form-control" type="password" name="oldpassword" id="oldpassword" placeholder="Contraseña"
                   required>
        </div>
        <div class="form-group">
            <label for="name">Contraseña nueva: </label>
            <input class="form-control" type="password" name="newpassword" id="newpassword" placeholder="Contraseña"
                   required>
        </div>
        <button class="btn btn-primary" type="submit" id="action" name="action" value="update">Save</button>

    </form>
</div>