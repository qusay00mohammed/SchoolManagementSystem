<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Stage;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stage = Stage::all();
        $grade = Grade::all();
        return view("pages.grade.grade", compact('stage', 'grade'));
    }

    public function filter_grade(Request $request) {
        $stage = Stage::all();
        $grade = Grade::where('stage_id', $request->stage_id)->get();
        return view("pages.grade.grade", compact('stage', 'grade'));
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

        $input = $request->List_Classes;
        $request->validate([
            'List_Classes.*.name_ar' => 'required',
            'List_Classes.*.name_en' => 'required',
        ]);

        foreach ($input as $in) {
            $grade = new Grade();
            $grade->name = ['en' => $in['name_en'], 'ar' => $in['name_ar']];
            $grade->stage_id = $in['stage_id'];
            $grade->save();
        }

        toastr()->success(__('trans_notification.saved'));
        return redirect()->route('grade.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateGrade = Grade::findOrFail($id);
        $input = $request->List_Classes[0];
        $request->validate([
            'List_Classes.*.name_ar' => 'required',
            'List_Classes.*.name_en' => 'required',
        ]);

        $updateGrade->name = ['en' => $input['name_en'], 'ar' => $input['name_ar']];
        $updateGrade->stage_id = $input['stage_id'];
        $updateGrade->save();

        toastr()->success(__('trans_notification.edited'));
        return redirect()->route('grade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grade::findOrFail($id)->delete();
        toastr()->success(__('trans_notification.deleted'));
        return redirect()->route('grade.index');
    }

    public function delete_all_item(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        Grade::whereIn('id', $delete_all_id)->delete();

        toastr()->success(__('trans_notification.deleted'));
        return redirect()->route('grade.index');
    }

}
