const baseUrl = "http://localhost/quickfood/public/";
const token = $('meta[name="csrf-token"]').attr('content');
const deliveryPrice = 99;
const subtotalMin = 600;

window.addEventListener('load', () => {
    /*Menu*/
    if(window.location.href.includes(baseUrl + 'menu')){

        printCart();

        $(document).on('click', '.addToCart', function (e){

            e.preventDefault();
            let item = $(this).attr('data-product');

            ajax(
                `menu/product/${item}`,
                "GET",
                {
                },
                function (data){
                    addToCart(data);
                },
                function (xhr){
                    $('#infoMessages').html(`<p class="text-danger text-center">${xhr.responseJSON.message}</p>`);
                    $('#notificationsModal').modal('toggle');
                },
                "json",
                false,
                false
            );

        });
        $('#empty-cart').click(function (e){
            e.preventDefault();
            clearCart();
        });

        $(document).on('click', '.remove-from-cart', function (e){
            e.preventDefault();
            let product = $(this).attr('data-pid');
            removeFromCart(product);
        });

        $(document).on('click', '#orderNow', function (e){
            e.preventDefault();
            let cart = localStorage.getItem('cart');
            let subtotal = 0;
            let productsCb = "";
            if(cart != null && JSON.parse(cart).length != 0){
                items = JSON.parse(cart);

                for (let item of items){
                    subtotal += item.price;
                }

                if(subtotal < subtotalMin){
                    $('#infoMessages').html(`<p class="text-danger text-center">Minimalan iznos za dostavu je 600rsd.</p>`);
                    $('#notificationsModal').modal('toggle');
                }else{
                    $('#toggleOrderBox').click();
                }
            }else{
                $('#infoMessages').html(`<p class="text-danger text-center">Vaša korpa je prazna.</p>`);
                $('#notificationsModal').modal('toggle');
            }
        });

    }

    if(window.location.href.includes(baseUrl + 'product/')){
        $('#categories-slider').owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            dots:false,
            autoplay : 1000,
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:true
                },
                1000:{
                    items:4,
                    nav:true,
                    loop:false
                }
            }
        });

        $(document).on('click', '#btnAddToCart', function (){
            let item = $(this).attr('data-product');
            let count = $('#itemCount').val();

            ajax(
                `menu/product/${item}`,
                "GET",
                {
                },
                function (data){
                    for (let i = 0; i < count; i++){
                        addToCart(data, false);
                    }

                    $('#infoMessages').html(`<p class="text-info text-center"> Proizvodi uspešno dodati u korpu.</p>`);
                    $('#notificationsModal').modal('toggle');
                },
                function (xhr){
                    $('#infoMessages').html(`<p class="text-danger text-center">${xhr.responseJSON.message}</p>`);
                    $('#notificationsModal').modal('toggle');
                },
                "json",
                false,
                false
            );

        });
    }

    if(window.location.href.includes(baseUrl + 'orders')){
        $('.view-order-info').click(function (){
           let uuid = $(this).attr('data-orderuuid');

            ajax(
                `orders/${uuid}`,
                "GET",
                {
                },
                function (data){
                    console.log(data)
                    printProducts(data);
                    $('#myOrder').modal('toggle');
                },
                function (xhr){
                    $('#infoMessages').html(`<p class="text-danger text-center">${xhr.responseJSON.message}</p>`);
                    $('#notificationsModal').modal('toggle');
                },
                "json",
                false,
                false
            );
        });
    }
});

/* AJAX */
function ajax(url, method, data, success, error, dataType = "json", contentType = "application/x-www-form-urlencoded; charset=UTF-8", processData = true) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    $.ajax({
        url: baseUrl + url,
        method: method,
        data: data,
        dataType: dataType,
        success: success,
        error: error,
        contentType: contentType,
        processData: processData
    });
}

/*Cart*/

function printCart(){
    let cart = localStorage.getItem('cart');
    let str = '';

    if(cart != null && JSON.parse(cart).length != 0) {
        let products = JSON.parse(cart);

        let productsArr = [],
            skip = 1;
        let subtotal = 0;
        let productsCb = '';
        for (let i = 0; i < products.length; i += skip) {
            skip = 1;
            for (let j = i + 1; j < products.length; ++j) {
                if (products[i].id === products[j].id) {
                    skip++;
                } else {
                    break;
                }
            }
            productsArr.push({
                item: products[i],
                numberOfItems: skip
            });
        }

        for (let product of productsArr) {
            subtotal += product.item.price * product.numberOfItems;
            str += `
                 <li class="mb-2">
                    <a href="#" data-pid="${product.item.id}" class="remove_item remove-from-cart"><i class="icon_minus_alt"></i></a>
                    <strong>${product.numberOfItems}x</strong> ${product.item.name}<strong class="float-right">${product.numberOfItems * product.item.price}.00 din</strong>
                 </li>`;
            productsCb +=   `<input type="checkbox" class="d-none" checked name="cartItems[]" value="${product.item.id}"/>
                             <input type="checkbox" class="d-none" checked name="cartItemsCount[]" value="${product.numberOfItems}"/>`;
        }

        $('#your-cart').html(str);
        $('#subtotal-price').html(`${subtotal}.00 din`);
        $('#total-price').html(`${subtotal + deliveryPrice}.00 din`);
        $('#order-products').html(productsCb);
    }else{
        $('#your-cart').html(str);
        $('#subtotal-price').html('0 din');
        $('#total-price').html('0 din');
        $('#order-products').html('');
    }
}

function addToCart(data, print = true){
    if(localStorage.getItem('cart') != null){
        let cart = JSON.parse(localStorage.getItem('cart'));
        cart.push(data);
        cart.sort(function (a, b) {
            return a.id - b.id
        });
        localStorage.setItem('cart', JSON.stringify(cart));
    }else{
        localStorage.setItem('cart', JSON.stringify([data]));
    }

    if(print){
        printCart();
    }
}

function clearCart(){
    localStorage.clear();
    printCart();
}

function removeFromCart(product){
    let cart = JSON.parse(localStorage.getItem('cart'));

    let index = cart.findIndex(x => x.id == product);
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    printCart();
}

/*Orders*/

function printProducts(data){
    let str = '', total = 0;
    console.log(data)
    for (let d of data.order.products){
        total += d.prices[0].unit_price * d.pivot.quantity;
        str += `<tr>
                    <td class="text-left">
                        <strong>${d.pivot.quantity}x</strong> ${d.name}
                    </td>
                    <td class="text-right">
                        <strong class="float-right">${d.prices[0].unit_price} rsd</strong>
                    </td>
                </tr>`;
    }
    str += `<tr>
                <td class="text-left">
                    Dostava
                </td>
                <td class="text-right">
                    <strong class="float-right">${deliveryPrice} rsd</strong>
                </td>
            </tr>
            <tr>
                <td class="total_confirm text-left">
                    UKUPNO
                </td>
                <td class="total_confirm text-right">
                    <span class="float-right"> ${total + deliveryPrice} rsd</span>
                </td>
            </tr>`;

    if(data.order.status_id == 1){
        $('#confirm').html(`<img src="${baseUrl + 'assets/img/2.gif'}"/> <h3>Porudžbina u obradi!</h3>`);
    }else{
        $('#confirm').html(`<i class="icon_check_alt2" style="font-size: 64px;"></i> <h3>Porudžbina dostavljena!</h3>`);
    }
    $('#order-items').html(str);
    $('#orderId').html("ID porudžbine: "+ data.order.order_uuid)
}
