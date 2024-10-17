<?php
    require_once 'dbConfig.php';

    function insertVendors($pdo, $first_name, $last_name, $date_of_birth){
        $sql = "INSERT INTO vendors (first_name, last_name, date_of_birth) VALUES(?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth]);

        if ($executeQuery){
            return true;
    }
}