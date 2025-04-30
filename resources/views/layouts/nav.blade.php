<div class="navbar">
    <div class="logo">
        <img src="{{asset('assets/img/image.png')}}" alt="Maya Nail Studio Logo" />
    </div>
    <ul class="nav-links">
        <li><a href="/">Home</a></li>
        <li>
            <a href="/services">Our Services </a>
        </li>
        <li><a href="/blog">Blog</a></li>
        <li>
            <a href="/team">Our Technicians</a>
        </li>
    </ul>
    <div class="nav-auth">
        @guest
            <a href="/login" class="login-btn">Login</a>
            <a href="/register" class="signup-btn">Signup</a>
        @endguest

        @auth
            <a href="/profile" class="login-btn">Profile</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="signup-btn">Log Out</button>
            </form>
            
        @endauth
    </div>
</i>
    </div>
