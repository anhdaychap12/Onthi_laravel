<?php
namespace App\Http\Service;

use App\Models\sinhvien;
use PHPUnit\Exception;
use DB;

class SinhvienService{
    public function Create($request) {
        try {
            $name = $request -> input('name');
            $age = $request -> input('age');
            $mssv = $request -> input('MSSV');

            $Sinhvien = new sinhvien;
            $Sinhvien -> Name = $name;
            $Sinhvien -> Age = $age;
            $Sinhvien -> MSSV = $mssv;
            $Sinhvien -> save();

            session()->flash('success', 'Thêm mới sinh viên thành công!');
        } catch (Exception $ex) {
            session() ->flash('error', $ex ->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        
        $sv = sinhvien::all();
        return $sv;
    }
}
