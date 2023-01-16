<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Buy cool new product</title>
        <link rel="stylesheet" href="./css/style.css">
        <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>
    <section>
        <div class="product">
            <img src="https://i.imgur.com/EHyR2nP.png" alt="The cover of Stubborn Attachments" />
            <div class="description">
                <h3>T-shirt Sénégal Best Team</h3>
                <h5>100.00€</h5>
            </div>
        </div>
        <form action="http://localhost/Github/Archi%20Logiciel/Stripe/create-checkout-session.php" method="POST">
            <button type="submit" id="checkout-button">Checkout</button>
        </form>
    </section>
    </body>
</html>