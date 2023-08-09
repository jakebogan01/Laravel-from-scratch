<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title ">
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.input name="slug" :value="old('slug', $post->slug)" />
            <div class="flex items-center mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/>
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" width="100" class="rounded-xl ml-6">
            </div>
            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category_id" class="border border-gray-200 rounded p-2 w-full" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id" />
            </x-form.field>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 transition ease-in-out duration-150">Update</button>
            </div>
        </form>
    </x-setting>
</x-layout>
