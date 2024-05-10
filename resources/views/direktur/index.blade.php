@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Authors table</h6>
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
                                        Nama Reimbursement
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tanggal Reimbursement
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Deskripsi
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status
                                    </th>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        File
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
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#mytables').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('approve-pengajuan.direktur') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    }, {
                        data: 'nama_reimbursement',
                        name: 'nama_reimbursement'
                    },
                    {
                        data: 'tanggal_reimbursement',
                        name: 'tanggal_reimbursement'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'file_path',
                        name: 'file_path',
                        render: function(data, type, full, meta) {
                            var result = data ?
                                '<div><a id="label_file" href="' +
                                data +
                                '" download>Download File</a></div>' :
                                "";

                            return result;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
        });

        $(document).on('click', '.approve', function() {
            var id = $(this).attr('id');
            $.ajax({
                ajax: "{{ route('approve-pengajuan.approve') }}",
                success: function(data) {
                    console.log('sukses')
                }
            });
        });
    </script>
@endsection
