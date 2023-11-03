<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if ($students->isEmpty()) {
            $data = [
                'message' => 'Resource is empty',
                'data' => $students
            ];
            return response()->json($data, 204);
        }

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        // mengirim data (json) dan kode 200
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // validasi data request
        $request->validate([
            "nama" => "required",
            "nim" => "required",
            "email" => "required|email",
            "jurusan" => "required"
        ]);
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

        if ($students) {
            $input = [
                'nama' => $request->nama ?? $students->nama,
                'nim' => $request->nim ?? $students->nim,
                'email' => $request->email ?? $students->email,
                'jurusan' => $request->jurusan ?? $students->jurusan,
            ];
            // menampilkan seluruh data student dengan perubahan terbarunya
            $students->update($input);

            $data = [
                'message' => 'Students is update succesfully',
                'data' => $students
            ];

            // mengirim data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Students not found',
                'data' => $students
            ];

            // mengirim data (json) dan kode 200
            return response()->json($data, 404);
        }
    }

    public function destroy($id)
    {
        // mencari data student sesuai id yang di tentukan
        $students = Student::find($id);

        if ($students) {

            $students->delete();

            $data = [
                'message' => 'Students is delete succesfully',
                'data' => $students
            ];

            // mengirim data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Students not found',
                'data' => $students
            ];

            // mengirim data (json) dan kode 200
            return response()->json($data, 404);
        }
    }

    public function show($id)
    {
        // cari id student yang ingin didapatkan
        $students = Student::find($id);

        if ($students) {
            $data = [
                'message' => 'Students not found',
                'data' => $students
            ];

            // mengirim data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Students not found',
                'data' => $students
            ];

            // mengirim data (json) dan kode 200
            return response()->json($data, 404);
        }
    }
}
