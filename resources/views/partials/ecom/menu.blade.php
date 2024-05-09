<ul class="mobile-menu font-heading">
    <li class="hot-deals menu-item-has-children"><img src="{{ url('assets/frontend/imgs/theme/icons/icon-hot.svg') }}" alt="hot deals" /><a href='shop-grid-right.html'>Deals</a></li>
    <li class="menu-item-has-children">
        <a class="{{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
    </li>
    <li class="menu-item-has-children">
        <a class="{{ Route::is('about.index') ? 'active' : '' }}" href="{{ route('about.index') }}">About</a>
    </li>
    <li class="menu-item-has-children">
        <a class="{{ Route::is('shop.index') ? 'active' : '' }}" href="{{ route('shop.index') }}">Shop </a>
    </li>
    <li class="menu-item-has-children">
        <a class="{{ Route::is('vendor.index') ? 'active' : '' }}" href="{{ route('vendor.index') }}">Vendors</a>
    </li>

    <li class="menu-item-has-children">
        <a class="{{ Route::is('blog.index') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog </a>
    </li>

    <li class="menu-item-has-children">
        <a class="{{ Route::is('contact.index') ? 'active' : '' }}" href="{{ route('contact.index') }}">Contact</a>
    </li>
</ul>