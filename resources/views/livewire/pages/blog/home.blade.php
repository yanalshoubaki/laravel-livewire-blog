@section('title', 'All Blogs')

<div class="container">
    <div class="w-2/4 p-4 mx-auto">
        <h1 class="mt-6 text-4xl font-extrabold leading-10 tracking-tight text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
            Blog</h1>

        <div class="mt-10 space-y-8 divide-y divide-gray-200">
            @forelse ( $posts->all() as $post )
                @include('components.blog-posts', ['post' => $post])

            @empty
                <div class="p-4 font-bold text-red-600 bg-red-300 border-2 border-red-600">
                        there is no blogs.
                </div>
            @endforelse
        </div>
    </div>
</div>
