<?php
session_start();

if(isset($_SESSION['id'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    header("Location: gues.php");
} else {
    header("Location: gues.php");
 session_destroy();
}
?>