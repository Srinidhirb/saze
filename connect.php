<<?php
 //
    /*
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'saze');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (!function_exists('create_unique_id')) {
        function create_unique_id()
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 20; $i++) {
                $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    }
    */

   
$hostname = 'localhost:3306';
$username = 'sazeabsolute';
$password = 'sazeabsolute';
$database = 'saze';

$conn = new mysqli($hostname, $username, $password, $database);


if (!function_exists('create_unique_id')) {
    function create_unique_id()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 20; $i++) {
            $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

    ?>