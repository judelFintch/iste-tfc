<div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2>{{ $isUpdate ? 'Modifier Étudiant' : 'Ajouter Étudiant' }}</h2>
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" wire:model="nom">
                        @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" wire:model="prenom">
                        @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" wire:model="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
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

            
        </div>
    </div>