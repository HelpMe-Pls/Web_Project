<?php include 'includes/session.php'; ?>
<?php

   if(isset($_GET['href'])) {
      $_SESSION['href'] = 'product.php?product='.$_GET['product'];     
    }

    if(isset($_SESSION['user'])){
      if (isset($_SESSION['href'])){
        $href =$_SESSION['href'];
     header("location: $href");
      }else header("location: cart_view.php");

      
  }?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="login-box-body">
    	<p class="login-box-msg">Đăng nhập</p>

    	<form action="verify.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback" style="top: 0px;"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback" style="top: 0px;"></span>
          </div>
      		<div class="row">
    			<div style="margin: 0 5%;">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Đăng nhập</button>
        		</div>
      		</div>
    	</form>
      <br>
      
      <a href="signup.php" class="text-center">Đăng ký</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Trang chủ</a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>