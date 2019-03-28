<?php
$servername = "172.18.0.2";
$username   = "root";
$password   = "packr123";

// Create connection
$db = new mysqli($servername, $username, $password);

// Check connection
if ($db->connect_error)
{
    exit("Connection failed: " . $db->connect_error);
}

echo "Connected successfully";
?>