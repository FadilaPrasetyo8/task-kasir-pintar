<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Reimbursement;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\Debugbar\Facades\Debugbar;

class PengajuanReimbursementController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Reimbursement::get();
            return Datatables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '';
                    if($row->status == 'pending') {
                        $actionBtn = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="reject btn btn-danger btn-sm">Tolak</a> <a href="javascript:void(0)" data-id="' . $row->id . '" class="submited btn btn-success btn-sm">Ajukan</a>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('finance.index');
    }

    public function submited(Request $request) {
        $reimbursement = Reimbursement::find($request->id);

        if (!$reimbursement) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }

        $reimbursement->status = 'submit';
        $reimbursement->save();

        return response()->json(['success' => true, 'message' => 'Pengajuan berhasil disetujui'], 200);
    }

    public function reject(Request $request)
    {
        Debugbar::info($request->all());
        $reimbursement = Reimbursement::find($request->id);


        if (!$reimbursement) {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }

        $reimbursement->status = 'rejected';
        $reimbursement->save();

        return response()->json(['success' => true, 'message' => 'Pengajuan berhasil ditolak'], 200);
    }
}
