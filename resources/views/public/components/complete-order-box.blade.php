

<div class="modal fade" id="completeOrderModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="box_style_2" id="order_process">
                    <h2 class="inner">Your order details</h2>
                    <div class="form-group">
                        <label>Kontakt telefon <small class="text-danger">*</small></label>
                        <input type="text" id="tel_order" name="phone" class="form-control" placeholder="format: 060123124(1)">
                    </div>
                    <div class="form-group">
                        <label>Adresa  <small class="text-danger">*</small></label>
                        <input type="text" id="address_order" name="address" class="form-control" placeholder="npr. Kralja Petra 8">
                    </div>
                    <div id="order-products">
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Napomene</label>
                            <textarea class="form-control" style="height:150px" placeholder="npr. alergije, izbacivanje sastojaka..." name="notes" id="notes"></textarea>
                            <p class="mt-2"><small class="text-danger">*</small> <small> obavezna polja.</small></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mx-auto mt-3">
                            <input type="submit" class="btn_full text-capitalize" value="Poruči!"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
