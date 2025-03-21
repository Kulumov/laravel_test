<x-layout>
    <div class="container">
        <img src="{{url('storage/' . $newsInfo->image)}}" alt="" height=300 width=600>
        <h1>{{$newsInfo->name}}</h1>
        <h4 class="border-bottom">{{$newsInfo->name}}</h4>
        <p>{{$newsInfo->description}}</p>
        <div class="container d-flex justify-content-end">
            <p>Publication date: {{$newsInfo->created_at}}</p>
        </div>
        @can('update', $newsInfo)
            <div class="container d-flex justify-content-end">
                <a href="{{url('/news/' . $newsInfo->id . '/edit')}}" class="btn btn-primary mx-1" role="button">Edit</a>
                <form method="POST" action="{{url('/news/' . $newsInfo->id)}}" class="mx-1"
                    onsubmit="return confirm('Are you sure?')">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endcan
    </div>
</x-layout>