<?php 
    include('../includes/connection.php'); 

    $id = $_GET['id'];

    $delete = "DELETE FROM PRODUCTS where product_id  = '$id'";
    $run_delete = mysqli_query ($conn, $delete);

    if($run_delete){
            echo "<script>alert('Product has been deleted successfully')</script>";
            echo "<script>window.open('product.php', '_self')</script> ";
        } 

        else{
            echo " <script> alert('Product has not been deleted')</script> "; 
            echo " <script>window.open(product.php', '_self')</script> ";
        }

?>