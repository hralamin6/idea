<div class="w-70 mx-auto md:mx-0 md:mr-5">
    <div
        class="bg-white md:sticky md:top-8 border-2 border-blue-600 rounded-xl mt-16"
        style="
                          border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            border-image-slice: 1;
                            background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            background-origin: border-box;
                            background-clip: content-box, border-box;
                    "
    >
        <div class="text-center px-6 py-2 pt-6">
            <h3 class="font-semibold text-base">Add an idea</h3>
            @auth
                <p class="text-xs mt-4">Let us know what you would like and we'll take a look over!</p>
            @else

                <p class="text-xs mt-4">Please login to ceate an idea</p>
            @endauth
        </div>
        @auth
            <form wire:submit.prevent="addIdea" method="POST" class="space-y-4 px-4 py-6">
                <div>
                    <input wire:model.lazy="title" type="text" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-500 px-4 py-2" placeholder="Your Idea">
                    @error('title')<span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>@enderror

                </div>
                <div>
                    <select wire:model.lazy="category_id" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2">
                        <option value="">Select Category</option>
                        @foreach($cat as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')<span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>@enderror

                </div>

                <div>
                    <textarea wire:model.lazy="description" name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-500 text-sm px-4 py-2" placeholder="Describe your idea"></textarea>
                    @error('description')<span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>@enderror

                </div>
                <div class="flex items-center justify-between space-x-3">
                    <button
                        type="button"
                        class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                    >
                        <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        <span class="ml-1">Attach</span>
                    </button>
                    <button
                        type="submit"
                        class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-600 text-white font-semibold rounded-xl border border-blue-600 hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                    >
                        <span class="ml-1">Submit</span>
                    </button>
                </div>
            </form>
        @else
            <div class="my-6 text-center flex justify-between gap-4">
                <a wire:click.prevent="redirectToLogin" href="{{route('login')}}"
                   type="submit"
                   class="flex btn-sm items-center justify-center w-1/2 h-9 text-xs bg-blue-600 text-white font-semibold rounded-xl border border-blue-600 hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                >
                    <span class="ml-1 capitalize">login</span>
                </a>
                <a wire:click.prevent="redirectToLogin" href="{{route('register')}}"
                   type="submit"
                   class="flex btn-sm items-center justify-center w-1/2 h-9 text-xs bg-blue-600 text-white font-semibold rounded-xl border border-blue-600 hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                >
                    <span class="ml-1 capitalize">Register</span>
                </a>
            </div>
        @endauth
    </div>
</div>
