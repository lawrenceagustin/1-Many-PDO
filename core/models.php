<?php

    function insertCars($pdo, $brand, $model, $gen, $license_plate, $rental_status){
        $sql = "INSERT INTO cars (brand, model, license_plate, rental_status) VALUES(?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$brand, $model, $license_plate, $rental_status]);

        if ($executeQuery){
            return true;
    }
}

    function getAllCars($pdo) {
	    $sql = "SELECT * FROM cars";
	    $stmt = $pdo->prepare($sql);
	    $executeQuery = $stmt->execute();

	    if ($executeQuery) {
		    return $stmt->fetchAll();
	}
}

    function getCarsByID($pdo, $car_id) {
	    $sql = "SELECT * FROM cars WHERE car_id = ?";
	    $stmt = $pdo->prepare($sql);
	    $executeQuery = $stmt->execute([$car_id]);

	    if ($executeQuery) {
		    return $stmt->fetch();
	}
}

	function updateCars($pdo, $brand, $model, 
		$gen, $license_plate, $rental_status, $car_id) {

		$sql = "UPDATE cars
								SET brand = ?,
										model = ?,
										gen = ?, 
										license_plate = ?,
										rental_status = ?
								WHERE car_id = ?
			";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$brand, $model, 
						$gen, $license_plate, $rental_status, $car_id]);
	
		if ($executeQuery) {
			return true;
		}
}

function deleteWebDev($pdo, $car_id) {
	$deleteCars= "DELETE FROM cars WHERE car_id = ?";
	$deleteStmt = $pdo->prepare($deleteCars);
	$executeDeleteQuery = $deleteStmt->execute([$car_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM cars WHERE car_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$car_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}

function getRentalsByCarID($pdo, $car_id) {
	
	$sql = "SELECT 
				rentals.rental_id AS rental_id,
				rentals.car_id AS car_id,
				cars.model AS model,
				rentals.customer_name AS customer_name,
				rentals.customer_licenseNo AS customer_licenseNo,
				rentals.rental_date AS rental_date,
				rentals.return_date AS return_date,
				rentals.total_price AS total_price,
				rentals.date_added AS date_added
			FROM rentals
			JOIN cars ON rentals.car_id = cars.car_id
			WHERE rentals.car_id = ? 
			GROUP BY rentals.customer_name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$car_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function insertRentals($pdo, $customer_name, $customer_licenseNo, $car_id, $rental_date, $return_date, $total_price) {
	$sql = "INSERT INTO rentals (customer_name, customer_licenseNo, car_id, rental_date, return_date, total_price) VALUES (?,?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_name, $customer_licenseNo, $car_id, $rental_date, $return_date, $total_price]);
	if ($executeQuery) {
		return true;
	}

}

function getAllRentals($pdo) {
	$sql = "SELECT * FROM rentals";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
}
}

function getRentalsByID($pdo, $rental_id) {
	$sql = "SELECT 
				rentals.rental_id AS rental_id,
				rentals.customer_name AS customer_name,
				rentals.customer_licenseNo AS customer_licenseNo,rentals.rental_date AS rental_date,
				rentals.return_date AS return_date,
				rentals.total_price AS total_price,
				rentals.date_added AS date_added,
			FROM rentals
			JOIN cars ON rentals.car_id = cars.car_id
			WHERE rentals.rental_id  = ? 
			GROUP BY rentals.customer_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$rental_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateRentals($pdo, $customer_name, $customer_licenseNo, $return_date, $rental_date, $total_price, $rental_id) {
	$sql = "UPDATE rentals
			SET customer_name = ?,
					customer_licenseNo = ?,
					rental_date = ?,
					return_date = ?,
					total_price = ?
			WHERE rental_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$customer_name, $customer_licenseNo, $return_date, $rental_date, $total_price, $rental_id_]);

	if ($executeQuery) {
		return true;
	}
}

function deleteProject($pdo, $project_id) {
	$sql = "DELETE FROM projects WHERE project_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return true;
	}
}

function deleteRental($pdo, $rental_id) {
	$sql = "DELETE FROM rentals WHERE rental_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$rental_id]);
	if ($executeQuery) {
		return true;
	}
}
?>