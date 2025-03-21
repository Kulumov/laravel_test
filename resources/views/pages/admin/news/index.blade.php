<x-admin-layout header="News">
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
    <div class="container">
        <a href="{{url("/admin/news/create")}}" class="btn btn-primary">Add news</a>
    </div>
</x-admin-layout>