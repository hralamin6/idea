<div x-data="{editModal: false}"
     x-init="$wire.on('ideaUpdated', () => { editModal = false})"
     @open-delete-modal.window="
     model = event.detail.model
     eventName = event.detail.eventName
Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',

            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit(eventName, model )
                }
            })
"
>
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

    <div
        @set-title.window="editModal = true"
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

    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <a href="{{$backUrl}}" class="ml-2">All ideas</a>
        </a>
    </div>

    <div class="idea-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none mx-2 md:mx-4">
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/{{md5($idea->user->email)}}?d=mp" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-2 md:mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{$idea->title}}</a>
                </h4>
                <div class="text-gray-600 mt-3">
                    {{$idea->description}}
                </div>

                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="hidden md:block font-bold text-gray-900">{{$idea->user->name}}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{\Carbon\Carbon::parse($idea->created_at)->diffForHumans()}}</div>
                        <div>&bull;</div>
                        <div>{{$idea->category->name}}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">{{$idea->comments->count()}} comments</div>
                    </div>
                    <div
                        class="flex items-center space-x-2 mt-4 md:mt-0"
                        x-data="{ isOpen: false }"
                    >
                        <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4 {{$idea->getStatusClass()}}">
                            {{$idea->status}}</div>
                        @auth()
                        <button
                            class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                            @click="isOpen = !isOpen"
                        >
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                            </svg>
                            <ul
                                class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl z-10 py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0"
                                x-cloak
                                x-show.transition.origin.top.left="isOpen"
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                            >
                                @if($idea->user_id==auth()->id() | Gate::allows('isAdmin'))
                                    <li><a href="" @click.prevent="editModal=true" class="hover:bg-gray-200 px-5 block py-3 transition duration-150 ease-in">Edit idea</a></li>
                                    <li><a @click="$dispatch('open-delete-modal', { title: 'Hello World!', text: 'you cant revert', icon: 'error', eventName: 'deleteIdea', model: {{ $idea }} })" class="hover:bg-gray-200 px-5 block py-3 transition duration-150 ease-in">Delete idea</a></li>

                                @endif
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                            </ul>
                        </button>
                        @endauth
                    </div>

                    <div class="flex items-center md:hidden mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                            <div class="text-sm font-bold leading-none {{$isVoted>0?'text-blue-600':''}}">{{$votes_count}}</div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                        </div>
                        <button wire:target="vote({{$idea->id}})" wire:loading.class="animate-pulse" wire:click.prevent="vote({{$idea->id}})" class="btn btn-sm hover:bg-blue-600 {{$isVoted>0?'bg-blue-600':''}}">vote</button>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->

    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex flex-col md:flex-row items-center space-x-4 md:ml-6">
            <div
                x-data="{ isOpen: false, lastComment: null, comments: null }"
                x-init="$wire.on('commendAdded', (event) => {
            isOpen = false,
            comment = document.getElementById(event.commentId)
            comment.scrollIntoView({behavior: 'smooth'})
            comment.classList.add('bg-green-100')
            setTimeout(() => {
                comment.classList.remove('bg-green-100')
            }, 5000)
            })
@if (session('scrollToComment'))
                    const commentToScrollTo = document.getElementById({{session('scrollToComment')}})
            commentToScrollTo.scrollIntoView({ behavior: 'smooth'})
            commentToScrollTo.classList.add('bg-green-100')
            setTimeout(() => {
                commentToScrollTo.classList.remove('bg-green-100')
            }, 5000)
        @endif" class="relative">
                <button type="button" @click=" isOpen = !isOpen
            if (isOpen) {
                $nextTick(() => $refs.comment.focus())
            } " class="flex items-center justify-center h-11 w-32 text-sm bg-blue-600 text-white font-semibold rounded-xl border border-blue-600 hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">Reply</button>
                <div
                    class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2"
                    x-cloak

                    x-show.transition.origin.top.left="isOpen"
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                >
                    <form wire:submit.prevent="addComment" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea x-ref="comment" wire:model.lazy="comment" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Go ahead, don't be shy. Share your thoughts..."></textarea>
                        </div>
                        @error('comment')<span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>@enderror


                        <div class="flex flex-col md:flex-row items-center md:space-x-3">
                            <button
                                type="submit"
                                class="flex items-center justify-center h-11 w-full md:w-1/2 text-sm bg-blue-600 text-white font-semibold rounded-xl border border-blue-600 hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                            >
                                Post Comment
                            </button>
                            <button
                                type="button"
                                class="flex items-center justify-center w-full md:w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0"
                            >
                                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            @can('isAdmin')
                <div
                    class="relative"
                    x-data="{ isOpen: false }"
                    x-init="window.livewire.on('ideaStatusUpdated', () => { isOpen = false})"
                >
                    <button
                        type="button"
                        @click="isOpen = !isOpen"
                        class="flex items-center justify-center w-36 h-11 text-sm bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0"
                    >
                        <span>Set Status</span>
                        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        x-cloak
                        x-show.transition.origin.top.left="isOpen"
                        @click.away="isOpen = false"
                        @keydown.escape.window="isOpen = false"
                        class="absolute z-20 w-64 md:w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2"
                    >
                        <form wire:submit.prevent="changeStatus" class="space-y-4 px-4 py-6">
                            <div class="space-y-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input wire:model.lazy="status" type="radio" class="bg-gray-200 text-gray-600 border-none" name="status" value="open" checked>
                                        <span class="ml-2">Open</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input wire:model.lazy="status" type="radio" class="bg-gray-200 text-purple border-none" name="status" value="considering">
                                        <span class="ml-2">Considering</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input wire:model.lazy="status" type="radio" class="bg-gray-200 text-yellow border-none" name="status" value="in-progress">
                                        <span class="ml-2">In Progress</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input wire:model.lazy="status" type="radio" class="bg-gray-200 text-green border-none" name="status" value="implemented">
                                        <span class="ml-2">Implemented</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input wire:model.lazy="status" type="radio" class="bg-gray-200 text-red border-none" name="status" value="closed">
                                        <span class="ml-2">Closed</span>
                                    </label>
                                </div>
                                @error('status')<span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <textarea name="update_comment" id="update_comments" cols="30" rows="3" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Add an update comment (optional)"></textarea>
                            </div>

                            <div class="flex items-center justify-between space-x-3">
                                <button
                                    type="submit"
                                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                                >
                                    <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                    <span class="ml-1">Attach</span>
                                </button>
                                <button wire:target="changeStatus" wire:loading.class="animate-pulse"
                                        type="submit"
                                        class="flex  items-center justify-center w-1/2 h-11 text-xs bg-blue-600 text-white font-semibold rounded-xl border border-blue-600 hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                                >
                                    <span class="ml-1">Update</span>
                                </button>
                            </div>

                            <div>
                                <label class="font-normal inline-flex items-center">
                                    <input wire:model="isNotify" type="checkbox" name="notify_voters" class="rounded bg-gray-200" checked="">
                                    <span class="ml-2">Notify all voters</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            @endcan
        </div>

        <div class="hidden md:flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug {{$isVoted?'text-blue-600':''}}">{{$votes_count}}</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            <button wire:target="vote({{$idea->id}})" wire:loading.class="animate-pulse" wire:click.prevent="vote({{$idea->id}})" class="btn btn-sm hover:bg-blue-600 {{$isVoted>0?'bg-blue-600':''}}">vote</button>

        </div>
    </div> <!-- end buttons-container -->

    <div class="comments-container relative space-y-6 md:ml-22 pt-4 my-8 mt-1">
        @forelse($comments as $comment)
        <div id="{{$comment->id}}" class="comment-container relative bg-white rounded-xl flex transition duration-1000 ease-in mt-4">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://www.gravatar.com/avatar/{{md5($comment->user->email)}}?d=mp" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full md:mx-4">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        {{$comment->body}}
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">{{$comment->user->name}}</div>
                            <div>&bull;</div>
                            <div>{{$comment->created_at->diffForHumans()}}</div>
                        </div>
                        <div
                            class="flex items-center space-x-2"
                            x-data="{ isOpen: false }"
                        >
                            @auth()
                                <button
                                    class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                                    @click="isOpen = !isOpen"
                                >
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                    <ul
                                        class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl z-10 py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0"
                                        x-cloak
                                        x-show.transition.origin.top.left="isOpen"
                                        @click.away="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                    >
                                        @if($idea->user_id==auth()->id() | Gate::allows('isAdmin'))
{{--                                            <li><a href="" @click.prevent="editModal=true" class="hover:bg-gray-200 px-5 block py-3 transition duration-150 ease-in">Edit idea</a></li>--}}
                                            <li><a @click="$dispatch('open-delete-modal', { title: 'Will you delete!', text: 'you cant revert this', icon: 'error', eventName: 'deleteComment', model: {{ $comment }} })"
                                                   class="hover:bg-gray-200 px-5 block py-3 transition duration-150 ease-in">Delete comment</a></li>

                                        @endif
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                    </ul>
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <div class="text-center text-pink-600 text-xl p-9">
                <span >No comment found</span>
            </div>
        @endforelse
            <div class="my-8">
                {{ $comments->onEachSide(1)->links() }}
            </div>
{{--         <div class="is-admin comment-container relative bg-white rounded-xl flex mt-4">--}}
{{--            <div class="flex flex-1 px-4 py-6">--}}
{{--                <div class="flex-none">--}}
{{--                    <a href="#">--}}
{{--                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">--}}
{{--                    </a>--}}
{{--                    <div class="text-center uppercase text-blue-600 text-xxs font-bold mt-1">Admin</div>--}}
{{--                </div>--}}
{{--                <div class="w-full mx-4">--}}
{{--                    <h4 class="text-xl font-semibold">--}}
{{--                        <a href="#" class="hover:underline">Status Changed to "Under Consideration"</a>--}}
{{--                    </h4>--}}
{{--                    <div class="text-gray-600 mt-3 line-clamp-3">--}}
{{--                        Lorem ipsum dolor sit amet consectetur.--}}
{{--                    </div>--}}
{{--                    <div class="flex items-center justify-between mt-6">--}}
{{--                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">--}}
{{--                            <div class="font-bold text-blue">Andrea</div>--}}
{{--                            <div>&bull;</div>--}}
{{--                            <div>10 hours ago</div>--}}
{{--                        </div>--}}
{{--                        <div class="flex items-center space-x-2">--}}
{{--                            <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3">--}}
{{--                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>--}}
{{--                                <ul class="hidden absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">--}}
{{--                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>--}}
{{--                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>--}}
{{--                                </ul>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div> <!-- end comments-container -->


</div>
@push('js')
    <script>
        @if (session('scrollToComment'))
        alert(session('scrollToComment'))
        const commentToScrollTo = document.getElementById({{ session('scrollToComment') }})
        commentToScrollTo.scrollIntoView({ behavior: 'smooth'})
        commentToScrollTo.classList.add('bg-green-50')
        setTimeout(() => {
            commentToScrollTo.classList.remove('bg-green-50')
        }, 5000)
        @endif
        window.addEventListener('commendAdded', event => {
            console.log(event.detail.commentId)
           let comment = document.getElementById(event.detail.commentId)
            comment.scrollIntoView({behavior: 'smooth'})
            comment.classList.add('bg-green-100')
            setTimeout(() => {
                comment.classList.remove('bg-green-100')
            }, 5000)
        })
    </script>
@endpush
