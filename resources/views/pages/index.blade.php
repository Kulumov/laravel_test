<x-layout>
    <h1>Home Page</h1>
    <div class="d-flex justify-content-evenly flex-wrap">
        @forelse ($news as $item)
            <x-news-card :item="$item" />
        @empty
            <p>No news for now</p>
        @endforelse
        <div class="container d-flex justify-content-center">
            <a class="btn btn-primary" href="{{url('/news')}}" role="button">All News</a>
        </div>
    </div>
</x-layout>