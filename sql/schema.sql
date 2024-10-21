CREATE TABLE cars (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(20) NOT NULL,
    model VARCHAR(20) NOT NULL,
    gen VARCHAR(20) NOT NULL,
    license_plate VARCHAR(20) NOT NULL,
    rental_status VARCHAR(20) NOT NULL DEFAULT 'Available',
    date_added DATE DEFAULT CURDATE()
);

CREATE TABLE rentals (
    rental_id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    customer_name VARCHAR(50) NOT NULL,
    customer_licenseNo VARCHAR(20) NOT NULL,
    rental_date DATE NOT NULL DEFAULT CURDATE(),
    return_date DATE NOT NULL DEFAULT CURDATE(), 
    total_price DECIMAL(10, 2) NOT NULL,
    date_added DATE NOT NULL DEFAULT CURDATE() 
);