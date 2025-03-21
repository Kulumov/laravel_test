@props(["item"])

<div class="card m-3 " style="width: 18rem;">
    <img src="{{url('storage/' . $item->image)}}" class="card-img-top" alt="{{$item->name}}">
    <div class="card-body">
        <h5 class="card-title">{{$item->name}}</h5>
        {{-- <p class="card-text">{{$item->description}}</p> --}}
        <a href="{{url("/news/" . $item->id)}}" class="btn btn-primary">Read more</a>
    </div>
</div>