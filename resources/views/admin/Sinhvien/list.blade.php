@extends('admin.index')
@section('content')
@include('share.error')
<form method="GET" class="input-group mb-3" action="/admin/sinhvien/search">
  <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Recipient's username" aria-describedby="button-addon2" name="search-str" onkeyup="showHint(this.value)">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2" >Search</button>
</form>
<div class="div">
  Gợi ý
  <p id="goi_y"></p>
</div>

<select class="form-select" aria-label="Default select example" name="select_sl" id="select_sl" onchange="selectPage(this.value)">
  <option value="0" selected>select paginate:</option>
  <option >2</option>
  <option >3</option>
  <option >5</option>
</select>

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
                <td> <a href="/admin/sinhvien/edit/{{$Sinhvien->id}}" class="btn btn-outline-primary">Edit</a> <a href="#" class="btn btn-outline-danger" onclick="Delete({{$Sinhvien->id}},'/admin/sinhvien/delete')">Delete</a> </td>
              </tr>              
            @endforeach
            
          </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        {{ $Sinhviens->appends(request()->all())->links() }}
      </ul>
    </nav>

    
@endsection