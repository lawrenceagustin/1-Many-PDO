<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Rentals</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $getRentalsIDData = getRentalsByID($_GET['rental_id']); ?>
	<h1>Name: <?php echo $getRentalsIDData['customer_name']; ?></h1>
  <h1>License Number: <?php echo $getRentalsIDData['customer_licenseNo']; ?></h1>

	<h1>Add New Customer</h1>
	<form action="core/handleForms.php?car_id=<?php echo $_GET['car_id']; ?>" method="POST">
		<p>
			<label for="customerName">Customer Name</label> 
			<input type="text" name="customer_name">
		</p>
		<p>
			<label for="licenseNo">License No.</label> 
			<input type="text" name="licenseNo">
			<input type="submit" name="insertNewRentalBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Rental ID</th>
	    <th>Customer Name</th>
	    <th>Car Rented</th>
	    <th>Return Date</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getRentalsByCarID = getRentalsByCarID($pdo, $_GET['car_id']); ?>
	  <?php foreach ($getRentalsByCarID as $row) { ?>
	  <tr>
	  	<td><?php echo $row['rental_id']; ?></td>	  	
	  	<td><?php echo $row['customer_name']; ?></td>	  	
	  	<td><?php echo $row['model']; ?></td>	  	
	  	<td><?php echo $row['return_date']; ?></td>	  	
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editrentals.php?rental_id=<?php echo $row['rental_id']; ?>&car_id=<?php echo $_GET['car_id']; ?>">Edit</a>

	  		<a href="deleterentals.php?rental_id=<?php echo $row['rental_id']; ?>&car_id=<?php echo $_GET['car_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>