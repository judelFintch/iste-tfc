<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2>{{ $isUpdate ? 'Modifier Absence' : 'Ajouter Absence' }}</h2>
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}">
                    <div class="form-group">
                        <label for="etudiant_id">Étudiant</label>
                        <select class="form-control" id="etudiant_id" wire:model="etudiant_id">
                            <option value="">Choisir un étudiant</option>
                            @foreach(App\Models\Etudiant::all() as $etudiant)
                                <option value="{{ $etudiant->id }}">{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                            @endforeach
                        </select>
                        @error('etudiant_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="seance_cours_id">Séance de cours</label>
                        <select class="form-control" id="seance_cours_id" wire:model="seance_cours_id">
                            <option value="">Choisir une séance</option>
                            @foreach(App\Models\SeanceCours::all() as $seance)
                                <option value="{{ $seance->id }}">{{ $seance->titre }} ({{ $seance->date }})</option>
                            @endforeach
                        </select>
                        @error('seance_cours_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="is_absent">Absent</label>
                        <select class="form-control" id="is_absent" wire:model="is_absent">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                        @error('is_absent') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">{{ $isUpdate ? 'Modifier' : 'Ajouter' }}</button>
                    @if ($isUpdate)
                        <button type="button" class="btn btn-secondary mt-3" wire:click="resetInputFields">Annuler</button>
                    @endif
                </form>
            </div>

            <div class="col-md-8">
                <h2>Liste des absences</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Étudiant</th>
                            <th>Séance de cours</th>
                            <th>Absent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absences as $absence)
                            <tr>
                                <td>{{ $absence->id }}</td>
                                <td>{{ $absence->etudiant->nom }} {{ $absence->etudiant->prenom }}</td>
                                <td>{{ $absence->seanceCours->titre }} ({{ $absence->seanceCours->date }})</td>
                                <td>{{ $absence->is_absent ? 'Oui' : 'Non' }}</td>
                                <td>
                                    <button wire:click="edit({{ $absence->id }})" class="btn btn-warning btn-sm">Modifier</button>
                                    <button wire:click="delete({{ $absence->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
