@extends('layouts.app')


{{-- On doit créer des questions et des réponses dans le même formulaire --}}
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Ajoutez une question au sondage</div>

        <div class="card-body">
          <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="post">
            @csrf

            <!-- Input Question -->
            <div class="form-group">
              <h4>Question</h4>
              <input name="question[question]" type="text" class="form-control" id="question" placeholder="Saisir une Question">
              <small class="form-text text-muted">Entrez une question simple et précise pour de meilleurs résultats.</small>
              @error('question.question')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <h4>Choix de réponse</h4>

              <div><!-- Input Choix 1 -->
                <div class="form-group">
                  <input name="answers[][answer]" type="text" class="form-control" id="answer1"
                    value="{{ old('answers.0.answer') }}" placeholder="Entrez le choix 1">
                  @error('answers.0.answer')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div><!-- Input Choix 2 -->
                <div class="form-group">
                  <input name="answers[][answer]" type="text" class="form-control" id="answer2"
                    value="{{ old('answers.1.answer') }}" placeholder="Entrez le choix 2">
                  @error('answers.1.answer')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div><!-- Input Choix 3 -->
                <div class="form-group">
                  <input name="answers[][answer]" type="text" class="form-control" id="answer3"
                    value="{{ old('answers.2.answer') }}" placeholder="Entrez le choix 3">
                  @error('answers.2.answer')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div><!-- Input Choix 4 -->
                <div class="form-group">
                  <input name="answers[][answer]" type="text" class="form-control" id="answer4"
                    value="{{ old('answers.3.answer') }}" placeholder="Entrez le choix 4">
                  @error('answers.3.answer')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>

            </div>

            <button type="submit" class="btn btn-primary">Ajouter la question</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection