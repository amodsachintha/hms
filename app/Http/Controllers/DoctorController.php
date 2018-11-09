<?php

namespace App\Http\Controllers;

use App\Department;
use App\Doctor;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('pages.doctor.list', ['doctors' => Doctor::all()->where('active', true)]);
    }

    public function showCreate()
    {
        $specializations = Specialization::all()->where('active', true);
        $departments = Department::all()->where('active', true);
        return view('pages.doctor.create', [
            'specializations' => $specializations,
            'departments' => $departments,
        ]);
    }

    public function showUpdate($id)
    {
        try {
            $doc = Doctor::findOrFail(strval($id));
            $specializations = Specialization::all()->where('active', true);
            $departments = Department::all()->where('active', true);
            return view('pages.doctor.create', [
                'doctor' => $doc,
                'specializations' => $specializations,
                'departments' => $departments
            ]);
        } catch (\Exception $e) {
            return back()->with(['err' => 'Doctor not found!. ' . $e->getMessage()]);
        }

    }


    public function create(Request $request)
    {
        $id = $request->get('id');
        $rules = [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'specialization_id' => 'numeric|required',
            'department_id' => 'numeric|required',
            'dob' => 'required',
            'address' => 'required',
            'mobile' => 'required|min:9|max:12',
            'work' => 'min:9|max:12|nullable',
            'gender' => 'required',
            'nic' => 'required|min:9|max:12',
            'fee' => 'required|numeric',
        ];
        $check = Validator::make($request->all(), $rules);
        if ($check->fails()) {
            return back()->with(['err' => $check->errors()->all()]);
        }

        if (!is_null($id)) {
            try {
                $doctor = Doctor::findOrFail($id);
                $doctor->fill($request->except(['id']));
                $doctor->save();
                return back()->with(['msg' => 'Update successful.']);
            } catch (\Exception $e) {
                return back()->with(['err' => 'Update failed.<br><code>' . $e->getMessage() . '</code>']);
            }
        } else {
            try{
                $data = $request->all();
                $data['id'] = doctorID();
                $newDoc = new Doctor($data);
                $newDoc->save();
                return back()->with(['msg' => 'Doctor added successfully.']);
            }
            catch (\Exception $e){
                return back()->with(['err' => 'ERROR.<br><code>' . $e->getMessage() . '</code>']);
            }

        }
    }

    public function delete($id){
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->active = false;
            $doctor->save();
            return back()->with(['msg' => $doctor->f_name . ' ' .$doctor->l_name . ' deleted!']);
        } catch (\Exception $e) {
            return back()->with(['err' => 'Doctor not found!']);
        }
    }


}
