<x-admin-layout header="Users">
    <div class="d-flex justify-content-center align-items-center mt-5">
        <form class="w-75" method="POST" action="{{url('/admin/users/' . $user->id)}}">
            @csrf
            @method("PUT")
            <h1 class="h3 mb-3 fw-normal">Edit user</h1>

            <div class="form-floating mb-3">
                <input type="text" class="form-control @error("name") border-danger border-2 @enderror"
                    id="floatingUsername" placeholder="Enter your username`" name="name" value="{{$user->name}}">
                <label for="floatingUsername">Enter a new username</label>
                @error("name")
                    {{$message}}
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control @error("email") border-danger border-2 @enderror"
                    id="floatingEmail" placeholder="name@example.com" name="email" value="{{$user->email}}">
                <label for=" floatingEmail">Enter a new email address</label>
                @error("email")
                    {{$message}}
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control  @error("password") border-danger border-2 @enderror"
                    id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Enter a new password</label>
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

            <div class="form-floating mb-3">
                Do you want to grant the user admin privileges?
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="is_admin_yes" name="is_admin" value="1"
                        {{$user->is_admin == '1' ? 'checked' : ''}} required />
                    <label for="is_admin_yes" class="form-check-label">Yes</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="is_admin_no" name="is_admin" required value="0"
                        {{$user->is_admin == '0' ? 'checked' : ''}} />
                    <label for="is_admin_no" class="form-check-label">No</label>
                </div>
                @error("is_admin")
                    <p class="text-danger">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <button class="w-25 btn btn-lg btn-primary" type="submit">Save changes</button>
        </form>
    </div>
</x-admin-layout>