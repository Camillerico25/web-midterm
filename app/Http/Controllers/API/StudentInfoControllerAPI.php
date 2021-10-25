<?php


namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\StudentInfo;


class StudentInfoControllerAPI extends Controller
{
    public function index()
    {
        $studensInfo = StudentInfo::all();

        return response()->json(['studentsInfo' => $studensInfo],200);
    }
}
