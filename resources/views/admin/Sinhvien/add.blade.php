@extends('admin.index')
@section('content')
    <form method="POST" action="add/store">
        @csrf
        @include('share.error')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
            <input type="number" class="form-control" id="age" name="age">
        </div>
        <div class="mb-3">
            <label for="MSSV" class="form-label">MSSV:</label>
            <input type="text" class="form-control" id="MSSV" name="MSSV">
        </div>
        <button type="submit" class="btn btn-primary">Confirm</button>
    </form>
@endsection