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

    public function delete(Request $request){
        $result = $this->sinhvienService->delete($request);
        if($result){
            return response()->json([
               'error'=>'false',
               'message'=>'Xóa danh mục thành công'
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }

    public function Search(Request $request) {
        $str = $request-> input('search-str');
        return view('admin.Sinhvien.list', ['Sinhviens' => $this->sinhvienService->Search($str), 'title' => 'Danh sách tìm kiếm']);
    }

    public function ajaxSearch(Request $request){
        $str = $request->hint;
        $Sinhviens = $this->sinhvienService->Search($str);
        $html = "<span>";
        foreach ($Sinhviens as $sinhvien) {
            $html = $html . $sinhvien->Name . ", ";
        }
        $html = $html."</span>";

        return response()->json(['html' => $html]);

    }

    public function SelectPaginate(Request $request) {
        return view('admin.Sinhvien.list', ['Sinhviens' => $this->sinhvienService->selectPaginate($request->sl), 'title' => 'Danh sách sinh viên']);
    }


}
