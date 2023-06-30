<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            User's Posts
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="py-12">
        <div class="max-w-auto mx-auto sm:px-6 lg:px-8 text-white">
            <div class="card p-2">
                @forelse ($users->posts as $p)
                <div class="p-6 m-6 shadow-inner bg-slate-600 hover:shadow-lg">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-3xl">
                                {{ $p->title }}
                            </h5>
                            <h5 class="text-2xl">
                                {{ $p->brand }}
                            </h5>
                            <img src="{{ asset("photos/$p->photo") }}" alt="">
                            <p class="card-text">{{ $p->description }}</p>
                        </div>
                        <div>
                            <p>Date by
                                <b>
                                    <a href="">{{ $p->user->name }}</a>
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