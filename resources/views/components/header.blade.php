<header class="text-gray-700 body-font border-b">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
            <a href="/" class="mr-5 hover:text-gray-900">Home</a>
            <a href="{{ route('blog') }}" class="mr-5 hover:text-gray-900">Blog</a>
            <a href="{{ route('category.all') }}" class="mr-5 hover:text-gray-900">Categories</a>
        </nav>
        <a
            class="flex order-first lg:order-none lg:w-1/5 title-font font-bold items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
            Yanal Blog
        </a>
        <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
            @if (Auth::check())
                <div class="dropdown ">
                    <a
                        class="inline-flex rounded-full bg-blue-600 text-white items-center border-0 py-1 px-3 focus:outline-none mt-4 md:mt-0">
                        <div class="w-10 h-10 rounded-full mr-2 overflow-hidden">
                            <img src="{{ URL::asset('storage/' . $user->photo) }}">
                        </div>
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                        <li>
                            <a class="rounded-t bg-gray-200 py-2 px-4 whitespace-no-wrap flex"
                                href="{{ route('profile') }}">
                                <div class="w-10 h-10 rounded-full mr-2 overflow-hidden">
                                    <img src="{{ URL::asset('storage/' . $user->photo) }}">
                                </div>
                                <div>

                                    {{ $user->name }}
                                    <span class="block text-sm text-gray-400">{{ $user->email }}</span>

                                </div>

                            </a>
                        </li>
                        <hr>
                        <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                href="{{ route('settings') }}">Settings</a></li>
                        <li><a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="inline-flex mr-2 items-center bg-white text-blue-600  py-1 px-3 focus:outline-none rounded text-base mt-4 md:mt-0">Login</a>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center bg-blue-600 border-0 py-1 px-3 focus:outline-none rounded text-base mt-4 md:mt-0 text-white">Register</a>
            @endif
        </div>
    </div>
</header>
