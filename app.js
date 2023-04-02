function addToCart(id) {
    const request = $.ajax({
        url: 'cart.php?is_json=true',
        method: 'POST',
        data: {
            action: 'addToCart',
            product: id,
        }
    })

    request.done(function (data) {
        // produit saye fel pannier wala
        console.log(data);
    })
}