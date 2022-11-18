@section('title', $type)

<div class="container">
    <div class="w-2/4 mx-auto p-4">
        <h1 class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
            Blog</h1>
        <ul id="tabs" class="grid grid-cols-2 pt-2 px-1 w-full ">
            <li wire:click="setBlogDataType('feed')" class="{{($type === "feed") ? "border-b-4 border-blue-500" : ""}} bg-white px-4 text-gray-800 font-semibold py-2 border ">
               Feed</li>
            <li wire:click="setBlogDataType('latest')" class="{{($type === "latest")  ? "border-b-4 border-blue-500" : ""}} px-4 text-gray-800 font-semibold py-2 border">
               Latest</li>

        </ul>
        <div class="space-y-8 divide-y divide-gray-200 mt-10">
            <div wire:loading>
                loading ....
            </div>
            @if(empty($blogs) || count($blogs) === 0)
                <div class="text-red-600 font-bold bg-red-300 border-red-600 border-2 p-4">
                    there is no blogs.
                </div>
            @else
                @foreach($blogs as $blog)
                    @include('components.blog-blogs', ['blog' => $blog])
                @endforeach
            @endif
        </div>
    </div>
</div>
