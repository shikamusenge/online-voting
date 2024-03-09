<?php
if(!$_SESSION['type']==1)
{
    echo"<script>alert('You are not allowed to access this page');history.back();</script>";
}
?>