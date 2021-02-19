@extends('layout.app')

@section('content')
    @auth
        <div class="flex justify-center mb-4">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <form action="{{ route('posts') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" placeholder="Post something!!" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" value="{{ old('body') }}"></textarea>
                        
                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>        
    @endauth        

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p class="text-xl font-bold mb-3">Posts</p>
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="" class="font-bold">{{ $post->user->username }}</a>
                        <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        <p class="mb-2">{{ $post->body }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection