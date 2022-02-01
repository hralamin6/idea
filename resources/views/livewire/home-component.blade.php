<div x-data="{editModal: false, idea: ''}"
     x-init="window.livewire.on('ideaUpdated', () => { editModal = false})"
     @open-delete-modal.window="
     idea = event.detail.idea
Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('confirmed', idea )
                }
            })
">
    <div x-cloak
        x-show="editModal"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    ></div>

    <div x-cloak
        @editModalEvent.window="editModal = true"
        x-show="editModal"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        {{--        @click="closeSideMenu"--}}
        @click.outside="editModal = false"
        @keydown.escape="editModal = false"

        class="m-auto fixed  z-50 justify-center top-0">
        <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="md:w-96 w-72 mx-auto md:mx-0 md:mr-5">
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
                        <h3 class="font-semibold text-base">Edit idea</h3>
                    </div>
                    <form wire:submit.prevent="addIdea" method="POST" class="space-y-4 px-4 py-6">
                        <div>
                            <input wire:model.lazy="state.title" type="text" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-500 px-4 py-2" placeholder="Your Idea">
                            @error('title')<span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>@enderror

                        </div>
                        <div>
                            <select wire:model.lazy="state.category_id" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2">
                                <option value="">Select Category</option>
                                @foreach($cat as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')<span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>@enderror

                        </div>

                        <div>
                            <textarea wire:model.lazy="state.description" name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-500 text-sm px-4 py-2" placeholder="Describe your idea"></textarea>
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

                </div>
            </div>
        </div>
    </div>
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select wire:model="category" name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="">All Categories</option>
                @foreach ($cat as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select wire:model="filter" name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="No Filter">No Filter</option>
                <option value="top-voted">Top Voted</option>
                <option value="my-ideas">My Ideas</option>
                @admin
                <option value="Spam Ideas">Spam Ideas</option>
                <option value="Spam Comments">Spam Comments</option>
                @endadmin
            </select>
        </div>
        <div class="w-full md:w-2/3 relative">
            <input wire:model.lazy="search" type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
            <div class="absolute top-0 flex itmes-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->
    @forelse($ideas as $idea)
        <div class="ideas-container space-y-6 my-6 flex hover:shadow-lg transition duration-150 ease-in flex bg-white rounded-xl border hover:border-blue-600">
            <div class="rounded-xl idea-container">
                <div class="hidden md:block border-r-2 border-gray-150 px-5 py-6">
                    <div class="text-center">
                        <div class="font-semibold text-2xl {{$idea->voted_by_user>0?'text-blue-600':''}}">{{$idea->votes_count}}</div>
                        <div class="text-gray-500">votes</div>
                    </div>

                    <div class="mt-6">
                        <div>
                            <button wire:target="vote({{$idea->id}})" wire:loading.class="animate-pulse" wire:click.prevent="vote({{$idea->id}})" class="btn btn-sm hover:bg-blue-600 {{$idea->voted_by_user>0?'bg-blue-600':''}}">vote</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
                <div class="flex-none mx-2 md:mx-0">
                    <a href="{{route('single.idea', $idea)}}">
                        <img src="https://www.gravatar.com/avatar/{{md5($idea->user->email)}}?d=mp" alt="" class="w-16 h-16 rounded-xl">
                    </a>
                </div>
                <div class="w-full flex flex-col justify-between mx-2 md:mx-4">
                    <h4 class="text-xl font-semibold mt-2 md:mt-0">
                        <a href="{{route('single.idea', $idea)}}" class="hover:underline">{{$idea->title}}</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        {{$idea->description}}
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-500 font-semibold space-x-2">
                            <div>{{\Carbon\Carbon::parse($idea->created_at)->diffForHumans()}}</div>
                            <div>&bull;</div>
                            <div>{{$idea->category->name}}</div>
                            <div>&bull;</div>
                            <div class="text-gray-800">1 comments</div>
                        </div>
                        <div  x-data="{ isOpen: false }" class="flex items-center space-x-6 mt-4 md:mt-0">
                            <div>
                                <a href="{{route('single.idea', $idea)}}" class="p-2 btn btn-sm capitalize {{$idea->getStatusClass()}}">{{$idea->status}}</a>
                            </div>
                            @auth
                                <button  @click="isOpen = !isOpen" class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600 rounded-full h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul
                                        x-cloak
                                        x-show.transition.origin.top.left="isOpen"
                                        @click.away="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0"
                                    >
                                        @if($idea->user_id==auth()->id() | Gate::allows('isAdmin'))
                                            <li><a href="" wire:click.prevent="loadIdea({{$idea->id}})" @click.prevent="editModal=true" class="hover:bg-gray-200 px-5 block py-3 transition duration-150 ease-in">Edit idea</a></li>
                                            <li><a @click="$dispatch('open-delete-modal', { title: 'Hello World!', text: 'you cant revert', icon: 'error', idea: {{ $idea }} })" class="hover:bg-gray-200 px-5 block py-3 transition duration-150 ease-in">Delete idea</a></li>
                                        @endif
                                        <li><a href="" class="hover:bg-gray-200 px-5 block py-3 transition duration-150 ease-in">Mark as spam</a></li>
                                    </ul>
                                </button>
                            @endauth
                        </div>
                        <div class="flex items-center md:hidden mt-4 md:mt-0">
                            <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                                <div class="text-sm font-bold leading-none {{$idea->voted_by_user>0?'text-blue-600':''}}">{{$idea->votes_count}}</div>
                                <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                            </div>
                            <button wire:target="vote({{$idea->id}})" wire:loading.class="animate-pulse" wire:click.prevent="vote({{$idea->id}})" class="btn btn-sm hover:bg-blue-600 {{$idea->voted_by_user>0?'bg-blue-600':''}}">vote</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center text-pink-600 text-xl p-9">
            <span >No idea found</span>
        </div>
    @endforelse

    <div class="my-8">
        {{ $ideas->links() }}
    </div>

</div>

@push('js')
    <script>
        window.addEventListener('show-form', event => {
            $('#form').modal(event.detail.action);
        })
        window.addEventListener('showConfirmation', event => {
            let idea = event.detail.idea;

            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: event.detail.confirmButtonText
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('confirmed', this.idea)
                }
            })
        })
    </script>
@endpush
