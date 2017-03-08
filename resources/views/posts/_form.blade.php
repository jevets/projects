<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Give me a title" value="{{ old('title', $post->title) }}" required>
    @if ($errors->has('title'))
        <div class="help-block">{{ $errors->first('title') }}</div>
    @endif
</div>
<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
    <label for="body">Body</label>
    <textarea name="body" id="body" rows="5" class="form-control" placeholder="Enter a post body" required>{{ old('body', $post->body) }}</textarea>
    @if ($errors->has('body'))
        <div class="help-block">{{ $errors->first('body') }}</div>
    @endif
</div>