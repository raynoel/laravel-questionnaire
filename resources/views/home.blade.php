@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Tableau de bord</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/questionnaires/create" class="btn btn-dark">Créez un questionnaire</a>
                </div>
            </div>

            {{-- Carte avec tous les questionnaires remplis par l'utilisateur --}}
            <div class="card mt-4">
                <div class="card-header">Mes questionnaires</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($questionnaires as $questionnaire)
                            <li class="list-group-item">
                                <small class="font-weight-bold mt-2">Editer le questionnaire</small><br>
                                <a href="/questionnaires/{{ $questionnaire->id }}">{{ $questionnaire->title }}</a><br>
                                <small class="font-weight-bold mt-2">URL à partager</small><br>
                                <a href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}">{{ $questionnaire->publicPath() }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
