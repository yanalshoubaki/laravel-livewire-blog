@section('title', 'Categories')

<div>
    <div class="max-w-xl mx-auto mt-10">

            <div class="mt-10 space-y-8 divide-y divide-gray-200">
                <div wire:loading>
                    loading ....
                </div>
                @if(empty($categories) || count($categories) === 0)
                    <div class="p-4 font-bold text-red-600 bg-red-300 border-2 border-red-600">
                        there is no categories.
                    </div>
                @else
                        @foreach($categories as $category)
                            <a href="{{route('category.view', ['slug' => $category->category_slug])}}" class="relative block p-4 pb-5 mb-2 mb-5 overflow-hidden bg-gray-200 border-b border-gray-200">
                                <span class="absolute right-0 z-10 text-lg font-bold text-gray-600 bottom-10" style="font-size: 115px;">#</span>
                                <h3 class="text-2xl font-bold">{{ $category->category_title }}</h3>
                                <p class="text-sm text-gray-600">{!!  Str::limit($category->category_description, 100)  !!}</p>
                                <span class="mt-1 text-sm text-gray-600">{{count($category->post())}} Posts</span>
                            </a>
                        @endforeach
                @endif
            </div>
    </div>
</div>
