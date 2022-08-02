@extends('layouts.main')

@section('title', "")

@section('content')
<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($codes as $code)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$code->name_1}}</td>
                <td>{{$code->name_2}}</td>
                <td>{{$code->user->email}}</td>
                <td>
                <form action="{{ route('admin.destroy', ['id' => $code->id]) }}" method="post">
                    <a class="btn btn-secondary" href="{{ route('admin.edit', ['id' => $code->id])}}">EDIT</a>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{ $codes->links("pagination::bootstrap-5") }}
    </nav><br>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Currency Code</th>
                <th>Unit</th>
                <th>Buying Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach($currency as $curr)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$curr->currency_code}}</td>
                <td>{{$curr->unit}}</td>
                <td>{{$curr->rate->buying_rate}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
    <script></script>
@endpush