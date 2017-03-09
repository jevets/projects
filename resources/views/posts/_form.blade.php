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

<div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
    <label for="published_at">Publish Date</label>
    <input type="datetime-local" class="form-control" name="published_at" id="published_at" placeholder="{{\Carbon\Carbon::now()->format('Y-m-d\TH:i') }}" value="{{ old('published_at', $post->published_at->format('Y-m-d\TH:i')) }}">
    @if ($errors->has('published_at'))
        <div class="help-block">{{ $errors->first('published_at') }}</div>
    @endif
</div>