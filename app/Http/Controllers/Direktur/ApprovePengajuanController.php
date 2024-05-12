<?php

namespace App\Http\Controllers\Direktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reimbursement;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\Debugbar\Facades\Debugbar;

class ApprovePengajuanController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $reimbursements = Reimbursement::where('status', 'submit')->get();
        debugbar()->info($reimbursements);
        return Datatables::of($reimbursements)
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                if($row->status == 'submit') {
                    $actionBtn = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="reject btn btn-danger btn-sm">Tolak</a> <a href="javascript:void(0)" data-id="' . $row->id . '" class="approve btn btn-success btn-sm">Approve</a>'; // Perbaiki penulisan 'submited' menjadi 'submitted'
                }
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('direktur.index');
}


    public function approve(Request $request){
        $reimbursement = Reimbursement::find($request->id);

        if (!$reimbursement) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }

        $reimbursement->status = 'approved';
        $reimbursement->save();

        return response()->json(['success' => 'Data berhasil diapprove']);
    }

    public function reject(Request $request){
        $reimbursement = Reimbursement::find($request->id);

        if (!$reimbursement) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }

        $reimbursement->status = 'rejected';
        $reimbursement->save();

        return response()->json(['success' => 'Data berhasil direject']);
    }
}
