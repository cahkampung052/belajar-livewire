<?php

namespace App\Helpers;

use App\Models\Penjualan;
use App\Models\PenjualanDet;

class PenjualanHelper
{
    private $penjualanDet;
    private $penjualan;

    public function setDetail($detail)
    {
        $this->penjualanDet = $detail;
        return $this;
    }

    public function setCustomer($customer) {
        $this->penjualan['customer'] = $customer;
        return $this;
    }

    public function setTanggal($tangal) {
        $this->penjualan['tangal'] = $tangal;
        return $this;
    }

    public function store(): void {
        $penjualanModel = new Penjualan;
        $penjualanModel->customer = $this->penjualan['customer'] ?? '';
        $penjualanModel->tanggal = $this->penjualan['tangal'] ?? date('Y-m-d');
        $penjualanModel->save();

        $this->storeDetail($penjualanModel);
    }

    private function storeDetail($penjualanModel): void {
        foreach($this->penjualanDet as $val) {
            $penjualanDetModel = new PenjualanDet();
            $penjualanDetModel->penjualan_id = $penjualanModel->id;
            $penjualanDetModel->barang = $val['barang'];
            $penjualanDetModel->harga = $val['harga'];
            $penjualanDetModel->jumlah = $val['jumlah'];
            $penjualanDetModel->save();
        }
    }
}
