<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		//dữ liệu user nhập vào
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;	//gán cho session tương ứng
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;

		// if(!isset($_SESSION['captcha'])){
		// 	require('recaptcha/src/autoload.php');		
		// 	$recaptcha = new \ReCaptcha\ReCaptcha('6LevO1IUAAAAAFCCiOHERRXjh3VrHa5oywciMKcw', new \ReCaptcha\RequestMethod\SocketPost());
		// 	$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		// 	if (!$resp->isSuccess()){
		//   		$_SESSION['error'] = 'Please answer recaptcha correctly';
		//   		header('location: signup.php');	
		//   		exit();	
		//   	}	
		//   	else{
		//   		$_SESSION['captcha'] = time() + (10*60);
		//   	}

		// }

		if($password != $repassword){
			$_SESSION['error'] = 'Không đúng mật khẩu';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email đã tồn tại';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :code, :now)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now]);
					$userid = $conn->lastInsertId();

					$message = "
						<h2>Cảm ơn bạn đã đăng ký.</h2>
						<p>Tài khoản:</p>
						<p>Email: ".$email."</p>
						<p>Mật khẩu: ".$_POST['password']."</p>
						<p>Click vào link để kích hoạt.</p>
						<a href='http://localhost/Test/activate.php?code=".$code."&user=".$userid."'>Kích hoạt tài khoản</a>
					";

					//Load phpmailer
		    		require 'vendor/autoload.php';

		    		$mail = new PHPMailer(true);                             
				    try {
				        //Server settings
						$mail->isSMTP();            
						$mail->SMTPDebug = 2;                         
				        $mail->Host = 'smtp.gmail.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'kerikuni12@gmail.com';     
				        $mail->Password = 'kuyeuco1';                    
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            	'verify_peer' => false,
				            	'verify_peer_name' => false,
				            	'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'ssl';     //tls                      
				        $mail->Port = 465; 	//587                                 

				        $mail->setFrom('kerikuni12@gmail.com');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('kerikuni12@gmail.com');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'Dang ky tai khoan';
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

				        $_SESSION['success'] = 'Tài khoản đã được tạo. Kiểm tra email của bạn để kích hoạt.';
				        header('location: signup.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location: signup.php');
				    }


				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>