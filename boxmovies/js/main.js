// GLOBAL VAR *******************************************************************************************
var session;
var num = 1;
var numMax;
var movies = new FormData();
movies.append('index', num);
$(document).ready(function () {
    movieCount(movies);
    loadAllMovies(movies);
    if (location.pathname == '/boxmovies/index.php' || location.pathname == '/boxmovies/') {
        session = $('#session').attr('href');
    }
    if (location.pathname == '/boxmovies/part/movie.php') {
        var title, year, img, rating, genre, url, desc;
        var id = getUrlParameter('id');
        $.ajax({
            type: 'POST',
            url: '../php/movie-watch.php',
            data: { id: id },
            dataType: "json"
        })
            .done(function (res) {
                title = res[0].title;
                year = res[0].year;
                genre = res[0].genre;
                rating = res[0].rating;
                img = res[0].img;
                url = res[1].url;
                desc = res[1].description;
                $('#title').text(title + " " + "(" + year + ")");
                $(".image img").attr('src', "../img/movies/" + img);
                $(".video iframe").attr('src', url);
                $('.about #rating').text(rating);
                $('.about #genre').text(genre.toUpperCase());
                $('.description #desc').text(desc);
                var styleElem = document.head.appendChild(document.createElement("style"));
                styleElem.innerHTML = ".gradient:before {background-image: url(../img/movies/" + img + ");}";
            });
    }
}); 
// SCROLL TO *********************************************************************************************
$('#back-to-top').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 1000);
});
$('#home').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 1000);
});
$('#search').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $(".search").offset().top - 98 }, 1000);
});
// MOVIES **********************************************************************************************
$('.pagination').on('click', '.index', function (e) {
    e.preventDefault();
    num = $(this).attr('href');
    movies.append('index', num);
    loadAllMovies(movies);
});
$('.pagination').on('click', '#next', function (e) {
    e.preventDefault();
    if (num < numMax) {
        num++;
        movies.append('index', num);
        loadAllMovies(movies);
    }
    else {
        num = numMax;
        movies.append('index', num);
        loadAllMovies(movies);
    }
});
$('.pagination').on('click', '#previous', function (e) {
    e.preventDefault();
    if (num > 1) {
        num--;
        movies.append('index', num);
        loadAllMovies(movies);
    }
    else {
        num = 1;
        movies.append('index', num);
        loadAllMovies(movies);
    }
});
// search movie ///////////////////////////////////////////////////////////////////////////////////////////////
$('body').on('click', '.search .search-term', function (e) {
    e.preventDefault();
    deleteFormDataObject();
    var title = document.getElementsByName("search-title")[0].value;;
    var genre = document.getElementsByName("search-genre")[0].value;;
    var rating = document.getElementsByName("search-rating")[0].value;
    var year = document.getElementsByName("search-year")[0].value;;
    var orderBy = document.getElementsByName("search-order-by")[0].value;

    movies.append('index', 1);
    if (title != "" || genre != "" || rating != "" || year != "" || orderBy != "") {
        if (title != "") {
            movies.append('title', title);
        }
        if (genre != "") {
            movies.append('genre', genre);
        }
        if (rating != "") {
            movies.append('rating', rating);
        }
        if (year != "") {
            movies.append('year', year);
        }
        if (orderBy != "") {
            movies.append('order', orderBy);
        }
    }
    movieCount(movies);
    loadAllMovies(movies);
});
$('body').on('click', '.search .clear-term', function (e) {
    e.preventDefault();
    $(".search-form")[0].reset();
    deleteFormDataObject();
    movies.append('index', 1);
    movieCount(movies);
    loadAllMovies(movies);
});
// movie functions ////////////////////////////////////////////////////////////////////////////////////////////
function loadAllMovies(movies) {
    $.ajax({
        type: 'POST',
        url: 'php/movies.php',
        data: movies,
        processData: false,
        contentType: false,
        dataType: "json"
    })
        .done(function (res) {
            var movie = '';
            $.each(res, function (i, item) {
                movie += '<div class="col-sm-3">';
                movie += '  <div class="movie">';
                movie += '      <img src="img/movies/' + item.img + '" class="img-fluid">';
                movie += '      <div class="overlay">';
                movie += '  <div class="movie-info">';
                movie += '      <span class="rating">';
                movie += '           <i class="fas fa-star fa-2x"></i>';
                movie += '                <span>' + item.rating + '/10</span>';
                movie += '      </span>';
                movie += '      <span class="genre">' + item.genre + '</span>';
                movie += '  </div>';
                if (typeof session != 'undefined') {
                   movie += '<a href="part/movie.php?id=' + item.id + '" class="btn-movie">Play</a>';
                }
                movie += '  </div>';
                movie += '    <div class="movie-title">';
                movie += '        <span class="title">' + item.title + '<span>';
                movie += '        <span class="year">' + item.year + '</span>';
                movie += '    </div>';
                movie += '  </div>';
                movie += '</div>';
            });
            $('#movie-list').html(movie);
        })
}
function movieCount(movies) {
    $.ajax({
        type: 'POST',
        url: 'php/movie-count.php',
        data: movies,
        processData: false,
        contentType: false
    })
        .done(function (res) {
            if (res == 0 || res == 1) {
                $('.pagination').hide();
            }
            else {
                numMax = res;
                var item = '';
                item += '<li class="page-item">';
                item += '   <a class="page-link" href="#" aria-label="Previous" id="previous">';
                item += '        <span aria-hidden="true">&laquo;</span>';
                item += '        <span class="sr-only">Previous</span>';
                item += '   </a>';
                item += ' </li>';
                for (i = 1; i <= res; i++) {
                    item += '<li class="page-item"><a class="page-link index" href="' + i + '">' + i + '</a></li>';
                }
                item += '<li class="page-item">';
                item += '   <a class="page-link" href="#" aria-label="Next" id="next">';
                item += '      <span aria-hidden="true">&raquo;</span>';
                item += '      <span class="sr-only">Next</span>';
                item += '  </a>';
                item += '</li>';
                $('.pagination').show();
                $('.pagination').html(item);
            }
        })
}
function deleteFormDataObject() {
    movies.delete('index');
    movies.delete('title');
    movies.delete('year');
    movies.delete('rating');
    movies.delete('genre');
    movies.delete('order');
}
// preview movie //////////////////////////////////////////////////////////////////////////////////////////
$('body').on('click','.btn-movie', function () {
    var dataPreview = new FormData();
    var username = document.getElementsByName("username")[2].value;
    var date = new Date();
    var current_date = date.getDate() + "." + (date.getMonth()+1) + "." + date.getFullYear()+".";
    var current_time = date.getHours() + ":" + date.getMinutes();
    var movie_href =  $(this).attr('href').split("=");
    var id_movie = movie_href[1];
    
    dataPreview.append('username', username);
    dataPreview.append('id_movie', id_movie);
    dataPreview.append('current_date', current_date);
    dataPreview.append('current_time', current_time);

    $.ajax({
        type: 'POST',
        url: 'php/preview.php',
        data: dataPreview,
        processData:false,
        contentType:false       
    });
});
// LOGIN **************************************************************************************************
$('#login').on('click', function () {
    $("#login-form")[0].reset();
    $('#login-form .message').empty();
});
$('#login-form #login-btn').on('click', function () {
    var username = document.getElementsByName("username")[0].value;
    var password = document.getElementsByName("password")[0].value;
    if (username === '' || password === '') {
        $('#login-form .message').html("Please fill in the required fields!");
    }
    else {
        $.ajax({
            type: 'POST',
            url: 'php/login.php',
            data: $('#login-form').serialize()
        })
            .done(function (res) {
                if (res == false) {
                    $('#login-form .message').html("Incorrect username or password!");
                }
                else {
                    session = true;
                    window.location.href = 'index.php';
                }
            })
    }
}); 
// LOGOUT **********************************************************************************
$('#session').on('click', function (e) {
    e.preventDefault();
    $('#logout-modal').modal('toggle');
    $('#logout-modal').on('click', '#logout', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'php/logout.php',
        })
            .done(function () {
                window.location.href = 'index.php';
            });
    });
});
// REGISTER *******************************************************************************************
$('#register').on('click', function () {
    clearRegisterForm();
});
$('#register-form #register-clear').on('click', function () {
    clearRegisterForm();
});
$('#register-form #register-add').on('click', function () {
    var username = document.getElementsByName("username")[1].value;
    var password = document.getElementsByName("password")[1].value;
    var first_name = document.getElementsByName("first_name")[0].value;
    var last_name = document.getElementsByName("last_name")[0].value;
    var email = document.getElementsByName("email")[0].value;
    var phone = document.getElementsByName("phone")[0].value;
    var city = document.getElementsByName("city")[0].value;
    var address = document.getElementsByName("address")[0].value;

    if (username === '' || password === '' || first_name === '' || last_name === '' || email === '' || phone === '' || city === '' || address === '') {
            $('#register-form .message').html("Please fill in the required fields!");
    } 
    else if(!isEmail(email)){
        $('#register-form .message').html("Email is not valid");
    }
    else {
        $.ajax({
            type: 'POST',
            url: 'php/register.php',
            data: $('#register-form').serialize()
        })
            .done(function (res) {
                if (res == true) {
                    $('#registerModal').modal('toggle');
                    $('#successfulRegisterModal').modal('toggle'); 
                    setTimeout(function () { $('#successfulRegisterModal').modal('hide'); }, 1200);
                }
                else if(res == false) {
                    $('#register-form .message').html("The user already exists!");
                }
            }) 
    }
});
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
function clearRegisterForm() {
    $("#register-form")[0].reset();
    $('#register-form .message').empty();
}
// EDIT PROFIL **********************************************************************************************
$('#editProfilModal #edit-form').on('click', '#edit-update', function () {
    var username = document.getElementsByName("username")[2].value;
    var password = document.getElementsByName("password")[2].value;
    var first_name = document.getElementsByName("first_name")[1].value;
    var last_name = document.getElementsByName("last_name")[1].value;
    var email = document.getElementsByName("email")[1].value;
    var phone = document.getElementsByName("phone")[1].value;
    var city = document.getElementsByName("city")[1].value;
    var address = document.getElementsByName("address")[1].value;
    if (username === '' || password === '' || first_name === '' || last_name === '' || email === '' || phone === '' || city === '' || address === '') {
        $('#edit-form .message').html("Please fill in the required fields!");
    }
    else {
        $.ajax({
            type: 'POST',
            url: 'php/update.php',
            data: $('#edit-form').serialize()
        })
            .done(function (res) {
                if (res != false) {
                    $('#editProfilModal').modal('toggle');
                    $.ajax({
                        type: 'POST',
                        url: 'php/logout.php',
                    })
                        .done(function () {
                            window.location.href = 'index.php';
                        });
                }
                else {
                    $('#edit-form .message').html("Error with update!");
                }
            })
    }
});
$('#editProfilModal #edit-form').on('click', '#edit-clear' ,function (e) {
    clearEditForm();
});
function clearEditForm() {
    $("#edit-form")[0].reset();
    $('#edit-form .message').empty();
}
// CONTACT **********************************************************************************************
$('#contact').on('click', function () {
    clearContactForm();
});
$('#contact-form #message-clear').on('click', function () {
    clearContactForm();
});
$('#contact-form #message-sent').on('click', function () {
    var name = document.getElementsByName("name")[0].value;
    var subject = document.getElementsByName("subject")[0].value;
    var email = document.getElementsByName("email")[1].value;
    var message = document.getElementsByName("message")[0].value;
    if (name === '' || subject === '' || email === '' || message === '') {
        $('#contact-form .message').html("Please fill in the required fields");
    }
    else {
        $.ajax({
            type: 'POST',
            url: 'php/sent-message.php',
            data: $('#contact-form').serialize()
        })
            .done(function (res) {
                if (res == true) {
                    $('#contactModal').modal('toggle');
                    $('#successfulMessageModal').modal('toggle');
                    setTimeout(function () { $('#successfulMessageModal').modal('hide'); }, 1200);
                }
            })
    }
});
function clearContactForm(){
    $("#contact-form")[0].reset();
    $('#contact-form .message').empty();
}
// WATCH MOVIE //////////////////////////////////////////////////////////////////////////////////////////////
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};



