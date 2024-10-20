CREATE TABLE cars (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(20),
    model VARCHAR(20),
    gen VARCHAR(20),
    license_plate VARCHAR(20),
    rental_status VARCHAR(20),
    date_added DATE DEFAULT CURDATE()
);

CREATE TABLE rentals (
    rental_id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT,
    customer_name VARCHAR(50),
    customer_licenseNo VARCHAR(20),
    rental_date DATE,
    return_date DATE, 
    total_price DECIMAL(10, 2),
    date_added DATE DEFAULT CURDATE() 
);