<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Post Detail
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-auto mx-auto sm:px-6 lg:px-8 text-white">
            <div class="card p-2">
                <div class="p-6 m-6 shadow-inner bg-slate-600 hover:shadow-lg">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-3xl">
                                {{ $post->title }}
                            </h5>
                            <h5 class="text-2xl">
                                {{ $post->brand }}
                            </h5>
                            <p class="text-2xl">{{ $post->category->category_name }}</p>
                            <img src="{{ asset("photos/$post->photo") }}" alt="">
                            <p class="card-text">{{ $post->description }}</p>
                        </div>
                        <div>
                            <p>Created by
                                <b>
                                    <a href="">{{ $post->user->name }}</a>
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>