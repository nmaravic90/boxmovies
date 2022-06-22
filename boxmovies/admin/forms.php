<!-- ADD MOVIE ******************************************************************************************* -->
<div class="add">
    <div class="col-md-6 offset-md-3">
        <form id="add-form">
            <div class="row">
                <div class="col-6">
                    <div class="form-group image-file">
                        <img src="img/img-cover.jpg" class="img-fluid img-thumbnail" alt="movie-image"
                            id="image-preview">
                    </div>
                </div>
                <div class="col-6" id="movie-filds">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <input type="text" class="form-control" name="year" id="year" placeholder="Year">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="rating" id="rating" placeholder="Rating">
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
                            <input type="file" class="custom-file-input" id="file" aria-describedby="fileHelp">
                            <label class="custom-file-label" for="file">
                                Select image...
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" id="url" placeholder="URL movie">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control noresize" rows="3" id="description"
                            placeholder="Description..."></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-primary add-movie">Add Movie</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-primary clear-movie-form">Clear</button>
                </div>
            </div>
        </form>
    </div>
    <div class="add-movie-modal"></div>
</div>
<!-- EDIT OR REMOVE *************************************************************************************** -->
<div class="edit-remove">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form class="search-form">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label>Search Term:</label>
                            <input type="text" class="form-control" placeholder="Search term..." name="search-title">
                        </div>
                        <div class="form-group col-md-2 offset-md-1">
                            <label>&nbsp</label>
                            <button class="btn btn-primary search-term">Search</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Genre:</label>
                            <select id="inputState1" class="form-control" name="search-genre">
                                <option value="" selected>All</option>
                                <option value="action">Action</option>
                                <option value="crime">Crime</option>
                                <option value="comedy">Comedy</option>
                                <option value="thriller">Thriller</option>
                                <option value="drama">Drama</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Rating:</label>
                            <select id="inputState2" class="form-control" name="search-rating">
                                <option value="" selected>All</option>
                                <option value="9">9+</option>
                                <option value="8">8+</option>
                                <option value="7">7+</option>
                                <option value="6">6+</option>
                                <option value="5">5+</option>
                                <option value="4">4+</option>
                                <option value="3">3+</option>
                                <option value="2">2+</option>
                                <option value="1">1+</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Year:</label>
                            <input type="text" class="form-control" placeholder="Year" maxlength="4" name="search-year">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Order By:</label>
                            <select id="inputState3" class="form-control" name="search-order-by">
                                <option value="" selected>All</option>
                                <option value="year">Year</option>
                                <option value="rating">Rating</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 offset-md-1">
                            <label>&nbsp</label>
                            <button class="btn btn-primary clear-term">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-10 offset-md-1">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Year</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Genre</th>
                    <th scope="col" class="text-center">Edit/Remove</th>
                </tr>
            </thead>
            <tbody id="edit-remove-teble">
                <!-- table items -->
            </tbody>
        </table>
        <div class="row justify-content-md-center">
            <nav>
                <ul class="pagination" id="movie-pagination">
                    <!-- patination items -->
                </ul>
            </nav>
        </div>
        <div class="delete-modal"></div>
        <div class="spiner-modal"></div>
    </div>
    <!-- EDIT MODAL -->
</div>
<!-- EDIT MOVIE ******************************************************************************************** -->
<div class="edit">
    <div class="row">
        <div class="col-12 text-right back-to-list">
            <a href="#" class="back-to-edit-list"><i class="fas fa-external-link-alt"></i> Edit/Remove</a>
        </div>
    </div>
    <div class="col-md-6 offset-md-3">
        <form id="edit-form">
            <div class="row">
                <div class="col-6">
                    <div class="form-group image-file">
                        <img src="img/img-cover.jpg" class="img-fluid img-thumbnail" alt="movie-image"
                            id="image-preview">
                    </div>
                </div>
                <div class="col-6" id="movie-filds">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <input type="text" class="form-control" name="year" id="year" placeholder="Year">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="rating" id="rating" placeholder="Rating">
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
                            <input type="file" class="custom-file-input" id="file" aria-describedby="fileHelp">
                            <label class="custom-file-label" for="file" id="file-lable">
                                Select image...
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" id="url" placeholder="URL movie">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control noresize" rows="3" id="description"
                            placeholder="Description..."></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary update-movie" value="">Update
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
<!-- USERS ************************************************************************************************* -->
<div class="users">
    <div class="col-md-4 offset-md-4">
        <form>
            <div class="form-group">
                <select class="form-control" id="select">
                    <option value="" selected>Select search term...</option>
                    <option value="username">Username</option>
                    <option value="first_name">First Name</option>
                    <option value="last_name">Last Name</option>
                    <option value="city">City</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="value">
            </div>
            <button type="submit" class="btn btn-primary search-user">Search</button>
        </form>
    </div>
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col" class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody id="user-table">
                <!-- table items -->
            </tbody>
        </table>
    </div>
    <div class="delete-modal"></div>
</div>
<!-- INBOX ************************************************************************************************ -->
<div class="inbox">
    <div class="col-md-8 offset-md-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col" class="text-center">Preview / Delete</th>
                </tr>
            </thead>
            <tbody id="inbox-table">
            </tbody>
        </table>
        <div class="row justify-content-md-center">
            <nav>
                <ul class="pagination" id="message-pagination">
                    <!-- patination items -->
                </ul>
            </nav>
        </div>
    </div>
    <!-- INBOX MODAL PREVIEW -->
    <div class="modal fade" id="inbox-view-modal" tabindex="-1" role="dialog" aria-labelledby="inboxLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inboxLabel">Email preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form id="inbox-modal-table">
                            <!-- table items -->
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary answer-message" data-toggle="modal"
                        data-target="#inbox-answer-modal" data-dismiss="modal">Answer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- INBOX MODAL ANSWER -->
    <div class="modal fade" id="inbox-answer-modal" tabindex="-1" role="dialog" aria-labelledby="inboxLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inboxLabel">Send email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form id="inbox-modal-answer-table">

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary send-message">Send</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="delete-modal"></div>
</div>
<!-- LOGOUT MODAL -->
<div class="logout modal fade" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
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
<!-- DELETE MODAL -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are You Sure You Want to Delete Item?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="yes">Yes</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- SENT MESSAGE MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="messageModal">
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
<!-- ADD MOVIE MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="add-movie-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Successful!</h5>
            </div>
            <div class="modal-body">
                <p>Successfully inserted data!</p>
            </div>
        </div>
    </div>
</div>
<!-- INFORMATION MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="information-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Information!</h5>
            </div>
            <div class="modal-body">
                <p>Please fill out all the fields!</p>
            </div>
        </div>
    </div>
</div>
<!-- INFORMATION MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="message-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sent message</h5>
            </div>
            <div class="modal-body">
                <p>Message sent successfully!</p>
            </div>
        </div>
    </div>
</div>
<!-- DELETE SUCCESFUL MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="delete-succesful-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete item</h5>
            </div>
            <div class="modal-body">
                <p>Remove successfully!</p>
            </div>
        </div>
    </div>
</div>