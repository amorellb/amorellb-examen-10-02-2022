@include('layouts.plantilla')

<main>
    <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
        <div class="mb-10 ">
            <div class="mb-5">
                <h2 class="text-xl">@lang("Posts")</h2>
            </div>
{{--            @auth--}}
{{--                @can('create', \App\Models\Post::class)--}}
                    <div class="mt-5">
                        <a class="text-green-400 no-underline border-solid border-2 border-green-400 rounded p-1 ml-5 hover:bg-green-400 hover:text-white"
                           href="{{ route('posts.create') }}">➕ @lang("Add Post")</a>
                    </div>
{{--                @endcan--}}
{{--            @endauth--}}
        </div>

        <div class="w-full max-w-8xl mx-auto bg-white shadow-lg rounded border border-gray-200">
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Title")</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Summary")</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Post content")</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Expiry")</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Commentable")</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Access")</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">

                        @foreach ($posts as $post)
                            <tr>
                                <td class="p-2 whitespace-nowrap">{{ $post->title }}</td>
                                <td class="p-2 whitespace-nowrap">{{ $post->summary }}</td>
                                <td class="p-2 whitespace-nowrap">{{ $post->post_content }}</td>
                                <td class="p-2 whitespace-nowrap">{{ $post->expiry }}</td>
                                <td class="p-2 whitespace-nowrap">{{ $post->commentable }}</td>
                                <td class="p-2 whitespace-nowrap">{{ $post->access }}</td>
                                <td class="p-2 whitespace-nowrap">
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @auth
                                            @can('view', $post)
                                                <a class="text-blue-400 no-underline border-solid border-2 border-blue-400 rounded p-1 px-3 ml-5 hover:bg-blue-400 hover:text-white"
                                                   href="{{ route('posts.show', $post) }}">👀 @lang("Show")</a>
                                            @endcan
                                        @endauth
                                        @auth
                                            @can('update', $post)
                                                <a class="text-orange-400 no-underline border-solid border-2 border-orange-400 rounded p-1 px-3 ml-5 hover:bg-orange-400 hover:text-white"
                                                   href="{{ route('posts.edit', $post) }}">📝 @lang("Edit")</a>
                                            @endcan
                                        @endauth
                                        @csrf
                                        @method('DELETE')
                                        @auth
                                            @can('delete', $post)
                                                <button type="submit"
                                                        class="text-red-400 no-underline border-solid border-2 border-red-400 rounded p-1 px-3 ml-5 hover:bg-red-400 hover:text-white">
                                                    💥 @lang("Delete")
                                                </button>
                                            @endcan
                                        @endauth
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
