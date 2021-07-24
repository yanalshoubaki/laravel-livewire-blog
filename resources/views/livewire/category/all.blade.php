<div>
    <div class="mt-10 max-w-xl mx-auto">
        @foreach($categories as $category)
            <div class="border-b mb-5 pb-5 border-gray-200">
                <a href="/category/{{ $category->category_slug }}" class="text-2xl font-bold mb-2">{{ $category->category_title }}</a>
                <p>{{ Str::limit($category->category_description, 100) }}</p>
            </div>
        @endforeach
    </div>
</div>
