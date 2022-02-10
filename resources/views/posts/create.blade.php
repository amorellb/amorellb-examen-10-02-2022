@include('layouts.plantilla')

<main class="mt-5">
    <div class="w-full max-w-xl mx-auto bg-white shadow-lg rounded border border-gray-200">
        <h2 class="text-xl m-5">{{ __("Add new posts to your Posts list") }}</h2>
        @if ($errors->any())
            <div class="mx-auto max-w-md border-2 border-solid border-red-600 bg-red-300 rounded text-center">
                <strong>Whoops! </strong>{{ __("There were some problems with your input.") }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="m-5" method="POST" enctype="multipart/form-data" action="{{ route('posts.store') }}">
            @csrf
            <label for="title"> {{ __("Post title") }}:
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="text" name="title"
                       value="{{old('title')}}" placeholder="Bernat Smith's post"/>
            </label>
            @error('title')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <br>
            <br>
            <label for="summary"> {{ __("summary") }}:<br>
                <textarea class="border-2 border-solid border-gray-100 rounded px-2" name="summary"
                          placeholder="Blah blah blah">{{old('summary')}}</textarea>
            </label>
            <br>
            <br>
            <label for="post_content"> {{ __("post_content") }}:<br>
                <textarea class="border-2 border-solid border-gray-100 rounded px-2" name="post_content"
                          placeholder="Blah blah blah">{{old('post_content')}}</textarea>
            </label>
            <br>
            <br>
            <label for="access">{{ __("Access") }}: </label>
            <select class="border-2 border-solid border-gray-100 rounded-full px-2" name="access" id="access">
                <option value="public" @if (old('access') === 'public') selected @endif>{{ __("public") }}</option>
                <option value="private" @if (old('access') === 'private') selected @endif>{{ __("private") }}</option>
            </select>
            <br>
            <br>
            <label for="expiry"> @lang("Expiry"):<br>
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="radio"
                       name="expiry"
                       value="yes" {{ old('expiry') === 'yes' ? 'checked='.'"checked"' : '' }}/> @lang("Yes")
                <br>
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="radio"
                       name="expiry"
                       value="no" {{ old('expiry') === 'no' ? 'checked='.'"checked"' : '' }}/> @lang("No")
            </label>
            <br>
            <br>
            <label for="commentable"> @lang("Commentable"):<br>
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="radio"
                       name="commentable"
                       value="yes" {{ old('commentable') === 'yes' ? 'checked='.'"checked"' : '' }}/> @lang("Yes")
                <br>
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="radio"
                       name="commentable"
                       value="no" {{ old('commentable') === 'no' ? 'checked='.'"checked"' : '' }}/> @lang("No")
            </label>
            <br>
            <button
                class="text-green-400 no-underline border-solid border-2 border-green-400 rounded p-1 px-5 ml-5 mt-5 hover:bg-green-400 hover:text-white"
                type="submit" name="add">➕ {{ __("Add Post") }}
            </button>
        </form>
    </div>
</main>
