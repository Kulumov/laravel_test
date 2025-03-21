{{-- This component is used to display news data in admin panel --}}
@props(["user"])

<tr>
    <th scope="row" class="lh-lg text-center">{{$user->id}}</th>
    <td class="lh-lg text-center">{{$user->name}}</th>
    <td class="lh-lg text-center">{{$user->email}}</th>
    <td class="lh-lg text-center">{{$user->created_at}}</td>
    <td class="lh-lg text-center">{{$user->is_admin == '1' ? 'YES' : 'NO'}}</td>
    @if (request()->is('admin'))
        <td class="lh-lg text-center">{{$user->news_count}}</th>
    @endif
    <td class="text-center"><a class="btn btn-primary" href="{{url("/admin/users/" . $user->id . "/edit")}}">Edit</a>
    </td>
    <td class="text-center">
        <form action="{{url('/admin/users/' . $user->id)}}" method="POST">
            @method("DELETE")
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>