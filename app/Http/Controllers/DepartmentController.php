<?php

namespace App\Http\Controllers;


use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('pages.department.list', ['departments' => Department::all()->where('active', true)]);
    }

    public function showCreate()
    {
        return view('pages.department.create');
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'alpha|required',
            'description' => 'alpha|required',
            'ot_rate' => 'numeric|required',
        ];
        $check = Validator::make($request->except(['_token']), $rules);

        if ($check->fails()) {
            return response()->json(['err' => $check->errors()->all()]);
        }

        if (Department::where('name', $request->get('name'))->count() != 0) {
            return response()->json(['err' => 'Department already exists!']);
        } else {
            $department = new Department($request->all());
            $department->save();
            return response()->json(['err' => false]);
        }

    }

    public function delete($id)
    {
        try {
            $dept = Department::findOrFail(intval($id));
            $dept->active = false;
            $dept->save();
            return back()->with(['msg' => $dept->name . ' deleted!']);
        } catch (\Exception $e) {
            return back()->with(['msg' => 'Department not found!']);
        }
    }

    public function showUpdate($id)
    {
        try {
            $dept = Department::findOrFail(intval($id));
            return view('pages.department.create', ['department' => $dept]);
        } catch (\Exception $e) {
            return back()->with(['msg' => 'Department not found!']);
        }


    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'alpha|required',
            'description' => 'alpha|required',
            'ot_rate' => 'numeric|required',
        ];
        $check = Validator::make($request->except(['_token']), $rules);
        if ($check->fails()) {
            return back()->with(['msg' => '<strong>Error</strong> validating changes!','err'=>true]);
        }

        try {
            $dept = Department::findOrFail(intval($id));
            $dept->fill($request->all());
            $dept->save();
            return back()->with(['msg' => 'Changes saved successfully!','err'=>false]);
        }catch (\Exception $e){
            return back()->with(['msg' => '<strong>Error</strong> saving changes!', 'err'=>true]);
        }


    }


}
