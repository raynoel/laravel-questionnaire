@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $questionnaire->title }}</div>

        <div class="card-body">
          <a href="/questionnaires/{{ $questionnaire->id }}/questions/create" class="btn btn-dark">Ajoutez une question au questionnaire</a>
          <a href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" class="btn btn-dark">Participez au sondage</a>
        </div>

        {{-- Pour chacune des questions appartenant au questionnaire --}}
        @foreach($questionnaire->questions as $question)
          <div class="card mt-4">
            <div class="card-header">{{ $question->question }}</div>

            <div class="card-body">
              <ul class="list-group">
                {{-- Pour chacune des réponses appartenant à une question --}}
                @foreach($question->answers as $answer)
                  <li class="list-group-item d-flex justify-content-between">
                    <div>{{ $answer->answer }}</div>
                    {{-- Pourcentage de participants ayant choisi cette réponse --}}
                    @if($question->responses->count())
                      <div>{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}%</div>
                    @endif
                  </li>
                @endforeach
              </ul>
            </div>

            <!-- bouton supprimer la question -->
            <div class="card-footer">
              <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer la question</button>
              </form>
            </div>

          </div>
        @endforeach

      </div>
    </div>
  </div>
  @endsection