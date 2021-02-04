<?php include('template/header.php');
include('../page/template/menu.php');  ?>

        <h1>Connexion</h1>

        <form method="POST" action="?route=authenticate&action=login">
                <label for="mail">Login </label>
                <input type="Login" name="login" placeholder="Saisissez votre login">
                <label for="pwd">Mot de passe </label>
                <input type="password" name="pwd" placeholder="Saisissez votre mot de passe">
                <input type="submit" value="Se connecter">
        </form>
        <small><?php echo $message ?></small>

<?php include('template/footer.php'); ?>