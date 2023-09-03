@extends('adminlte::page')

@section('title', 'Salary')
@section('plugins.Datatables', true)

@section('content')
    @if (Session::has('success'))
    <div class="w-100">
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Berjaya" dismissable>
            {{ Session::get('success') }}
        </x-adminlte-alert>
    </div>
    @endif
    <div class="pt-3">
        <div class="col-4">
            <x-adminlte-info-box title="Salary" text="75/100" icon="fas fa-lg fa-users text-white" theme="light"
            icon-theme="dark" progress=75 progress-theme="dark"
            {{-- description="75% staff yang hadir" --}}
            />
        </div>
    </div>
    <x-adminlte-card class="mx-1">
        <div>
            <div class="LoadTime d-none">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="card-box table-responsive">
                <table id="table_employee" class="table w-100 table-sm">
                    <thead>
                        <tr>
                            <th class="col">Bil</th>
                            <th class="col">User</th>
                            <th class="col">Salary</th>
                            <th class="col">Status</th>
                            <th class="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </x-adminlte-card>
@endsection

@section('css')
@stop

@section('js')
    <script>
        var AP = [];
        var dataemployee =
        [
            {
                "id"      :   "1",   
                "nama"    :   "Gary",
                "salary"  :   "RM 5,000",
                "status"  :   "Done",
            },
            {
                "id"      :   "2",   
                "nama"    :   "Xorn",
                "salary"  :   "RM 2,000",
                "status"  :   "Not",
            },
            {
                "id"      :   "3",   
                "nama"    :   "Minn",
                "salary"  :   "RM 3,200",
                "status"  :   "Done",
            },
        ];

            $(document).ready( function () {
                // var status = $('#kat_permohon').val();
                // $.ajax({
                //     'url':'/userData',
                //     'type':'POST',
                //     'data':{
                //         '_token': '{{ csrf_token() }}',
                //         'status': status,
                //     },
                //     success:function(response){
                //         console.table(response);
                //         if(response){
                //             datatugasan = response;
                            AP.tableEmployee =  $('#table_employee').DataTable( {
                                "data": dataemployee,
                                "processing":true,
                                "bLengthChange" : false,
                                "pageLength": 15,
                                "columnDefs": [
                                    // {targets: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 21], visible: false}
                                ],
                                "columns": [
                                    {   "data": null, defaultContent: '', width: '10px', className: 'text-left',
                                        render: function(data, type, row, meta){
                                            return meta.row+1;
                                        }
                                    },
                                    { 
                                        "data": "nama",defaultContent: '', width: '30px', className: 'text-left'
                                    },
                                    { 
                                        "data": "salary",defaultContent: '', width: '30px', className: 'text-left'
                                    },
                                    { 
                                        "data": "status",defaultContent: '', width: '30px', className: 'text-center',
                                        'render': function ( data, type, row ) {

                                            if(data == "Done"){
                                                
                                                data = '<button class="btn btn-sm btn-success">Done</button>';

                                            }else if(data == "Not") {

                                                data = '<button class="btn btn-sm btn-warning">Not</button>';

                                            }else{

                                                data = 'Tak dikenalPasti';
                                            }

                                            return data;
                                        } 
                                    },
                                    
                                    {
                                        "data": null, defaultContent: `<button class="btn btn-sm btn-primary"><i class="fas fa-ellipsis-v"></i></button>`,className: 'text-center d-print-none', width: '30px',
                                        // return button =``;

                                    }

                                ],
                                
                                
                            });

                            // AP.tabletugasan.on('click', 'button', function(){
                            //     AP.selected = AP.tabletugasan.row($(this).parents('tr')).data();

                            //     $('#detail-maklumat').modal("show");
                            // });

                        // }

                //     }

                // });

            });

    </script>
@stop