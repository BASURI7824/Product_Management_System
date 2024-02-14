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
                <button class="btn btn-primary"><a href="category.php">Back</a></button>
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
                            <?php getProCat() ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <h3>Create Category</h3>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Category Name:</strong>
                                    <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Category Image:</strong>
                                    <input type="file" name="category_image" class="form-control" placeholder="Image"
                                        accept="image/jpeg, image/jpg, image/gif, image/png" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Category Description:</strong>
                                    <textarea name="category_desc" id="" cols="30" rows="10" placeholder="Category Description"
                                        Style="width: 100%;" required></textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-success" name="submit" style="width: 300px;">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Category End -->



    <?php include('../includes/footers.php'); ?>


    
<?php
    if (isset($_POST['submit'])) {
        $category_name = $_POST['category_name'];
        $category_desc = $_POST['category_desc'];
        
        $filename = $_FILES["category_image"]["name"];
        $tmpname = $_FILES["category_image"]["tmp_name"];
        $folder = "../images/category/".$filename;
        move_uploaded_file($tmpname, $folder);
        
        $insert_query = "INSERT INTO categories (category_name, category_image, category_desc) VALUES ('$category_name', '$folder', '$category_desc')";
        $run_query = mysqli_query($conn, $insert_query);
        
        if($run_query){
            echo "<script>alert('Category Inserted successfully')</script>";
            echo "<script>window.open('category.php', '_self')</script> ";
        } 

        else{
            echo " <script> alert('Category has not been submitted')</script> "; 
            echo " <script>window.open('category.php', '_self')</script> ";
        }
    }

?>
      


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>