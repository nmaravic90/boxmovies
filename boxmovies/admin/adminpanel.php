<!doctype html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="img/icon.png">
    <title>Boxmovies</title>
</head>

<body>
    <header>
        <div class="top-bar">
            <div class="container">
                <div class="login-user">
                    <i class="far fa-user"></i>
                    <a class="admin-user" href="logout"><?php  echo $_SESSION['admin']; ?></a>
                </div>
            </div>
            <div class="logoutmodal"></div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Boxmovies</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <div class="navbar-nav ml-auto text-center">
                        <a class="nav-item nav-link go-to active" href="add">add</a>
                        <a class="nav-item nav-link go-to" href="edit-remove">edit / remove</a>
                        <a class="nav-item nav-link go-to users" href="users">users
                            <span class="badge"></span>
                        </a>
                        <a class="nav-item nav-link go-to inbox" href="inbox">inbox
                            <span class="badge"></span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="main-form">
            <div class="container">
                <div class="content">
                    <div class="add">
                        <div class="col-md-6 offset-md-3">
                            <form id="add-form">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group image-file">
                                            <img src="img/img-cover.jpg" class="img-fluid img-thumbnail"
                                                alt="movie-image" id="image-preview">
                                        </div>
                                    </div>
                                    <div class="col-6" id="movie-filds">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title" id="title"
                                                placeholder="Title">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <input type="text" class="form-control" name="year" id="year"
                                                    placeholder="Year">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control" name="rating" id="rating"
                                                    placeholder="Rating">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="genre" name="genre">
                                                <option value="" selected>Select genre...</option>
                                                <option value="action">Action</option>
                                                <option value="crime">Crime</option>
                                                <option value="drama">Drama</option>
                                                <option value="thriller">Thriller</option>
                                                <option value="comedy">Comedy</option>
                                            </select>
                                        </div>
                                        <div class="form-group image-file">
                                            <div class="custom-file" id="customFile">
                                                <input type="file" class="custom-file-input" id="file"
                                                    aria-describedby="fileHelp">
                                                <label class="custom-file-label" for="file">
                                                    Select image...
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="url" id="url"
                                                placeholder="URL movie">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control noresize" rows="3"  id="description"
                                                placeholder="Description..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary add-movie">Add
                                            Movie</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary clear-movie-form">Clear</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="add-movie-modal"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="spinner-fade">
        <div class="spinner">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>