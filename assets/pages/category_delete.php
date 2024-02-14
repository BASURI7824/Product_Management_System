<?php 
    include('../includes/connection.php'); 

    $id = $_GET['id'];

    $delete = "DELETE FROM CATEGORIES where category_id = '$id'";
    $run_delete = mysqli_query ($conn, $delete);

    if($run_delete){
            echo "<script>alert('Category has been deleted successfully')</script>";
            echo "<script>window.open('category.php', '_self')</script> ";
        } 

        else{
            echo " <script> alert('Category has not been deleted')</script> "; 
            echo " <script>window.open(category.php', '_self')</script> ";
        }

?>