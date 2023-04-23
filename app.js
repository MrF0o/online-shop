let searchShown = false;

$(document).ready(function () {
    getCartCount();
    
    $('#search').click(function () {
        
        if (searchShown) {
            $('.search-form').css('animation', 'search-scroll-bottom 200ms forwards');
        } else {
            $('.search-form').css('animation', 'search-scroll-top 200ms forwards');
        }

        searchShown = !searchShown;
    })

    $('#close-notif').click(function () {
        $('.notif').addClass('d-none');
    })
})

function addToCart(id) {

    const quantity = $('.quantity-input').val() || 1;

    const request = $.ajax({
        url: 'cart.php?is_json=true',
        method: 'POST',
        data: {
            action: 'addToCart',
            product: id,
            quantity: quantity >= 1 ? quantity : 1
        }
    })

    request.done(function (data) {
        // produit saye fel pannier
        // chna3mlou??
        console.log(data);
        getCartCount();
    })
}

function delCartItem(id) {
    const request = $.ajax({
        url: 'cart.php?is_json=true',
        method: 'POST',
        data: {
            action: 'delCartItem',
            product: id,
        }
    });

    request.done(function (data) {
        // produit supprimé ml pannier
        location.reload();
    });
}

function getCartCount() {
    const request = $.ajax({
        url: 'cart.php?is_json=true',
        method: 'POST',
        data: {
            action: 'getCartCount',
        }
    });

    request.done(function (data) {
        $('#cart-count').text(data.count);
    })
}