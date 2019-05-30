<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
 <body>
    <?php include 'includes/navbar.php'; ?>

    
    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="imgs/Homepage/earbuds1.jpg" alt="WH-1000XM3">
						<div class="caption-group">
							<h2 class="caption title">
								Alfa <span class="primary"> <strong>WH-1000XM3</strong></span>
							</h2>
							<h4 class="caption subtitle">Đỉnh cao của âm thanh</h4>
							<a   class="caption homeslide button-radius" href="single-product.html?id=1"><span class="icon"></span>Mua ngay</a>
						</div>
					</li>
					<li><img src="imgs/Homepage/earbuds2.jpg" alt="Roccat Syva">
						<div class="caption-group">
							<h2 class="caption title">
								Bravo <span class="primary">giảm <strong> 50%</strong></span>
							</h2>
							<h4 class="caption subtitle">Âm thanh sống động, tinh tế</h4>
							<a class="caption homeslide button-radius" href="single-product.html?id=2"><span class="icon"></span>Mua ngay</a>
						</div>
					</li>					
					<li><img src="imgs/Homepage/earbuds3.jpg" alt="iPod">
						<div class="caption-group">
						  <h2 class="caption title">
								Tai nghe <span class="primary"> <strong>Charlie</strong></span>
							</h2>
							<h4 class="caption subtitle">Linh hoạt, gọn nhẹ, âm thanh trung thực</h4>
							<a  class="caption homeslide button-radius" href="single-product.html?id=3"><span class="icon"></span>Mua ngay</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 ngày hoàn trả</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Miễn phí vận chuyển</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Thanh toán an toàn</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>Sản phẩm mới</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản phẩm mới nhất</h2>
                        <div class="product-carousel">

<?php
                        $month = date('m');
                        $conn = $pdo->open();

                        try{
                            $inc = 3;   
                            $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                                $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                $name = $row['name'];
                                $slug =$row['slug'];
                                $price = number_format($row['price'], 2);
                                $inc = ($inc == 3) ? 1 : $inc + 1;
                                //if($inc == 1) echo "<div class='row'>";
                                $chuoi =<<<EOD
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <img src="$image" alt="">
                                            <div class="product-hover">                                                
                                                <a href="product.php?product=$slug" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>
                                            </div>
                                        </div>
                                        
                                        <h2>$name</a></h2>
                                        
                                        <div class="product-carousel-price">
                                            <ins>$price </ins> <del>720000đ</del>
                                        </div> 
                                    </div>
                                EOD;

                                    echo $chuoi;
                                //if($inc == 3) echo "</div>";
                            }
                            //if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
                            //if($inc == 2) echo "<div class='col-sm-4'></div></div>";
                        }
                        catch(PDOException $e){
                            echo "There is some problem in connection: " . $e->getMessage();
                        }

                        $pdo->close();
?> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="imgs/Brand-logos/apple.jpg" alt="">
                            <img src="imgs/Brand-logos/sony.jpg" alt="">
                            <img src="imgs/Brand-logos/grado.png" alt="">
                            <img src="imgs/Brand-logos/bose.jpg" alt="">                                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Bán chạy nhất</h2>                        
                        <?php
                        $month = date('m');
                        $conn = $pdo->open();

                        try{                            
                            $stmt = $conn->prepare("SELECT * FROM products ORDER BY counter DESC LIMIT 3");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                                $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                $name = $row['name'];
                                $slug =$row['slug'];
                                $price = number_format($row['price'], 2);
                               
                                $chuoi =<<<EOD
                                    <div class="single-wid-product">
                                        <a href="$slug"><img src="$image" alt="" class="product-thumb"></a>
                                        <h2><a href="$slug">$name</a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$price đ</ins>
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
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Đã xem gần đây</h2>                        
                         <?php
                        $month = date('m');
                        $conn = $pdo->open();

                        try{                            
                            $stmt = $conn->prepare("SELECT * FROM products ORDER BY date_view DESC LIMIT 3");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                                $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                $name = $row['name'];
                                $slug =$row['slug'];
                                $price = number_format($row['price'], 2);
                               
                                $chuoi =<<<EOD
                                     <div class="single-wid-product">
                                        <a href="$slug"><img src="$image" alt="" class="product-thumb"></a>
                                        <h2><a href="$slug">$name</a></h2>
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
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Đã xem gần đây</h2>                        
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
                                        <a href="$slug"><img src="$image" alt="" class="product-thumb"></a>
                                        <h2><a href="$slug">$name</a></h2>
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
            </div>
        </div>
    </div> <!-- End product widget area -->
    
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
                            <li><a href="shop.html">Sản phẩm</a></li>
                            <li><a href="cart.html">Giỏ hàng</a></li>
                            <li><a href="#">Các sản phẩm bán chạy</a></li>
                            <li><a href="checkout.html">Thanh toán</a></li>
                            <li><a href="index.html">Trang chủ</a></li>
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
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Khách hàng thân thiết</h2>
                        <p>Đăng kí thành viên và những ưu đãi hấp dẫn sẽ được gửi đến mail của bạn</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Nhập email">
                                <input type="submit" value="Đăng kí">
                            </form>
                        </div>
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
   <?php include 'includes/scripts.php'; ?>
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
    <!-- <script src="js/shopcart.js"></script> -->
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>

  </body>
</html>