@section('title', 'All Blogs')

<div class="container">
    <div class="w-2/4 mx-auto p-4">
        <h1 class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
            Blog</h1>

        <div class="space-y-8 divide-y divide-gray-200 mt-10">
            @foreach($blogs->all() as $blog)
                @include('components.blog-blogs', ['blog' => $blog])
            @endforeach
        </div>
    </div>
</div>
