<?php
namespace App\Http\Service;

use App\Models\sinhvien;
use PHPUnit\Exception;
use DB;

class SinhvienService{
    // public function Create($request) {
    //     try {
    //         $name = $request -> input('name');
    //         $age = $request -> input('age');
    //         $address = $request -> input('address');

    //         $Sinhvien = new sinhvien;
    //         $Sinhvien -> name = $name;
    //         $Sinhvien -> age = $age;
    //         $Sinhvien -> address = $address;
    //         $Sinhvien -> save();

    //         session()->flash('success', 'Thêm mới sinh viên thành công!');
    //     } catch (Exception $ex) {
    //         session() ->flash('error', $ex ->getMessage());
    //         return false;
    //     }
    //     return true;
    // }

    public function getAll() {
        
        $sv = sinhvien::all();
        return $sv;
    }
}
