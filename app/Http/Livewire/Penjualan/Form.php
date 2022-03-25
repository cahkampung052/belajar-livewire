<?php

namespace App\Http\Livewire\Penjualan;

use Livewire\Component;
use App\Models\Penjualan;
use App\Models\PenjualanDet;

class Form extends Component
{
    public $penjualanDet = [];
    public $form = [
        'customer' => '',
        'tanggal' => ''
    ];
    public $grandTotal = 0;

    public function addDetail() {
        array_push($this->penjualanDet, [
            'barang' => 'Apel',
            'jumlah' => 0,
            'harga' => 0,
            'sub_total' => 0,
        ]);
    }

    public function removeDetail($key) {
        unset($this->penjualanDet[$key]);
        $this->calculation();
    }

    public function calculation() {
        $this->grandTotal = 0;
        foreach($this->penjualanDet as $key => $val) {
            $this->penjualanDet[$key]['sub_total'] = (int) $val['jumlah'] * (int) $val['harga'];
            $this->grandTotal += $this->penjualanDet[$key]['sub_total'];
        }
    }

    public function save() {
        $penjualanModel = new Penjualan;

        $penjualanModel->customer = $this->form['customer'] ?? '';
        $penjualanModel->tanggal = $this->form['tangal'] ?? date('Y-m-d');
        $penjualanModel->save();

        foreach($this->penjualanDet as $key => $val) {
            $penjualanDetModel = new PenjualanDet();
            $penjualanDetModel->penjualan_id = $penjualanModel->id;
            $penjualanDetModel->barang = $val['barang'];
            $penjualanDetModel->harga = $val['harga'];
            $penjualanDetModel->jumlah = $val['jumlah'];
            $penjualanDetModel->save();
        }
    }

    public function render()
    {
        return view('livewire.penjualan.form');
    }
}
