@csrf
<div class="form-group">
    <label for="question-title">Question Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $question->title) }}"
           id="question-title" name="title" placeholder="Enter title">
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="question-body">Explain your question</label>
    <textarea class="form-control @error('body') is-invalid @enderror" rows="10" id="question-body" name="body"
              placeholder="Describe your question">{{ old('body', $question->body) }}</textarea>
    @error('body')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
