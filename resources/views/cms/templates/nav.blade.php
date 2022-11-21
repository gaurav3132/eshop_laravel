<header class="row">
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('cms.dashboard.index')}}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(auth('cms')->user()->type=='Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cms.staffs.index')}}"><i class="fa-solid fa-users me-2"></i>Staffs</a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cms.categories.index') }}"><i class="fa-solid fa-tags me-2"></i>Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cms.brands.index') }}"><i class="fa-solid fa-star me-2"></i>Brands</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cms.products.index')}}"><i class="fa-solid fa-gifts me-2"></i>Products</a>
                    </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cms.sliders.index')}}"><i class="fa-solid fa-images me-2"></i>Sliders</a>
                        </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-user-friends me-2"></i>Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-comments me-2"></i>Reviews</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-money-bill me-2"></i>Orders</a>
                    </li>
                </ul>

                <ul class="navbar-nav mb-3 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-circle me-2"></i> {{auth('cms')->user()->name}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('cms.profile.edit') }}">
                                    <i class="fa-solid fa-user-edit me-2"></i>Edit Profile
                                </a></li>
                            <li><a class="dropdown-item" href="{{route('cms.password.edit')}}">
                                    <i class="fa-solid fa-asterisk me-2"></i>Change Password
                                </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{route('cms.logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-link dropdown-item rounded-0">
                                        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>


            </div>
        </div>
    </nav>



</header>

