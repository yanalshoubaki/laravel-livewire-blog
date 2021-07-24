<div class="border border-gray-200 overflow-hidden rounded-md shadow-2xl mb-5 pb-4 ">
    <div class="post_image  mb-2">
        <img src="{{$post->post_image}}" alt="">
    </div>
    <div class="post_info p-4">
        <a href="/post/{{ $post->post_slug }}" class="text-2xl font-bold mt-2 mb-2">{{ $post->post_title }}</a>
        <p>{{ Str::limit($post->post_content, 100) }}</p>
        <div class="flex justify-start mt-4">
            <span class="author mr-1 flex justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
</svg>
                {{$post->user()->name}}
            </span>
            <span class="readtime flex justify-start"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>{{readDuration($post->post_content) . ' min read'}}</span>

        </div>
    </div>

</div>
