<?php 
    $conn = new mysqli('localhost', 'root', 'root', bawebcamp);
    if($conn->connect_error){
        echo $error -> $conn->connect_error;
    }

?>