<?php include 'includes/session.php'; ?>
<?php
	$conn = $pdo->open();

	$slug = $_GET['product'];
    
    if(isset($_GET['review'])){
        // echo "ton tai";
        $rv = $_GET['review'];        
       $stmt = $conn->prepare("UPDATE products SET review=:review1 WHERE slug=:slug");
        $stmt->execute(['review1'=>$rv, 'slug'=> $slug]);
    }

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);

	    $product = $stmt->fetch();
	    $catid = $product['category_id'];
        $review = $product['review'];
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view
	$now = date('Y-m-d');
	if($product['date_view'] == $now){
		$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid']]);
	}
	else{
		$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
	}

    
    

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">

<div class="wrapper">

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
                        <li class="active"><a href="shop.php">Các sản phẩm</a></li>
                        <li><a href="cart_view.php">Giỏ hàng</a></li>
                        <li><a href="checkout.php">Thanh toán</a></li>
                        <li><a href="contact.html">Liên hệ</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Chi Tiết Sản Phẩm</h2>
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
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
						    $stmt->execute(['catid' => $catid]);
						    foreach ($stmt as $row) {
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
						   
						}
						catch(PDOException $e){
							echo "Lỗi kết nối: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 

                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="index.php">Trang chủ</a>
                            <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a>
                            <a href="product.php?product=<?php echo $product['slug']; ?>"><?php echo $product['prodname']; ?></a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>" alt="">
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $product['prodname']; ?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo $product['price']; ?></ins>
                                    </div>    
                                    
                                    <form id="productForm" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                             <input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a>. </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Đánh giá</a></li>                                                                                     
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Mô tả</h2>  
                                                <p><?php echo $product['description']; ?></p>

                                            </div>
                                            
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                
                                                <?php
                                                    
                                                    if(isset($_SESSION['user'])){
                                                        $chuoi =<<<EOD
                                                            <h2>Đánh giá </h2>
                                                            <p>$review</p>
                                                            <p></p>
                                                            <form  action="product.php?product=$slug" class="checkout" name="checkout">
                                                                <input type="hidden" name="product" value="$slug">
                                                                <p><label for="review">Ý kiến đóng góp</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                                <p><input type="submit" value="Gửi"></p>
                                                               
                                                            </form>
                                                            EOD;
                                                        echo $chuoi;
                                                    }
                                                    else{

                                                        echo "
                                                            <h2>Đánh giá </h2>
                                                            <p>$review</p>
                                                            <form  action='login.php' class='checkout' name='checkout'>
                                                                <input type='hidden' name='product' value='$slug'>
                                                                <p>bạn cần <input type='submit' value='đăng nhập'>để đánh giá</p>
                                                                <input type='hidden' name='href' value='product'>
                                                            </form>
                                                            
                                                        ";
                                                    }
                                                ?>


                                                
                                            </div> 
                                                                                  
                                        </div>
                                        
                                    </div>
                                    
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
    </div>
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    <?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script>
  </body>
</html>