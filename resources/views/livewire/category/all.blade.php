@section('title', 'Categories')

<div>
    <div class="mt-10 max-w-xl mx-auto">
        @auth
            <div class="flex justify-end">
                <a href="{{ route('category.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create Category
                </a>
            </div>
        @endauth
        <div class="space-y-8 divide-y divide-gray-200 mt-10">
            <div wire:loading>
                loading ....
            </div>
            @if (empty($categories) || count($categories) === 0)
                <div class="text-red-600 font-bold bg-red-300 border-red-600 border-2 p-4">
                    there is no categories.
                </div>
            @else
                @foreach ($categories as $category)
                    <a href="{{ route('category.view', ['category' => $category]) }}"
                        class="block border-b mb-5 pb-5 relative border-gray-200 bg-gray-200 p-4 overflow-hidden">
                        <span class="z-10 absolute font-bold text-gray-600 text-lg right-0 bottom-10"
                            style="font-size: 115px;">#</span>
                        <h3 class="text-2xl font-bold">{{ $category->title }}</h3>
                        <p class="text-sm text-gray-600">{!! Str::limit($category->description, 100) !!}</p>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div>
