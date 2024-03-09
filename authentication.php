<?php
session_start();
if(!isset($_SESSION['Current_User_Id'])){
    echo"<script>alert('Sorry!! You must first login to access this page!!!');location.href='index.php';</script>";
}
?>