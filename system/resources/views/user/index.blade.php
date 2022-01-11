@extends('template.base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mt-5">
      <div class="card">
        <div class="card-header">
            Data User
            <a href="{{ url('/user/create') }}" class="btn btn-dark float-right"><i class="fa fa-plus"></i> Tambah User </a>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <th>No</th>
                <th>Aksi</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Produk</th>
                <th>Email</th>
            </thead>
            <tbody class="list">
              @foreach ($list_user as $user)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class=" btn-group">

                    <a href="{{ url('/user', $user->id) }}" class="btn btn-dark">
                      <i class="fa fa-info"></i>
                    </a>
                    <a href="{{ url('/user', $user->id) }}/edit" class="btn btn-warning">
                      <i class="fa fa-edit"></i>
                    </a>
                    @include('template.utils.delete' , ['url' =>  url('/user', $user->id) ])
                  </td>

                  </div>
                <td>{{ $user->username }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->produk_count}}</td>
                <td>{{ $user->email }}</td>
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