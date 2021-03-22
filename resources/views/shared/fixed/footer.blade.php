<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Secure payments with</h3>
                <p>
                    <img src="{{ asset("assets/img/cards.png") }}" alt="" class="img-fluid">
                </p>
            </div>
            <div class="col-md-4">
                <h3>About</h3>
                <ul>
                    <li><a href="{{ route("home") }}">Početna</a></li>
                    <li><a href="{{ route("menu") }}">Meni</a></li>
                    <li><a href="{{ route("about") }}">O nama</a></li>
                </ul>
            </div>
            <div class="col-md-4" id="newsletter">
                <h3>Newsletter</h3>
                <p>
                    Join our newsletter to keep be informed about offers and news.
                </p>
                <div id="message-newsletter_2">
                </div>
                <form method="post" action="assets/newsletter.php" name="newsletter_2" id="newsletter_2">
                    <div class="form-group">
                        <input name="email_newsletter_2" id="email_newsletter_2" type="email" value="" placeholder="Your mail" class="form-control">
                    </div>
                    <input type="submit" value="Subscribe" class="btn_1" id="submit-newsletter_2">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.google.com/" target="_blank"><i class="fab fa-google"></i></a></li>
                        <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://www.pinterest.com/" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                        <li><a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                    <p>
                        © Quick Food 2021.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="layer"></div>
