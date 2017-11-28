<?php
include 'function.php';

if (isset($_SESSION['username'])){

if (isset($_GET['delete_id'])){  
   Delete($_GET['delete_id'], "bap_records", "id", "Location:view_bap_rec.php");
   }
 else {
     echo ("<script>ErrorMessage('#no','Invalid record','');</script>");  
}

if (isset($_GET['del_id'])){  
   Delete($_GET['del_id'], "users", "user_id", "Location:user_rec.php");
   }
 else {
     echo ("<script>ErrorMessage('#no','Invalid record','');</script>");  
}
}  else {
    header('location: adminlogin.php');
}