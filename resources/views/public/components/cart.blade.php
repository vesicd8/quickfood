<div id="filters_col">
    <a data-toggle="collapse" href="#collapseCart" aria-expanded="false" aria-controls="collapseCart" id="filters_col_bt">
        Korpa <i class="fas fa-shopping-cart ml-3"></i> <i class="fas fa-angle-down float-right"></i>
    </a>
    <div class="collapse hide" id="collapseCart">
        <div class="filter_type">
            <h6>Proizvodi</h6>
            <ul id="your-cart">
            </ul>
        </div>
        <div class="filter_type">
            <h6>Račun</h6>
            <ul>
                <li>Cena: <span class="float-right" id="subtotal-price">0 din</span></li>
                <li>Cena dostave: <span class="float-right">99.00 din</span></li>
                <li class="h6 font-weight-bold">UKUPNO:<span class="float-right" id="total-price">0 din</span></li>
                <li class="mt-3"><a id="empty-cart" href="#" class="text-danger"> Očisti korpu </a></li>
            </ul>
            <a class="d-none" id="toggleOrderBox" data-toggle="modal" data-target="#completeOrderModal" href="#">Naplati</a>
            <a class="btn_full" id="orderNow" href="#">Naplati</a>
        </div>
    </div>
</div>
