CREATE TABLE vendors {
    vendor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    date_of_birth VARCHAR (50),
    date_added DATE CURRENT_TIMESTAMP
}

CREATE TABLE stalls {
    stall_id INT AUTO_INCREMENT PRIMARY KEY,
    shop_name VARCHAR (50),
    shop_category TEXT,
    vendor_id INT,
    date_added DATE CURRENT_TIMESTAMP
}