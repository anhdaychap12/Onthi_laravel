<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Service\SinhvienService;
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
}
