<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSinhvienRequest;
use App\Http\Requests\EditSinhvienRequest;
use App\Http\Service\SinhvienService;
use App\Models\sinhvien;
use Illuminate\Http\Request;

class SinhvienController extends Controller
{
    //
    protected $sinhvienService;

    public function __construct(SinhvienService $sinhvienService) {
        $this->sinhvienService = $sinhvienService;
    }
    public function index() {
        return view('admin.Sinhvien.list', ['Sinhviens' => $this->sinhvienService->getAll(), 'title' => 'Danh sách sinh viên']);
    }

    public function PostAdd() {
        return view('admin.Sinhvien.add', ['title' => 'Thêm sinh viên']);
    }

    public function Add(AddSinhvienRequest $request) {
        
        $rs = $this->sinhvienService->Create($request);
        return redirect('admin/sinhvien/list');
    }

    public function PostEdit($id) {
        $sv = sinhvien::find($id);
        return view('admin.Sinhvien.edit', ['title' => 'Cập nhật thông tin sinh viên', 'sinhvien' => $sv]);
    }

    public function Edit($id, EditSinhvienRequest $request) {
        $rs = $this->sinhvienService->edit($id, $request);
        return redirect('admin/sinhvien/list');
    }

    public function Delete(Request $request) {
        $rs = $this->sinhvienService->Delete($request->id);
        return redirect()->back();
    }

    public function Search(Request $request) {
        $str = $request-> input('search-str');
        return view('admin.Sinhvien.list', ['Sinhviens' => $this->sinhvienService->Search($str), 'title' => 'Danh sách tìm kiếm']);
    }

    public function SelectPaginate(Request $request) {
        return view('admin.Sinhvien.list', ['Sinhviens' => $this->sinhvienService->selectPaginate($request->sl), 'title' => 'Danh sách sinh viên']);
    }


}
