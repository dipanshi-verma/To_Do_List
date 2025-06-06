<?php

$server = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'todo_project';

$conn = mysqli_connect($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection with MySQL failed!" . $conn->connect_error);
}
?>