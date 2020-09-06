<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Assignment;
use Illuminate\Support\Facades\DB;
use App\Transformers\AssignmentTransformer;

class AssignmentController extends Controller
{
    protected $transformer;
    public function __construct(AssignmentTransformer $transformer) {
        $this->transformer = $transformer;
    }

    public function index(Request $request) {
        // DB::enableQueryLog();
        $assignments = Assignment::with(['videos'])->orderBy('name')->get();

        $response = $assignments->map(function($assignment) {
            return $this->transformer->transform($assignment);
        });
        // print_r(DB::getQueryLog()); exit;

        return response()->json($response, 200);
    }
}
