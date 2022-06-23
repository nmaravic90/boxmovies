var numMessage = 1;
var numMessageMax;
var numMovie = 1;
var numMovieMax;
var movies = new FormData();
var dataMovies = new FormData();

jQuery.ajaxSetup({
    success: function() {
        $('.spinner-fade').delay(1500).fadeOut();
    }
});

// LOAD function **********************************************************************************************
$(document).ready(function () {
    $('.spinner-fade').hide();
    if (location.pathname == '/boxmovies/admin/adminpanel.php') {
        userCount();
        inboxCount();
    }
});
function userCount() {
    $.ajax({
        type: 'get',
        url: 'php/user-count.php',
    })
        .done(function (res) {
            $('.users .badge').html(res);
        });
};
function inboxCount() {
    $.ajax({
        type: 'get',
        url: 'php/inbox-count.php',
    })
        .done(function (res) {
            $('.inbox .badge').html(res);
        });
};
// NAVBAR LINKS  **********************************************************************************************
$('nav a').on('click', function (e) {
    e.preventDefault();
    $('.go-to').removeClass('active');
    $(this).addClass('active');
    var link = $(this).attr('href');
    if (link == 'edit-remove') {
        $('.spinner-fade').show();
        deleteFormDataObject();
        $('.content').load('forms.php .' + link, function () {
            dataMovies.append('index', 1);
            moviePagination(dataMovies);
            loadMovieList(dataMovies);
        });
    }
    if (link == 'users') {
        $('.spinner-fade').show();
        $('.content').load('forms.php .' + link, function () {
        loadAllUsers();
        });
    }
    if (link == 'inbox') {
        $('.spinner-fade').show();
        $('.content').load('forms.php .' + link, function () {
        inboxPagination();
        loadAllMessage(numMessage);
        });
    }
    else { $('.content').load('forms.php .' + link); }
});
// LOGIN AND LOGOUT **********************************************************************************************
// login /////////////////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.login .btn-login', function (e) {
    e.preventDefault();
    var username = document.getElementsByName("username")[0].value;
    var password = document.getElementsByName("password")[0].value;
    if (username === '' || password === '') {
        $('.message').html("Please fill in the required fields!");
    }
    else {
        $.ajax({
            type: 'POST',
            url: 'php/login.php',
            data: $('form').serialize()
        })
            .done(function (res) {
                if (res == true) {
                    $(".message").remove();
                    window.location.href = 'adminpanel.php';
                }
                $('.message').html("Incorrect username or password!");
            });
    }
});
// logout /////////////////////////////////////////////////////////////////////////////////////////////////////////
$('.login-user').on('click', '.admin-user', function (e) {
    e.preventDefault();
    var link = $(this).attr('href');
    $('.logoutmodal').load('forms.php .' + link, function () {
        $('#logout-modal').modal({ show: true });
        $('#logout-modal').on('click', '#logout', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'php/logout.php',
            })
                .done(function () {
                    window.location.href = 'index.html';
                });
        })
    })
});
// ADD MOVIE **************************************************************************************************
// insert image ///////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('change', '.add .custom-file-input', function () {
    var fileName = document.getElementById("file").files[0].name;
    $('.custom-file-label').text(fileName);
    var data = new FormData();
    data.append('file', document.getElementById("file").files[0]);
    $.ajax({
        type: 'POST',
        url: 'php/add-movie-image.php',
        data: data,
        processData: false,
        contentType: false
    })
        .done(function (res) {
            $('#image-preview').attr("src", "../img/movies/" + res);
        });

});
// insert movie ///////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.add .add-movie', function (e) {
    e.preventDefault();
    var title = document.getElementById('title').value;
    var year = document.getElementById('year').value;
    var rating = document.getElementById('rating').value;
    var genre = document.getElementById('genre').value;
    var url = document.getElementById('url').value;
    var description = document.getElementById('description').value;
    if (title == "" || genre == "" || rating == "" || year == "" || url == "" || description == "") {
        $('.add-movie-modal').load('forms.php #information-modal', function () {
            $('#information-modal').modal('toggle');
            setTimeout(function () { $('#information-modal').modal('hide'); }, 1500);
        });
    }
    else {
    var data = new FormData();
    data.append('title', title);
    data.append('year', year);
    data.append('rating', rating);
    data.append('genre', genre);
    data.append('file', $('#file')[0].files[0]);
    data.append('url', url);
    data.append('description', description);
    $.ajax({
        type: 'POST',
        url: 'php/add-movie.php',
        data: data,
        processData: false,
        contentType: false
    })
        .done(function () {
            clearAddMovieForm();
            $('.add-movie-modal').load('forms.php #add-movie-modal', function () {
                $('#add-movie-modal').modal('toggle');
                setTimeout(function () { $('#add-movie-modal').modal('hide'); }, 1500);
            });
        });
    }
});
// clear add form ///////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.add .clear-movie-form', function (e) {
    e.preventDefault();
    clearAddMovieForm();
});
function clearAddMovieForm() {
    $('#add-form')[0].reset();
    $('#image-preview').attr("src", "img/img-cover.jpg");
    $('.custom-file-label').text("Select image...");
}
// EDIT, SEARCH AND REMOVE MOVIE  *****************************************************************************
// search movie ///////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.edit-remove .search-term', function (e) {
    e.preventDefault();
    deleteFormDataObject();
    numMovie = 1;
    dataMovies.append('index', numMovie);
    var title = document.getElementsByName("search-title")[0].value;;
    var genre = document.getElementsByName("search-genre")[0].value;;
    var rating = document.getElementsByName("search-rating")[0].value;
    var year = document.getElementsByName("search-year")[0].value;;
    var orderBy = document.getElementsByName("search-order-by")[0].value;

    // dataMovies.append('index', 1);
    if (title != "" || genre != "" || rating != "" || year != "" || orderBy != "") {
        if (title != "") {
            dataMovies.append('title', title);
        }
        if (genre != "") {
            dataMovies.append('genre', genre);
        }
        if (rating != "") {
            dataMovies.append('rating', rating);
        }
        if (year != "") {
            dataMovies.append('year', year);
        }
        if (orderBy != "") {
            dataMovies.append('order', orderBy);
        }
    }
    moviePagination(dataMovies);
    loadMovieList(dataMovies);
});
// clear search form ///////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.edit-remove .clear-term', function (e) {
    e.preventDefault();
    $('.search-form')[0].reset();
    deleteFormDataObject();
    numMovie = 1;
    dataMovies.append('index', 1);
    moviePagination(dataMovies);
    loadMovieList(dataMovies);
});
// delete movie ///////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '#edit-remove-teble .delete-movie', function (e) {
    e.preventDefault();
    var id = $(this).attr('href');
    $('.delete-modal').load('forms.php #delete-modal', function () {
        $('#delete-modal').modal('toggle');
        $('#delete-modal').on('click', '#yes', function (e) {
            deleteMovie(id);
            $('#delete-modal').modal('toggle');
            $('.delete-modal').load('forms.php #delete-succesful-modal', function () {
                $('#delete-succesful-modal').modal('toggle'); 
                setTimeout(function () { $('#delete-succesful-modal').modal('hide'); }, 1500);
            });
        });
    });
});
// edit movie /////////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '#edit-remove-teble .edit-movie', function (e) {
    e.preventDefault();
    var id = $(this).attr('href');
    loadMovieForEdit(id);
});
$('.content').on('click', '.edit .back-to-edit-list', function (e) {
    $('.spinner-fade').show();
    e.preventDefault();
    $('.content').load('forms.php .edit-remove', function () {
        numMovie = 1;
        dataMovies.append('index', numMovie);
        moviePagination(dataMovies);
        loadMovieList(dataMovies);
    });
});
$('.content').on('click', '.clear-movie-form', function (e) {
    e.preventDefault();
    $('#edit-form')[0].reset();
    $('#image-preview').attr("src","img/img-cover.jpg");
    $('.custom-file-label').text("Select image...");
});
// update movie ///////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.edit .update-movie', function (e) {
    e.preventDefault();
    var id = $(this).attr('value');
    var title = document.getElementById('title').value;
    var year = document.getElementById('year').value;
    var rating = document.getElementById('rating').value;
    var genre = document.getElementById('genre').value;
    var img = $('.custom-file-label').text();
    var url = document.getElementById('url').value;
    var description = document.getElementById('description').value;

    if (title == "" || genre == "" || rating == "" || year == "" || url == "" || description == "") { 
        $('.add-movie-modal').load('forms.php #information-modal', function () {
            $('#information-modal').modal('toggle');
            setTimeout(function () { $('#information-modal').modal('hide'); }, 1500);
        });
    }
    else{
    var data = new FormData();
    data.append('id', id);
    data.append('title', title);
    data.append('year', year);
    data.append('rating', rating);
    data.append('genre', genre);
    data.append('img', img);
    data.append('url', url);
    data.append('description', description);
    $.ajax({
        type: 'POST',
        url: 'php/movie-update.php',
        data: data,
        processData: false,
        contentType: false
    })
        .done(function (res) {
            $('.content').load('forms.php .edit-remove', function () {
                numMovie = 1;
                dataMovies.append('index', numMovie);
                moviePagination(dataMovies);
                loadMovieList(dataMovies);
            });
        });
    }
});
$('.content').on('change', '.edit .custom-file-input', function () {
    var fileName = document.getElementById("file").files[0].name;
    $('.custom-file-label').text(fileName);
    var data = new FormData();
    data.append('file', document.getElementById("file").files[0]);
    $.ajax({
        type: 'POST',
        url: 'php/add-movie-image.php',
        data: data,
        processData: false,
        contentType: false
    })
        .done(function (res) {
            $('#image-preview').attr("src", "../img/movies/" + res);
        });

});
// movie pagination ///////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '#movie-pagination .pagination-num', function (e) {
    e.preventDefault();
    numMovie = $(this).attr('href');
    dataMovies.append('index', numMovie);
    loadMovieList(dataMovies);
});
$('.content').on('click', '#movie-pagination #next', function (e) {
    e.preventDefault();
    if (numMovie < numMovieMax) {
        numMovie++;
        dataMovies.append('index', numMovie);
        loadMovieList(dataMovies);
    }
    else {
        numMovie = numMovieMax;
        dataMovies.append('index', numMovie);
        loadMovieList(dataMovies);
    }
});
$('.content').on('click', '#movie-pagination #previous', function (e) {
    e.preventDefault();
    if (numMovie > 1) {
        numMovie--;
        dataMovies.append('index', numMovie);
        loadMovieList(dataMovies);
    }
    else {
        numMovie = 1;
        dataMovies.append('index', numMovie);
        loadMovieList(dataMovies);
    }
});
// movie functions ////////////////////////////////////////////////////////////////////////////////////////////
function loadMovieList(dataMovies){
        $.ajax({
            type: 'POST',
            url: 'php/movie-list.php',
            data: dataMovies,
            processData:false,
            contentType:false,
            dataType: "json"
        })
            .done(function (res) {
                var movie_data = '';
                $.each(res, function (i, item) {
                    var num;
                    if (numMovie > 1) {
                        num = parseInt(i) + 1 + ((numMovie - 1) * 8);
                    }
                    else {
                        num = parseInt(i) + 1;
                    }
                    movie_data += '<tr>';
                    movie_data += '<th scope="row">' + num + '</th>';
                    movie_data += '<td>' + item.title + '</td>';
                    movie_data += '<td>' + item.year + '</td>';
                    movie_data += '<td>' + item.rating + '</td>';
                    movie_data += '<td>' + item.genre + '</td>';
                    movie_data += '<td class="text-center"><a href="' + item.id + '" class="edit-movie"><i class="far fa-edit"></i></a> / <a href="' + item.id + '" class="delete-movie"><i class="far fa-trash-alt"></i></a></td>'
                    movie_data += '</tr>';
                });
                // var table = document.getElementById('edit-remove-teble');
                // table.innerHTML = '';
                numMovie = 1;
                var table = document.getElementById('edit-remove-teble'); 
                table.innerHTML = movie_data;
            });
}
function moviePagination(dataMovies) {
    $.ajax({
        type: 'POST',
        url: 'php/movie-pagination.php',
        data: dataMovies,
        processData:false,
        contentType:false
    })
        .done(function (res) {
            if(res==0 || res==1){
                $('#movie-pagination').hide();
                $('.edit-remove').css( 'margin-bottom', '50px');
            }
            else{
            numMovieMax = res;
            var item = '';
            item += '<li class="page-item">';
            item += '   <a class="page-link" href="#" aria-label="Previous" id="previous">';
            item += '        <span aria-hidden="true">&laquo;</span>';
            item += '        <span class="sr-only">Previous</span>';
            item += '   </a>';
            item += ' </li>';
            for (i = 1; i <= res; i++) {
                item += '<li class="page-item"><a class="page-link pagination-num" href="' + i + '">' + i + '</a></li>';
            }
            item += '<li class="page-item">';
            item += '   <a class="page-link" href="#" aria-label="Next" id="next">';
            item += '      <span aria-hidden="true">&raquo;</span>';
            item += '      <span class="sr-only">Next</span>';
            item += '  </a>';
            item += '</li>';
            $('#movie-pagination').show();
            $('.edit-remove').css( 'margin-bottom', '0px');
            var pagination = document.getElementById('movie-pagination');
            pagination.innerHTML = item;
            }
        });
}
function deleteMovie(id) {
    $.ajax({
        type: 'post',
        url: 'php/movie-delete.php',
        data: { id: id }
    })
        .done(function () {
            dataMovies.append('index', 1);
            moviePagination(dataMovies);
            loadMovieList(dataMovies);
        });
}
function loadMovieForEdit(id) {
    $('.content').load('forms.php .edit', function () {
    $.ajax({
        type: 'post',
        url: 'php/movie-edit.php',
        data: { id: id },
        dataType: "json"
    })
        .done(function (res) {
            $('#title').val(res[0].title);
            $('#year').val(res[0].year);
            $('#rating').val(res[0].rating);
            $('#genre').val(res[0].genre);
            $('#url').val(res[1].url);
            $('#description').val(res[1].description);
            $('.custom-file-label').text(res[0].img);
            $('#image-preview').attr("src", "../img/movies/" + res[0].img);
            $('.update-movie').attr("value", res[0].id);
        });
    });
}
function deleteFormDataObject(){
    dataMovies.delete('index');
    dataMovies.delete('title');
    dataMovies.delete('year');
    dataMovies.delete('rating');
    dataMovies.delete('genre');
    dataMovies.delete('order');   
}
// ALL USERS  *************************************************************************************************
//search user /////////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.users .search-user', function (e) {
    e.preventDefault();
    var select = $('#select').find('option:selected').val();
    var value = $("#value").val();
    if(value != ''){
        loadSearchUsers(select, value);
    }
    else{
        loadAllUsers();
    }
});
// delete user ////////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.delete-user', function (e) {
    e.preventDefault();
    var id = $(this).attr('href');
    $('.delete-modal').load('forms.php #delete-modal', function () {
        $('#delete-modal').modal('toggle');
        $('#delete-modal').on('click', '#yes', function (e) {
            deleteUser(id);
            $('#delete-modal').modal('toggle');
            $('.delete-modal').load('forms.php #delete-succesful-modal', function () {
                $('#delete-succesful-modal').modal('toggle'); 
                setTimeout(function () { $('#delete-succesful-modal').modal('hide'); }, 1500);
            });
        });
    });
   
});
// user functions /////////////////////////////////////////////////////////////////////////////////////////////
function loadAllUsers() {
    $.ajax({
        url: 'php/user-list.php',
        dataType: "json"
    })
        .done(function (res) {
            var user_data = '';
            $.each(res, function (i, item) {
                var num = parseInt(i) + 1;
                user_data += '<tr>';
                user_data += '<th scope="row">' + num + '</th>';
                user_data += '<td>' + item.username + '</td>';
                user_data += '<td>' + item.first_name + '</td>';
                user_data += '<td>' + item.last_name + '</td>';
                user_data += '<td>' + item.email + '</td>';
                user_data += '<td>' + item.phone + '</td>';
                user_data += '<td>' + item.city + '</td>';
                user_data += '<td>' + item.address + '</td>';
                user_data += '<td class="text-center"><a href="' + item.id + '" class="delete-user"><i class="fas fa-minus-circle"></i></a></td>'
                user_data += '</tr>';
            });
            var table = document.getElementById('user-table');
            table.innerHTML = user_data;
        });
};
function loadSearchUsers(select, value) {
    $.ajax({
        type: 'post',
        url: 'php/user-search-list.php',
        dataType: "json",
        data: { rowName: select, rowValue: value }
    })
        .done(function (res) {
            var user_data = '';
            $.each(res, function (i, item) {
                var num = parseInt(i) + 1;
                user_data += '<tr>';
                user_data += '<th scope="row">' + num + '</th>';
                user_data += '<td>' + item.username + '</td>';
                user_data += '<td>' + item.first_name + '</td>';
                user_data += '<td>' + item.last_name + '</td>';
                user_data += '<td>' + item.email + '</td>';
                user_data += '<td>' + item.phone + '</td>';
                user_data += '<td>' + item.city + '</td>';
                user_data += '<td>' + item.address + '</td>';
                user_data += '<td class="text-center"><a href="' + item.id + '" class="delete-user"><i class="fas fa-minus-circle"></i></a></td>'
                user_data += '</tr>';
            });
            var table = document.getElementById('user-table');
            table.innerHTML = user_data;
        });
};
function deleteUser(id){
    $.ajax({
        type: 'POST',
        url: 'php/delete-user.php',
        data: { index: id }
    })
        .done(function () {
            loadAllUsers();
            userCount();
    });
}
// INBOX - MESSAGE *******************************************************************************************
var idMessage;
$('.content').on('click', '#message-pagination .pagination-num', function (e) {
    e.preventDefault();
    numMessage = $(this).attr('href');
    loadAllMessage(numMessage);
});
$('.content').on('click', '#message-pagination #next', function (e) {
    e.preventDefault();
    if (numMessage < numMessageMax) {
        numMessage++;
        loadAllMessage(numMessage);
    }
    else {
        num = numMessageMax;
        loadAllMessage(numMessage);
    }
});
$('.content').on('click', '#message-pagination #previous', function (e) {
    e.preventDefault();
    if (numMessage > 1) {
        numMessage--;
        loadAllMessage(numMessage);
    }
    else {
        numMessage = 1;
        loadAllMessage(numMessage);
    }
});
function loadAllMessage(numMessage) {
    $.ajax({
        type: 'POST',
        url: 'php/message-list.php',
        data: { index: numMessage },
        dataType: "json"
    })
        .done(function (res) {
            var message_data = '';
            $.each(res, function (i, item) {
                var num;
                if (numMessage > 1) {
                    num = parseInt(i) + 1 + ((numMessage - 1) * 8);
                }
                else {
                    num = parseInt(i) + 1;
                }
                message_data += '<tr>';
                message_data += '<th scope="row">' + num + '</th>';
                message_data += '<td>' + item.name + '</td>';
                message_data += '<td>' + item.subject + '</td>';
                message_data += '<td>' + item.email + '</td>';
                message_data += '<td class="text-center"><a href="' + item.id + '" class="view-message" data-toggle="modal" data-target="#inbox-view-modal"><i class="far fa-edit"></i></a> / <a href="' + item.id + '" class="delete-message"><i class="far fa-trash-alt"></i></a></td>';
                message_data += '</tr>';
            });
            var table = document.getElementById('inbox-table');
            table.innerHTML = message_data;
        });
};
function inboxPagination() {
    $.ajax({
        type: 'get',
        url: 'php/inbox-pagination.php',
    })
        .done(function (res) {
            numMessageMax = res;
            var item = '';
            item += '<li class="page-item">';
            item += '   <a class="page-link" href="#" aria-label="Previous" id="previous">';
            item += '        <span aria-hidden="true">&laquo;</span>';
            item += '        <span class="sr-only">Previous</span>';
            item += '   </a>';
            item += ' </li>';
            for (i = 1; i <= res; i++) {
                item += '<li class="page-item"><a class="page-link pagination-num" href="' + i + '">' + i + '</a></li>';
            }
            item += '<li class="page-item">';
            item += '   <a class="page-link" href="#" aria-label="Next" id="next">';
            item += '      <span aria-hidden="true">&raquo;</span>';
            item += '      <span class="sr-only">Next</span>';
            item += '  </a>';
            item += '</li>';
            var pagination = document.getElementById('message-pagination');
            pagination.innerHTML = item;
        });
};
// view message ///////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.inbox .view-message', function (e) {
    var id = $(this).attr('href');
    idMessage = id;
    var tableRow = $(this).closest("tr");
    var name = tableRow.find("td:eq(0)").text();
    var email = tableRow.find("td:eq(1)").text();
    var subject = tableRow.find("td:eq(2)").text();
    var viewMessage = '';
    viewMessage += '<div class="form-row">';
    viewMessage += '<div class="col-5">';
    viewMessage += '<input type="text" class="form-control" readonly value="' + name + '" id="message-name">';
    viewMessage += '</div>';
    viewMessage += '<div class="col-7">';
    viewMessage += '<input type="text" class="form-control" readonly value="' + email + '" id="message-email">';
    viewMessage += '</div>';
    viewMessage += '</div>';
    viewMessage += '<div class="form-group">';
    viewMessage += '<input type="text" class="form-control" readonly value="' + subject + '" id="message-subject">';
    viewMessage += '</div>';
    viewMessage += '<div class="form-group">';
    viewMessage += '<textarea class="form-control noresize" rows="5" id="comment" readonly></textarea>';
    viewMessage += '</div>'
    getMessageText(id);
    var modal = document.getElementById('inbox-modal-table');
    modal.innerHTML = viewMessage;
});
function getMessageText(id) {
    $.ajax({
        type: 'POST',
        url: 'php/message-view.php',
        data: { id: id }
    })
        .done(function (res) {
            document.getElementById("comment").innerHTML = res;
        }
    );
};
// answer to message /////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.inbox .answer-message', function (e) {
    var email = document.getElementById("message-email").value;
    var subject = document.getElementById("message-subject").value;
    var name = document.getElementById("message-name").value;
    var answerMessage = '';
    answerMessage += '<div class="form-group row">';
    answerMessage += '<label for="staticEmail" class="col-md-1 col-form-label">To:</label>';
    answerMessage += '<div class="col-md-11">';
    answerMessage += '<input type="text" readonly class="form-control" id="email" value="' + email + '">';
    answerMessage += '</div>';
    answerMessage += '</div>';
    answerMessage += '<div class="form-group row">'
    answerMessage += '<label for="staticEmail" class="col-md-1 col-form-label">Re:</label>';
    answerMessage += '<div class="col-md-11">';
    answerMessage += '<input type="text" readonly class="form-control" id="subject" value="' + subject + '">';
    answerMessage += '</div>';
    answerMessage += '</div>';
    answerMessage += '<div class="form-group">';
    answerMessage += ' <textarea class="form-control noresize" rows="5" id="message">Hello ' + name + ',</textarea>';
    answerMessage += '</div>';
    var modal = document.getElementById('inbox-modal-answer-table');
    modal.innerHTML = answerMessage;
});
// sent message ///////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.inbox #inbox-answer-modal .send-message', function (e) {
    var subject = document.getElementById("email").value;
    var email = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    if(subject !='' &&  email != '' &&  message != ''){
        sendMessage(subject, email, message);
        deleteMessage(idMessage);
        $('.delete-modal').load('forms.php #messageModal', function () {
        $('#inbox-answer-modal').modal('toggle');
        $('#messageModal').modal('toggle'); 
        setTimeout(function () { $('#messageModal').modal('hide'); }, 1500);
     });
    }
    else{
        $('.delete-modal').load('forms.php #information-modal', function () {
            $('#information-modal').modal('toggle');
            setTimeout(function () { $('#information-modal').modal('hide'); }, 1500);
        });
    }
});
// delete message /////////////////////////////////////////////////////////////////////////////////////////////
$('.content').on('click', '.inbox  .delete-message', function (e) {
    e.preventDefault();
    var id = $(this).attr('href');
    $('.delete-modal').load('forms.php #delete-modal', function () {
        $('#delete-modal').modal('toggle');
        $('#delete-modal').on('click', '#yes', function (e) {
            deleteMessage(id);
            $('#delete-modal').modal('toggle');
            $('.delete-modal').load('forms.php #delete-succesful-modal', function () {
            $('#delete-succesful-modal').modal('toggle'); 
            setTimeout(function () { $('#delete-succesful-modal').modal('hide'); }, 1500);
            });
        });
    });
});
function deleteMessage(id) {
    $.ajax({
        type: 'POST',
        url: 'php/message-delete.php',
        data: { id: id }
    })
        .done(function () {
            numMessage = 1;
            loadAllMessage(numMessage);
            inboxCount();
            inboxPagination();
        });
}
function sendMessage(email, subject, message) {
    $.ajax({
        type: 'POST',
        url: 'php/message-send.php',
        data: {email: email, subject: subject, message: message }
    });
}