<?php include 'includes/session.php'; ?>
<?php
	$output = '';
	if(!isset($_GET['code']) OR !isset($_GET['user'])){
		$output .= '
			<div class="alert alert-danger">
                <h4><i class="icon fa fa-warning"></i> Error!</h4>
                Mã kích hoạt không tồn tại
            </div>
            <h4>Bạn có thể <a href="signup.php">Đăng ký</a>hoặc trở về <a href="index.php">Trang chủ</a>.</h4>
		'; 
	}
	else{
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE activate_code=:code AND id=:id");
		$stmt->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			if($row['status']){
				$output .= '
					<div class="alert alert-danger">
		                <h4><i class="icon fa fa-warning"></i> Error!</h4>
		                Tài khoản đã được kích hoạt.
		            </div>
		            <h4>Bạn có thể <a href="login.php">Đăng nhập</a> hoặc trở về <a href="index.php">Trang chủ</a>.</h4>
				';
			}
			else{
				try{
					$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
					$stmt->execute(['status'=>1, 'id'=>$row['id']]);
					$output .= '
						<div class="alert alert-success">
			                <h4><i class="icon fa fa-check"></i> Hoàn thành!</h4>
			                Tài khoản được kích hoạt - Email: <b>'.$row['email'].'</b>.
			            </div>
			             <h4>Bạn có thể <a href="login.php">Đăng nhập</a> hoặc trở về <a href="index.php">Trang chủ</a>.</h4>
					';
				}
				catch(PDOException $e){
					$output .= '
						<div class="alert alert-danger">
			                <h4><i class="icon fa fa-warning"></i> Error!</h4>
			                '.$e->getMessage().'
			            </div>
			            <h4>Bạn có thể <a href="signup.php">Đăng ký</a>hoặc trở về <a href="index.php">Trang chủ</a>.</h4>
					';
				}

			}
			
		}
		else{
			$output .= '
				<div class="alert alert-danger">
	                <h4><i class="icon fa fa-warning"></i> Error!</h4>
	                Không thể kích hoạt. Sai mã
	            </div>
	            <h4>Bạn có thể <a href="signup.php">Đăng ký</a>hoặc trở về <a href="index.php">Trang chủ</a>.</h4>
			';
		}

		$pdo->close();
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php echo $output; ?>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>