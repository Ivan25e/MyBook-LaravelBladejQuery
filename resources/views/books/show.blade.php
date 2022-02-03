@extends("template.template")

@section("title")
    {{ $book->title }}
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
            <h2>{{ $book->title }}</h2>
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('search') }}">Search</a></li>
                <li>{{ $book->title }}</li>
            </ol>
        </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    
    <section class="inner-page">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset($book->cover_path) }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <h3>{{ $book->title }} by {{ $book->user->name }}</h3>
                            <hr>
                            <h4>{{ $book->description }}</h4>
                            <hr>
                            Number of pages: {{ $book->pages }} <br>
                            Language: {{ $book->language }} <br>
                            Genre: {{ $book->genre }} <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection

@section("scripts")
    {{-- No custom scripts for this page --}}
@endsection