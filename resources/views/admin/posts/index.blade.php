<x-layout>
    <x-setting heading="Manage Posts">
        <div>
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name,
                        title, email and role.</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <button type="button"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add user
                    </button>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($posts as $post)
                                    <tr>
                                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                            <div class="flex items-center">
                                                <div class="h-11 w-11 flex-shrink-0">
                                                    <img class="h-11 w-11 rounded-full"
                                                         src="{{ asset('storage/' . $post->thumbnail) }}"
                                                         alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <a href="/posts/{{ $post->slug }}">
                                                        <div class="font-medium text-gray-900">{{ $post->title }}</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Published</span>
                                        </td>
                                        <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                        <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <form action="/admin/posts/{{ $post->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{ $posts->links() }}
    </x-setting>
</x-layout>
