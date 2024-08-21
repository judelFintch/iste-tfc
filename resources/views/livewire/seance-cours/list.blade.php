<div class="row">
    <div class="col-md-12">
        <h2>Liste des séances de cours</h2>
        <table class="table table-striped custom-table datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Filière</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seances as $seance)
                <tr>
                    <td>{{ $seance->id }}</td>
                    <td>{{ $seance->titre }}</td>
                    <td>{{ $seance->description }}</td>
                    <td></td>
                    <td>{{ $seance->filiere->nom }}</td>
                    <td>
                        <button wire:click="edit({{ $seance->id }})" class="btn btn-warning btn-sm">Modifier</button>
                        <button wire:click="delete({{ $seance->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>