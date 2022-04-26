@extends("layouts.app")
@section("contents")

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      
      <div class="card mt-3">
        <div class="card-header">
          <h3 class="card-title">Daftar Dosen</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dospem as $dp)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dp->nama }}</td>
                <td>{{ $dp->nip }}</td>
                <td>{{ $dp->email }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection