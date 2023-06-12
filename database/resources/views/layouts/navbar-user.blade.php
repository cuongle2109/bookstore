<nav class="navbar navbar-light navbar-expand-lg block-navbar">
    <div class="container">
        <a class="navbar-brand mr-auto" href="{{ route('mypage.home.index') }}">
            <i class="fa fa-cloud-download"></i>
            Home
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav block-navbar__left">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('mypage.product-by-category.index') }}">
                        <i class="fa fa-th-large"></i>
                        Product
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="productDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-th-large"></i>
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="productDropdown">
                        @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('mypage.product-by-category.show', $category->id) }}">{{ $category['name'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <form action="{{ route('') }}">

                    </form>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 block-navbar__right">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mypage.view-cart.index') }}">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="totalQuantityCart"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
