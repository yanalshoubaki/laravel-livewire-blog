<header class="text-gray-700 border-b body-font">
    <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
        <nav class="flex flex-wrap items-center text-base lg:w-2/5 md:ml-auto">
            <a href="/" class="mr-5 hover:text-gray-900">Home</a>
            <a href="{{route('blogs.home')}}" class="mr-5 hover:text-gray-900">Blog</a>
            <a href="{{route('categories.home')}}" class="mr-5 hover:text-gray-900">Categories</a>

            <a>
                @livewire('components.search')
            </a>
        </nav>
        <a class="flex items-center order-first mb-4 font-bold text-gray-900 lg:order-none lg:w-1/5 title-font lg:items-center lg:justify-center md:mb-0">
            Yanal Blog
        </a>
        <div class="inline-flex ml-5 lg:w-2/5 lg:justify-end lg:ml-0">
            @if(Auth::user())
                <div class="dropdown ">
                    <a
                            class="inline-flex items-center px-3 py-1 mt-4 text-white bg-blue-600 border-0 rounded-full focus:outline-none md:mt-0"><img src="{{auth()->user()->photo}}" class="w-10 h-10 mr-2 rounded-full"> {{auth()->user()->name}}</a>
                            <ul class="absolute hidden pt-1 text-gray-700 dropdown-menu">
                                <li>
                                    <a class="flex block px-4 py-2 whitespace-no-wrap bg-gray-200 rounded-t" href="{{route('profile')}}">
                                        <img src="{{auth()->user()->avatar}}" class="mr-2 rounded-full w-14 h-14">
                                        <div>

                                        {{auth()->user()->name}}
                                        <span class="block text-sm text-gray-400">{{auth()->user()->email}}</span>

                                        </div>

                                    </a>
                                </li>
                                <hr>
                                <li><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 hover:bg-gray-400" href="{{route('settings')}}">Settings</a></li>
                                <li><a class="block px-4 py-2 whitespace-no-wrap bg-gray-200 rounded-b hover:bg-gray-400" href="{{route('logout')}}">Logout</a></li>
                            </ul>
                </div>
            @else
                <a href="{{route('login')}}"
                   class="inline-flex items-center px-3 py-1 mt-4 mr-2 text-base text-blue-600 bg-white rounded focus:outline-none md:mt-0">Login</a>
                <a href="{{route('register')}}"
                   class="inline-flex items-center px-3 py-1 mt-4 text-base text-white bg-blue-600 border-0 rounded focus:outline-none md:mt-0">Register</a>

            @endif
        </div>
    </div>
</header>
