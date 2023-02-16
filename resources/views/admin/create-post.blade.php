@extends('admin.app')
@push('title')
    <title>create post</title>
@endpush
@section('content')
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper text-dark">
            {{-- <x-app-layout> --}}
                @push('styles')
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
                @endpush
            
                <div class="py-12">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <form method="POST" action="{{route('save.blog.post')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-6">
                                        <label class="block">
                                            <span class="text-gray-700">Title</span>
                                            <input type="text" name="title"
                                                class="block w-full @error('title') border-red-500 @enderror mt-1 rounded-md"
                                                placeholder="" value="{{old('title')}}" />
                                        </label>
                                        @error('title')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-6">
                                        <label class="block">
                                            <select name="category" id="category" class="block w-full @error('category') border-red-500 @enderror mt-1 rounded-md">
                                                @foreach ($blogCats as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                        @error('category')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-6">
                                        <label class="block">
                                            <span class="text-gray-700">Image</span>
                                            <input type="file" name="image"
                                                class="block w-full @error('image') border-red-500 @enderror mt-1 rounded-md"
                                                placeholder="" value="{{old('image')}}" />
                                        </label>
                                        @error('image')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-6">
                                        <label class="block">
                                            <span class="text-gray-700">Description</span>
                                            <textarea id="markdown-editor" class="block w-full mt-1 rounded-md @error('description') border-red-500 @enderror" name="description"
                                                rows="3"></textarea>
                                        </label>
                                        @error('description')
                                        <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-600  rounded text-sm px-5 py-2.5">Submit</button>
            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
                <script>
                    const easyMDE = new EasyMDE({
                        showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
                        element: document.getElementById('markdown-editor')});
                </script>
                @endpush
            {{-- </x-app-layout>ssssss --}}
        </div>
    </div>
@endsection
