<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Gestion des promotions</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        </ul>
                    </div>
                    @if(!$isCreate)
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="formAction('create')" class="btn add-btn" id="add_client"><i class="fa fa-plus"></i> Nouveau</a>
                    </div>
                    @else
                    <div class="col-auto float-end ms-auto">
                    <a href="#" wire:click="formAction('list')" class="btn add-btn" id="add_client"><i class="fa fa-plus"></i> Liste</a>
                    </div>
                    @endif
                    

                </div>
            </div>
            <hr>
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            @if($isCreate)
            @include('livewire.promotion.create')
            @endif
            @if($isList)
            @include('livewire.promotion.list')
            @endif
        </div>
    </div>
</div>