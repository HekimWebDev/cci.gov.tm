<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" data-enable-remember="true" href="#"
               role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <div class="ml-4 row">
        <a href="https://app.jivosite.com/chat/inbox" target="_blank" class="btn btn-success mr-2">Jiva chat</a>
        <a href="{{ route('home') }}" class="btn btn-info mr-2">На сайт</a>
        <a href="{{ route('auth.logout') }}" class="btn btn-danger"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Выйти
        </a>
        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</nav>
