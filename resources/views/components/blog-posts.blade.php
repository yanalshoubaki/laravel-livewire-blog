<div class="pb-4 mb-5 overflow-hidden border border-gray-200 rounded-md shadow-2xl ">
    <div class="mb-2 post_image">
        <img src="{{$post->image}}" class="w-full" alt="{{$post->title}}">
    </div>
    <div class="p-4 post_info">

        <a href="/post/{{ $post->slug }}" class="mt-2 mb-2 text-2xl font-bold">{{ $post->title }}</a>
        <p class="mt-2 text-sm text-gray-600 lowercase">{{ Str::limit(strip_tags($post->content), 100, '...')  }}</p>
        <div class="flex items-center justify-start mt-4">
            <span class="flex items-center justify-start mr-4 text-sm author">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                {{$post->user() != null ? $post->user()->name() : 'author'}}
            </span>
            <span class="flex items-center justify-start text-sm readtime">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{readDuration($post->content) . ' min read'}}
            </span>

        </div>
    </div>

</div>
