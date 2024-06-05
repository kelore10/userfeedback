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
                    
                    <form method="POST" action="{{ route('cours.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom_cours" class="col-md-4 col-form-label text-md-end">{{ __('nom_cours') }}</label>

                            <div class="col-md-6">
                                <input id="nom_cours" type="text" class="form-control @error('nom_cours') is-invalid @enderror" name="nom_cours" value="{{ old('nom_cours') }}" required autocomplete="nom_cours" autofocus>

                                @error('nom_cours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="date_heure" class="col-md-4 col-form-label text-md-end">{{ __('date_heure') }}</label>

                            <div class="col-md-6">
                                <input id="date_heure" type="datetime-local" class="form-control @error('date_heure') is-invalid @enderror" name="date_heure" value="{{ old('date_heure') }}" required autocomplete="date_heure" autofocus>
                                @error('date_heure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('type') }}</label>

                            <div class="col-md-6">
                                <select  class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{old('user_id') }}" required>
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
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
