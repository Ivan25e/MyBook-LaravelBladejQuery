@extends("template.template")

@section("title")
    Register
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
            <h2>Register</h2>
            <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Register</li>
            </ol>
        </div>

        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST" id="registerForm">
                        @csrf
                        <div class="form-group p-2">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" aria-describedby="nameHelp" placeholder="H.P. Lovecraft" required>
                            <small id="nameHelp" class="form-text text-muted">Please write your full name.</small>
                        </div>
                        <div class="form-group p-2">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="example@email.com" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group p-2">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password"  required>
                            <small id="passwordInfo" class="form-text text-muted">The password must have: minimum eight characters, an uppercase letter, a number and a special character.</small>
                        </div>
                        <div class="form-group p-2">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" name="country">
                                <option>Null</option>
                            </select>
                            <small id="countryInfo" class="form-text text-muted">Select your country.</small>
                        </div>
                        <button onclick="submitForm()" class="btn btn-primary m-2">Register me</button>
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
        loadCountryList();
    }

    //Via API call the dropdown country list is filled
    function loadCountryList(){
        $.ajax({
            'url' : 'https://restcountries.com/v3.1/all',
            'type' : 'GET',
            'success' : function(data) {              
                $("#country").html("");

                countriesName = [];

                for(let i = 0; i < data.length; i++){
                    countriesName.push(data[i].name.common);
                }

                countriesName.sort((a, b) => a.localeCompare(b));

                for(let i = 0; i < countriesName.length; i++){
                    $("#country").append("<option>" + countriesName[i] + "</option>");
                }
            },
            'error' : function(request, error) {
                toastr.error("Failed to load country list.");
            }
        });
    }

    //Checks the password conditions
    function checkPassword(){
        return $("#password").val().match(/^(?=.{8,})(?=.*[0-9].*)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&+=]).*$/) 
            ? true 
                : false;
    }
    
    //Submits the register form
    function submitForm(){
        if(checkPassword()){
            $("#registerForm").submit();
        } else {
            toastr.warning("Password is incorrect.");
        }
    }

</script>
@endsection