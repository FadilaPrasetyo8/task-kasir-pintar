<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    use HasFactory;

    protected $table = 'reimbursements';

    protected $fillable = [
        'id',
        'tanggal_reimbursement',
        'nama_reimbursement',
        'deskripsi',
        'status',
        'file_name',
        'file_path',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'nip', 'id');
    // }

}
