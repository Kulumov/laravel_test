<x-layout>
    <h1>{{request()->is("news") ? "All news" : "My news"}}</h1>
    <div class="d-flex justify-content-evenly flex-wrap">
        @forelse ($news as $item)
            <x-news-card :item="$item" />
        @empty
            <div class="container flex-grow-1 mw-100">
                <p class="font-2">No news for now</p>
            </div>
        @endforelse
    </div>
</x-layout>