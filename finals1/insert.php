<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

	<?php  
		if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
			$class = $_SESSION['status'] == "200" ? "success-message" : "error-message";
			echo "<div class='message $class'>{$_SESSION['message']}</div>";
		}
		unset($_SESSION['message']);
		unset($_SESSION['status']);
	?>

	<h1>Insert the user!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="first_name">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="last_name">
		</p>
		<p>
			<label for="firstName">Gender</label> 
			<input type="text" name="gender">
		</p>
		<p>
			<label for="firstName">Specialization</label> 
			<input type="text" name="specialization">
		</p>
		<p>
			<label for="firstName">Years of Experience</label> 
			<input type="text" name="years_of_experience">
            <input type="submit" name="insertUserBtn">
		</p>
	</form>
</body>
</html>