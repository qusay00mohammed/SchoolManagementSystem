<?php

namespace App\Http\Controllers\Stage;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stage = Stage::all();
        return view("pages.stage.stage", compact("stage"));
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
        ]);

        if(Stage::where('name->ar', $request->name_ar)->orWhere('name->en', $request->name_en)->exists()) {
            toastr()->error("الاسم مكرر");
            return redirect()->route('stage.index');
        }

        Stage::create([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'notes' => $request->notes
        ]);

        toastr()->success(__('trans_notification.saved'));
        return redirect()->route('stage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stage $stage)
    {
        $request->validate([
            "name_ar" => "required",
            "name_en" => "required",
        ]);

        $stage->update([
            $stage->name = ['en' => $request->name_en, 'ar' => $request->name_ar],
            $stage->notes = $request->notes,
        ]);

        toastr()->success(__('trans_notification.edited'));
        return redirect()->route('stage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();
        toastr()->success(__('trans_notification.deleted'));
        return redirect()->route('stage.index');
    }
}
