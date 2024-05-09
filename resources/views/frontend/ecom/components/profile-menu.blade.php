<div class="dashboard-menu">
    <ul class="nav flex-column" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('profile.index') ? 'active' : '' }}" href="{{ route('profile.index') }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('order.index') ? 'active' : '' }}" href="{{ route('order.index') }}"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('order.track') ? 'active' : '' }}" href="{{ route('order.track') }}"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
        </li>
        <li class="nav-item">
            <a class='nav-link' href='page-login.html'><i class="fi-rs-sign-out mr-10"></i>Logout</a>
        </li>
    </ul>
</div>