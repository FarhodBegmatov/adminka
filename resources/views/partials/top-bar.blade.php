<div id="topbar" class="hoc clear">
    <div class="fl_right">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="fl_left">
        <ul class="nospace">
            <li><i class="fas fa-phone rgtspace-5"></i> +998 94 659 08 90</li>
            <li><i class="fas fa-envelope rgtspace-5"></i>farhodktiat@gmail.com</li>
        </ul>
    </div>
</div>
