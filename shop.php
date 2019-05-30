<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
 <body>
   
    <?php include 'includes/navbar.php' ?>
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
                        <h2>Shop Tai Nghe</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>        
          <div class="product-show container">
            <div class="row justify-content-center">
              <?php
                        $month = date('m');
                        $conn = $pdo->open();

                        try{                            
                            $stmt = $conn->prepare("SELECT * FROM products ORDER BY date_view DESC ");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                                $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                $name = $row['name'];
                                $slug =$row['slug'];
                                $price = number_format($row['price'], 2);
                               
                                $chuoi =<<<EOD
                                     <div class="col-lg-3 col-md-4 col-sm-6" style="max-width: 300px; padding: 0">
			                            <div class="single-shop-product" ondragstart="itemDrag(event)" draggable="true" >
			                              <div class="product-upper">
			                                <a href="product.php?product=$slug" draggable="false">
			                                  <img src="$image" alt="" style="display: block; margin: 0 auto; width: 250px; height: 280px;" draggable="false">
			                                  <h2>$name</h2>
			                                </a>
			                              </div>
			                              <div class="product-carousel-price">
			                                <ins>$price<sup>đ</sup></ins>
			                              </div>
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
            
            <div id="shop-pagination" class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination justify-content-center">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <script>
                                function generatePage() {
                                  var pageNumber = Math.ceil(filtedData.length / maxLoad);
                                  var content = `<li class="page-item"><a href="javascript:loadProduct(${1}, filtedData)" class="page-link" href="" aria-label="Trước"><span aria-hidden="true">&laquo;</span></a></li>`;
                                  for (var i = 1; i <= pageNumber; i++) {
                                    content += `<li class="page-item"><a href="javascript:loadProduct(${i}, filtedData)" class="page-link">${i}</a></li>`;
                                  }
                                  content += `<li class="page-item"><a href="javascript:loadProduct(${pageNumber}, filtedData)" class="page-link" href="" aria-label="Sau"><span aria-hidden="true">&raquo;</span></a></li>`;
                                  $('#shop-pagination .product-pagination .pagination').html(content);
                                }
                            </script>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
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
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
     <script src="js/shopcart.js"></script>
     <script>
        function shopFilter(filterStr, searchStr = "") {
          searchStr = searchStr.toLocaleLowerCase();
          filtedData = data.filter(exp => ((filterStr == "" || filterStr == 'undefined') ? true : (exp.Category == filterStr))
            && (exp.Category.toLocaleLowerCase().includes(searchStr) || exp.NameSP.toLocaleLowerCase().includes(searchStr)));
          loadProduct(1, filtedData);
          generatePage();
        }
        function shopSort(desc) {
          filtedData.sort((a, b) => desc ? a.SaleSP < b.SaleSP : a.SaleSP > b.SaleSP);
          loadProduct(1, filtedData);
        }
        $(document).ready(function () {
          var param = new URLSearchParams(window.location.search);
          var filterStr = param.get('category') || "";
          var searchStr = param.get('q') || "";
          // console.log($('#categoryFilter').text());
          $('#categoryFilter').val(filterStr);
          shopFilter(filterStr, searchStr);
        });
      </script>
  </body>
  </html>