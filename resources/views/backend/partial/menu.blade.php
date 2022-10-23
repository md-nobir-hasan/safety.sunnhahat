<li class="nav-item">
    <a href="{{ route('admin') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

{{-- Category Management  --}}
<li class="nav-item {{ Request::is('category/*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Category
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('category.index') }}"
                class="nav-link {{ Request::is('category/index') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Show Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('category.create') }}"
                class="nav-link {{ Request::is('category/create') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Add Category</p>
            </a>
        </li>
    </ul>
</li>

{{-- Shipping Management  --}}
<li class="nav-item {{ Request::is('shipping/*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Shipping
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('shipping.index') }}"
                class="nav-link {{ Request::is('shipping/index') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Show Shipping</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('shipping.create') }}"
                class="nav-link {{ Request::is('shipping/create') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Add Shipping</p>
            </a>
        </li>
    </ul>
</li>

{{-- Brand  Management  --}}
<li class="nav-item {{ Request::is('brand/*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Brand
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('brand.index') }}" class="nav-link {{ Request::is('brand/index') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Show Brand</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('brand.create') }}" class="nav-link {{ Request::is('brand/create') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Add Brand</p>
            </a>
        </li>
    </ul>
</li>

{{-- Product Management  --}}
<li class="nav-item {{ Request::is('product/*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Product
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('product.index') }}"
                class="nav-link {{ Request::is('product/index') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Show Product</p>
            </a>
        </li>
        @if (Auth::user()->roll == 'super_admin')
            <li class="nav-item">
                <a href="{{ route('product.create') }}"
                    class="nav-link {{ Request::is('product/create') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Add Product</p>
                </a>
            </li>
        @endif
    </ul>
</li>


{{-- Order Management  --}}
<li class="nav-item {{ Request::is('order/*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Order
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('order.index') }}" class="nav-link {{ Request::is('order/index') ? 'active' : '' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Show Order</p>
            </a>
        </li>
    </ul>
</li>

{{-- Add Order status   --}}
@if (Auth::user()->roll == 'super_admin')
    <li class="nav-item {{ Request::is('order-status/*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Order Status
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('order-status.index') }}"
                    class="nav-link {{ Request::is('order/index') ? 'active' : '' }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Show Order status</p>
                </a>
            </li>
        </ul>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('order-status.create') }}"
                    class="nav-link {{ Request::is('order/index') ? 'active' : '' }}">
                    <i class="nav-icon far fa-plus"></i>
                    <p>Add Order status</p>
                </a>
            </li>
        </ul>
    </li>
@endif
