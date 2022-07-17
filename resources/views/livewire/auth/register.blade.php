@section('title', 'Register')
<div class="register-page">

@if(!empty($successMsg))
    <div class="alert alert-success">
        {{ $successMsg }}
    </div>
@endif
<div class="w-full py-6 ">
    <div class="flex content-center justify-center">
        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="flex items-center w-10 h-10 mx-auto text-lg text-white bg-green-500 rounded-full">
              <span class="w-full text-center text-white">
                  <svg
                          xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-auto" viewBox="0 0 20 20"
                          fill="currentColor"
                  >
                  <path
                          fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                          clip-rule="evenodd"
                  />
                </svg>
                  </svg>
              </span>
                </div>
            </div>

            <div class="text-xs text-center md:text-base">User Details</div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div
                        class="absolute flex items-center content-center align-middle align-center"
                        style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                >
                    <div class="items-center flex-1 w-full align-middle bg-gray-200 rounded align-center">
                        <div
                                class="w-0 py-1 bg-green-300 rounded"
                                style="{{ $currentStep == 2 || $currentStep == 3 ?   " width: 100%;" : ''}}"
                        ></div>
                    </div>
                </div>
                <div class="w-10 h-10 mx-auto {{ $currentStep == 2 || $currentStep == 3 ?   "bg-green-500" : 'bg-gray-200'}} rounded-full text-lg text-white flex items-center">
              <span class="w-full text-center text-white">
                <svg
                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-auto" viewBox="0 0 20 20"
                        fill="currentColor"
                >
                  <path
                          fill-rule="evenodd"
                          d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                          clip-rule="evenodd"
                  />
                </svg>
                  </svg>
              </span>
                </div>
            </div>

            <div class="text-xs text-center md:text-base">Profile Image</div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div
                        class="absolute flex items-center content-center align-middle align-center"
                        style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)"
                >
                    <div class="items-center flex-1 w-full align-middle bg-gray-200 rounded align-center">
                        <div
                                class="w-0 py-1 bg-green-300 rounded"
                                style="{{ $currentStep == 3  ?   " width: 100%;" : ''}}"
                        ></div>
                    </div>
                </div>

                <div class="w-10 h-10 mx-auto {{ $currentStep == 3 ?   "bg-green-500" : 'bg-gray-200'}}  rounded-full text-lg text-white flex items-center">
                    <svg
                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-auto" viewBox="0 0 20 20"
                            fill="currentColor"
                    >
                        <path
                                fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                        />
                    </svg>
                    </svg>
                    </span>
                </div>
            </div>

            <div class="text-xs text-center md:text-base">Finished</div>
        </div>

    </div>
</div>
<div class="lg:flex">
    <div class="w-full">
        <div class="px-12 mt-10 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 lg:mx-auto lg:w-1/2">
            <h2
                    class="text-4xl font-semibold text-center text-indigo-900 font-display lg:text-left xl:text-5xl xl:text-bold"
            >Register</h2>
            <div class="mt-12">
                @if($currentStep === 1)
                        <div class="mb-4 mr-2">
                            <div class="text-sm font-bold tracking-wide text-gray-700">Full Name</div>
                            <label>
                                <input
                                        type="text" wire:model="name"
                                        class="w-full py-2 text-lg border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                >
                            </label>
                            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror

                        </div>

                    <div class="mb-4">
                        <div class="text-sm font-bold tracking-wide text-gray-700">Username</div>
                        <label>
                            <input
                                    type="text" wire:model="username"
                                    class="w-full py-2 text-lg border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                    placeholder="yanalshoubaki"
                            >
                        </label>
                        @error('username') <span class="text-red-600">{{ $message }}</span> @enderror

                    </div>
                    <div class="mb-4">
                        <div class="text-sm font-bold tracking-wide text-gray-700">Email Address</div>
                        <label>
                            <input
                                    type="email" wire:model="email"
                                    class="w-full py-2 text-lg border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                    placeholder="mike@gmail.com"
                            >
                        </label>
                        @error('email') <span class="text-red-600">{{ $message }}</span> @enderror

                    </div>
                    <div class="mt-8">
                        <div class="text-sm font-bold tracking-wide text-gray-700">
                            Password
                        </div>
                        <label>
                            <input
                                    type="password" wire:model="password"
                                    class="w-full py-2 text-lg border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                    placeholder="Enter your password"
                            >
                        </label>
                        @error('password') <span class="text-red-600">{{ $message }}</span> @enderror

                    </div>
                    <div class="mt-10">
                        <button
                                type="button" wire:click="registerStep1" class="w-full p-4 font-semibold tracking-wide text-gray-100 bg-indigo-500 rounded-full shadow-lg font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600"
                        >
                            Next
                        </button>
                    </div>

                    <div class="mt-12 text-sm font-semibold text-center text-gray-700 font-display">
                        Do you have an account ? <a
                                href="{{route('login')}}" class="text-indigo-600 cursor-pointer hover:text-indigo-800"
                        >Sign
                            in</a>
                    </div>
                @endif
                @if($currentStep === 2)
                    <div class="text-sm font-bold tracking-wide text-gray-700">
                        Profile Picture
                    </div>
                    <div class="flex items-center justify-center w-full bg-grey-lighter">
                        @if ($photo)
                            Photo Preview:
                            <img src="{{ $photo->temporaryUrl() }}" class="w-1/4 rounded-full">
                        @endif
                        <label class="flex flex-col items-center w-64 px-4 py-6 tracking-wide uppercase bg-white border rounded-lg shadow-lg cursor-pointer text-blue border-blue hover:bg-blue-400 hover:text-white">
                            <svg
                                    class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                            >
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">Select a file</span>
                            <input wire:model="photo" type='file' class="hidden" accept="images/*"/>
                            @error('photo') <span class="error">{{ $message }}</span> @enderror

                        </label>
                    </div>
                        <div class="mt-10">
                            <button
                                    type="button" wire:click="registerStep2" class="w-full p-4 font-semibold tracking-wide text-gray-100 bg-indigo-500 rounded-full shadow-lg font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600"
                            >
                                Finish Registration
                            </button>
                        </div>
                @endif
                @if($currentStep === 3)
                <span class="w-full text-center text-white">
                    <svg
                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-auto" viewBox="0 0 20 20"
                            fill="currentColor"
                    >
                      <path
                              fill-rule="evenodd"
                              d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                              clip-rule="evenodd"
                      />
                    </svg>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>
</div>