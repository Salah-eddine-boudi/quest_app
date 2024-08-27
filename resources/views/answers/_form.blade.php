<div class="form-group">
    <label for="content">Contenu de la Réponse:</label>
    <textarea name="content" id="content" class="form-control" required>{{ old('content', $answer->content ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="question_id">Question:</label>
    <select name="question_id" id="question_id" class="form-control" required>
        @foreach($questions as $question)
            <option value="{{ $question->id }}" 
                    {{ (isset($answer) && $answer->question_id == $question->id) || (old('question_id') == $question->id) ? 'selected' : '' }}>
                {{ $question->title }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-success mt-2">
    {{ isset($answer) ? 'Mettre à jour' : 'Ajouter' }}
</button>
