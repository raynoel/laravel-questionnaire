@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      {{-- Titre du questionnaire --}}
      <h1>{{ $questionnaire->title }}</h1>

      {{-- formulaire --}}
      <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
        @csrf

        <!-- Pour chaque questions -->
        @foreach($questionnaire->questions as $key => $question)
          <div class="card mt-4">
            {{-- Texte de la question --}}
            <div class="card-header"><strong>{{ $key + 1 }}</strong> {{ $question->question }}</div>

            <div class="card-body">
                <ul class="list-group">

                  <!-- Pour chaque réponse --> 
                  @foreach($question->answers as $answer)
                    <label for="answer{{ $answer->id }}"> <!-- le label permet de cliquer n'importe où dans la boite our sélectionner la réponse --> 
                      <li class="list-group-item">
                        <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}"
                          {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : '' }}
                          class="mr-2" value="{{ $answer->id }}">
                        {{ $answer->answer }}

                        <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                      </li>
                    </label>
                  @endforeach
                  @error('responses.' . $key . '.answer_id')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror

                </ul>
            </div>

          </div>
        @endforeach

        <div class="card mt-4">
          <div class="card-header">Vos informations</div>

            {{-- Nom --}}
            <div class="card-body">
              <div class="form-group">
                  <input name="survey[name]" type="text" class="form-control" id="name" placeholder="Votre Nom">
                  @error('survey.name')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              {{-- courriel --}}
              <div class="form-group">
                  <input name="survey[email]" type="email" class="form-control" id="email" placeholder="Courriel">
                  @error('survey.email')
                  <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div>
                  <button class="btn btn-dark" type="submit">Soumettre le sondage</button>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection