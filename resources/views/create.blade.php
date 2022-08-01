@extends('layouts.main')

@section('title', "")

@section('content')
<div class="card-body">
    <form action="{{ route('admin.store') }}" method="post">
        @csrf
        <label for="name_1">First name:</label><br>
        <input type="text" id="name_1" name="name_1" class="form-control @error('name_1') is-invalid @enderror" value="{{ old( 'name_1' ) }}">
        @error('name_1')
        <div class="invalid-feedback">{{ $errors->first('name_1') }}</div>
        @enderror
        <label for="name_2">Last name:</label><br>
        <input type="text" id="name_2" name="name_2" class="form-control @error('name_2') is-invalid @enderror" value="{{ old( 'name_2' ) }}">
        @error('name_2')
        <div class="invalid-feedback">{{ $errors->first('name_2') }}</div>
        @enderror
        <button type=submit class="btn btn-outline-primary">Submit</button>
    </form> 
</div>
@endsection

@push('scripts')
    <script></script>
@endpush