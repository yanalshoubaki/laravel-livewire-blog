@section('title', 'Login')
<div class="lg:flex">
    <div class="w-full">
        <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 lg:mx-auto lg:w-1/2">
            <h2
                    class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold"
            >Log in</h2>
            <div class="mt-12">
                <form wire:submit.prevent="login">
                    <div>
                        <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                        <input
                                type="email" wire:model="email"
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                placeholder="example@gmail.com"
                        >
                        @error('email') <span class="text-red-600">{{ $message }}</span> @enderror

                    </div>
                    <div class="mt-8">
                        <div class="flex justify-between items-center">
                            <div class="text-sm font-bold text-gray-700 tracking-wide">
                                Password
                            </div>
                            <div>
                                <a
                                        class="text-xs font-display font-semibold text-indigo-600 hover:text-indigo-800
                                        cursor-pointer"
                                >
                                    Forgot Password?
                                </a>
                            </div>

                        </div>
                        <input
                                type="password" wire:model="password"
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                placeholder="Enter your password"
                        >
                        @error('password') <span class="text-red-600">{{ $message }}</span> @enderror

                    </div>
                    <div class="mt-10">
                        <button
                                type="submit" wire:submit="login" class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg"
                        >
                            Log In
                        </button>
                    </div>
                </form>
                <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                    Don't have an account ? <a
                            href="{{route('register')}}" class="cursor-pointer text-indigo-600 hover:text-indigo-800"
                    >Sign
                        up</a>
                </div>
            </div>
        </div>
    </div>
</div>