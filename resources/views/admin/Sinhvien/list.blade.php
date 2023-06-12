@extends('admin.index')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
              <th scope="col">Age</th>
              <th scope="col">MSSV</th>
              <th scope="col">Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Sinhviens as $Sinhvien)
              <tr>
                <th scope="row">{{$Sinhvien->id}}</th>                                                                                                                                                                                    
                <td>{{$Sinhvien->Name}}</td>
                <td>{{$Sinhvien->Age}}</td>
                <td>{{$Sinhvien->MSSV}}</td>
                <td> <a href="/admin/sinhvien/edit/{{$Sinhvien->id}}" class="btn btn-outline-primary">Edit</a> <a href="" class="btn btn-outline-danger">Delete</a> </td>
              </tr>              
            @endforeach
            
          </tbody>
    </table>
    {{-- <nav aria-label="Page navigation example">
      <ul class="pagination">
        {{$Sinhviens -> links()}}
      </ul>
    </nav> --}}
@endsection