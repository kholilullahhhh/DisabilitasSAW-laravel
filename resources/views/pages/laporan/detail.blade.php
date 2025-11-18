<div class="invoice-print">
    <div class="row">
        <div class="col-lg-12">
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <address>
                        <strong>Kategori Barang :</strong><br>
                        Stok Barang :<br>
                    </address>
                </div>
                <div class="col-md-6 text-md-right">
                    <address>
                        <strong>{{ $data->Kategori->nama }}</strong><br>
                        {{ $data->stok . ' ' . $data->satuan }}<br>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <address>
                        <strong>Spesifikasi :</strong><br>
                        {!! $data->deskripsi !!}
                    </address>
                </div>
            </div>
        </div>
    </div>

</div>
