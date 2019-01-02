@extends('layouts.app')

@section('content')
<h4>{{ $puisii->judul }}</h4>
<p>{{ $puisii->isi }}</p>
<a href="{{ route('puisii.index') }}" class="btn btn-default">Kembali</a>
@endsection