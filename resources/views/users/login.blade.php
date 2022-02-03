@extends("template.template")

@section("title")
    Login
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
            <h2>Log In</h2>
            <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Login</li>
            </ol>
        </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.login') }}" method="POST" id="loginForm">
                        @csrf
                        <div class="form-group p-2">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="example@email.com" required>
                            <small id="emailHelp" class="form-text text-muted">Please enter the email associated with your account.</small>
                        </div>
                        <div class="form-group p-2">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password"  required>
                            <small id="passwordInfo" class="form-text text-muted">Please enter your password.</small>
                        </div>
                        <button type="submit" class="btn btn-primary m-2">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection

@section("scripts")
    {{-- No custom scripts for this page --}}
@endsection