<?php include 'inc/header.php'?>

<section id="register">
    <div class="container">
        <h1>Register</h1>
        <form action="register_be.php" method="POST">
            <div class="form-input">
                <input id="name" name="name" type="text" placeholder="Name" />
            </div>
            <div class="form-input">
                <input id="gamername" name="gamername" type="text" placeholder="In game name" />
            </div>
            <div class="form-input">
                <input id="email" name="email" type="text" placeholder="Email" />
            </div>
            <div class="form-input">
                <input id="password" name="password" type="password" placeholder="Password" />
            </div>
            <input name="action" type="hidden" value="signup" />
            <input type="submit" value="Signup" class="button button--form"/>
        </form>
    </div>
</section>

<?php include 'inc/footer.php'?>
    

