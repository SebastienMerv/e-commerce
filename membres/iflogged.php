<?php 

if(isset($_SESSION['logged_in'])) {
    if($_SESSION['logged_in'] != true) {
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}

