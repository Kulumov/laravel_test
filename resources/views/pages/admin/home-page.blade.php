<x-admin-layout header="Main">
    <div class="container">
        <h3>Latest News</h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Author id</th>
                    <th scope="col" class="text-center">News title</th>
                    <th scope="col" class="text-center">View</th>
                    <th scope="col" class="text-center">Edit</th>
                    <th scope="col" class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse($news as $newsInfo)
                    <x-news-row :newsInfo="$newsInfo" />
                @empty
                    <p>No news for now</p>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="container">
        <h3>Most active users</h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Registration date and time</th>
                    <th scope="col" class="text-center">Is admin</th>
                    @if (request()->is('admin'))
                        <th scope="col" class="text-center">Number of posts</th>
                    @endif
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
    </div>
</x-admin-layout>