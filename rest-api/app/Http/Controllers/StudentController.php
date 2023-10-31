<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        // menggunakan model student untuk select data
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        // mengirim data (json) dan kode 200
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        // menggunakan model student untuk membuat data baru
        $students = Student::create($input);

        $data = [
            'message' => 'Students is created succesfully',
            'data' => $students
        ];

        // mengirim data (json) dan kode 200
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        // mencari data student sesuai id yang di tentukan
        $students = Student::find($id);

        // menampilkan seluruh data student dengan perubahan terbarunya
        $students->update($request->all());

        $data = [
            'message' => 'Students is update succesfully',
            'data' => $students
        ];

        // mengirim data (json) dan kode 200
        return response()->json($data, 200);
    }

    public function destroy(Request $request, $id)
    {
        // mencari data student sesuai id yang di tentukan
        $students = Student::destroy($id);

        // menampilkan seluruh data student dengan perubahan terbarunya
        // $students->update($request->all());

        $data = [
            'message' => 'Students is delete succesfully',
            'data' => $students
        ];

        // mengirim data (json) dan kode 200
        return response()->json($data, 200);
    }
}
