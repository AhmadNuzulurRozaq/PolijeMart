<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Penjualan;

new class extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch(){

        $this->resetPage();
    }

    public function with(): array
    {
        return [
            'nama' => Penjualan::with('user')->when($this->search, function($query){
                $query->where('name', 'like', '%' . $this->seacrh . '%');
            })->paginate(10),
        ];
    }

};
?>

<div>
    
</div>