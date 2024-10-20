<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Rentals</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewprojects.php?car_id=<?php echo $_GET['car_id']; ?>">
	View The Rentals</a>
	<h1>Edit the rentals!</h1>
	<?php $getRentalsByID = getRentalsByID($pdo, $_GET['rental_id']); ?>
	<form action="core/handleForms.php?rental_id=<?php echo $_GET['rental_id']; ?>
	&car_id=<?php echo $_GET['car_id']; ?>" method="POST">
		<p>
			<label for="customerName">Customer Name</label> 
			<input type="text" name="customerName" 
			value="<?php echo $getProjectByID['costumer_name']; ?>">
		</p>
    <p>
			<label for="customerLicenseNo">License No.</label> 
			<input type="text" name="customerLicenseNo" 
			value="<?php echo $getProjectByID['costumer_licenseNo']; ?>">
		</p>
    <p>
			<label for="rentalDate">Rental Date</label> 
			<input type="text" name="rentalDate" 
			value="<?php echo $getProjectByID['rental_date']; ?>">
		</p>
    <p>
			<label for="returnDate">Return Date</label> 
			<input type="text" name="returnDate" 
			value="<?php echo $getProjectByID['return_date']; ?>">
		</p>
    <p>
			<label for="totalPrice">Total Price</label> 
			<input type="text" name="totalPrice" 
			value="<?php echo $getProjectByID['total_price']; ?>">
		</p>
		<p>
			<input type="submit" name="editRentalsBtn">
		</p>
	</form>
</body>
</html>