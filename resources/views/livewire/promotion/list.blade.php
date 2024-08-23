<div class="row">
    <div class="col-md-12">
        <h2>Promotions</h2>
        <table class="table table-striped custom-table datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>=+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                @foreach($promotions as $promotion)
                <tr>
                    <td>{{ $promotion->id }}</td>
                    <td>{{ $promotion->nom }}</td>
                    <td>{{ $promotion->annee }}</td>
                    <td>
                        <button wire:click="edit({{ $promotion->id }})" class="btn btn-warning btn-sm">Modifier</button>
                        <button wire:click="delete({{ $promotion->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
