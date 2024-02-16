<label>
    Title: <br>
    <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}">
    @error('title') {{ $message }} @enderror
</label><br>
<label>
    Content: <br>
    <textarea name="content">{{ old('content', $post->content ?? '') }}</textarea>
    @error('content') {{ $message }} @enderror
</label><br>
<label>
    Image: <br>
    @if ($post->image_path ?? '')
        <img src="{{ url('storage/' . $post->image_path) }}" alt=""><br>
    @endif
    <input type="file" name="image">
    @error('image') {{ $message }} @enderror
</label><br>
