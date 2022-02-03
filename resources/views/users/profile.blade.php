@extends("template.template")

@section("title")
    My Profile
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
            <h2>My profile</h2>
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Profile</li>
            </ol>
        </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    
    <section class="inner-page">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3><a href="{{ route('book.create') }}"><i class="bx bx-right-arrow-alt"></i> Create new book</a></h3>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Book title</th>
                                <th scope="col">Show</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <th>{{ $book->title }}</th>
                                    <td class="h4 font-weight-bold"><a href="{{ route('book.show', $book->id) }}"><i class="bx bx-book"></i></a></td>
                                    <td class="h4 font-weight-bold"><a href="{{ route('book.edit', $book->id) }}"><i class="bx bx-edit"></i></a></td>
                                    <td class="h4 font-weight-bold"><a href="{{ route('book.destroy', $book->id) }}"><i class="bx bx-x-circle"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection

@section("scripts")
    {{-- No custom scripts for this page --}}
@endsection