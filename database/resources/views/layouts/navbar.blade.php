<div class="menu active">
    <div class="heading">
        <p>Admin</p>
        <div class="menu-icon js-toggle-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="wrap">
        <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
        <a href="{{ route('admin.profile.index') }}">Account</a>

        <p class="title">Management</p>

        <a href="{{ route('admin.user.index') }}">Users management</a>
        <a href="{{ route('admin.banner.index') }}">Banners management</a>
        <a href="{{ route('admin.product.index') }}">Products management</a>
        <a href="{{ route('admin.category.index') }}">Categories management</a>
        <a href="{{ route('admin.order.index') }}">Orders management</a>

{{--        <div class="dropdown">--}}
{{--            <p>Dropdown</p>--}}
{{--            <div class="links">--}}
{{--                <a href="">Dropdown Item</a>--}}
{{--                <a href="">Dropdown Item</a>--}}
{{--                <a href="">Dropdown Item</a>--}}
{{--                <a href="">Dropdown Item</a>--}}
{{--                <a href="">Dropdown Item</a>--}}
{{--                <a href="">Dropdown Item</a>--}}
{{--                <a href="">Dropdown Item</a>--}}
{{--                <a href="">Dropdown Item</a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <p class="title">Legal Section</p>--}}

{{--        <div class="dropdown">--}}
{{--            <p>Documents</p>--}}
{{--            <div class="links">--}}
{{--                <a href="">Contract</a>--}}
{{--                <a href="">Employee Handbook</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <a href="">Terms &amp; Conditions</a>--}}
{{--        <a href="">Copyright Details</a>--}}
    </div>
</div>
