@extends('adminlte::page')

@section('title', 'Payroll')
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
        <div class="">
            <h4 class="font-weight-bold ">
                Employees Payroll
            </h4>
        </div>
        <div>
            <div class="LoadTime d-none">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="card-box table-responsive">
                <table id="table_Payroll" class="table w-100 table-sm">
                    <thead>
                        <tr class="bg-thead-mediceram border-bottom-0 rounded-top">
                            <th class="col">Employees Name</th>
                            <th class="col">#Employee ID</th>
                            <th class="col">Duration</th>
                            <th class="col">Status</th>
                            <th class="col">Role</th>
                            <th class="col">Overtime Hour</th>
                            <th class="col">Payroll</th>
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
            var dataPayroll =
            [
                {
                    "name"       :   "MOHAMMAD NORUL ISLAM",
                    "Id"         :   "724679",
                    "duration"   :   "3 MTH",
                    "status"     :   "ACTIVE",   
                    "role"       :   "OPERATOR",
                    "OT"         :   "36:10:24",
                    "payroll"     :   "-",
                },
                {
                    "name"       :   "MOHAMMAD NORUL ISLAM",
                    "Id"         :   "724679",
                    "duration"   :   "3 MTH",
                    "status"     :   "ACTIVE",   
                    "role"       :   "OPERATOR",
                    "OT"         :   "36:10:24",
                    "payroll"     :   "-",
                },
                {
                    "name"       :   "MOHAMMAD NORUL ISLAM",
                    "Id"         :   "724679",
                    "duration"   :   "3 MTH",
                    "status"     :   "ACTIVE",   
                    "role"       :   "OPERATOR",
                    "OT"         :   "36:10:24",
                    "payroll"     :   "-",
                },
                {
                    "name"       :   "MOHAMMAD NORUL ISLAM",
                    "Id"         :   "724679",
                    "duration"   :   "3 MTH",
                    "status"     :   "ACTIVE",   
                    "role"       :   "OPERATOR",
                    "OT"         :   "36:10:24",
                    "payroll"     :   "-",
                },
                {
                    "name"       :   "MOHAMMAD NORUL ISLAM",
                    "Id"         :   "724679",
                    "duration"   :   "3 MTH",
                    "status"     :   "ACTIVE",   
                    "role"       :   "OPERATOR",
                    "OT"         :   "36:10:24",
                    "payroll"     :   "-",
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
            AP.tablePayroll =  $('#table_Payroll').DataTable( {
                            "data": dataPayroll,
                            "processing":true,
                            "bLengthChange" : false,
                            "pageLength": 15,
                            "columnDefs": [
                                // {targets: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 21], visible: false}
                            ],
                            "columns": [
                                { 
                                    "data": "name",defaultContent: '', width: '30px', className: 'text-center',
                                },
                                { 
                                    "data": "Id",defaultContent: '', width: '30px', className: 'text-center'
                                },
                                { 
                                    "data": "duration",defaultContent: '', width: '30px', className: 'text-center' 
                                },
                                { 
                                    "data": "status",defaultContent: '', width: '30px', className: 'text-center'
                                },
                                { 
                                    "data": "role",defaultContent: '', width: '30px', className: 'text-center' 
                                },
                                { 
                                    "data": "OT",defaultContent: '', width: '30px', className: 'text-center'
                                },
                                { 
                                    "data": "payroll",defaultContent: '', width: '30px', className: 'text-center',
                                    'render': function ( data, type, row ) {

                                        data =` <div class="text-center">
                                                    <input type="checkbox" id="payrollcheck" />
                                                    <label for="payrollcheck"></label>
                                                </div>`;

                                        return data;
                                    }
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

            $('#table_Payroll_filter').addClass('d-none')
            $('#table_Payroll_previous').addClass('mr-2')
            $('#table_Payroll_previous').find('a').text('<').addClass('pageinate-Mediceram')
            $('#table_Payroll_next').addClass('ml-2')
            $('#table_Payroll_next').find('a').text('>').addClass('pageinate-Mediceram')
        }

    </script>
@stop