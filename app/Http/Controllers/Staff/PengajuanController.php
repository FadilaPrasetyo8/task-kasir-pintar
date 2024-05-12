<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Reimbursement;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\View\View as ViewView;

class PengajuanController extends Controller
{

    public function __construct()
    {
            $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Reimbursement::get();
            return Datatables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('staff.pengajuan-reimburse');
    }

   public function store(Request $request)
{
    $request->validate([
        'nama_reimbursement' => 'required',
        'deskripsi' => 'required',
        'tanggal_reimbursement' => 'required',
        'filePendukung' => 'required|file', // Validasi file PDF
    ]);

    $abc = new Reimbursement();

    if ($request->hasFile('filePendukung')) {
        $file = $request->file('filePendukung');
        $original_name  = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $extension  = $file->extension();

        $docName  = $original_name .'.'.$extension;

         $url = url('/');
         $urlDoc = $url . '/documents/doc_generator/' . $docName;

         $save = $file->move(public_path('documents/doc_generator'), $docName);

        $abc->file_path = $urlDoc ?? null;
        $abc->file_name = $docName ?? null;
    }

    $abc->tanggal_reimbursement = $request->tanggal_reimbursement;
    $abc->nama_reimbursement = $request->nama_reimbursement;
    $abc->deskripsi = $request->deskripsi;
    $abc->status = 'pending';
    $abc->save();

    return response()->json(['success' => true]);
}


}
