<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
    <label for="body" class="control-label sr-only">Comment</label>
    <textarea name="body" id="body" rows="3" class="form-control" placeholder="The thing is..." required>{{ old('body') }}</textarea>
    @if ($errors->has('body'))
        <span class="help-block">{{ $errors->first('body') }}</span>
    @endif
</div>