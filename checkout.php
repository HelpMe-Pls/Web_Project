<?php include 'includes/session.php'; ?>
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
			              echo '
			                 <form action="./sales.php">
					            <h3>Billing Address</h3>
					            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
					           		<input type="text" id="fname" name="firstname" value="'.$user['firstname'].' '.$user['lastname'].'">
					            <label for="email"><i class="fa fa-envelope"></i> Email</label>
					            	<input type="text" id="email" name="email" value="'.$user['email'].' ">
					            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
					           		<input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
					           <label for="adr"><i class="fa fa-address-card-o"></i> Amount</label>
												<input type="text" id="adr1" name="amount" value="'.$mm.'">
												<input type="hidden" name="pay" value="'.$id.'">
						        <label>
						          	<input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
						        </label>
						        	<input type="submit" value="Continue to checkout" id="chay" class="btn">
						      </form>
			              ';
			            }
			            else{
			              echo "
			                <li><a href='login.php'>LOGIN</a></li>
			                <li><a href='signup.php'>SIGNUP</a></li>
			              ";
			            }
			          ?>

	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script>
var total = 0;
$(function(){	
	$(document).on('click', '#chay', function(e){
		var id = randomString(5, 'PICKCHARSFROMTHISSET');
		e.preventDefault();
		window.location = 'sales.php?pay='+id;
	});
	getDetails();
	console.log(getTotal());


});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
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