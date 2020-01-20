<?php include 'inc/header.php' ?>

<section id="hero">
    <div class="container">
        <h1 class="mb-4">Contact</h1>
    </div>
</section>

<section id="contact">
    <div class="container">
        <h2 class="text-center">Send Feedback</h2>
        <p>
            What games or game modes would you like to see supported?
            Do you have other feedback or ideas?
            Email us at support@loyalwagers.com, or fill in the form
        </p>

        <form class="contact__form" action="">
            <div class="row">
                <div class="col col-12 col-sm-6 mb-4">
                    <input type="text" placeholder="Name">
                </div>
                <div class="col col-12 col-sm-6 mb-4">
                    <input type="text" placeholder="Email*">
                </div>
            </div>
            <textarea name="message" id="" cols="30" rows="10" placeholder="Message*"></textarea>
            <input class="button button--main mt-4" type="submit" value="Send">
        </form>
    </div>
</section>

<?php include 'inc/footer.php' ?>
