@section('title', 'Register')
<div class="register-page">

    @if (!empty($successMsg))
        <div class="alert alert-success">
            {{ $successMsg }}
        </div>
    @endif
    <div class="w-full py-6 ">
        <div class="flex justify-center content-center">
            <div class="w-1/4">
                <div class="relative mb-2">
                    <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
                        <span class="text-center text-white w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="text-xs text-center md:text-base">User Details</div>
            </div>

            <div class="w-1/4">
                <div class="relative mb-2">
                    <div class="absolute flex align-center items-center align-middle content-center"
                        style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                        <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                            <div class="w-0 bg-green-300 py-1 rounded"
                                style="{{ $currentStep == 2 || $currentStep == 3 ? ' width: 100%;' : '' }}"></div>
                        </div>
                    </div>
                    <div
                        class="w-10 h-10 mx-auto {{ $currentStep == 2 || $currentStep == 3 ? 'bg-green-500' : 'bg-gray-200' }} rounded-full text-lg text-white flex items-center">
                        <span class="text-center text-white w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  mx-auto" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                    clip-rule="evenodd" />
                            </svg>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="text-xs text-center md:text-base">Profile Image</div>
            </div>

            <div class="w-1/4">
                <div class="relative mb-2">
                    <div class="absolute flex align-center items-center align-middle content-center"
                        style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                        <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                            <div class="w-0 bg-green-300 py-1 rounded"
                                style="{{ $currentStep == 3 ? ' width: 100%;' : '' }}"></div>
                        </div>
                    </div>

                    <div
                        class="w-10 h-10 mx-auto {{ $currentStep == 3 ? 'bg-green-500' : 'bg-gray-200' }}  rounded-full text-lg text-white flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  mx-auto" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        </svg></span>
                    </div>
                </div>

                <div class="text-xs text-center md:text-base">Finished</div>
            </div>

        </div>
    </div>
    <div class="lg:flex">
        <div class="w-full">
            <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 lg:mx-auto lg:w-1/2">
                <h2
                    class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                            xl:text-bold">
                    Register</h2>
                <div class="mt-12">
                    @if ($currentStep === 1)
                        <form>
                            <div class="mb-4 mr-2">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Full Name</div>
                                <label>
                                    <input type="text" wire:model="user.name" placeholder="e.g John Doe"
                                        class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500">
                                </label>
                                @error('user.name')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-4">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Username</div>
                                <label> <input type="text" wire:model="user.username"
                                        class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                        placeholder="e.g johndoe"> </label>
                                @error('user.username')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-4">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                                <label> <input type="email" wire:model="user.email"
                                        class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                        placeholder="e.g johndoe@gmail.com"> </label>
                                @error('user.email')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-4">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Password
                                </div>
                                <input type="password" wire:model="user.password"
                                    class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                    placeholder="Enter your password">
                                @error('user.password')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mt-10">
                                <button type="button" wire:click="registerStep1"
                                    class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                            font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                            shadow-lg">
                                    Next
                                </button>
                            </div>
                        </form>
                        <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                            Do you have an account ? <a href="{{ route('login') }}"
                                class="cursor-pointer text-indigo-600 hover:text-indigo-800">Sign in</a>
                        </div>
                    @endif
                    @if ($currentStep === 2)
                        <div class="text-sm font-bold text-gray-700 tracking-wide">
                            Profile Picture
                        </div>
                        <div class="flex w-full items-center flex-col gap-3 justify-center bg-grey-lighter">
                            <div class="w-1/4 rounded-full overflow-hidden">
                                @if ($photo)
                                    Photo Preview:
                                    <img src="{{ $photo->temporaryUrl() }}" class="w-full">
                                @endif
                            </div>
                            <label
                                class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-400 hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Select a file</span>
                                <input wire:model="photo" type='file' class="hidden" accept="images/*" />
                                @error('photo')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                            </label>
                        </div>
                        <div class="mt-10">
                            <button type="button" wire:click="registerStep2"
                                class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                        font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                        shadow-lg">
                                Finish Registration
                            </button>
                        </div>
                    @endif
                    @if ($currentStep === 3)
                        <span class="text-center text-white w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  mx-auto" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
