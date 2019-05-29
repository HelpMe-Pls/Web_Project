<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> Yêu thích</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> Giỏ hàng</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Thanh toán</a></li>
                            <li><a href="contact.html"><i class="fa fa-user"></i> Đăng nhập</a></li>
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
                        <h1><a href="./"><img src="imgs/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Giỏ hàng - <span class="cart-amunt">0</span> <span <span style="color: #5a88ca; font-weight: 700;">đ</span><i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
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
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><a href="shop.html">Các sản phẩm</a></li>
                        <li><a href="single-product.html">Chi tiết sản phẩm</a></li>
                        <li class="active"><a href="cart.html">Giỏ hàng</a></li>
                        <li><a href="checkout.html">Thanh toán</a></li>
                        <li><a href="contact.html">Liên hệ</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Giỏ hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Tìm kiếm sản phẩm</h2>
                        <form action="#">
                            <input type="text" placeholder="tên sản phẩm...">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Danh mục sản phẩm</h2>
                        <div class="thubmnail-recent">
                            <img src="imgs/Headphones/headphone1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html?id=21">GSP500</a></h2>
                            <div class="product-sidebar-price">
                                <ins>700000đ</ins> <del>720000đ</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="imgs/Headphones/headphone2.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html?id=22">Uniform</a></h2>
                            <div class="product-sidebar-price">
                                <ins>600000đ</ins> <del>800000đ</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="imgs/Headphones/headphone3.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html?id=23">Victor</a></h2>
                            <div class="product-sidebar-price">
                                <ins>69000đ</ins> <del>79000đ</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="imgs/Headphones/headphone4.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html?id=23">Whiskey</a></h2>
                            <div class="product-sidebar-price">
                                <ins>99000đ</ins> <del>100000đ</del>
                            </div>                             
                        </div>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Bài đăng gần đây</h2>
                        <ul>
                            <li><a href="single-product.html?id=1">Tai nghe Alfa</a></li>
                            <li><a href="single-product.html?id=2">Tai nghe Bravo</a></li>
                            <li><a href="single-product.html?id=3">Tai nghe Charlie</a></li>
                            <li><a href="single-product.html?id=4">Tai nghe Delta</a></li>
                            <li><a href="single-product.html?id=5">Tai nghe Echo</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>  
                                            <th class="product-thumbnail">Ảnh</th>                                     
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody class="shop-table">
                                        
                                        
                                    </tbody>

                                </table>
                            </form>
							<?php
	        			if(isset($_SESSION['user'])){
	        				echo '<a href="checkout.php" title"Check Out" class="btn btn-success">Thanh toán</a>';
	        			}
	        			else{
	        				echo "
	        					<h4>Bạn cần <a href='login.php'>Đăng nhập</a> để thanh toán.</h4>
	        				";
	        			}
	        		?>
                            <div class="cart-collaterals">


                            <div class="cross-sells">
                                <h2>Có thể bạn sẽ thích..</h2>
                                <ul class="products">
                                    <li class="product">
                                        <a href="single-product.html?id=21">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="imgs/Headphones/headphone1.jpg">
                                            <h3>GSP500</h3>
                                            <span class="price"></span>700000đ</span>
                                        </a>
                                    </li>

                                    <li class="product">
                                        <a href="single-product.html?id=22">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="imgs/Headphones/headphone2.jpg">
                                            <h3>Uniform</h3>
                                            <span class="price"></span>720000đ</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            <div class="cart_totals ">
                                <h2>Tổng thanh toán</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Giá đơn hàng</th>
                                            <td><span class="amount">0</span><span>đ</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Phí ship </th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Tổng giá trị đơn hàng</th>
                                            <td><strong><span class="amount">0</span><span>đ</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <form method="post" action="#" class="shipping_calculator">
                                <h2><a class="shipping-calculator-button" data-toggle="collapse" href="#calcalute-shipping-wrap" aria-expanded="false" aria-controls="calcalute-shipping-wrap">Tính tiền ship</a></h2>

                                <section id="calcalute-shipping-wrap" class="shipping-calculator-form collapse">

                                <p class="form-row form-row-wide">
                                <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                    <option value="">Select a country…</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AF">Afghanistan</option>                                    
                                </select>
                                </p>

                                <p class="form-row form-row-wide"><input type="text" id="calc_shipping_state" name="calc_shipping_state" placeholder="Nơi ở" value="" class="input-text"> </p>

                                <p class="form-row form-row-wide"><input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Mã Postcode / Zip" value="" class="input-text"></p>


                                <p><button class="button" value="1" name="calc_shipping" type="submit">Cập nhật giá tiền</button></p>

                                </section>
                            </form>


                            </div>
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
                            <li><a href="#">Tài khoản</a></li>
                            <li><a href="#">Lịch sử ngân hàng</a></li>
                            <li><a href="#">Các sản phẩm bán chạy</a></li>
                            <li><a href="#">Thông tin nhà cung cấp</a></li>
                            <li><a href="#">Trang chủ</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Các loại sản phẩm </h2>
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
                                <input type="submit" value="Đăng ký">
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
     <script src="js/shopcart.js"></script>
     <script>
var total = 0;
$(function(){
	$(document).on('click', '.cart_delete', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'cart_delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.minus', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		if(qty>1){
			qty--;
		}
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.add', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		qty++;
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	getDetails();
	getTotal();

});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
		dataType: 'json',
		success: function(response){
			$('.shop-table').html(response);
			getCart();
		}
	});
}

function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'cart_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}
</script>

</body>
</html>