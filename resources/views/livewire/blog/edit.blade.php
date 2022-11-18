@section('title', 'Edit Blog ' . $blog->id)

<div class="container">
    <div class="w-2/4 mx-auto p-4">
        <h1
            class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
            Update Blog</h1>
        <p class="text-lg mt-2 text-gray-600">Start crafting your new blogbelow.</p>
        <div class="space-y-8 divide-y divide-gray-200 mt-10">
            @if ($saveSuccess)
                <div class=" bg-green-100 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Successfully Saved Blog</h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>Your new bloghas been saved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <form wire:submit.prevent="saveBlog" enctype="multipart/form-data">
                <div class="sm:col-span-6 m-2">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Blog Image
                    </label>
                    <img src="{{ URL::asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                    <div class="mt-1">
                        <input type="file"wire:model="blog.image"
                            class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                    <div wire:loading wire:target="blog.image">Uploading...</div>

                    @error('blog.image')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>
                <div class="sm:col-span-6 m-2">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Blog Title
                    </label>
                    <div class="mt-1">
                        <input id="title" wire:model="blog.title"
                            class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                    @error('blog.title')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>
                <div class="sm:col-span-6 m-2">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Blog Category
                    </label>
                    <div class="mt-1">
                        <select wire:model="blog.category_id"
                            class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('blog.category_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-6 m-2 ">
                    <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                    <div class="mt-1">
                        <div class="mt-2 bg-white" wire:ignore>
                            <div id="toolbar-container">
                                <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-strike"></button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-script" value="sub"></button>
                                    <button class="ql-script" value="super"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-header" value="1"></button>
                                    <button class="ql-header" value="2"></button>
                                    <button class="ql-blockquote"></button>
                                    <button class="ql-code-block"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-indent" value="-1"></button>
                                    <button class="ql-indent" value="+1"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-direction" value="rtl"></button>
                                    <select class="ql-align"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                    <button class="ql-video"></button>
                                    <button class="ql-formula"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-clean"></button>
                                </span>
                            </div>
                            <div class="h-64" x-data x-ref="quillEditor" x-init="quill = new Quill($refs.quillEditor, { theme: 'bubble', modules: { toolbar: '#toolbar-container' } });
                            quill.root.innerHTML = '{!! $blog->content !!}';
                            quill.on('text-change', function() { $dispatch('quill-input', quill.root.innerHTML); });"
                                x-on:quill-input.debounce.2000ms="@this.set('blog.content', $event.detail)">

                                {!! $blog->content !!}
                            </div>
                        </div>
                    </div>
                    @error('post_content')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>
                <div wire:click="saveBlog"
                    class=" m-2 inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">
                    Update Blog
                </div>
            </form>
        </div>
    </div>
</div>
@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.7.3/dist/alpine.min.js"></script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
