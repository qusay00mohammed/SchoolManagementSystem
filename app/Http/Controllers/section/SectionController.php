<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Stage;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stage = Stage::with('sections')->get();
        return view('pages.section.section')->with(compact('stage'));
    }

    public function filter_grade_by_stage($id)
    {
        $grade = Grade::where('stage_id', $id)->pluck('name', 'id');
        // $grade = Grade::select('name', 'id')->where('stage_id', $id)->get();
        return response()->json([
            'grade' => $grade,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name_ar" => "required",
            "name_en" => "required",
            "grade_id" => "required",
            "stage_id" => "required",
        ]);
        $section = new Section();
        $section->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $section->grade_id = $request->grade_id;
        $section->save();

        toastr()->success(__('trans_notification.saved'));
        return redirect()->route('section.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        // dd($request->all());
        $request->validate([
            "name_ar" => "required",
            "name_en" => "required",
            "grade_id" => "required",
            "stage_id" => "required",
            "status" => "required",
        ]);

        $section->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $section->grade_id = $request->grade_id;
        if ($request->status == 0) {
            $section->status = 0;
        }else {
            $section->status = 1;
        }
        $section->save();

        toastr()->success(__('trans_notification.edited'));
        return redirect()->route('section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        toastr()->success(__('trans_notification.deleted'));
        return redirect()->route('section.index');
    }
}
