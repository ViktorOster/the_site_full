<?php include 'inc/header.php' ?>

<section id="login">
    <div class="container">
        <h1>Login</h1>
        <form action="login_player.php" method="POST">
            <div class="form-input">
                <input type="text" name="username" placeholder="Enter the User Name" />
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="password" />
            </div>
            <input type="submit" type="submit" value="LOGIN" class="button button--form"/>
        </form>
    </div>
</section>

<?php include 'inc/footer.php' ?>