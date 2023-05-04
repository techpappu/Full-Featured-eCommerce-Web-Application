$('.grid-add-to-cart a').click(function () {

    var id = $(this).data("id");
    var link = $(this).data("link");
    var name = $(this).data("name");
    var image = $(this).data('image');
    var price = $(this).data('price');
    var quantity = 1;
    var cartdata = JSON.parse(window.localStorage.getItem('cart'))
    var existing = false;

    if (cartdata) {
        for (var i = 0; i < cartdata.length; i++) {
            if (cartdata[i].id == id) {
                cartdata[i].quantity += 1;
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
            'quantity': quantity,
            'total': quantity * price
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
                'quantity': quantity,
                'total': quantity * price
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
        html += '<span>' + cartdata[i].quantity + ' x bdt ' + cartdata[i].price + '</span>';
        html += '<div class="clearfix"></div>';
        html += '<a href="javascript:" class="cart-remove" onClick="deleteItem(' + cartdata[i].id + ')"></a>';
        html += '</li>';
        total += cartdata[i].quantity * cartdata[i].price;
        $('ul.ul-cart-List').append(html);
    }
    var count = cartdata.length;
    $('.cart-item-count').html(count);
    $('span.totalAmount').html(total);
}

function refreshCartPage() {
    $('table#cart-page-item').html("");
    var total = 0;
    var cartdata = JSON.parse(window.localStorage.getItem('cart'));

    var html = '<tr><th>Item</th><th>Description</th><th>Price</th><th>Quantity</th><th>Total</th><th></th></tr>';
    for (var i = 0; i < cartdata.length; i++) {
        html += '<tr>';
        html += '<td><img src="' + cartdata[i].image + '" style="width:80px;height:80px" alt="" /></td>';
        html += '<td class="cart-title"><a href="' + cartdata[i].link + '">' + cartdata[i].name + '</a></td>';
        html += '<td>' + cartdata[i].price + '</td>';
        html += '<td>';
        html += '<form action="#">';
        html += '<div class="qtyminus" data-id="' + cartdata[i].id + '"></div>';
        html += '<input type="text" name="quantity" value="' + cartdata[i].quantity + '" class="qty" />';
        html += '<div class="qtyplus" data-id="' + cartdata[i].id + '"></div>';
        html += '</form>';
        html += '</td>';
        html += '<td class="cart-total">' + cartdata[i].quantity * cartdata[i].price + '</td>';
        html += '<td><a href="javascript:" class="cart-remove" onClick="deleteItem(' + cartdata[i].id + ')"></a></td>';
        html += '</tr>';
        total += cartdata[i].quantity * cartdata[i].price;
    }
    $('table#cart-page-item').append(html);
    adjustQuantity();
    carPagCartTotal();
}

function adjustQuantity(id) {
    var thisrowfield;
    $('.qtyplus').click(function (e) {
        e.preventDefault();
        thisrowfield = $(this).parent().parent().parent().find('.qty');
        var currentVal = parseInt(thisrowfield.val());
        var currentQty = currentVal;
        if (!isNaN(currentVal)) {
            thisrowfield.val(currentVal + 1);
            currentQty = currentVal + 1;
        } else {
            thisrowfield.val(0);
            currentQty = 0;
        }
        var product_id = $(this).data(id).id;
        console.log(product_id);
        var cartdata = JSON.parse(window.localStorage.getItem('cart'));

        for (var i = 0; i < cartdata.length; i++) {
            if (cartdata[i].id == product_id) cartdata[i].quantity = currentQty;
        }
        window.localStorage.setItem('cart', JSON.stringify(cartdata));
        refreshCart();
        refreshCartPage();
    });

    $(".qtyminus").click(function (e) {
        e.preventDefault();
        thisrowfield = $(this).parent().parent().parent().find('.qty');
        var currentVal = parseInt(thisrowfield.val());
        var currentQty = currentVal;
        if (!isNaN(currentVal) && currentVal > 0) {
            thisrowfield.val(currentVal - 1);
            currentQty = currentVal - 1;
        } else {
            thisrowfield.val(0);
            currentQty = 0;
        }
        var product_id = $(this).data(id).id;
        console.log(product_id);
        var cartdata = JSON.parse(window.localStorage.getItem('cart'));

        for (var i = 0; i < cartdata.length; i++) {
            if (cartdata[i].id == product_id) cartdata[i].quantity = currentQty;
        }
        window.localStorage.setItem('cart', JSON.stringify(cartdata));
        refreshCart();
        refreshCartPage();
    });
}

function deleteItem(product_id) {
    var cartdata = JSON.parse(window.localStorage.getItem('cart'));
    for (var i = 0; i < cartdata.length; i++) {
        if (cartdata[i].id == product_id) cartdata.pop(cartdata[i]);
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
    console.log(total);
    $('#cart-total-amount').append(total);

}


function addToCart(){
  var id = $(this).data("id");
  var name = $(this).data("name");
  var image = $(this).data('image');
  var price = $(this).data('price');
  var quantity = 1;
  console.log(id);
  console.log(name);
  console.log(image);
  console.log(price);
  var cartdata = JSON.parse(window.localStorage.getItem('cart'));
  var existing = false;

  if(cartdata){
    for(var i =0; i< cartdata.length; i++){

      if(cartdata[i].id == id){ 
        cartdata[i].quantity += 1; existing = true;
      }

    }
  }


  if(existing == false){
    cartdata.push({'id':id,'name':name,'price':price,'quantity':quantity,'total':quantity*price});
  }

  window.localStorage.setItem('cart',JSON.stringify(cartdata));
  console.log(cart);
}
