<div>
    <div class="mt-10 max-w-xl mx-auto">
        @foreach($posts as $post)
            <div class="border-b mb-5 pb-5 border-gray-200">
                <a href="/post/{{ $post->post_slug }}" class="text-2xl font-bold mb-2">{{ $post->post_title }}</a>
                <p>{{ Str::limit($post->post_content, 100) }}</p>
            </div>
        @endforeach
    </div>
</div>
