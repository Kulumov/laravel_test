<x-admin-layout header="News">
    <div class="container">
        <img src="{{url('storage/' . $newsInfo->image)}}" alt="" height=300 width=600>
        <h1>{{$newsInfo->name}}</h1>
        <h4 class="border-bottom">{{$newsInfo->name}}</h4>
        <p>{{$newsInfo->description}}</p>
        <div class="container d-flex justify-content-end">
            <p>Publication date: {{$newsInfo->created_at}}</p>
        </div>
    </div>
</x-admin-layout>