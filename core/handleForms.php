<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertCarsBtn'])) {

	$query = insertCars($pdo, $_POST['brand'], $_POST['model'], 
		$_POST['gen'], $_POST['license_plate'], $_POST['rental_status']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}

if (isset($_POST['editCarsBtn'])) {
	$query = updateCars($pdo, $_POST['brand'], $_POST['model'], 
		$_POST['gen'], $_POST['license_plate'], $_POST['rental_status'], $_GET['car_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}

if (isset($_POST['deleteCarBtn'])) {
	$query = deleteCars($pdo, $_GET['car_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['editRentalsBtn'])) {
	$query = updateRentals($pdo, $_POST['customerName'], $_POST['customerLicenseNo'], $_POST['rentalDate'], $_POST['returnDate'], $_POST['totalPrice'], $_GET['rental_id']);

	if ($query) {
		header("Location: ../viewprojects.php?car_id=" .$_GET['car_id']);
	}
	else {
		echo "Update failed";
	}

}

if (isset($_POST['insertNewRentalBtn'])) {
	$query = insertRentals($pdo, $_POST['customer_name'], $_POST['licenseNo'], $_GET['car_id']);

	if ($query) {
		header("Location: ../viewprojects.php?car_id=" .$_GET['car_id']);
	}
	else {
		echo "Insertion failed";
	}
}

if (isset($_POST['deleteRentalBtn'])) {
	$query = deleteRental($pdo, $_GET['rental_id']);

	if ($query) {
		header("Location: ../viewprojects.php?car_id=" .$_GET['car_id']);
	}
	else {
		echo "Deletion failed";
	}
}




?>




