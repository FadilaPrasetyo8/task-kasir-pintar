<?php

namespace App\Http\Controllers\Direktur;

use App\Http\Controllers\Controller;
use App\Models\Reimbursement;
use App\Models\User;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
class EmployeeController extends Controller
{
    public function index(Request $request) {

         if ($request->ajax()) {
        $user = User::latest()->get();
        return Datatables::of($user)
            ->addColumn('action', function ($row) {
                $actionBtn = '<div class="d-flex justify-content-lg-center gap-3"><a href="javascript:void(0)" data-id="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a> <a href="javascript:void(0)" data-id="' . $row->id . '" class="edit-karyawan btn btn-warning btn-sm">Edit</a></div> ';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

        return view('direktur.employee');
    }

    public function store(Request $request) {

        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->jabatan = $request->jabatan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return response()->json(['success' => 'Data added successfully.']);
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        debugbar()->info($user);
        return response()->json($user);
    }

    public function update(Request $request) {


        $user = User::findOrFail($request->id);
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->jabatan = $request->jabatan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return response()->json(['success' => 'Data updated successfully.']);
    }


    public function destroy(Request $request) {
        $user = User::findOrFail($request->id);
        $user->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }

}
