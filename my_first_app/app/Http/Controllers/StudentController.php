<?php


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'residence_location' => 'required|string|max:255',
        ]);

        // Create a new student record with the validated data
        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student has been added');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'residence_location' => 'required|string|max:255',
        ]);

        // Update the student's data with the validated data
        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student has been updated');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student has been deleted');
    }
}
