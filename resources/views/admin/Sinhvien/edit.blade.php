@extends('admin.index')
@section('content')
    <form method="post" action="/admin/sinhvien/update/{{$sinhvien->id}}">
        @csrf
        @include('share.error')
        <div class="mb-3">
            <label for="name" class="form-label" >Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$sinhvien->Name}}">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label" value="">Age:</label>
            <input type="number" class="form-control" id="age" name="age" value="{{$sinhvien->Age}}">
        </div>
        <div class="mb-3">
            <label for="MSSV" class="form-label">MSSV:</label>
            <input type="text" class="form-control" id="MSSV" name="MSSV" value="{{$sinhvien->MSSV}}">
        </div>
        <button type="submit" class="btn btn-primary">Confirm</button>
    </form>
@endsection