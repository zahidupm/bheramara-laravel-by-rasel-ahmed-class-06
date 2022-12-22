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
                        <div class="flex-1 ml-4">
                            <h2>Posts</h2>
                            <ul>
                                @foreach ($posts as $post)
                                <li class="flex items-center mb-4">
                                    <a href="">{{$post->title}}</a>
                                    <span><a class="text-white text-xs ml-4 bg-green-500 px-4 py-2 inline-block font-semibold rounded" href="{{route('edit-post', $post->id)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                          </svg>

                                    </a></span>

                                    <form method="post" action="{{route('delete-post', $post->id)}}">
                                        @csrf
                                        <button class="text-white text-xs ml-4 bg-red-500 px-4 py-2 inline-block font-semibold rounded">
                                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                              </svg>

                                        </button>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
