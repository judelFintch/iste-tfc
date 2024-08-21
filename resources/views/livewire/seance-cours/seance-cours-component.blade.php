<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Gestion de filiere {{ $test }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        </ul>
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
            @include('livewire.seance-cours.create')
            @endif
            @if($isList)
            @include('livewire.seance-cours.list')
            @endif

        </div>
    </div>
</div>