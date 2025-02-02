<div class="text-white">
    <div class="mt-4 p-4 absolute border rounded-md bg-gray-700 border-indigo-600">
        <!-- <div class="absolute top-0 right-0 pt-1 pr-3">
            <button type="button"
                wire:click="dispatch('search:clear-results')"
            >x</button>
        </div> -->
        @if (count($results) == 0)
        <p>No results found.</p>
        @endif
        @foreach ($results as $result)
        <div class="pt-2" wire:key="{{$result->id}}">
            <a href="/articles/{{ $result->id }}" wire:navigate.hover >
                {{$result->title}}
            </a>
        </div>
        @endforeach
    </div>
</div>
