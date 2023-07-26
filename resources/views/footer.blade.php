@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des personnels</h1>
        <a href="{{ route('personnels.create') }}" class="btn btn-primary">Ajouter un personnel</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($personnels as $personnel)
                    <tr>
                        <td><img src="{{ Storage::url($personnel->photo) }}" alt="{{ $personnel->nom }}" width="50"></td>
                        <td>{{ $personnel->nom }}</td>
                        <td>{{ $personnel->prenom }}</td>
                        <td>
                            <a href="{{ route('personnels.show', $personnel) }}" class="btn btn-info">Détails</a>
                            <a href="{{ route('personnels.edit', $personnel) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('personnels.destroy', $personnel) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
