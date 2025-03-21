<x-layout>
    <div class="container">
        <h2 class="mt-4">Change you password</h2>
        <form class="w-25" method="POST" action="{{url('/change_password')}}">
            @csrf
            <div class="form-floating mb-3">
                <input type="password" class="form-control  @error("password") border-danger border-2 @enderror"
                    id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Your new password</label>
                @error("password")
                    {{$message}}
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control  @error("validatePassword") border-danger border-2 @enderror"
                    id="password_confirmation" placeholder="Enter the password again" name="password_confirmation">
                <label for="password_confirmation">Enter the new password again</label>
                @error("password_confirmation")
                    {{$message}}
                @enderror
            </div>
            <p>After changing your password, you will be logged out.</p>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
        </form>
    </div>
</x-layout>