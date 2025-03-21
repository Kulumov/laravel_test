<x-layout>
    <div class="container w-50 mt-4">
        <h2>Edit News</h2>
        <form class="mt-4" action="{{url("/news/" . $news->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control @error("image") border-danger border-2 @enderror" id="image"
                    placeholder="Image" name="image">
                @error("image")
                    {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control @error("name") border-danger border-2 @enderror" id="name"
                    name="name" placeholder="Title" value="{{$news->name}}">
                @error("name")
                    {{$message}}
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="description">Description</label>
                <textarea class="form-control  @error("description") border-danger border-2 @enderror" id="description"
                    name="description" placeholder="Tell us something interesting"
                    rows="10">{{$news->description}}</textarea>
                @error("description")
                    {{$message}}
                @enderror
            </div>

            <button class="btn btn-primary mt-3" type="submit">Save</button>
        </form>
    </div>
</x-layout>