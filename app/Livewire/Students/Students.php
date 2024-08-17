<?php

namespace App\Livewire\Students;
use App\Models\Etudiant;

use Livewire\Component;

class Students extends Component
{
    public $etudiants, $nom, $prenom, $email, $filiere_id, $etudiant_id;
    public $isUpdate = false;
    public $isCreate = true;

    // Règles de validation
    protected $rules = [
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:etudiants,email',
        'filiere_id' => 'required|exists:filieres,id',
    ];

    // Méthode pour réinitialiser les champs de saisie
    private function resetInputFields()
    {
        $this->nom = '';
        $this->prenom = '';
        $this->email = '';
        $this->filiere_id = '';
        $this->etudiant_id = '';
        $this->isUpdate = false;
    }

    // Méthode pour ajouter un nouvel étudiant
    public function store()
    {
        $this->validate();

        Etudiant::create([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'filiere_id' => $this->filiere_id,
        ]);

        session()->flash('message', 'Étudiant créé avec succès.');

        $this->resetInputFields();
        $this->emit('Students'); // Événement pour actualiser la liste
    }

    // Méthode pour remplir le formulaire pour une mise à jour
    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $this->etudiant_id = $id;
        $this->nom = $etudiant->nom;
        $this->prenom = $etudiant->prenom;
        $this->email = $etudiant->email;
        $this->filiere_id = $etudiant->filiere_id;
        $this->isUpdate = true;
    }

    // Méthode pour mettre à jour un étudiant
    public function update()
    {
        $this->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email,' . $this->etudiant_id,
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $etudiant = Etudiant::find($this->etudiant_id);
        $etudiant->update([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'filiere_id' => $this->filiere_id,
        ]);

        session()->flash('message', 'Étudiant mis à jour avec succès.');

        $this->resetInputFields();
        $this->emit('etudiantUpdated'); // Événement pour actualiser la liste
    }

    // Méthode pour supprimer un étudiant
    public function delete($id)
    {
        Etudiant::find($id)->delete();
        session()->flash('message', 'Étudiant supprimé avec succès.');
        $this->emit('etudiantDeleted'); // Événement pour actualiser la liste
    }

    // Méthode pour afficher la liste des étudiants
    public function render()
    {
        $this->etudiants = Etudiant::with('filiere')->get();
        return view('livewire.students.students');
    }
}
