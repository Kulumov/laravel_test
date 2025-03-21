<x-admin-layout header="Users">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Registration date and time</th>
                <th scope="col" class="text-center">Is admin</th>
                <th scope="col" class="text-center">Edit</th>
                <th scope="col" class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($users as $user)
                <x-user-row :user="$user" />
            @empty
                <p>No users found</p>
            @endforelse
        </tbody>
    </table>
    <div class="container">
        <a href="{{url("/admin/users/create")}}" class="btn btn-primary">Add a user</a>
    </div>
</x-admin-layout>