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
        $reimbursements = User::latest()->get();
        debugbar()->info($reimbursements);
        return Datatables::of($reimbursements)
            ->addColumn('action', function ($row) {
                $actionBtn = '<div class="d-flex justify-content-lg-center gap-3"><a href="javascript:void(0)" data-id="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a> <a href="javascript:void(0)" data-id="' . $row->id . '" class="edit btn btn-warning btn-sm">Edit</a></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

        return view('direktur.employee');
    }

}
