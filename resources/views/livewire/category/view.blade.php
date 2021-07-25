<div>
    <div class="mt-10 w-full max-w-xl mx-auto">
        <a href="{{route('category.view', ['slug' => $category->category_slug])}}"
           class="block mb-2 border-b mb-5 pb-5 relative border-gray-200 bg-gray-200 p-4 overflow-hidden">
            <span class="z-10 absolute font-bold text-gray-600 text-lg right-0 bottom-10"
                  style="font-size: 115px;">#</span>
            <h3 class="text-2xl font-bold">{{ $category->category_title }}</h3>
            <p class="text-sm text-gray-600">{!!  Str::limit($category->category_description, 100)  !!}</p>
        </a>
    </div>
    <div class="mt-10 w-full max-w-xl mx-auto">
        <div wire:loading>
            loading ....
        </div>

        @if(empty($category->post()) || count($category->post()) === 0)
            <div class="text-red-600 font-bold bg-red-300 border-red-600 border-2 p-4">
                there is no posts.
            </div>
        @else
            @foreach($category->post() as $post)
                @include('components.blog-posts', ['post'=> $post])
            @endforeach
        @endif
    </div>
</div>
