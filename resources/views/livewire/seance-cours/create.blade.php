<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2>{{ $isUpdate ? 'Modifier Séance de Cours' : 'Ajouter Séance de Cours' }}</h2>
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" wire:model="titre">
                        @error('titre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" wire:model="description"></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" wire:model="date">
                        @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="filiere_id">Filière</label>
                        <select class="form-control" id="filiere_id" wire:model="filiere_id">
                            <option value="">Choisir une filière</option>
                            @foreach(App\Models\Filiere::all() as $filiere)
                                <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
                            @endforeach
                        </select>
                        @error('filiere_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">{{ $isUpdate ? 'Modifier' : 'Ajouter' }}</button>
                    @if ($isUpdate)
                        <button type="button" class="btn btn-secondary mt-3" wire:click="resetInputFields">Annuler</button>
                    @endif
                </form>
            </div>

            <div class="col-md-8">
                <h2>Liste des séances de cours</h2>
                <table class="table table-striped">
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
                                <td>{{ $seance->date->format('d/m/Y') }}</td>
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
