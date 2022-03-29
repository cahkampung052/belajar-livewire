<?php

namespace App\Http\Livewire\Penjualan;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Penjualan;

class Index extends Component
{
    use WithPagination;

    public $kataKunci;
    public $penjualanId;

    public function updatingKataKunci()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.penjualan.index', [
            'penjualan' => Penjualan::where('customer', 'like', '%'.$this->kataKunci.'%')->paginate(5),
        ]);
    }
}
