<div>
    @section('title', $category->title)
    <div class="mt-10 w-full max-w-xl mx-auto">
        <a class="block mb-2 border-b mb-5 pb-5 relative border-gray-200 bg-gray-200 p-4 overflow-hidden">
            <span class="z-10 absolute font-bold text-gray-600 text-lg right-0 bottom-10"
                style="font-size: 115px;">#</span>
            <h3 class="text-2xl font-bold">{{ $category->title }}</h3>
            <p class="text-sm text-gray-600">{!! $category->description !!}</p>
        </a>
    </div>
    <div class="mt-10 w-full max-w-xl mx-auto">
        <div wire:loading>
            loading ....
        </div>
        @if ($category->blog && $category->blog()->count() == 0)
            <div class="text-red-600 font-bold bg-red-300 border-red-600 border-2 p-4">
                there is no blogs.
            </div>
        @else
            @foreach ($category->blog as $blog)
                @include('components.blog-blogs', ['blog' => $blog])
            @endforeach
        @endif
    </div>
</div>
