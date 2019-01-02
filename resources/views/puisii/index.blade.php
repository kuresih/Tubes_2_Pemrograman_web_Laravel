@extends('layouts.app')

@section('content')
    <a href="{{ route('puisii.create') }}" class="btn btn-info btn-sm">Puisi Baru</a>
    
    @if ($message = Session::get('message'))
        <div class="alert alert-success martop-sm">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-responsive martop-sm">
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($puisiis as $puisii)
                <tr>
                    <td>{{ $puisii->id }}</td>
                    <td><a href="{{ route('puisii.show', $puisii->id) }}">{{ $puisii->judul }}</a></td>
                   <td><a href="{{ route('puisii.show', $puisii->id) }}">{{ $puisii->isi }}</a></td> 
                    <td>
                        <form action="{{ route('puisii.destroy', $puisii->id) }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('puisii.edit', $puisii->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection