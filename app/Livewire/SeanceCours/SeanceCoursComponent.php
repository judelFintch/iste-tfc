<?php


namespace App\Livewire\SeanceCours;

use Livewire\Component;
use App\Models\SeanceCours;
use App\Models\Filiere;
use Carbon\Carbon;

class SeanceCoursComponent extends Component
{


    public $seances, $titre, $description, $date, $filiere_id, $seance_id;
    public $isUpdate = false;
    public $isCreate = true;

    // Règles de validation
    protected $rules = [
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'required|date',
        'filiere_id' => 'required|exists:filieres,id',
    ];

    // Réinitialiser les champs du formulaire
    private function resetInputFields()
    {
        $this->titre = '';
        $this->description = '';
        $this->date = '';
        $this->filiere_id = '';
        $this->seance_id = '';
        $this->isUpdate = false;
    }

    // Créer une nouvelle séance de cours
    public function store()
    {
        $this->validate();

        SeanceCours::create([
            'titre' => $this->titre,
            'description' => $this->description,
            'date' => Carbon::parse($this->date),
            'filiere_id' => $this->filiere_id,
        ]);

        session()->flash('message', 'Séance de cours créée avec succès.');

        $this->resetInputFields();
        $this->emit('seanceStored'); // Événement pour rafraîchir la liste
    }

    // Préparer l'édition d'une séance de cours
    public function edit($id)
    {
        $seance = SeanceCours::findOrFail($id);
        $this->seance_id = $id;
        $this->titre = $seance->titre;
        $this->description = $seance->description;
        $this->date = $seance->date->format('Y-m-d');
        $this->filiere_id = $seance->filiere_id;
        $this->isUpdate = true;
    }

    // Mettre à jour une séance de cours
    public function update()
    {
        $this->validate();

        $seance = SeanceCours::find($this->seance_id);
        $seance->update([
            'titre' => $this->titre,
            'description' => $this->description,
            'date' => Carbon::parse($this->date),
            'filiere_id' => $this->filiere_id,
        ]);

        session()->flash('message', 'Séance de cours mise à jour avec succès.');

        $this->resetInputFields();
        $this->emit('seanceUpdated'); // Événement pour rafraîchir la liste
    }

    // Supprimer une séance de cours
    public function delete($id)
    {
        SeanceCours::find($id)->delete();
        session()->flash('message', 'Séance de cours supprimée avec succès.');
        $this->emit('seanceDeleted'); // Événement pour rafraîchir la liste
    }

    // Afficher la liste des séances de cours
    public function render()
    {
        $this->seances = SeanceCours::with('filiere')->get();
        return view('livewire.seance-cours.seance-cours-component');
    }
   
}
