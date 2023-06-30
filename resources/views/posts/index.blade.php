<x-app-layout>
    {{-- @push('bs')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    @endpush --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            All Post
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="alert alert-danger">{{ session('success') }}</div>
    @endif
    <div class="py-12">
        <div class="max-w-auto mx-auto sm:px-6 lg:px-8 text-white">
            <div class="card p-2">
                @forelse ($posts as $p)
                <div class="p-6 m-6 shadow-inner bg-slate-600 hover:shadow-lg">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-3xl">
                                <a href="{{ route("posts.show",$p->id) }}">{{ $p->title }}</a>
                            </h5>
                            <p class="text-2xl">{{ $p->brand }}</p>
                            {{-- <p class="text-2xl">{{ $p->category->title }}</p> --}}
                            <img src="{{ asset("photos/$p->photo") }}" alt="">
                            <p class="card-text mb-3">{{ $p->description }}</p>
                            <a href="{{ route('posts.edit', $p->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit Post</a>
                            {{-- <a href="{{ route('posts.destroy',$p->id) }}" onclick="return confirm('Are you sure?')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Delete Post</a> --}}
                            <form action="" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Delete</button>
                            </form>
                        </div>
                        <div class="mt-4">
                            <p>Post by
                                <b>
                                    <a href="{{ route('users.show',$p->user->id) }}">{{ $p->user->name }}</a>
                                </b>
                            </p>
                            <p>Created at
                                <b>
                                    <a href="">{{ $p->created_at->diffForHumans() }}</a>
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                    <p>Post Not Found</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
