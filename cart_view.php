<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body>

<?php include 'includes/navbar.php' ?>
    
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

                         <?php
                            $now = date('Y-m-d');
                            $conn = $pdo->open();

                            $stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 3");
                            $stmt->execute(['now'=>$now]);
                            foreach($stmt as $row){
                                $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                echo '
                                <div class="thubmnail-recent">
                                        <img src="'.$image.'" class="recent-thumb" alt="">
                                        <h2><a href="product.php?product='.$row['slug'].'">'.$row['name'].'</a></h2>
                                        <div class="product-sidebar-price">
                                            <ins>'.$row['price'].'</ins>
                                        </div>                             
                                    </div> 
                                            
                                ';
                            }

                            $pdo->close();
                        ?>
                        
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
                            <div class="cart-collaterals" style="margin-top: 50px;">


                            <div >
                                <h2>Có thể bạn sẽ thích..</h2>
                                <ul class="products">
<?php
                $now = date('Y-m-d');
                $conn = $pdo->open();

                $stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 3");
                $stmt->execute(['now'=>$now]);
                foreach($stmt as $row){
                    $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                    echo '
                        
                                    <li class="product">
                                        <a href="product.php?product='.$row['slug'].'">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="'.$image.'">
                                            <h3>'.$row['name'].'</h3>
                                            <span class="price"></span>'.$row['price'].'</span>
                                        </a>
                                    </li>
                                
                    ';
                }

                $pdo->close();
            ?>
                
            </ul>

                            </div>

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
   
 <?php include 'includes/scripts.php'; ?>
    
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