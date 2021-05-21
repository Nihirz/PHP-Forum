<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>iDiscuss-Coding-Form</title>
    <style>
    .container{
        min-height: 100vh;
    }
    </style>
</head>

<body>
    <?php require 'partials/_dbconnect.php' ?>
    <?php require 'partials/_header.php' ?>
    


    <!-- slider starts here -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x900/?coding,code" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x900/?programners,microsoft" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x900/?coding,apple" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- Category container statrs here -->
    <div class="container my-4">
        <h2 class="text-center my-4">iDiscuss-Browse Categories</h2>
        <div class="row my-4">
            <!-- Fetch all the catoferies -->
            <?php 
         $sql = "SELECT * FROM `categories`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
          // echo $row['category_id'];
          // echo $row['category_name'];
          $id = $row['category_id'];
          $cat = $row['category_name'];
          $desc = $row['category_description'];
          echo '<div class="col-md-4 my-2">
                  <div class="card" style="width: 18rem;">
                      <img src="https://source.unsplash.com/500x400/?'.$cat.',coding" class="card-img-top" alt="image for this category">
                      <div class="card-body">
                          <h5 class="card-title"><a href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                          <p class="card-text">' . substr($desc, 0, 90). '... </p>
                          <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
                      </div>
                  </div>
                </div>';
         } 
         ?>
            <!-- use the for loop to intrate with the Categories -->


        </div>
    </div>









 
    <?php require 'partials/_footer.php' ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>