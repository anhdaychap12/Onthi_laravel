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
        
        return sinhvien::paginate(2);
    }

    public function edit($id, $request) {
        try {
            $name = $request -> input('name');
            $age = $request -> input('age');
            $mssv = $request -> input('MSSV');

            $sv = sinhvien::find($id);
            $sv -> Name = $name;
            $sv -> Age = $age;
            $sv -> MSSV = $mssv;
            $sv -> save();
            session()->flash('success', 'Cập nhật sinh viên thành công!');
        } catch (Exception $ex) {
            //throw $th;
            session() ->flash('error', $ex ->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $sv = sinhvien::where('id',$request->input('id'))->first();
        if($sv){
            return $sv->delete();
        }
    }

    public function Search($str) {
        if(empty($str)){
            return sinhvien::all();
        }
        else{
            $sv = sinhvien::where('Name', 'LIKE', '%' . $str. '%')->paginate(2);
            return $sv;
        }
    }

    public function selectPaginate($i) {
        return sinhvien::paginate($i);
    }
}
