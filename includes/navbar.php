<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="cart_view.php"><i class="fa fa-user"></i>Giỏ hàng</a></li>
                            <li><a href="checkout.php"><i class="fa fa-user"></i> Thanh toán</a></li>
                            <li><a href="login.php"><i class="fa fa-user"></i> Đăng nhập</a></li>
                            <?php 
                                if(isset($_SESSION['user'])){                                    
                                    echo '<li><a href="profile.php"><i class="fa fa-user"></i>Cá nhân</a></li>';
                                    echo '<li><a href="logout.php"><i class="fa fa-user"></i>Đăng xuất</a></li>';
                                }
                             ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><img src="imgs/logo.png"></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart_view.php" ><i class="fa fa-shopping-cart"></i> <span class="product-count"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
