<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $a=Course::all();
        return response()->json($a,Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        Course::create([
            'course_category_id' => $request->course_category_id,
            'description' => $request->description,
            'current_order' =>$request->current_order,
        ]);

        return response()->json(['messenge'=>'thêm thành công'],Response::HTTP_CREATED);
    }


    public function store(Request $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update([
            'course_category_id' => $request->course_category_id,
            'description' => $request->description,
            'current_order' =>$request->current_order,
        ]);

        return response()->json(['message' => 'sua thanh cong'],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return response()->json(['message' => 'xoa thanh cong'],Response::HTTP_NO_CONTENT);
    }
}
