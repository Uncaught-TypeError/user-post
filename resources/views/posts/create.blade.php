<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Post
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
        <form action="{{ route("posts.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Insert Title">
            </div>
            <div>
                <input type="text" name="brand" value="{{ old('brand') }}" placeholder="Insert Brand">
            </div>
            <div>
                <input type="file" name="photo" id="">
            </div>
            <div>
                <input type="checkbox" value="1" name="is_feature" id="feature">
            </div>
            <div>
                <select name="category_id" id="category">
                    <option disabled>Choose a Category</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <textarea type="text" name="description" placeholder="Insert Description">{{ old('description') }}</textarea>
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</x-app-layout>
