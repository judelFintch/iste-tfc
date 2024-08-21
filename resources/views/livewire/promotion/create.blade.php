<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $isUpdate ? 'Modifier Promotion' : 'Ajouter Promotion' }}</h2>
                
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <form wire:submit.prevent="{{ $isUpdate ? 'update' : 'store' }}">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" wire:model="description"></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">{{ $isUpdate ? 'Modifier' : 'Ajouter' }}</button>
                    @if ($isUpdate)
                        <button type="button" class="btn btn-secondary mt-3" wire:click="resetInputFields">Annuler</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
