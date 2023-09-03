@extends('adminlte::page')

@section('title', 'History')
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
            <x-adminlte-info-box title="Today Activity" text="1205" icon="fas fa-lg fa-users text-white" icon-theme="dark"/>
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
                <table id="table_history" class="table w-100 table-sm">
                    <thead>
                        <tr>
                            <th class="col">Bil</th>
                            <th class="col">Aktiviti</th>
                            <th class="col">User</th>
                            <th class="col">Tarikh</th>
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
        var datahistory =
        [
            {
                "id"         :   "1",   
                "aktiviti"   :   "OUT",
                "user"       :   "Gary",
                "tarikh"     :   "4-8-2023",
            },
            {
                "id"         :   "2",   
                "aktiviti"   :   "IN",
                "user"       :   "Xorn",
                "tarikh"     :   "7-8-2023",
            },
            {
                "id"         :   "3",   
                "aktiviti"   :   "IN",
                "user"       :   "Minn",
                "tarikh"     :   "2-8-2023",
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
                            AP.tableHistory =  $('#table_history').DataTable( {
                                "data": datahistory,
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
                                        "data": "aktiviti",defaultContent: '', width: '30px', className: 'text-left',
                                        'render': function ( data, type, row ) {

                                            if(data == "OUT"){

                                                data = '<button class="btn btn-sm btn-danger">OUT</button>';

                                            }else if(data == "IN") {

                                                data = '<button class="btn btn-sm btn-success">IN</button>';

                                            }else{

                                                data = 'Tak dikenal pasti';
                                            }

                                            return data;
                                        }
                                    },
                                    { 
                                        "data": "user",defaultContent: '', width: '30px', className: 'text-left'
                                    },
                                    { 
                                        "data": "tarikh",defaultContent: '', width: '30px', className: 'text-center' 
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