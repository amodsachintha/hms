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
        $id = $request->get('id');
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        $check = Validator::make($request->all(), $rules);
        if ($check->fails()) {
            return back()->with(['err' => $check->errors()->all()]);
        }

        if (!is_null($id)) {
            try {
                $dept = Department::findOrFail(intval($id));

                if (Department::where('name', $dept->name)->count() != 0) {
                    return back()->with(['err' => 'Department already exists!']);
                }
                $dept->fill($request->except(['id']));
                $dept->save();
                return back()->with(['msg' => 'Update successful.']);
            } catch (\Exception $e) {
                return back()->with(['err' => 'Update failed.<br><code>' . $e->getMessage() . '</code>']);
            }
        }

        if (Department::where('name', $request->get('name'))->count() != 0) {
            return back()->with(['err' => 'Department already exists!']);
        } else {
            $department = new Department($request->all());
            $department->save();
            return back()->with(['msg' => 'Department added successfully.']);
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
            return back()->with(['err' => 'Department not found!']);
        }
    }

    public function showUpdate($id)
    {
        try {
            $dept = Department::findOrFail(intval($id));
            return view('pages.department.create', ['department' => $dept]);
        } catch (\Exception $e) {
            return back()->with(['err' => 'Department not found!']);
        }

    }

}
