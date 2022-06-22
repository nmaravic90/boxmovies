<?php 
// if(isset($_GET['id'])){
//     $id = $_POST['id'];
// }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" href="../img/icon.png">
    <title>Boxmovies</title>
</head>

<body class="gradient">
    <div class="container watch-movie">
        <div class="row">
            <div class="col-md-12 exit">
                <a class="float-right" href="../index.php"><i class="fas fa-times fa-2x"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 title">
                <h2 id="title"> </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 image">
                <img src=" " class="img-fluid">
            </div>
            <div class="col-md-8 video">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src=" "
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="container about">
                    <p>Rating: <b id="rating"></b>/10</p>
                    <p>Genre: <b id="genre"></b></p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="container description">
                    <p>Desription:</p>
                    <p id="desc"></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>