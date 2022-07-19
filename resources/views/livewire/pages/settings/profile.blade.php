<div class="container pt-4 pl-3 pr-3 mx-auto profile-wrapper lg:pl-5 md:pr-0">
    <div class="w-full p-5 bg-white border border-gray-100 shadow-sm rounded-xl">
        <form>
            <div>
                <div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                Profile
                            </h3>
                            <p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
                                Below is your profile information for your account
                            </p>
                        </div>
                    </div>
                    <div class="mt-6 sm:mt-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="username" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Username
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex max-w-lg rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 py-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
                                        example.com/
                                    </span>
                                    <input id="username" class="flex-1 block w-full px-3 py-3 transition duration-150 ease-in-out border border-l-0 border-gray-300 rounded-none rounded focus:outline-none no-left-round form-input sm:text-sm sm:leading-5" name="username"  wire:model="user.username" spellcheck="false" data-ms-editor="true">
                                    <div class="ms-editor-squiggles-container" style="all: initial;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="about" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                About
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex max-w-lg rounded-md shadow-sm">
                                    <textarea id="about" rows="3" name="about" wire:model="user.bio" class="block w-full transition duration-150 ease-in-out form-textarea sm:text-sm sm:leading-5" spellcheck="false" data-ms-editor="true">A lifelong learner, eager to understand and inspire, and a passionate programmer and with ability designing great solutions.</textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
                            </div>
                        </div>

                        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="avatar" class="block text-sm font-medium leading-5 text-gray-700">
                                Avatar
                            </label>
                            <div class="mt-2 sm:mt-0 sm:col-span-2">
                                <div class="flex items-center">
                                    <img id="avatar_preview" src="{{is_string($avatar) ? URL::asset('storage/' . $avatar) : $avatar->temporaryUrl()}}" class="w-12 h-12 rounded-full">
                                    <span class="ml-5 rounded-md shadow-sm">
                                        <button type="button" class="relative px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                                            Change
                                            <input type="file" id="upload" class="absolute inset-0 w-full h-full opacity-0" wire:model="avatar">
                                            <input type="hidden" id="uploadBase64" name="avatar">
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="pt-8 mt-8 border-t border-gray-200 sm:mt-5 sm:pt-10">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Personal Information
                        </h3>
                        <p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
                            Update some personal information. Your address will never be publicly available.
                        </p>
                    </div>
                    <div class="mt-6 sm:mt-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-xs rounded-md shadow-sm">
                                    <input id="name" name="name" wire:model="user.name" class="block w-full px-3 py-3 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5" spellcheck="false" data-ms-editor="true">
                                    <div class="ms-editor-squiggles-container" style="all: initial;"></div></div>
                            </div>
                        </div>

                   </div>
                </div>

                <div class="pt-8 mt-8 border-t border-gray-200 sm:mt-5 sm:pt-10">
                    <div class="flex items-end justify-between">
                        <div class="relative">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                Social Networks
                            </h3>
                            <p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
                                Let everyone know where they can find you.
                            </p>
                        </div>
                        <p class="mt-1 text-xs text-gray-400">Fill out at least 3 to complete your profile info.</p>
                    </div>
                    <div class="mt-6 sm:mt-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Twitter
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex max-w-lg rounded-md shadow-sm">
											<span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
												https://twitter.com/
											</span>
                                    <input wire:model="social.twitter" id="twitter" name="twitter" value="Itsyanal" class="flex-1 block w-full transition duration-150 ease-in-out rounded-none no-left-round form-input sm:text-sm sm:leading-5" spellcheck="false" data-ms-editor="true">
                                    <div class="ms-editor-squiggles-container" style="all: initial;"></div></div>
                            </div>
                        </div>
                        <div class="mt-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Facebook
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex max-w-lg rounded-md shadow-sm">
											<span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
												https://facebook.com/
											</span>
                                    <input id="facebook" wire:model="social.facebook"value="yanalalshoubaki" class="flex-1 block w-full transition duration-150 ease-in-out rounded-none no-left-round form-input sm:text-sm sm:leading-5" spellcheck="false" data-ms-editor="true">
                                    <div class="ms-editor-squiggles-container" style="all: initial;"></div></div>
                            </div>
                        </div>
                        <div class="mt-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Instagram
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex max-w-lg rounded-md shadow-sm">
											<span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
												https://instagram.com/
											</span>
                                    <input id="instagram" wire:model="social.instagram" value="yanalshoubaki" class="flex-1 block w-full transition duration-150 ease-in-out rounded-none no-left-round form-input sm:text-sm sm:leading-5" spellcheck="false" data-ms-editor="true">
                                    <div class="ms-editor-squiggles-container" style="all: initial;"></div></div>
                            </div>
                        </div>
                        <div class="mt-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Github
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex max-w-lg rounded-md shadow-sm">
											<span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
												https://github.com/
											</span>
                                    <input id="github" wire:model="social.github" value="yanalshoubaki" class="flex-1 block w-full transition duration-150 ease-in-out rounded-none no-left-round form-input sm:text-sm sm:leading-5" spellcheck="false" data-ms-editor="true">
                                    <div class="ms-editor-squiggles-container" style="all: initial;"></div></div>
                            </div>
                        </div>
                   </div>
                </div>

            </div>
            <div class="pt-5 mt-6 border-t border-gray-200">
                <div class="flex justify-end">
							<span class="inline-flex ml-3 rounded-md shadow-sm">
								<button type="button" wire:click="updateProfile" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
									Save
								</button>
							</span>
                </div>
            </div>
        </form>
    </div>
</div>
