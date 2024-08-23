<?php

namespace App\Livewire\Absence;
use App\Models\Absence;

use Livewire\Component;

class AbesenceCompenent extends Component
{


    public $absences, $etudiant_id, $seance_cours_id, $is_absent = true, $absence_id;
    public $isUpdate = false;
    public $isCreate =true;

    // Règles de validation
    protected $rules = [
        'etudiant_id' => 'required|exists:etudiants,id',
        'seance_cours_id' => 'required|exists:seance_cours,id',
        'is_absent' => 'required|boolean',
    ];

    // Réinitialiser les champs du formulaire
    private function resetInputFields()
    {
        $this->etudiant_id = '';
        $this->seance_cours_id = '';
        $this->is_absent = true;
        $this->absence_id = '';
        $this->isUpdate = false;
    }

    // Créer une nouvelle absence
    public function store()
    {
        $this->validate();

        Absence::create([
            'etudiant_id' => $this->etudiant_id,
            'seance_cours_id' => $this->seance_cours_id,
            'is_absent' => $this->is_absent,
        ]);

        session()->flash('message', 'Absence enregistrée avec succès.');

        $this->resetInputFields();
       $this->dispatch('absenceStored'); // Événement pour rafraîchir la liste
    }

    // Préparer l'édition d'une absence
    public function edit($id)
    {
        $absence = Absence::findOrFail($id);
        $this->absence_id = $id;
        $this->etudiant_id = $absence->etudiant_id;
        $this->seance_cours_id = $absence->seance_cours_id;
        $this->is_absent = $absence->is_absent;
        $this->isUpdate = true;
    }

    // Mettre à jour une absence
    public function update()
    {
        $this->validate();

        $absence = Absence::find($this->absence_id);
        $absence->update([
            'etudiant_id' => $this->etudiant_id,
            'seance_cours_id' => $this->seance_cours_id,
            'is_absent' => $this->is_absent,
        ]);

        session()->flash('message', 'Absence mise à jour avec succès.');

        $this->resetInputFields();
        $this->emit('absenceUpdated'); // Événement pour rafraîchir la liste
    }

    // Supprimer une absence
    public function delete($id)
    {
        Absence::find($id)->delete();
        session()->flash('message', 'Absence supprimée avec succès.');
        $this->emit('absenceDeleted'); // Événement pour rafraîchir la liste
    }

    // Afficher la liste des absences
    public function render()
    {
        $this->absences = Absence::with('etudiant', 'seanceCours')->get();
        return view('livewire.absence.abesence-compenent');
    }
}
