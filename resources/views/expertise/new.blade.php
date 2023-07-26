<div class="container">
    <h1>Ajouter une expertise</h1>
    <form action="{{ route('expertises.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category">Catégorie</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="subtitle">Sous-titre</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle">
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="text" class="form-control" id="photo" name="photo">
        </div>
        <div class="form-group">
            <label for="pdf">PDF</label>
            <input type="filet" class="form-control" id="pdf" name="pdf">
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
