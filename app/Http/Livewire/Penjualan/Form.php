<?php

namespace App\Http\Livewire\Penjualan;

use App\Helpers\PenjualanHelper;
use Livewire\Component;

class Form extends Component
{
    public $penjualanDet;
    public $grandTotal;
    public $customer;
    public $tanggal;
    public $title = 'Tambah Penjualan';

    protected $rules = [
        'customer' => 'required|min:6',
        'tanggal' => 'required',
        'penjualanDet' => 'required'
    ];

    public function __construct()
    {
        $this->setDefault();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setDefault() {
        $this->penjualanDet = [];
        $this->grandTotal = 0;
        $this->customer = '';
        $this->tanggal = '';
    }

    public function addDetail() {
        array_push($this->penjualanDet, [
            'barang' => 'Apel',
            'jumlah' => 0,
            'harga' => 0,
            'sub_total' => 0,
        ]);
        var_dump('asd');
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
        $this->validate();

        $helper = new PenjualanHelper();
        $helper->setCustomer($this->customer ?? '')
                ->setTanggal($this->tangal ?? date('Y-m-d'))
                ->setDetail($this->penjualanDet)
                ->store();
        
        session()->flash('message', 'Penjualan berhasil disimpan !');

        $this->setDefault();
    }

    public function setDetail() {

    }

    public function render()
    {
        return view('livewire.penjualan.form', ['title' => $this->title]);
    }
}
