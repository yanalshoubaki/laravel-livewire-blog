<div class="profile-wrapper container pt-4 pl-3 pr-3 mx-auto lg:pl-5 md:pr-0">
    <div class="w-full p-5 bg-white border border-gray-100 shadow-sm rounded-xl">
        <form action="">
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
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name"
                                class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-xs rounded-md shadow-sm">
                                    <input wire:model="user.name"
                                        class="block w-full py-3 px-3 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                                        spellcheck="false" data-ms-editor="true">
                                    <div class="ms-editor-squiggles-container" style="all: initial;"></div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Email
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-xs rounded-md shadow-sm">
                                    <input type="email" wire:model="user.email"
                                        class="block w-full py-3 px-3 transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                                        spellcheck="false" data-ms-editor="true">
                                </div>
                            </div>
                        </div>
                        <div
                            class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="avatar" class="block text-sm font-medium leading-5 text-gray-700">
                                Avatar
                            </label>
                            <div class="mt-2 sm:mt-0 sm:col-span-2">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-full overflow-hidden">
                                        <img id="avatar_preview"
                                            src="{{ $user->photo && $photo == null ? URL::asset('storage/' . $user->photo) : $photo->temporaryUrl() }}">
                                    </div>
                                    <span class="ml-5 rounded-md shadow-sm">
                                        <button type="button"
                                            class="relative px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
                                            Change
                                            <input type="file" id="upload"
                                                class="absolute inset-0 w-full h-full opacity-0" wire:model="photo">
                                            <input type="hidden" id="uploadBase64" name="avatar">
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="about"
                                class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                About
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex max-w-lg rounded-md shadow-sm">
                                    <textarea rows="3" wire:model="user.bio"
                                        class="block w-full transition duration-150 ease-in-out form-textarea sm:text-sm sm:leading-5" spellcheck="false"
                                        data-ms-editor="true">A lifelong learner, eager to understand and inspire, and a passionate programmer and with ability designing great solutions.</textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5 mt-6 border-t border-gray-200">
                <div class="flex justify-end">
                    <span class="inline-flex ml-3 rounded-md shadow-sm">
                        <button type="button" wire:click="updateProfile"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                            Save
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>

</div>
