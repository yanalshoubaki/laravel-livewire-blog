<header class="text-gray-700 body-font border-b">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
            <a href="/" class="mr-5 hover:text-gray-900">Home</a>
            <a href="{{route('blog')}}" class="mr-5 hover:text-gray-900">Blog</a>
            <a href="{{route('category.all')}}" class="mr-5 hover:text-gray-900">Categories</a>

            <a>
                @livewire('search')
            </a>
        </nav>
        <a class="flex order-first lg:order-none lg:w-1/5 title-font font-bold items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
            Yanal Blog
        </a>
        <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
            @if(Auth::user())
                <a
                    class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">{{auth()->user()->name}}</a>
            @else
                <a href="{{route('login')}}"
                   class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">Login</a>
            @endif
        </div>
    </div>
</header>
