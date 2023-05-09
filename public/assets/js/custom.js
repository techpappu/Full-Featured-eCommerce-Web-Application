$('.add-to-cart a').click(function () {
    var id = $(this).data("id");
    var link = $(this).data("link");
    var name = $(this).data("name");
    var image = $(this).data('image');
    var price = $(this).data('price');
    var quantity = 0;
    quantity = parseInt($('#product_quantity').val());
    if (quantity < 0) quantity += 1;

    var cartdata = JSON.parse(window.localStorage.getItem('cart'))
    var existing = false;
    if ($('#product_quantity').val() > 0) {
        quantity = quantity;
    } else {
        quantity = 1;
    }

    if (cartdata) {
        for (var i = 0; i < cartdata.length; i++) {
            if (cartdata[i].id == id) {
                cartdata[i].quantity += quantity;
                existing = true;
            }
        }
    }
    if (cartdata === null) {
        var firstItem = [];
        firstItem.push({
            'id': id,
            'link': link,
            'name': name,
            'image': image,
            'price': price,
            'quantity': quantity
        });
        window.localStorage.setItem('cart', JSON.stringify(firstItem));
    } else {
        if (existing == false) {
            cartdata.push({
                'id': id,
                'link': link,
                'name': name,
                'image': image,
                'price': price,
                'quantity': quantity
            });
        }
        window.localStorage.setItem('cart', JSON.stringify(cartdata));
    }
    refreshCart();
});

$(document).ready(function () {
    refreshCart();
    refreshCartPage();
});

function refreshCart() {
    $('ul.ul-cart-List').html("");
    var total = 0;
    var cartdata = JSON.parse(window.localStorage.getItem('cart'));
    for (var i = 0; i < cartdata.length; i++) {
        var html = '<li>';
        html += '<a href="' + cartdata[i].link + '"><img src="' + cartdata[i].image + '" alt="' + cartdata[i].name + '" /></a>';
        html += '<a href="' + cartdata[i].link + '">' + cartdata[i].name + '</a>';
        html += '<span>' + cartdata[i].quantity + ' x ' + currency_prefix + ' ' + cartdata[i].price + '</span>';
        html += '<div class="clearfix"></div>';
        html += '<a href="javascript:" class="cart-remove" onClick="deleteItem(' + cartdata[i].id + ')"></a>';
        html += '</li>';
        total += cartdata[i].quantity * cartdata[i].price;
        $('ul.ul-cart-List').append(html);
    }
    var count = cartdata.length;
    $('.cart-item-count').html(count);
    $('span.totalAmount').html(total.toFixed(2));
}

function refreshCartPage() {
    $('table#cart-page-item').html("");
    $('table.stacktable').html("");
    var cartdata = JSON.parse(window.localStorage.getItem('cart'));

    var html = '<tr><th>Item</th><th>Description</th><th>Price</th><th>Quantity</th><th>Total</th><th></th></tr>';
    for (var i = 0; i < cartdata.length; i++) {
        html += '<tr>';
        html += '<td><img src="' + cartdata[i].image + '" style="width:80px;height:80px" alt="" /></td>';
        html += '<td class="cart-title"><a href="' + cartdata[i].link + '">' + cartdata[i].name + '</a></td>';
        html += '<td>' + currency_prefix + ' ' + cartdata[i].price + '</td>';
        html += '<td>';
        html += '<form action="#">';
        html += '<div class="qtyminus" onClick="minus(' + cartdata[i].quantity + ',' + cartdata[i].id + ')"></div>';
        html += '<input type="text" name="quantity" value="' + cartdata[i].quantity + '" class="qty" />';
        html += '<div class="qtyplus" onClick="plus(' + cartdata[i].quantity + ',' + cartdata[i].id + ')"></div>';
        html += '</form>';
        html += '</td>';
        html += '<td class="cart-total">' + currency_prefix + ' ' + (cartdata[i].quantity * cartdata[i].price).toFixed(2) + '</td>';
        html += '<td><a href="javascript:" class="cart-remove" onClick="deleteItem(' + cartdata[i].id + ')"></a></td>';
        html += '</tr>';
    }
    $('table#cart-page-item').append(html);
    carPagCartTotal();
    $('.responsive-table').stacktable();
}

function plus(current, product_id) {
    var cartdata = JSON.parse(window.localStorage.getItem('cart'));
    for (var i = 0; i < cartdata.length; i++) {
        if (cartdata[i].id == product_id) cartdata[i].quantity = current + 1;
    }
    window.localStorage.setItem('cart', JSON.stringify(cartdata));
    refreshCart();
    refreshCartPage();
}

function minus(current, product_id) {
    var cartdata = JSON.parse(window.localStorage.getItem('cart'));
    for (var i = 0; i < cartdata.length; i++) {
        if (cartdata[i].id == product_id) {

            if (current > 1) {
                cartdata[i].quantity = current - 1;
            } else {
                cartdata[i].quantity = current;
            }
        }
    }
    window.localStorage.setItem('cart', JSON.stringify(cartdata));
    refreshCart();
    refreshCartPage();
}

function deleteItem(product_id) {
    var cartdata = JSON.parse(window.localStorage.getItem('cart'));
    for (var i = 0; i < cartdata.length; i++) {
        console.log(i);
        if (cartdata[i].id == product_id) cartdata.splice(i,1);
    }
    window.localStorage.setItem('cart', JSON.stringify(cartdata));
    refreshCart();
    refreshCartPage();

}

function carPagCartTotal() {
    $('#cart-total-amount').html("");
    var cartdata = JSON.parse(window.localStorage.getItem('cart'));
    var total = 0;
    for (var i = 0; i < cartdata.length; i++) {
        total += cartdata[i].quantity * cartdata[i].price;
    }
    var price = currency_prefix + ' ' + total.toFixed(2);
    $('#cart-total-amount').append(price);

}
