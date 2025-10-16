<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class StudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentInfos = StudentInfo::all();
       // return view('student-info.index', compact('studentInfos'));
      $data = [
        'studentInfos' => $studentInfos,
        ];
      //return view(getTemplate() . '.pages.home', $data);
        return view('admin.users.info', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(getTemplate() . '.pages.info');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'email' => 'required|email|unique:student_infos,email',
            'phone' => 'required|string|max:20',
            'parent_phone' => 'required|string|max:20',
            'school_name' => 'required|string|max:255',
            'national_id_number' => 'required|string|unique:student_infos,national_id_number|max:50',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 422);
            }

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $student = StudentInfo::create($validator->validated());

      return response()->json([
        'message' => 'Student information created successfully.',
        'data' => $student,
        
      ], 200); // ✅ returns status 200
       // return redirect()->route('student-info.index')
          //  ->with('success', 'Student information created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(StudentInfo $studentInfo)
    {
        return view('student-info.show', compact('studentInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentInfo $studentInfo)
    {
        return view('student-info.edit', compact('studentInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentInfo $studentInfo)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'email' => 'required|email|unique:student_infos,email,' . $studentInfo->id,
            'phone' => 'required|string|max:20',
            'parent_phone' => 'required|string|max:20',
            'school_name' => 'required|string|max:255',
            'national_id_number' => 'required|string|unique:student_infos,national_id_number,' . $studentInfo->id . '|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $studentInfo->update($validator->validated());

        return redirect()->route('student-info.index')
            ->with('success', 'Student information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentInfo $studentInfo)
    {
        $studentInfo->delete();

        return redirect()->route('student-info.index')
            ->with('success', 'Student information deleted successfully.');
    }
}