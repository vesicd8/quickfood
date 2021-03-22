<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form method="POST" action="{{ $action }}" name="review" id="review" class="popup-form">
                <div class="login_icon"><i class="icon_comment_alt"></i></div>
                <input type="hidden" value="{{ $id }}" name="product"/>
                @if($method == 'PUT')
                    @method('PUT')
                @endif
                @csrf
                <textarea name="reviewText" id="review_text" class="form-control form-white" style="height:100px" placeholder="Write your review">@if($userReview){{ $userReview->comment }}@endif</textarea>
                <div class="row">
                    <div class="col-4 mx-auto mt-5">
                        <div class="col-12 d-flex">
                            <div class="col-md-6">
                                <p class="font-weight-bold">Ocena: </p>
                            </div>
                            <div class="col-md-6">
                                <select name="productStars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ $userReview && $userReview->stars == $i ? 'selected' : "" }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Potvrdi" class="btn btn-submit" id="submit-review">
            </form>
        </div>
    </div>
</div>
