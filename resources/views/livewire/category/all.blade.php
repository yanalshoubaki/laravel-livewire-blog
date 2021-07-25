<div>
    <div class="mt-10 max-w-xl mx-auto">
        @foreach($categories as $category)
            <a href="{{route('category.view', ['slug' => $category->category_slug])}}" class="block mb-2 border-b mb-5 pb-5 relative border-gray-200 bg-gray-200 p-4 overflow-hidden">
                <span class="z-10 absolute font-bold text-gray-600 text-lg right-0 bottom-10" style="font-size: 115px;">#</span>
                <h3 class="text-2xl font-bold">{{ $category->category_title }}</h3>
                <p class="text-sm text-gray-600">{!!  Str::limit($category->category_description, 100)  !!}</p>
                <span class="text-sm text-gray-600 mt-1">{{count($category->post())}} Posts</span>
            </a>
        @endforeach
    </div>
</div>
