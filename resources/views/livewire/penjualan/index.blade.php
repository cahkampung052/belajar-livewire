<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" wire:model="kataKunci" id="namaCustomer"
                                placeholder="Cari Nama Customer">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover bg-light">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Customer</th>
                                    <th style="width: 180px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan as $val)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($val->tanggal)) }}</td>
                                    <td>{{$val->customer}}</td>
                                    <td class="text-right">
                                        <button class="btn btn-primary"
                                            onclick="edit({{ $val->id }})">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $penjualan->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <livewire:penjualan.form />
                </div>
            </div>
        </div>
    </div>
    <script>
    function edit(penjualanId) {
        const modalContainer = document.getElementById('formModal');
        $('#formModal').modal({
            backdrop: 'static'
        });
    }
    </script>
</div>