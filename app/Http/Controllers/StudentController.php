<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(Request $request) {
        // DB::enableQueryLog();
        
        $students = User::with([
            'assignments'
        ])
        ->orderBy('last_name', 'desc')
        ->orderBy('first_name', 'desc')
        ->paginate(50);

        $response = $students->map(function($student) {
            return [
                'id' => $student->id,
                'name' => [
                    'first' => $student->first_name,
                    'last' => $student->last_name,
                ],
                'email' => $student->email,
                'thumbnail' => $student->thumbnail,
                'phone_number' => $student->phone_number,
                'address' => $student->address,
                'assignments' => $student->assignments->map(function($assignment) {
                    return [
                        'id' => $assignment->id,
                        'name' => $assignment->name
                    ];
                })
            ];
        });

        // print_r(DB::getQueryLog()); exit;

        return response()->json($response, 200)->withHeaders([
            'X-Total-Count' => $students->total(),
            'X-Per-Page' => $students->perPage(),
            'X-Current-Page' => $students->currentPage(),
            'X-Item-Range-From' => $students->firstItem(),
            'X-Item-Range-To' => $students->lastItem(),
            'X-Total-Pages' => $students->lastPage()
        ]);
    }
}
