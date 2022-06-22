<main>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Boxmovies</h1>
            <p class="lead">Watch your movie instantly on Box movies in HD and with subtitles. And then keep watching.
            </p>
        </div>
    </div>
    <section class="search">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form class="search-form">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label>Search Term:</label>
                                <input type="text" class="form-control" placeholder="Search term..."
                                    name="search-title">
                            </div>
                            <div class="form-group col-md-2 offset-md-1">
                                <label>&nbsp</label>
                                <button class="btn btn-primary search-term">Search</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Genre:</label>
                                <select class="form-control" name="search-genre">
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
                                <select class="form-control" name="search-rating">
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
                                <input type="text" class="form-control" placeholder="Year" maxlength="4"
                                    name="search-year">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Order By:</label>
                                <select class="form-control" name="search-order-by">
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
    </section>
    <section class="movies">
        <div class="container">
            <div class="row" id="movie-list">
                <!-- movies -->
            </div>
            <div class="row justify-content-md-center">
                <nav>
                    <ul class="pagination">
                        <!-- patination items -->
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</main>