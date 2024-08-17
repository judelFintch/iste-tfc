<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
            <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                          
                            <th>Actions</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($filieres as $filiere)
                            <tr>
                                <td>{{ $filiere->id }}</td>
                                <td>{{ $filiere->nom }}</td>
                                <td>
                                    <button wire:click="edit({{ $filiere->id }})" class="btn btn-warning btn-sm">Modifier</button>
                                    <button wire:click="delete({{ $filiere->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
