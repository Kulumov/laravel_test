<x-layout>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <form class="w-25" method="POST" action="{{url('/register')}}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Register a new account</h1>

            <div class="form-floating mb-3">
                <input type="text" class="form-control @error("name") border-danger border-2 @enderror"
                    id="floatingUsername" placeholder="Enter your username`" name="name">
                <label for="floatingUsername">Username</label>
                @error("name")
                    {{$message}}
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control @error("email") border-danger border-2 @enderror"
                    id="floatingEmail" placeholder="name@example.com" name="email">
                <label for="floatingEmail">Email address</label>
                @error("email")
                    {{$message}}
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control  @error("password") border-danger border-2 @enderror"
                    id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                @error("password")
                    {{$message}}
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control  @error("validatePassword") border-danger border-2 @enderror"
                    id="password_confirmation" placeholder="Enter the password again" name="password_confirmation">
                <label for="password_confirmation">Enter the password again</label>
                @error("password_confirmation")
                    {{$message}}
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </div>
</x-layout>