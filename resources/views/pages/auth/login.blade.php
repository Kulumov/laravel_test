<x-layout>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <form class="w-25" method="POST" action="{{url('/login')}}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating mb-3">
                <input type="email" class="form-control @error("email") border-danger border-2 @enderror"
                    id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
                @error("email")
                    {{$message}}
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control  @error("password") border-danger border-2 @enderror"
                    id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                @error("password")
                    <p>Password format is incorrect</p>
                @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </div>
</x-layout>