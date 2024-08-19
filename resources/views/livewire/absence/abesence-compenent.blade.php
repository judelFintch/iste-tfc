<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Gestion de filiere</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="showForm()" class="btn add-btn" id="add_client"><i class="fa fa-plus"></i> Nouvelle Filiere</a>
                    </div>
                </div>
            </div>
            <hr>
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
           
            @if($isCreate)
            @include('livewire.absence.create')
            @endif
            @include('livewire.absence.list')

        </div>
    </div>
</div>