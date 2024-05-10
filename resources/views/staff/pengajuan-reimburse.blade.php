@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Authors table</h6>
                    <button class="btn btn-primary btn-tambah-pengajuan"><span class="me-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024">
                                <path fill="currentColor"
                                    d="M480 480V128a32 32 0 0 1 64 0v352h352a32 32 0 1 1 0 64H544v352a32 32 0 1 1-64 0V544H128a32 32 0 0 1 0-64z" />
                            </svg></span>Tambah Pengajuan</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Author</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Function</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Employed</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                    alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">John Michael</h6>
                                                <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Manager</p>
                                        <p class="text-xs text-secondary mb-0">Organization</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  modal tambah pengajuan reimburse  --}}
    <div class="modal fade" id="tambahPengajuanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengajuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="tanggalReimbursement"
                                class="form-label
                            ">Tanggal</label>
                            <input type="date" name="tanggal_reimbursement" class="form-control"
                                id="tanggalReimbursement">
                        </div>
                        <div class="mb-3">
                            <label for="nameReimbursement" class="form-label
                            ">Nama
                                Reimbursement</label>
                            <input type="text" name='nama_reimbursement' class="form-control" id="nameReimbursement">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label
                            ">Deskripsi</label>
                            <input type="text" name='deskripsi' class="form-control" id="deskripsi">
                        </div>
                        <div class="mb-3">
                            <label for="filePendukung" class="form-label
                            ">Upload File</label>
                            <input type="file" name='filePendukung' class="form-control" id="filePendukung">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="simpanreimburse">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-tambah-pengajuan').click(function() {
                $('#tambahPengajuanModal').modal('show');
            });

            $('#simpanreimburse').click(function() {
                var formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('tanggal_reimbursement', $('#tanggalReimbursement').val());
                formData.append('nama_reimbursement', $('#nameReimbursement').val());
                formData.append('deskripsi', $('#deskripsi').val());
                formData.append('filePendukung', $('#filePendukung')[0].files[0]);

                console.log(formData);

                $.ajax({
                    url: '{{ route('pengajuan-reimburse.store') }}',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Data gagal disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });

        });
    </script>
@endsection
