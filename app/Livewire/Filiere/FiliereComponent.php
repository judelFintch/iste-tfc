<?php

namespace App\Livewire\Filiere;

use Livewire\Component;
use App\Models\Filiere;
use App\Models\Promotion;

class FiliereComponent extends Component
{
    public $filieres, $nom, $promotion_id, $filiere_id;
    public $isUpdate = false;
    public $isCreate = true;

    // Règles de validation
    protected $rules = [
        'nom' => 'required|string|max:255',
        
    ];

    
    // Méthode pour réinitialiser les champs de saisie
    private function resetInputFields()
    {
        $this->nom = '';
        $this->promotion_id = '';
        $this->filiere_id = '';
        $this->isUpdate = false;
    }

    // Méthode pour ajouter une nouvelle filière
    public function store()
    {
        $this->validate();
        Filiere::create([
            'nom' => $this->nom,  
        ]);

        session()->flash('message', 'Filière créée avec succès.');
        $this->resetInputFields();
        //$this->emit('filiereStored'); // Événement pour actualiser la liste
    }

    // Méthode pour remplir le formulaire pour une mise à jour
    public function edit($id)
    {
        $filiere = Filiere::findOrFail($id);
        $this->filiere_id = $id;
        $this->nom = $filiere->nom;
        $this->promotion_id = $filiere->promotion_id;
        $this->isUpdate = true;
    }

    // Méthode pour mettre à jour une filière
    public function update()
    {
        $this->validate();

        $filiere = Filiere::find($this->filiere_id);
        $filiere->update([
            'nom' => $this->nom,
            'promotion_id' => $this->promotion_id,
        ]);

        session()->flash('message', 'Filière mise à jour avec succès.');

        $this->resetInputFields();
        $this->emit('filiereUpdated'); // Événement pour actualiser la liste
    }

    // Méthode pour supprimer une filière
    public function delete($id)
    {
        Filiere::find($id)->delete();
        session()->flash('message', 'Filière supprimée avec succès.');
        $this->emit('filiereDeleted'); // Événement pour actualiser la liste
    }

    // Méthode pour afficher la liste des filières
    
    public function render()
    {
        $this->filieres = Filiere::with('promotion')->get();
        return view('livewire.filiere.filiere-component', [
            'promotions' => Promotion::all(),
        ]);
    }
}
