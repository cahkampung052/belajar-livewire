<div>
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <div class="row">
                @if (session()->has('message'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <div class="col-md-12">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" wire:model="tanggal" id="tanggal"
                                    placeholder="Tanggal">
                                @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="customer">Customer</label>
                                <input type="text" class="form-control" wire:model="customer" id="customer"
                                    placeholder="Customer">
                                @error('customer') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        @error('penjualanDet') <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div> @enderror
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="align-middle">Nama Barang</th>
                                    <th class="align-middle">Jumlah (Qty)</th>
                                    <th class="align-middle">Harga (Rp)</th>
                                    <th class="align-middle">Sub Total (Rp)</th>
                                    <th style="width: 50px;"><button class="btn btn-info"
                                            wire:click="addDetail">+</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualanDet as $key => $detail)
                                <tr id="key-{{ $key }}">
                                    <td><input type="text" wire:model="penjualanDet.{{$key}}.barang"
                                            class="form-control" name="barang[]" value="{{ $detail['barang'] }}"></td>
                                    <td><input type="number" wire:model="penjualanDet.{{$key}}.jumlah"
                                            wire:blur="calculation" class="form-control text-center" name="jumlah[]"
                                            value="{{ $detail['jumlah'] }}"></td>
                                    <td><input type="number" wire:model="penjualanDet.{{$key}}.harga"
                                            wire:blur="calculation" class="form-control text-right" name="harga[]"
                                            value="{{ $detail['harga'] }}"></td>
                                    <td><input type="number" wire:model="penjualanDet.{{$key}}.sub_total"
                                            wire:blur="calculation" class="form-control text-right" readonly
                                            name="sub_total[]" value="{{ $detail['sub_total'] }}"></td>
                                    <td><button class="btn btn-danger" wire:click="removeDetail({{ $key }})">-</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right bg-light">Grand Total</td>
                                    <td class="text-right bg-light">{{ $grandTotal }}</td>
                                    <td class="bg-light"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary" wire:click="save">
                Simpan Penjualan
            </button>
        </div>
    </div>
</div>