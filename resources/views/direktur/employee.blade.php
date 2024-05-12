@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Authors table</h6>
                    <button class="btn btn-primary btn-tambah-karyawan"><span class="me-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024">
                                <path fill="currentColor"
                                    d="M480 480V128a32 32 0 0 1 64 0v352h352a32 32 0 1 1 0 64H544v352a32 32 0 1 1-64 0V544H128a32 32 0 0 1 0-64z" />
                            </svg></span>Tambah Karyawan</button>
                </div>
                <div class="card-body pb-2">
                    <div class="table-responsive ">
                        <table class="display" id="mytables">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        id
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nip
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Role
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    // Modal Tambah data
    <div class="modal fade" id="tambahkaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="nip" class="form-label
                            ">NIP</label>
                            <input type="number" name="nip" class="form-control" id="nip">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label
                            ">Nama</label>
                            <input type="text" name='nama' class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label
                            ">Jabatan</label>
                            <select class="form-select" name="jabatan" id="jabatan" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Finance">Finance</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label
                            ">Email</label>
                            <input type="email" name='email' class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name='password' class="form-control" id="password">

                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="role" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="finance">Finance</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="savekaryawan">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editkaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="text" hidden name="id" id="id">
                        <div class="mb-3">
                            <label for="editnip" class="form-label
                            ">NIP</label>
                            <input type="number" name="editnip" class="form-control" id="editnip">
                        </div>
                        <div class="mb-3">
                            <label for="editnama" class="form-label
                            ">Nama</label>
                            <input type="text" name='editnama' class="form-control" id="editnama">
                        </div>
                        <div class="mb-3">
                            <label for="editjabatan" class="form-label
                            ">Jabatan</label>
                            <select class="form-select" name="editjabatan" id="editjabatan"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Finance">Finance</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editemail" class="form-label
                            ">Email</label>
                            <input type="email" name='editemail' class="form-control" id="editemail">
                        </div>

                        <div class="mb-3">
                            <label for="editrole" class="form-label">Role</label>
                            <select class="form-select" name="editrole" id="editrole"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="finance">Finance</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="saveeditkaryawan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('.btn-tambah-karyawan').click(function() {
                $('#tambahkaryawan').modal('show');
            });

            $('#savekaryawan').click(function() {

                event.preventDefault();

                var formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('nip', $('#nip').val());
                formData.append('nama', $('#nama').val());
                formData.append('jabatan', $('#jabatan').val());
                formData.append('email', $('#email').val());
                formData.append('password', $('#password').val());
                formData.append('role', $('#role').val());

                $.ajax({
                    url: '{{ route('employee.store') }}',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data) {
                        $('#mytables').DataTable().ajax.reload();
                        $('#tambahkaryawan').modal('hide');
                        Swal.fire(
                            'Berhasil!',
                            'Data berhasil disimpan.',
                            'success'
                        )
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            })

            $('#mytables').on('click', '.edit-karyawan', function() {
                $('#editkaryawan').modal('show');
                var id = $(this).data('id');
                console.log(id);
                var nip = $(this).data('nip');
                console.log *

                    $.ajax({
                        url: "{{ url('/direktur/employee/edit/') }}" + '/' + id,
                        type: 'GET',
                        success: function(data) {
                            console.log(data);
                            $('#id').val(data.id);
                            $('#editnip').val(data.nip);
                            $('#editnama').val(data.nama);
                            $('#editjabatan').val(data.jabatan);
                            $('#editemail').val(data.email);
                            $('#editrole').val(data.role);
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
            });

            $('#saveeditkaryawan').click(function() {
                var id = $('#id').val();
                console.log(id);
                var formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('nip', $('#editnip').val());
                formData.append('nama', $('#editnama').val());
                formData.append('jabatan', $('#editjabatan').val());
                formData.append('email', $('#editemail').val());
                formData.append('role', $('#editrole').val());

                $.ajax({
                    url: "{{ url('/direktur/employee/update/') }}" + '/' + id,
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data) {
                        $('#mytables').DataTable().ajax.reload();
                        $('#editkaryawan').modal('hide');
                        Swal.fire(
                            'Berhasil!',
                            'Data berhasil diupdate.',
                            'success'
                        )
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });




            $('#mytables').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employee.direktur') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    }, {
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

            $('#mytables').on('click', '.delete', function() {
                var id = $(this).data('id');
                console.log(id);
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('/direktur/employee/') }}" + '/' + id,
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                            success: function(data) {
                                $('#mytables').DataTable().ajax.reload();
                                Swal.fire(
                                    'Terhapus!',
                                    'Data berhasil dihapus.',
                                    'success'
                                )
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });

                    }
                })
            });
        });
    </script>
@endsection
