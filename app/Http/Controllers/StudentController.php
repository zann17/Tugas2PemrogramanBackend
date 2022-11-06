<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    # method index - get all resources
    public function index()
    {
        # menggunakan model Student untuk select data
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students,
        ];

        # menggunakan response json laravel
        # otomatis set header content type json
        # otomatis mengubah data array ke JSON
        # mengatur status code
        return response()->json($data, 200);
    }

    # menambahkan resource student
    # membuat method store
    public function store(Request $request)
    {
        # menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        # menggunakan Student untuk insert data
        $student = Student::create($input);

        $data = [
            'message' => 'Student is created successfully',
            'data' => $student,
        ];

    # mengembalikan data (json) status code 201
    return response()->json($data, 201);

    }

    # menghapus resource student
    public function destroy($id)
    {   
    $student=student::find($id);
    $student->delete();

    return response()->json([
    'success'=>true,
    'message'=>'success'
    ]);
    }

    # mengapdate resource student

    public function update(Request $request, $id)
    {
        #menangkap data request
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        # menggunakan Student untuk insert data
        $student = Student::find($id);
        $student->update([
            'nama' => $nama,
            'nim' => $nim,
            'email' => $email,
            'jurusan' => $jurusan,
        ]);

        $data = [
            'message' => "Student with id $id has update successfully",
            'data' => $student,
        ];

        # mengembalikan data (json) status code 201
        return response()->json($data, 202);
    }

}