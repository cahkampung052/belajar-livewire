<div>
    <div class="row">
        <div class="col-md-12">
            <h4>Tambah Penjualan</h4>
            <hr/>
        </div>
        <div class="col-md-12">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" wire:model="form.tanggal" id="tanggal" placeholder="Tanggal">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="customer">Customer</label>
                        <input type="text" class="form-control" wire:model="form.customer" id="customer" placeholder="Customer">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="align-middle">Nama Barang</th>
                            <th class="align-middle">Jumlah (Qty)</th>
                            <th class="align-middle">Harga (Rp)</th>
                            <th class="align-middle">Sub Total (Rp)</th>
                            <th style="width: 50px;"><button class="btn btn-info" wire:click="addDetail">+</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualanDet as $key => $detail)
                            <tr id="key-{{ $key }}">
                                <td><input type="text" wire:model="penjualanDet.{{$key}}.barang" class="form-control" name="barang[]" value="{{ $detail['barang'] }}"></td>
                                <td><input type="number" wire:model="penjualanDet.{{$key}}.jumlah"  wire:blur="calculation" class="form-control text-center" name="jumlah[]" value="{{ $detail['jumlah'] }}"></td>
                                <td><input type="number" wire:model="penjualanDet.{{$key}}.harga"  wire:blur="calculation" class="form-control text-right" name="harga[]" value="{{ $detail['harga'] }}"></td>
                                <td><input type="number" wire:model="penjualanDet.{{$key}}.sub_total"  wire:blur="calculation" class="form-control text-right" readonly name="sub_total[]"  value="{{ $detail['sub_total'] }}"></td>
                                <td><button class="btn btn-danger" wire:click="removeDetail({{ $key }})">-</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right">Grand Total</td>
                            <td class="text-right">{{ $grandTotal }}</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-12 text-right">
            <button class="btn btn-primary" wire:click="save">
                Simpan Penjualan
            </button>
        </div>
    </div>
</div>