@extends('layouts.dashboard')

@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('writer.create') }}" class="btn btn-md btn-gradient-success mb-3">TAMBAH PENULIS</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">PENULIS</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($writers as $writer)
                                <tr>
                                    <td>{{ $writer->writer }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('writer.destroy', $writer->id) }}" method="POST">
                                            <a href="{{ route('writer.edit', $writer->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Penulis belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $writers->links() }}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection