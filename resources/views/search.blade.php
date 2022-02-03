@extends("template.template")

@php
    use App\Helper\GlobalArrays;
    $genres = GlobalArrays::GENRES;
@endphp

@section("title")
    Search books
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
            <h2>Search books</h2>
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('search') }}">Search</a></li>
            </ol>
        </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    
    <section class="inner-page">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="form-group p-2 d-flex align-items-center">
                        <input type="title" id="title" name="title" class="form-control" placeholder="Title">
                        <select class="form-control mx-2" id="language" name="language">
                            <option>Null</option>
                        </select>
                        <select class="form-control" id="genre" name="genre">
                            <option value="">Select genre</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre }}">{{ $genre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group p-2 d-flex align-items-center justify-content-center">
                        <a onclick="submit()" class="btn btn-primary btn-lg m-2">Search</a>
                    </div>
                    <hr>
                    <div id="results">
                        <div class="form-group p-2 d-flex align-items-center justify-content-center">
                            <h2>No results found</h2>
                        </div>
                    </div>
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
                $("#language").append("<option value=''>Select language</option>");

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

    //Via AJAX the controller method is called an then the results are displayed on the view
    function submit(){
        $.ajax({
            'url' : '{{ route('search.results') }}',
            'type' : 'GET',
            'data' : { 
                title: $("#title").val(),
                language: $("#language").val(),
                genre: $("#genre").val()
            },
            'success' : function(books) {              
                    if(books.length > 0) {
                        $("#results").html("");
                        const book_path = "{{ route('home') }}" + "/book/";
                        for(let i = 0; i < books.length; i++){
                            $("#results").append("<div class='row'>" +
                                                    "<div class='col-2'>" +
                                                    "<img src='"+books[i].cover_path+"' style='max-width:150px;' >" +
                                                    "</div>" + 
                                                    "<div class='col'>" +
                                                    "<a href='"+book_path+books[i].id+"'>"+books[i].title+"</a>" +
                                                    "</div>" + 
                                                "</div>");
                            if(i < books.length - 1) $("#results").append("<hr>");
                        }
                        
                    } else {
                        $("#results").html("<div class='form-group p-2 d-flex align-items-center justify-content-center'>" +
                                                "<h2>No results found</h2>" +
                                            "</div>");
                    }
            },
            'error' : function(request, error) {
                toastr.error("Failed to load results list.");
            }
        });
    }
</script>
@endsection