<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="index.html">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="current-list-item"><a href="/">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="/#categories">Categories</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="shop.html">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="cart">Cart</a></li>
                                </ul>
                            </li>
                            @if (session('user'))
                                <?php $data =session()->get('user') ?> 
                                <li><a href="logout">Logout</a></li>
                                <li><a href="signin">
                                    <img src="<?php echo asset("myimgs/" .$data[0]->photo) ?>" class="user-img mr-2" alt="">
                                    <?php echo $data[0]->name ?></a>
                                </li>
                            @else
                                <li><a href="/signin">Login</a></li>
                            @endif
                           

                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>