{{-- This component is used to display news data in admin panel --}}
@props(["newsInfo"])

<tr>
    <th scope="row" class="lh-lg text-center">{{$newsInfo->id}}</th>
    <th scope="row" class="lh-lg text-center">{{$newsInfo->author_id}}</th>
    <td class="lh-lg">{{$newsInfo->name}}</td>
    <td class="text-center"><a class="btn btn-primary" href="{{url("/admin/news/" . $newsInfo->id)}}">View</a></td>
    <td class="text-center"><a class="btn btn-primary" href="{{url("/admin/news/" . $newsInfo->id . "/edit")}}">Edit</a>
    </td>
    <td class="text-center">
        <form action="{{url('/admin/news/' . $newsInfo->id)}}" method="POST">
            @method("DELETE")
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>