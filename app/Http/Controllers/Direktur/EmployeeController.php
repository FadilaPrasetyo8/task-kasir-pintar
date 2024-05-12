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
                $actionBtn = '<div class="d-flex justify-content-lg-center gap-3"><a href="javascript:void(0)" data-id="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a> <a href="javascript:void(0)" data-id="' . $row->id . '" class="edit btn btn-warning btn-sm">Edit</a></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

        return view('direktur.employee');
    }

    public function destroy(Request $request) {
        $user = User::findOrFail($request->id);
        $user->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }

}
