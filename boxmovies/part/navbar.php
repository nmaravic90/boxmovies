<?php 
$html = '';
if (isset($_SESSION['user'])){
        $user = unserialize($_SESSION['user']);
        $html = '<li class="nav-item"><a class="nav-link" href="" id="session"><i class="fas fa-user"></i> '.  $user[0]['username'] .'</a></li>';
        $html .= '<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#editProfilModal" id="user-profil"><i class="fas fa-address-card"></i> Edit profil</a></li>';    
    }
    else{
        $html =  '<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal" id="login">Login</a></li>';
        $html .= '<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal" id="register">Register</a></li>';
    }
?>
<!-- NAVBAR ************************************************************************************************ -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" width="130" height="40" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars fa-lg"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#" id="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="search">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#contactModal"
                        id="contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto sign-in">
                <?php  echo $html; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- LOGIN MODAL -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">LogIn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="login-form">
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <button type="button" class="btn btn-primary" id="login-btn">Log In</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 message"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- LOGOUT MODAL -->
<div class="logout modal fade" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are You Sure You Want to Log Out?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="logout">Yes</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- REGISTER MODAL -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="register-form">
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="first_name" placeholder="First name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="last_name" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="email" class="form-control" name="email" placeholder="Email" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="city" placeholder="City">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <button type="button" class="btn btn-primary" id="register-add">Registration</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary" id="register-clear">Clear</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 message"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--  SUCCESSFUl REGISTER MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="successfulRegisterModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registration Successful</h5>
            </div>
            <div class="modal-body">
                <p>Thank you for registering.</p>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT MODAL -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="contact-form">
                    <div class="form-row">
                        <div class="form-group col">
                            <?php if (isset($user)){   ?>
                            <input type="text" class="form-control" placeholder="Name" name="name"
                                value="<?php  echo $user[0]['first_name']; ?>" readonly>
                            <?php   }  else { ?>
                            <input type="text" class="form-control" placeholder="Name" name="name">
                            <?php    } ?>
                        </div>
                        <div class="form-group col">
                            <input type="text" class="form-control" placeholder="Subject" name="subject">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <?php if (isset($user)){   ?>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                value="<?php  echo $user[0]['email']; ?>" readonly>
                            <?php   }  else { ?>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <?php    } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <textarea class="form-control noresize" rows="5" name="message"
                                placeholder="Text message..."></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <button type="button" class="btn btn-primary" id="message-sent">Sent</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary" id="message-clear">Clear</button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 message">
                                    <!-- message -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--  SUCCESSFUl MESSAGE SENT MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="successfulMessageModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Successful!</h5>
            </div>
            <div class="modal-body">
                <p>Message was sent!</p>
            </div>
        </div>
    </div>
</div>
<!-- EDIT PROFIL MODAL -->
<div class="modal fade" id="editProfilModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-form">
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="username"
                                value="<?php  echo $user[0]['username']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="password" placeholder="Password"
                                value="<?php  echo $user[0]['password']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="first_name" placeholder="First name"
                                value="<?php  echo $user[0]['first_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="last_name" placeholder="Last name"
                                value="<?php  echo $user[0]['last_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                value="<?php  echo $user[0]['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="phone" placeholder="Phone"
                                value="<?php  echo $user[0]['phone']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="city" placeholder="City"
                                value="<?php  echo $user[0]['city']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" name="address" placeholder="Address"
                                value="<?php  echo $user[0]['address']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <button type="button" class="btn btn-primary" id="edit-update">Update profil</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary" id="edit-clear">Clear</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 message"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>