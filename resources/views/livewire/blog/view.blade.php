@section('title', $blog->title)
@php
    $user = $blog->User;
@endphp
<div>
    <div
        class="w-3/4 my-4 mx-auto p-4 border-b border-t border-r border-l rounded-1 border-gray-200">
        <div class="blog-block border-gray-500 mb-4 pb-4" id="blog-{{$blog->id}}">
            <div class="post_image mb-2 ">
                <img src="{{URL::asset('storage/' . $blog->image)}}" class="w-full" alt="{{$blog->title}}">
            </div>
            <div class="post_info p-4">
                <h1 class="text-4xl font-bold">{{ $blog->title }}</h1>
                <div class="flex justify-start mt-4 items-center">
                    <span class="author mr-1 flex justify-start items-center font-bold">
                        <img src="{{URL::asset('storage/' . $user->photo)}}" class="w-12 rounded-full mr-2" alt="{{$user->username}}">
                        {{$user->name}}
                    </span>
                    <span class="date mx-2 flex justify-start text-gray-400 items-center">
                        {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM Do YY') }}
                        <span class="mx-2"> . </span>
                        <span class="italic">Updated {{ Carbon\Carbon::parse($blog->updated_at)->isoFormat('MMM Do') }}</span>
                    </span>
                    <span class="readtime flex justify-start text-gray-400">
                        <span class="mx-2"> . </span>
                        {{readDuration($blog->content) . ' min read'}}
                    </span>

                </div>
            </div>
            <div class="blog-body p-4">
                {!! $blog->content !!}
            </div>
        </div>
        <div class="comment-block border-t border-gray-200">
            <div class="w-full bg-white p-2 pt-4 rounded">
                <div class="mt-3 p-3 w-full">
                    <h3 class="text-2xl mb-2 font-bold">Left an comment : </h3>
                    <input type="hidden" wire:model="post_id" value="{{$blog->id}}">
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
                            {{$comment->content}}
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
