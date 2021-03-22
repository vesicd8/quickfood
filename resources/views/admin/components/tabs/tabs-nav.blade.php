<nav>
    <ul>
        <li><a href="#section-1"><span> <i class="fas fa-hamburger"></i> Produkti</span></a>
        </li>
{{--        <li><a href="#section-2"><span> <i class="fas fa-utensils"></i> Meals</span></a>--}}
{{--        </li>--}}
        <li><a href="#section-4"><span> <i class="fas fa-cubes"></i> Kategorije</span></a>
        </li>
        <li><a href="#section-3"><span> <i class="fas fa-concierge-bell"></i> Sastojci</span></a>
        </li>
        <li><a href="#section-9"><span> <i class="fas fa-tag"></i> Markeri</span></a>
        </li>
        <li><a href="#section-5"><span> <i class="fas fa-align-right"></i> Recenzije</span></a>
            <div class="notification">
                5
            </div>
        </li>
        <li><a href="#section-6"><span> <i class="fas fa-users"></i> Korisnici</span></a>
            @if($users->notifications > 0)
                <div class="notification">
                    {{ $users->notifications < 100 ? $users->notifications : "99+" }}
                </div>
            @endif
        </li>
        <li><a href="#section-7"><span> <i class="fas fa-envelope-square"></i> Poruke</span></a>
            @if($messages->notifications > 0)
                <div class="notification">
                    {{ $messages->notifications < 100 ? $messages->notifications : "99+" }}
                </div>
            @endif
        </li>
{{--        <li><a href="#section-8"><span> <i class="fas fa-address-card"></i> Account</span></a>--}}
{{--        </li>--}}
    </ul>
</nav>
