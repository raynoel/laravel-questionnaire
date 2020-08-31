@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Créer un nouveau questionnaire</div>


                <div class="card-body">
                  <form action="/questionnaires" method="post">
                  @csrf
                    <div class="form-group">
                      <label for="title">Titre</label>
                      <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Titre">
                      <small id="titleHelp" class="form-text text-muted">Donnez à votre questionnaire un titre qui attire l'attention</small>
                      @error('title')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="purpose">Objectif</label>
                      <input type="text" name="purpose" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Objectif">
                      <small id="purposeHelp" class="form-text text-muted">Donner un but augmentera la réponse</small>
                      @error('purpose')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Créer le questionnaire</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection