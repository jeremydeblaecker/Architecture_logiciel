function getPrice(prix, nom = "Maillot Sénégal Edition Best Team") {
    let form = document.getElementById("form");
    form.setAttribute("action", "http://localhost/Archi%20Logiciel/Stripe/create-checkout-session.php");

    let field = document.createElement("INPUT");
    let field2 = document.createElement("INPUT");
    let field3 = document.createElement("INPUT");

    field.setAttribute("type", "hidden");
    field.setAttribute("name", "article");
    field.setAttribute("value", prix);

    field2.setAttribute("type", "hidden");
    field2.setAttribute("name", "articleName");
    field2.setAttribute("value", nom);

    /*field3.setAttribute("type", "hidden");
    field3.setAttribute("name", "articleImage");
    field3.setAttribute("value", image);*/

    form.append(field);
    form.append(field2);
    /*form.append(field3);*/

    form.submit();
}