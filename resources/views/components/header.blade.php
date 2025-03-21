<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom py-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">News</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link link-underline-primary {{request()->is('news') ? 'active' : ''}}"
                        href="{{url('/news')}}">All News</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('my_news') ? 'active' : ''}}" href="{{url('/my_news')}}">My
                            News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('account') ? 'active' : ''}}" href="{{url('/account')}}">
                            Account</a>
                    </li>
                    @if(auth()->user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin')}}">
                                Admin Panel</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form method="POST" action="{{url("/logout")}}">
                            @csrf
                            <button class="nav-link">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('/login') ? 'active' : ''}}" href="{{url('/login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('/register') ? 'active' : ''}}"
                            href="{{url("/register")}}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>