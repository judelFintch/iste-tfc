<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">

            
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Informations Dossiers</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="showForm()" class="btn add-btn" id="add_client"><i class="fa fa-plus"></i> Nouveau Dossier</a>
                    </div>
                </div>
            </div>

        
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href="">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-dollar"></i></span>
                                <div class="dash-widget-info">
                                <h3></h3>
                                    <span> </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                
                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href="">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-money"></i></span>
                                <div class="dash-widget-info">
                                <h3></h3>
                                    <span> </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href="">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-address-card-o"></i></span>
                                <div class="dash-widget-info">
                                    <h3></h3>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

           

            <hr>

            <div class="row">
                <legend>Filtrez le Dossier</legend>
                <div class="col-sm-5">
                    <input type="text" placeholder="Tapez la plaque du dossier" wire:model.debounce.500ms="query" class="form-control mb-3 col-sm-5 ">
                </div>
            </div>
            <hr>

          

           
        </div>
    </div>
</div>