@section('title', $post->post_title)
<div>
    <div
        class="w-3/4 my-4 mx-auto p-4 border-b border-t border-r border-l rounded-1 border-gray-200 {{$post->post_id}}">
        <div class="post-block border-gray-500 mb-4 pb-4" id="post-{{$post->post_id}}">
            <div class="post_image mb-2 ">
                <img src="{{$post->post_image}}" class="w-full" alt="">
            </div>
            <div class="post_info p-4">
                <h1 class="text-4xl font-bold">{{ $post->post_title }}</h1>
                <div class="flex justify-start mt-4">
            <span class="author mr-1 flex justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                {{$post->user()->name}}
            </span>
                    <span class="readtime flex justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{readDuration($post->post_content) . ' min read'}}
            </span>

                </div>
            </div>
            <div class="post-body p-4">
                {!! $post->post_content !!}
            </div>
        </div>
        <div class="comment-block border-t border-gray-200">
            <div class="w-full bg-white p-2 pt-4 rounded">
                <div class="mt-3 p-3 w-full">
                    <h3 class="text-2xl mb-2 font-bold">Left an comment : </h3>
                    <input type="hidden" wire:model="post_id" value="{{$post->post_id}}">
                    <input type="hidden" wire:model="comment_parent" value="0">
                    <textarea rows="3" class="border p-2 rounded w-full" wire:model="comment_content"
                              placeholder="Write something..."></textarea>
                </div>
                <div class="flex justify-between mx-3">
                    <div>
                        <button wire:click="addComments"
                                class="px-4 py-1 bg-gray-800 text-white rounded font-light hover:bg-gray-700">Submit
                        </button>
                    </div>
                </div>
                @foreach($comments  as $comment)
                    <div class="m-4 border-gray-200 border-2 p-4">
                        <div>
                            <div class="mr-3 inline float-left">
                                <img src="http://picsum.photos/50" alt="" class="rounded-full">
                            </div>
                            <h1 class="font-semibold">Itay Buyoy</h1>
                            <p class="font-xs text-gray-500">2 seconds ago</p>
                        </div>
                        <div class="comment-content p-4">
                            {{$comment->comment_content}}
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
