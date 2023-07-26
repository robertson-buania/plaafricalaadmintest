<div class="container">
    <h1>Liste des expertises</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Catégorie</th>
                <th>Titre</th>
                <th>Sous-titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expertises as $expertise)
                <tr>
                    <td>{{ $expertise->id }}</td>
                    <td>{{ $expertise->category }}</td>
                    <td>{{ $expertise->title }}</td>
                    <td>{{ $expertise->subtitle }}</td>
                    <td>
                        <a href="{{ route('expertises.show', $expertise) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('expertises.edit', $expertise) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('expertises.destroy', $expertise) }}" method="POST" style="display: inline-block;">
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
