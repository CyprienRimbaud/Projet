<?php include('template/header.php');
include('../page/template/menu.php');  ?>
<div class="position-absolute top-50 start-50 translate-middle">
        <h1>Connexion</h1>

<form method="POST" action="?route=authenticate&action=login" class="row row-cols-lg-auto g-3 align-items-center">
    <div class="col-12">
        <label class="visually-hidden" for="login">Login</label>
        <div class="input-group">
            <div class="input-group-text"></div>
            <input type="text" class="form-control" name="login" placeholder="Login">
        </div>

        <label class="visually-hidden" for="login">Login</label>
        <div class="input-group">
            <div class="input-group-text"></div>
            <input type="password" class="form-control" name="pwd" placeholder="Mot de passe">
        </div>

    </div>


    <div class="col-12">
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </div>
</form>

        <small><?php echo $message ?></small>
</div>
<?php include('template/footer.php'); ?>


