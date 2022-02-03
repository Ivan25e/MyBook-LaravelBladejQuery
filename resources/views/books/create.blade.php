@extends("template.template")

@php
    use App\Helper\GlobalArrays;
    $genres = GlobalArrays::GENRES;
@endphp

@section("title")
    Create a new book
@endsection

@section("styles")
    {{-- No custom styles for this page --}}
@endsection

@section("main")
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Create new book</h2>
            <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('user.profile') }}">Profile</a></li>
            <li>Create new book</li>
            </ol>
        </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('book.store') }}" method="POST" id="bookForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group p-2">
                            <label for="title">Title</label>
                            <input type="title" id="title" name="title" class="form-control" aria-describedby="titleHelp" placeholder="Harry Potter and the Philosopher's Stone" required>
                            <small id="titleHelp" class="form-text text-muted">Please enter the title of your book. </small>
                        </div>
                        <div class="form-group p-2">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" placeholder="This novel works as an introduction to the world of magic. The story plays in the perspective of Harry Potter, who is also just discovering magic. Therefore, the reader, like Harry Potter, is introduced to the nuances and establishments of the magical world in this book." required></textarea>
                            <small id="descriptionInfo" class="form-text text-muted">Please enter a short description of what your book is about. </small>
                        </div>
                        <div class="form-group p-2">
                            <label for="genre">Genre</label>
                            <select class="form-control" id="genre" name="genre">
                                @foreach($genres as $genre)
                                    <option value="{{ $genre }}">{{ $genre }}</option>
                                @endforeach
                            </select>
                            <small id="genreInfo" class="form-text text-muted">Select the genre of the book.</small>
                        </div>
                        <div class="form-group p-2">
                            <label for="pages">Pages</label>
                            <input type="number" min="10" value="10" id="pages" name="pages" class="form-control" aria-describedby="pagesHelp" required>
                            <small id="pagesInfo" class="form-text text-muted">Select the number of pages the book has.</small>
                        </div>
                        <div class="form-group p-2">
                            <label for="language">Language</label>
                            <select class="form-control" id="language" name="language">
                                <option>Null</option>
                            </select>
                            <small id="languageInfo" class="form-text text-muted">Select the language in which the book is written.</small>
                        </div>
                        <div class="form-group p-2">
                            <label for="cover">Cover</label>
                            <input type="file" id="cover" name="cover" class="form-control" aria-describedby="coverHelp" accept="image/png, image/jpeg" required>
                            <small id="coverInfo" class="form-text text-muted">Select the cover image for the book.</small>
                        </div>
                        <button type="submit" class="btn btn-primary m-2">Create a book</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection

@section("scripts")
<script>
    
    onLoad();

    //First function to be called when the page is loading
    function onLoad(){
        loadLanguageList();
    }

    //Via API call the dropdown language list is filled
    function loadLanguageList(){
        $.ajax({
            'url' : 'https://pkgstore.datahub.io/core/language-codes/language-codes_json/data/97607046542b532c395cf83df5185246/language-codes_json.json',
            'type' : 'GET',
            'success' : function(data) {              
                $("#language").html("");

                languages = [];

                for(let i = 0; i < data.length; i++){
                    languages.push(data[i].English);
                }

                languages.sort((a, b) => a.localeCompare(b));

                for(let i = 0; i < languages.length; i++){
                    $("#language").append("<option>" + languages[i] + "</option>");
                }
            },
            'error' : function(request, error) {
                toastr.error("Failed to load languages list.");
            }
        });
    }

</script>
@endsection