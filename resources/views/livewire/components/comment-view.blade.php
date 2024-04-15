<div>
    <section class="relative flex mt-10 items-center justify-start antialiased">
        <div class="container mx-auto px-0 sm:px-5">
            <div class="w-full flex-col py-4 sm:rounded-lg sm:px-4 sm:py-4 sm:shadow-sm md:w-2/3 md:px-4">
                <div class="flex flex-row">
                    <div class="mt-1 flex-col">
                        <div class="flex flex-1 items-center px-4 font-bold text-white leading-tight">
                            {{ $comment->owner ? $comment->owner->name : 'Pengguna menghapus pesan ini' }}
                            <span
                                class="ml-2 text-xs font-normal text-white">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="ml-2 flex-1 px-2 text-sm font-medium leading-loose text-white">
                            {{ $comment->message }}
                        </div>
                            <div x-data="{ isOpen: false }" class="inline-flex flex-col">
                                @if (Auth::check())
                                <button x-on:click  ="isOpen = !isOpen" class="inline-flex items-center px-1 pt-2">
                                    <svg class="ml-2 h-5 w-5 cursor-pointer fill-current text-white hover:text-gray-900"
                                        viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z"
                                            fill-rule="nonzero" />
                                    </svg>
                                </button>
                                <div x-show="isOpen" class=""> 
                                    <form x-show="isOpen" wire:submit.prevent="reply('{{ $comment->id }}')" class="max-w-full rounded-lg mt-20">
                                        <div class="px-3 mb-2 mt-2">
                                            <textarea wire:model.defer="message" placeholder="comment" class="w-full rounded border leading-normal resize-none h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"></textarea>
                                        </div>
                                        <div class="flex justify-end px-4">
                                            <input type="submit" class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" value="Comment">
                                        </div>
                                    </form>
                                </div>
                                @endif
                            </div>
                        <div class="inline-flex">
                        <button wire:click="like('{{ $comment->id }}')" type="button"
                            class="inline-flex items-center px-1">
                            <svg class="h-5 w-5 cursor-pointer text-white hover:text-gray-700" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                </path>
                            </svg>
                            <span class="text-white ml-2"> {{ $comment->likes->count() }} </span>
                        </button>
                        <button wire:click="dislike('{{ $comment->id }}')"
                            class="inline-flex items-center px-1 pt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white hover:text-gray-700"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M20 3H6.693A2.01 2.01 0 0 0 4.82 4.298l-2.757 7.351A1 1 0 0 0 2 12v2c0 1.103.897 2 2 2h5.612L8.49 19.367a2.004 2.004 0 0 0 .274 1.802c.376.52.982.831 1.624.831H12c.297 0 .578-.132.769-.36l4.7-5.64H20c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm-8.469 17h-1.145l1.562-4.684A1 1 0 0 0 11 14H4v-1.819L6.693 5H16v9.638L11.531 20zM18 14V5h2l.001 9H18z" />
                            </svg>
                            <span class="text-white ml-2"> {{ $comment->dislikes->count() }} </span>
                        </button>
                        @if (Auth::check() && Auth::user()->id === $comment->owner_id)
                            <button wire:confirm="Are you sure you want to delete this post?" type="button" wire:click="delete({{ $comment->id }})"
                                class="inline-flex items-center px-1 pt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="h-5 w-5 text-white hover:text-red-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        @endif
                        </div>
                    </div>
                </div>
                <hr class="my-2 border-gray-200" />
                    @foreach ($comment->replies as $reply)
                        @if ($reply->parent_comment_id === $comment->id)
                            <livewire:components.comment-view :comment="$reply" :key="$reply->id" />                            
                        @endif
                @endforeach
            </div>
        </div>
    </section>
</div>
