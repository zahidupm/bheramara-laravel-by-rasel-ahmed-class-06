<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Post
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="bg-white p-6 my-6">
            <form action="{{route('update-post', $post->id)}}" method="post">
                @csrf
                <p class="mb-4">
                    <input type="text" value="{{$post->title}}">
                </p>

                <div class="mb-4">
                    <textarea name="content" id="" cols="30" rows="5">{{$post->content}}</textarea>
                </div>
               <p><button class="text-white bg-blue-400 hover:bg-blue-600 px-4 py-2 rounded" type="submit">Update</button></p>
            </form>
        </div>
    </div>
</x-app-layout>
