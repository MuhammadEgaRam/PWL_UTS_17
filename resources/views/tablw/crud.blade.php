@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <br><br>
                <center>
                    <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2><br>  
                </center>
            </div>
            <form class="form-left my-4" method="get" action="{{ route('search') }}">
                <div class="form-group w-80 mb-3">
                    <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Search">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                    <a class="btn btn-success right" href="{{ route('tablw.create') }}" style="margin-left:9cm"> Input Mahasiswa</a>
                </div>
            </form>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>kode_buku</th>
            <th>judul</th>
            <th>pengarang</th>
            <th>jenis_buku</th>
            <th>harga</th>
            <th>qty</th>
            <th width="225px">Action</th>
        </tr>
        @foreach ($tablw as $datas)
        <tr>
            <td>{{ $datas->kode_buku}}</td>
            <td>{{ $datas->judul }}</td>
            <td>{{ $datas->pengarang }}</td>
            <td>{{ $datas->jenis_buku}}</td>
            <td>{{ $datas->harga}}</td>
            <td>{{ $datas->qty }}</td>
            <td>
                <form action="{{ route('tablw.destroy',$datas->kode_buku) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('tablw.show',$datas->kode_buku) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('tablw.edit',$datas->kode_buku) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $datas->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection