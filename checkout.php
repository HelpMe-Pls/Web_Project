<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<body>
   
<?php include 'includes/navbar.php'; ?>
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="shop.php">Các sản phẩm</a></li>
                        <li><a href="cart_view.php">Giỏ hàng</a></li>
                        <li class="active"><a href="checkout.php">Thanh toán</a></li>
                        <li><a href="contact.html">Liên hệ</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
 <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Hoá đơn</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Tìm kiếm sản phẩm</h2>
                        <form action="search.php" method="POST">
                            <input name = "keyword" type="text" placeholder="tên sản phẩm...">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản phẩm bán chạy</h2>
                        <?php
                        $month = date('m');
                        $conn = $pdo->open();

                        try{                            
                            $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 3");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                                $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                $name = $row['name'];
                                $slug =$row['slug'];
                                $price = number_format($row['price'], 2);
                               
                                $chuoi =<<<EOD
                                     <div class="single-wid-product">
                                        <a href="product.php?product=$slug"><img src="$image" alt="" class="product-thumb"></a>
                                        <h2><a href="product.php?product=$slug">$name</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$price</ins> 
                                        </div>                            
                                    </div>
EOD;

                                    echo $chuoi;
                               
                            }
                           
                        }
                        catch(PDOException $e){
                            echo "There is some problem in connection: " . $e->getMessage();
                        }

                        $pdo->close();
?>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                           

                            <?php	        		

			            if(isset($_SESSION['user'])){	
			            $conn = $pdo->open();

						$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products on products.id=cart.product_id WHERE user_id=:user_id");
						$stmt->execute(['user_id'=>$user['id']]);

						$total = 0;
						foreach($stmt as $row){
							$subtotal = $row['price'] * $row['quantity'];
							$total += $subtotal;
						}
						$mm=json_encode($total);
						$pdo->close();	
						$id = 'PAY-'.strtoupper(md5(time()));	             
			              
                          $check = '';

                          if($mm == 0){
                            $check = 'Giỏ hàng trống vui lòng mua hàng để thanh toán';
                          }else $check =  '<input type="submit" data-value="Place order" value="Đặt hàng" id="place_order" name="woocommerce_checkout_place_order" id="chay" class="button checkoutt alt">';

						$chuoi ='
<form  action="./sales.php" class="checkout" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Chi tiết thanh toán</h3>
                                           
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Họ <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="'.$user['firstname'].' '.$user['lastname'].'" placeholder="" id="billing_first_name" name="billing_first_name" class="input-text ">
                                            </p>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Địa chỉ <abbr title="required" class="required">*</abbr>
                                                </label>
                                                
                                                <input type="text" value="" placeholder="Số nhà" id="billing_address_1" name="billing_address_1" class="input-text ">
                                            </p>

                                            
                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Địa chỉ email <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="'.$user['email'].'" placeholder="" id="billing_email" name="billing_email" class="input-text ">
                                            </p>



                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Số điện thoại <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_phone" name="billing_phone" class="input-text ">
                                            </p>

                                            <p id="billing_money" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_money">tien <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="'.$mm.'" placeholder="" id="billing_money" name="billing_money" class="input-text ">
                                                <input type="hidden" name="pay" value="'.$id.'">
                                            </p>
											<label class="" for="billing_money">Phan hoi <abbr title="required" class="required">*</abbr>
                                                </label>
                                            <textarea name="cmt"></textarea>
                                            <div class="clear"></div>                                            

                                        </div>
                                    </div>

                                    </div>

                                </div>
                                <div id="order_review" style="position: relative;">
                                    <div id="payment">
                                        <div class="form-row place-order">'.$check.'</div>
                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>
';
                            echo $chuoi;
                        }
			            else{
			              echo "
			                <li><a href='login.php'>Đăng nhập</a></li>
			                <li><a href='signup.php'>Đăng Ký</a></li>
			              ";
			            }
			          ?>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Shop<span>taiNghe</span></h2>
                        <p>Chuyên cung cấp các mặt hàng tai nghe chất lượng đến từ các hãng tai nghe hàng đầu thế giới</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Xem chi tiết: </h2>
                        <ul>
                            <li><a href="shop.php">Sản phẩm</a></li>
                            <li><a href="cart_view.php">Giỏ hàng</a></li>
                            <li><a href="checkout.php">Thanh toán</a></li>
                            <li><a href="index.php">Trang chủ</a></li>
                        </ul>                       
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Các loại sản phẩm</h2>
                        <ul>
                            <li><a href="shop.html?category=Headphones">Headphone</a></li>
                            <li><a href="shop.html?category=Earbuds">Earbuds</a></li>   
                            <li><a href="shop.html?category=Tai nghe bluetooth">Tai nghe bluetooth</a></li>                      
                        </ul>                        
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2019 All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>

    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
  </body>
</html>