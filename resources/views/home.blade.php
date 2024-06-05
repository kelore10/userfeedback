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

                    {{ __('You are logged in!') }}
                    <a class="btn btn-primary btn-sm " href="{{ route('cours.create') }}" role="button"> AJOUTER UN COURS </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
