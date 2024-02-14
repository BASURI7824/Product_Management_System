<?php
include('../includes/connection.php');
include('../includes/function.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>|| Ptoduct Management :: Category ||</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- JQuert cdn Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Font-Awesome Icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/styles.css">
  </head>
  <body>

    <!-- Topbar Start -->
    <?php include('../includes/topbar.php'); ?>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <?php include('../includes/navbars.php'); ?>
    <!-- Navbar End -->

    <!-- Category Start -->

    <div class="category section-p1">
        <div class="cat">
            <div class="name">
                <h1> <i class="fa fa-list-alt"></i> Browse Category</h1>   
            </div>

            <div class="button">
                <button class="btn btn-primary"><a href="category_create.php">Create Category</a></button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu" >         
                    <div class="panel-heading">
                        <h3 class="panel-title">All Categories <i class="fa fa-filter" style="margin-left: 2.5rem;" aria-hidden="true"></i></h3>
                    </div>

                    <div class="panel-body">
                        <ul style=" list-style: none;">
                            <?php getProCategory() ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>
                                <center>Category Image</center>
                            </th>
                            <th>
                                <center>Category Name</center>
                            </th>
                            <th>
                                <center>Category Description</center>
                            </th>

                            <th>
                                <center>Actions</center>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $display = "SELECT * FROM CATEGORIES";
                                $run_display = mysqli_query ($conn, $display);
                                while($result = mysqli_fetch_assoc($run_display))
                                {
                                    echo"    
                                    <tr>
                                        <td><img src= '".$result['category_image']."' style='height: 100px; width: 100px; border-radius: 20px;'></td>
                                        <td>".$result['category_name']."</td>
                                        <td>".$result['category_desc']."</td>
                                        <td>
                                            <button id='update' class='btn btn-success' style='width: 100px;'><a href='category_edit.php?id=$result[category_id]' style='color: black; text-decoration: none;'>Update</a></button>
                                            <br><br>
                                            <button id='delete' class='btn btn-danger' style='width: 100px;'><a href='category_delete.php?id=$result[category_id]' style='color: black; text-decoration: none;'>Delete</a></button> 
                                        </td>
                                    </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Category End -->



    <?php include('../includes/footers.php'); ?>


    
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>