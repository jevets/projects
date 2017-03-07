<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label class="control-label" for="name">Project Name</label>
    <input type="text" class="form-control" placeholder="Name the project" name="name" id="name" value="{{ old('name', $project->name) }}">
    @if ($errors->has('name'))
        <div class="help-block">
            {{ $errors->first('name') }}
        </div>
    @endif
</div>
<div class="form-group">
    <label for="description" class="control-label">Description</label>
    <textarea name="description" id="description" class="form-control" placeholder="Describe the project">{{ old('description', $project->description) }}</textarea>
</div>