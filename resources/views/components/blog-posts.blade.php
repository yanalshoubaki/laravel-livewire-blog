<div class="border border-gray-200 overflow-hidden rounded-md shadow-2xl mb-5 pb-4 ">
    <div class="blog_image  mb-2">
        <img src="{{ URL::asset('storage/' . $blog->image) }}" class="w-full" alt="{{ $blog->title }}">
    </div>
    <div class="blog_info p-4">
        <a href="{{ route('blogs.view', ['blog' => $blog]) }}"
            class="text-2xl font-bold mt-2 mb-2">{{ $blog->title }}</a>
        <p class="text-gray-600 text-sm lowercase mt-2">{{ Str::limit(strip_tags($blog->content), 100, '...') }}</p>

        <div class="flex justify-start mt-4 items-center">
            <span class="author mr-4 text-sm flex justify-start items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                {{ $blog->has('user') != null ? $blog->User->name : 'author' }}
            </span>
            <span class="readtime  text-sm flex justify-start items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ readDuration($blog->content) . ' min read' }}
            </span>

        </div>
    </div>

</div>
