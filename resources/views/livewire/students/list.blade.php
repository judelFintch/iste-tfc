
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Filiere</th>
                        <th>Operations</th>
                    </tr>
                </thead>
            
                <tbody>
                        @foreach ($etudiants as $etudiant)
                            <tr>
                                <td>{{ $etudiant->id }}</td>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ $etudiant->email }}</td>
                                <td>{{ $etudiant->filiere->nom }}</td>
                                <td>
                                    <button wire:click="edit({{ $etudiant->id }})" class="btn btn-warning btn-sm">Modifier</button>
                                    <button wire:click="delete({{ $etudiant->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                                </td>
                            </tr>
                        @endforeach
            </table>
        </div>
    </div>
</div>

<script>
    function deleteCli(id) {
        if (confirm("Etes vous sur de supprimer cette enregistrement"))
            window.livewire.emit('deleteCli', id);
    }
</script>