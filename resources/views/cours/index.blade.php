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
                    
                    <div class="container">
                        <h1>Liste des cours</h1>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>date heure</th>
                                    <th>Profs</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cours as $cour)
                                <tr>
                                    <td>{{ $cour->nom_cours }}</td>
                                    <td>{{ $cour->date_heure }}</td>
                                    <td>{{ $cour->User->name }}</td>
                                    <td>
                                        <a href="{{ route('cours.edit', $cour) }}" class="btn btn-primary btn-sm">Modifier</a>
                                        <form action="{{ route('cours.destroy', $cour) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('cours.create') }}" class="btn btn-success">Ajouter un cours</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
