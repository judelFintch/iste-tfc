<?php
namespace App\Livewire\Promotion;

use Livewire\Component;
use App\Models\Promotion;
use Livewire\WithPagination;

class PromotionComponent extends Component
{
    use WithPagination;

    public $promotions, $name, $description, $promotion_id;
    public $isCreate = false;
    public $isUpdate = false;
    public $isList = true;

    // Règles de validation
    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ];

    // Basculer entre les états de création, mise à jour, et liste
    public function formAction($type)
    {
        if ($type == 'create') {
            $this->isCreate = true;
            $this->isList = false;
        }
        else{
            $this->isList = true;
            $this->isCreate = false;
        }
    }

    // Réinitialiser les champs du formulaire
    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->promotion_id = null;
    }

    // Créer une nouvelle promotion
    public function store()
    {
        $this->validate();
        
        Promotion::create([
            'nom' => $this->name,
            'annee' => $this->description,
        ]);

        session()->flash('message', 'Promotion créée avec succès.');
        $this->dispatch('list');
    }

    // Préparer l'édition d'une promotion
    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        $this->promotion_id = $id;
        $this->name = $promotion->name;
        $this->description = $promotion->description;
        $this->toggleForm('update');
    }

    // Mettre à jour une promotion
    public function update()
    {
        $this->validate();

        $promotion = Promotion::findOrFail($this->promotion_id);
        $promotion->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Promotion mise à jour avec succès.');
        $this->toggleForm('list');
    }

    // Supprimer une promotion
    public function delete($id)
    {
        Promotion::findOrFail($id)->delete();
        session()->flash('message', 'Promotion supprimée avec succès.');
    }

    // Afficher la liste des promotions
    public function render()
    {
        $promotions = Promotion::paginate(10); // Par exemple, pour paginer les résultats

        return view('livewire.promotion.promotion-component', compact('promotions'));
    }
}
