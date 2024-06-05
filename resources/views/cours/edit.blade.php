@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('cours.update', $cour) }}">
                        @csrf
                        @method('PUT')
                
                        <div class="form-group">
                            <label for="nom_cours">Nom</label>
                            <input type="text" class="form-control @error('nom_cours') is-invalid @enderror" id="nom_cours" name="nom_cours" value="{{ old('nom_cours', $cour->nom_cours) }}" required>
                            @error('nom_cours')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <input id="date_heure" type="datetime-local" class="form-control @error('date_heure') is-invalid @enderror" name="date_heure" value="{{ old('date_heure', $cour->date_heure) }}" required autocomplete="date_heure" autofocus>
                                @error('date_heure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                
                        <div class="form-group">
                            <select  class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{old('user_id') }}" required>
                                <option value="{{ $cour->user->id }}">{{ $cour->user->name }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>

                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                
                        <button type="submit" class="btn btn-primary">Mettre à jour le cours</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
