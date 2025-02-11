
<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM category WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Danh mục đã tồn tại';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO category (name, cat_slug) VALUES (:name,:slug)");
				$stmt->execute(['name'=>$name, 'slug'=>$slug]);
				$_SESSION['success'] = 'Danh mục đã được thêm';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Vui lòng điền vào mẫu danh mục';
	}

	header('location: category.php');

?>