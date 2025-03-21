<x-layout>
    <div class="container">
        <h2 class="mt-4">{{$user->name}}</h2>
        <div class="mt-2">
            <a href="{{url('/change_password')}}" class="btn btn-primary" role="button">Change password</a>
        </div>
        <div class="mt-2">
            <a href="{{url('/news/create')}}" class="btn btn-primary" role="button">Add news</a>
        </div>
    </div>
</x-layout>