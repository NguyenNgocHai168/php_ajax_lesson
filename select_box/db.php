<?php
$conn = new mysqli("localhost","root","","ajax_lesson");

// Check connection
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
} 
// else {
//     echo "connected successfully!";
// }
