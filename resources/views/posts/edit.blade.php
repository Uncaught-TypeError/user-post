<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Post
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="w-[600px] p-10 m-auto bg-red-500">
        <form action="{{ route("posts.update", $posts->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <input type="text" name="title" value="{{ $posts->title }}" placeholder="Insert Title">
            </div>
            <div>
                <input type="text" name="brand" value="{{ $posts->brand }}" placeholder="Insert Brand">
            </div>
            <div>
                <input type="file" name="photo" id="">
                <img src="{{ asset("photos/$posts->photo") }}" alt="">
            </div>
            <div>
                <input type="checkbox" value="{{ $posts->is_feature }}" name="is_feature" id="feature">
            </div>
            <div>
                <select name="category_id" id="category">
                    <option disabled>Choose a Category</option>
                    <option value="{{ $posts->category_id }}">{{ $posts->category->category_name }}</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <textarea type="text" name="description" placeholder="Insert Description">{{ $posts->description }}</textarea>
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</x-app-layout>
