<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <div class="flex-1">
                            <h2 class="font-semibold mb-6 text-lg">Add new post</h2>

                            {{-- {{var_dump($errors)}} --}}

                            <form action="{{route('add-post')}}"  method="post">
                                @csrf
                                <p class="mb-4"><input class="w-full px-4 py-2 border @error('title') border-red-300 @else border-gray-200 @enderror" type="text" value="{{old('title')}}" name="title" id="" placeholder="Post Title">

                                    @error('title')
                                        <span class="text-red-500 test-sm">{{$message}}</span>
                                    @enderror

                                </p>
                                <p class="mb-2"><textarea class="w-full border border-gray-200" name="content" id="" cols="30" rows="5">{{old('content')}}</textarea></p>
                                <button class="bg-blue-400 hover:bg-blue-600 px-4 py-2 text-white font-semibold rounded-sm mt-2" type="submit">Add Post</button>
                            </form>
                        </div>
                        <div class="flex-1">
                            <h2>Posts</h2>
                            <ul>
                                @foreach ($posts as $post)
                                <li><a href="">{{$post->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
