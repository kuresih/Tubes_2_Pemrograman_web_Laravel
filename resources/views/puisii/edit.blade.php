@extends('layouts.app')

@section('content')
<h4>Ubah Puisi</h4>
<form action="{{ route('puisii.update', $puisii->id) }}" method="post">
    {{csrf_field()}}
    {{ method_field('PUT') }}
    <div class="form-group {{ $errors->has('judul') ? 'has-error' : '' }}">
        <label for="judul" class="control-label">Judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $puisii->judul }}">
        @if ($errors->has('judul'))
            <span class="help-block">{{ $errors->first('judul') }}</span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('isi') ? 'has-error' : '' }}">
        <label for="isi" class="control-label">Isi</label>
        <textarea name="isi" cols="30" rows="5" class="form-control">{{ $puisii->content }}</textarea>
        @if ($errors->has('isi'))
            <span class="help-block">{{ $errors->first('isi') }}</span>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="{{ route('puisii.index') }}" class="btn btn-default">Kembali</a>
    </div>
</form>
@endsection