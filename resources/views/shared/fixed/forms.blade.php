<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="{{ route('register') }}" method="POST" class="popup-form" id="myRegister">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                @csrf
                <input type="text" class="form-control form-white" name="firstName" placeholder="Ime">
                <input type="text" class="form-control form-white" name="lastName" placeholder="Prezime">
                <input type="text" class="form-control form-white" name="username" placeholder="Prezime">
                <input type="email" class="form-control form-white" name="email" placeholder="Email">
                <input type="text" class="form-control form-white" name="password" placeholder="Lozinka" id="password1">
                <div id="pass-info" class="clearfix"></div>
                <button type="submit" class="btn btn-submit">Register</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="{{ route('login') }}" method="POST" class="popup-form" id="myLogin">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                @csrf
                <input type="text" class="form-control form-white" name="username" placeholder="Username">
                <input type="password" class="form-control form-white" name="password" placeholder="Password">
                <div class="text-left">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-submit">Submit</button>
            </form>
        </div>
    </div>
</div>
