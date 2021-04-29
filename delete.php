<?php
session_start();
include 'connect.php';
if(isset($_GET['delete'])){
   $id=$_GET['delete'];

   $sql = "DELETE FROM forum
	        WHERE id=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      header('location:tableau Forum.php');
   $_SESSION['response']="Successfully Deleted!";
   $_SESSION['res_type']="danger";
   }else {
      echo " You Have Entered Incorrect Password";
      
   }
}
?>