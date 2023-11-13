@extends('adminlte::page')

@section('title', 'Employee')
@section('plugins.Datatables', true)


@section('content')
    @if (Session::has('success'))
    <div class="w-100">
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Berjaya" dismissable>
            {{ Session::get('success') }}
        </x-adminlte-alert>
    </div>
    @endif
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
                <table id="table_Employeee" class="table w-100 table-sm">
                    <thead>
                        <tr class="bg-thead-mediceram border-bottom-0 rounded-top">
                            <th class="col">Date</th>
                            <th class="col">#Employee ID</th>
                            <th class="col">Employees Name</th>
                            <th class="col">Role</th>
                            <th class="col">Shift IN</th>
                            <th class="col">Shift Out</th>
                            <th class="col">Over Time</th>
                            <th class="col">Reason</th>
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

        $(function() {

            var AP = [];
            var dataEmployee =
            [
                {
                    "tarikh"       :   "4-8-2023",   
                    "Id"         :   "724679",
                    "name"       :   "MOHAMMAD NORUL ISLAM",
                    "role"       :   "OPERATOR",
                    "SIN"        :   "08:00",   
                    "SOUT"       :   "10:45",
                    "OT"         :   "2.6",
                    "reason"     :   "-",
                },
                {
                    "tarikh"       :   "4-8-2023",   
                    "Id"         :   "724679",
                    "name"       :   "MD DULAL",
                    "role"       :   "OPERATOR",
                    "SIN"        :   "08:00",   
                    "SOUT"       :   "10:45",
                    "OT"         :   "2.6",
                    "reason"     :   "-",
                },
                {
                    "tarikh"       :   "4-8-2023",   
                    "Id"         :   "724679",
                    "name"       :   "MD AZAD",
                    "role"       :   "OPERATOR",
                    "SIN"        :   "08:00",   
                    "SOUT"       :   "10:45",
                    "OT"         :   "2.6",
                    "reason"     :   "-",
                },
            ];

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
            AP.tableEmployee =  $('#table_Employeee').DataTable( {
                            "data": dataEmployee,
                            "processing":true,
                            "bLengthChange" : false,
                            "pageLength": 15,
                            "columnDefs": [
                                // {targets: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 21], visible: false}
                            ],
                            "columns": [
                                { 
                                    "data": "tarikh",defaultContent: '', width: '30px', className: 'text-center',
                                },
                                { 
                                    "data": "Id",defaultContent: '', width: '30px', className: 'text-center'
                                },
                                { 
                                    "data": "name",defaultContent: '', width: '30px', className: 'text-center' 
                                },
                                { 
                                    "data": "role",defaultContent: '', width: '30px', className: 'text-center'
                                },
                                { 
                                    "data": "SIN",defaultContent: '', width: '30px', className: 'text-center'
                                },
                                { 
                                    "data": "SOUT",defaultContent: '', width: '30px', className: 'text-center' 
                                },
                                { 
                                    "data": "OT",defaultContent: '', width: '30px', className: 'text-center'
                                },
                                { 
                                    "data": "reason",defaultContent: '', width: '30px', className: 'text-center' 
                                },
                                

                            ],
                            
                            
                        });

                        // AP.tabletugasan.on('click', 'button', function(){
                        //     AP.selected = AP.tabletugasan.row($(this).parents('tr')).data();

                        //     $('#detail-maklumat').modal("show");
                        // });

                    // }

            //     }

            // });
            datatableCustom()
        });

        
        function datatableCustom(){

            $('#table_Employeee_filter').addClass('d-none')
            $('#table_Employeee_previous').addClass('mr-2')
            $('#table_Employeee_previous').find('a').text('<').addClass('pageinate-Mediceram')
            $('#table_Employeee_next').addClass('ml-2')
            $('#table_Employeee_next').find('a').text('>').addClass('pageinate-Mediceram')
        }
    </script>
@stop