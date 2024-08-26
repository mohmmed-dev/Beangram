@csrf
<input class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl" type="file" name="file" id="file" multiple>
<p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or GIF</p>
@error('file')
<div class="w-full bg-red-50 text-red-700 p-5 mb-5 rounded-xl">
    {{$message}}
</div>
@enderror
<textarea name="description" rows="5" class="mt-10 w-full border border-gray-200 hove rounded-xl resize-none" placeholder="{{__("Write a description")}}">{{$post->description ?? ''}}</textarea>
@error('description')
<div class="w-full bg-red-50 text-red-700 p-5 mb-5 rounded-xl">
    {{$message}}
</div>
@enderror
