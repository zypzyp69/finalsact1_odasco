<?php  

require_once 'dbConfig.php';
require_once 'models.php';


	

if (isset($_POST['insertUserBtn'])) { $first_name = trim($_POST['first_name']); $last_name = trim($_POST['last_name']); $gender = trim($_POST['gender']);
	$specialization = trim($_POST['specialization']); $years_of_experience = trim($_POST['years_of_experience']);
    if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($specialization) && !empty($years_of_experience)){
        $insertUser = insertNewUser($pdo,$_POST['first_name'], $_POST['last_name'],  $_POST['gender'], $_POST['specialization'], $_POST['years_of_experience']);

                if ($insertUser['status' == '200']) {
                    $_SESSION['message'] = $insertUser['message'];
                    $_SESSION['status'] = $insertUser['status'];
                    header("Location: ../index.php");
                }
                else {
                    $_SESSION['message'] = $insertUser['message'];
                    $_SESSION['status'] = $insertUser['status'];
                    header("Location: ../index.php");
                }
    }
    else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = "400";
		header("Location: ../index.php");
    }
}

if (isset($_POST['editUserBtn'])) {

	$editUser = editUser($pdo,$_POST['first_name'], $_POST['last_name'], $_POST['gender'],  $_POST['specialization'], $_POST['years_of_experience'], $_GET['id']);

	if ($editUser['status' == '200']) {
		$_SESSION['message'] = $editUser['message'];
		$_SESSION['status'] = $editUser['status'];
		header("Location: ../index.php");
	}
	else {
		$_SESSION['message'] = $editUser['message'];
		$_SESSION['status'] = $editUser['status'];
		header("Location: ../index.php");
	}
}


if (isset($_POST['deleteUserBtn'])) {
	$deleteUser = deleteUser($pdo,$_GET['id']);

	if ($deleteUser['status' == '200']) {
		$_SESSION['message'] = $deleteUser['message'];
		$_SESSION['status'] = $deleteUser['status'];
		header("Location: ../index.php");
	}
	else {
		$_SESSION['message'] = $deleteUser['message'];
		$_SESSION['status'] = $deleteUser['status'];
		header("Location: ../index.php");
	}
}

if (isset($_GET['searchBtn'])) {
	$searchForAUser = searchForAUser($pdo, $_GET['searchInput']);
	foreach ($searchForAUser as $row) {
		echo "<tr> 
				<td>{$row['id']}</td>
				<td>{$row['first_name']}</td>
				<td>{$row['last_name']}</td>
				<td>{$row['gender']}</td>
				<td>{$row['specialization']}</td>
				<td>{$row['years_of_experience']}</td>
			  </tr>";
	}
}

