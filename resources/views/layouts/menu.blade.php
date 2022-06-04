<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
    <a href="{{route('orders.index') }}" class="nav-link {{ Request::is('orders') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tags"></i>
        <p>Orders</p>
    </a>
    <a href="#" class="btn btn-default btn-flat float-right"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Sign out
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>
