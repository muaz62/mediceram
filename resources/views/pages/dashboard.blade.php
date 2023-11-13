@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Chartjs', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="row my-2">
        <div class="">
            <h1 class="text-mediceram-secondary">Welcome back, Harith.</h1>
        </div>
        <div class=" pt-3 pl-3 justify-content-end">
            <p class="mb-0">You have <span class="text-decoration-underline text-danger ">5 request</span> awaiting for approval</p>
        </div>
    </div>
    <div class="row py-2">
        <div class="col-lg-4">
            <x-adminlte-card class="rounded-lg">
                <a href="{{url('rumusan')}}" class="text-decoration-none text-dark">
                    <div class="row justify-content-between my-3">
                        <div class="">
                            <h5 class="font-weight-bolder">Total Employees</h5>
                        </div>
                        <div class="">
                            <h3 class="">1200</h3>
                        </div>
                    </div>
                </a>
                <canvas id="chartSalary"></canvas>
                <div class="row justify-content-between mt-4">
                    <div class="border border-black border-5 rounded-lg py-2 px-3 col-5 text-center">
                        <span><i class="fas fa-xs fa-circle text-mediceram-primary"></i></span> Male
                    </div>
                    <div class="border border-black border-5 rounded-lg py-2 px-3 col-6 text-center">
                        <span class="text-mediceram-secondary"><i class="fas fa-xs fa-circle "></i></span> Female
                    </div>
                </div>
            </x-adminlte-card>
        </div>
        <div class="col-lg-4">
            <x-adminlte-card class="mx-1">
                    <div class="font-20 my-3">
                        <h5 class="font-weight-bolder ">Employee Leave Requests</h5>
                    </div>
                <div id="leave-request" class="">
                    <p class=""></p>
                </div>
                <div class="text-center">
                    <a href="#" class="text-decoration-none text-dark my-0"><p class="">see more ></p></a>
                </div>
            </x-adminlte-card>
        </div>
        <div class="col-lg-4">
            <x-adminlte-card class="mx-1">
                <div class="row text-center mx-auto">
                    <div class="col-xl-4 border-xl-right">
                        <p class="">Attendance</p>
                        <p class="text-dashboard-h1">1,119</p>
                    </div>
                    <div class="col-xl-4">
                        <p class="">Late</p>
                        <p class="text-dashboard-h1">68</p>
                    </div>
                    <div class="col-xl-4 border-xl-left">
                        <p class="">Absent</p>
                        <p class="text-dashboard-h1">13</p>
                    </div>
                </div>
            </x-adminlte-card>

            <x-adminlte-card class="mx-1 mt-2">
                <div class="font-20 mb-3">
                    <h5 class="font-weight-bolder ">Employees on Holiday</h5>
                </div>
                <div id="holiday-request" class=""></div>
                <div class="text-center">
                    <a href="#" class="text-decoration-none text-dark my-0"><p class="">see more ></p></a>
                </div>
            </x-adminlte-card>
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
                <table id="table_summary" class="table w-100 table-sm">
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

            leaveRequest()
            holidayRequest()

            var AP = [];
            var dataSummary =
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
            AP.tableSummary =  $('#table_summary').DataTable( {
                            "data": dataSummary,
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

        //doughnutLabel Line plugin 
        const doughnutLabelsLine = {
            id:'doughnutLabelsLine',
            afterDraw(chart,args,options){
                const {ctx, chartArea:{ top, bottom, left, right, width, height }} = chart;
                
                chart.data.datasets.forEach((dataset, i) => {
                    chart.getDatasetMeta(i).data.forEach((datapoint, index) => {
                        // console.log(dataset);
                        const {x, y} = datapoint.tooltipPosition();

                        ctx.fillStyle = dataset.borderColor[index];
                        // ctx.fill();
                        const halfwidth = width / 2;
                        const halfheight = height / 2;

                        const xLine = x >= halfwidth ? x + 15  : x - 15;
                        const yLine = x >= halfheight ? y + 15  : y - 15;

                        //line
                        ctx.beginPath();
                        ctx.moveTo(x, y);
                        ctx.lineTo(xLine, yLine);
                        ctx .strokeSyle = dataset.borderColor[index];
                        ctx.stroke();
                        console.log(chart.data.datasets[0].data);
                        //text
                        const textXPosition = x>= halfwidth ? 'left' : 'right';
                        const plus10X = x>= halfwidth ? 10 : -10;
                        ctx.textAlign = textXPosition;
                        ctx.textBaseLine = 'middle';
                        ctx.fillStyle = dataset.borderColor[index];
                        ctx.fillText(chart.data.datasets[0].data[index], xLine + 10, yLine + plus10X);
                    })
                })
            }
        }

        //chart Salary
        const ctxSalary = document.getElementById('chartSalary');

        new Chart(ctxSalary, {
                type: 'doughnut',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                    label: '',
                    data: [20, 12],
                    borderWidth: 1,
                    backgroundColor: ["#3db9c6ff","#4d4c4d" ],
                    borderColor: [ 'white','white' ],
                    hoverOffset: 4,
                    
                    }]
                },
                maintainAspectRatio:false,
                options: {
                    layout:{
                        padding:10
                    },
                    plugins: {
                        legend:{
                            display:false,
                        },
                        datalabels : {
                        formatter:(value, context) => {
                            return value.Data == '0' ? '' : value.Data
                        },
                        color: 'white',
                        anchor: 'center',
                        // align: ''
                    },
                    },
                    scales: {
                        y: {
                            display:false,
                            grid:{
                                display: false
                            },
    
                        },
                        x: {
                            display:false,
                            grid:{
                                display: false
                            },
                            
                        }
                    },
                    tooltips: {
                        displayColors: false,
                        backgroundColor: "black",
                        enabled: true,
                        mode: "single",
                        yPadding: 5,
                        xPadding: 15,
                        cornerRadius: 4,
                        bodyFontStyle: "bold",
                    }
                 
                },
                plugins: [ChartDataLabels],
        });

        function leaveRequest(){
            let leaveDiv = document.getElementById( "leave-request" ); 
            var NewleaveDiv = $( `  <div class="card">
                                        <div class="row px-3 py-2">
                                            <div class="col-4 col-xl-3">
                                                <div class=" rounded-circle square bg-mediceram">
                                                    <img src="" alt="">
                                                </div>
                                            </div>
                                            <div class="col-8 col-xl-6 px-0 mt-2">
                                            <p class="mb-0 text-xs font-weight-bold">Ahmad Bin kasim</p>
                                            <p class="mb-0 text-xs">Alasan cuti saya</p>
                                            <p class="mb-0 text-xs font-weight-bold ">12 - 13 Dec 23 | AL</p>
                                            </div>
                                            <div class="col row pt-1 text-center">
                                                <div class="col-6">
                                                    <span class="text-success text-xl "><i class="fa fa-check "></i></span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-danger text-xl "><i class="fa fa-times "></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>` );
            var NewleaveDiv2 = $( `  <div class="card">
                                        <div class="row px-3 py-2">
                                            <div class="col-4 col-xl-3">
                                                <div class=" rounded-circle square bg-green">
                                                    <img src="" alt="">
                                                </div>
                                            </div>
                                            <div class="col-8 col-xl-6 px-0 mt-2">
                                            <p class="mb-0 text-xs font-weight-bold">Ahmad Bin kasim</p>
                                            <p class="mb-0 text-xs">Alasan cuti saya</p>
                                            <p class="mb-0 text-xs font-weight-bold ">12 - 13 Dec 23 | AL</p>
                                            </div>
                                            <div class="col row pt-1 text-center">
                                                <div class="col-6">
                                                    <span class="text-success text-xl "><i class="fa fa-check "></i></span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-danger text-xl "><i class="fa fa-times "></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>` );
                var NewleaveDiv3 = $( `  <div class="card">
                                        <div class="row px-3 py-2">
                                            <div class="col-4 col-xl-3">
                                                <div class=" rounded-circle square bg-warning">
                                                    <img src="" alt="">
                                                </div>
                                            </div>
                                            <div class="col-8 col-xl-6 px-0 mt-2">
                                            <p class="mb-0 text-xs font-weight-bold">Ahmad Bin kasim</p>
                                            <p class="mb-0 text-xs">Alasan cuti saya</p>
                                            <p class="mb-0 text-xs font-weight-bold ">12 - 13 Dec 23 | AL</p>
                                            </div>
                                            <div class="col row pt-1 text-center">
                                                <div class="col-6">
                                                    <span class="text-success text-xl "><i class="fa fa-check "></i></span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-danger text-xl "><i class="fa fa-times "></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>` );
                var NewleaveDiv4 = $( `  <div class="card">
                                        <div class="row px-3 py-2">
                                            <div class="col-4 col-xl-3">
                                                <div class=" rounded-circle square bg-dark">
                                                    <img src="" alt="">
                                                </div>
                                            </div>
                                            <div class="col-8 col-xl-6 px-0 mt-2">
                                            <p class="mb-0 text-xs font-weight-bold">Ahmad Bin kasim</p>
                                            <p class="mb-0 text-xs">Alasan cuti saya</p>
                                            <p class="mb-0 text-xs font-weight-bold ">12 - 13 Dec 23 | AL</p>
                                            </div>
                                            <div class="col row pt-1 text-center">
                                                <div class="col-6">
                                                    <span class="text-success text-xl "><i class="fa fa-check "></i></span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-danger text-xl "><i class="fa fa-times "></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>` );

 
            NewleaveDiv.appendTo(leaveDiv);
            NewleaveDiv2.appendTo(leaveDiv);
            NewleaveDiv3.appendTo(leaveDiv);
            NewleaveDiv4.appendTo(leaveDiv);
        }

        function holidayRequest(){
            let holidayDiv = document.getElementById( "holiday-request" ); 

            var NewHolidayDiv = $( `<div class="border-bottom">
                                        <div class="row px-3 py-2">
                                            <div class="col-4 col-xl-3">
                                                <div class=" rounded-circle square bg-mediceram">
                                                    <img src="" alt="">
                                                </div>
                                            </div>
                                            <div class="col-8 col-xl-6 px-0 pt-3">
                                            <p class="mb-0 text-xs font-weight-bold">Ahmad Bin kasim</p>
                                            <p class="mb-0 text-xs">Alasan cuti saya</p>
                                            </div>
                                            <div class="col row pt-1 justify-content-center pt-4">
                                                <p class="mb-0 text-xs">12 - 13 Dec 23</p>
                                            </div>
                                        </div>
                                    </div>` );
            var NewHolidayDiv2 = $( `<div class="border-bottom">
                                        <div class="row px-3 py-2">
                                            <div class="col-4 col-xl-3">
                                                <div class=" rounded-circle square bg-red">
                                                    <img src="" alt="">
                                                </div>
                                            </div>
                                            <div class="col-8 col-xl-6 px-0 pt-3">
                                            <p class="mb-0 text-xs font-weight-bold">Ahmad Bin kasim</p>
                                            <p class="mb-0 text-xs">Alasan cuti saya</p>
                                            </div>
                                            <div class="col row pt-1 justify-content-center pt-4">
                                                <p class="mb-0 text-xs">12 - 13 Dec 23</p>
                                            </div>
                                        </div>
                                    </div>` );
            var NewHolidayDiv3 = $( `<div class="">
                                        <div class="row px-3 py-2">
                                            <div class="col-4 col-xl-3">
                                                <div class=" rounded-circle square bg-red">
                                                    <img src="" alt="">
                                                </div>
                                            </div>
                                            <div class="col-8 col-xl-6 px-0 pt-3">
                                            <p class="mb-0 text-xs font-weight-bold">Ahmad Bin kasim</p>
                                            <p class="mb-0 text-xs">Alasan cuti saya</p>
                                            </div>
                                            <div class="col row pt-1 justify-content-center pt-4">
                                                <p class="mb-0 text-xs">12 - 13 Dec 23</p>
                                            </div>
                                        </div>
                                    </div>` );
 
            NewHolidayDiv.appendTo(holidayDiv);
            NewHolidayDiv2.appendTo(holidayDiv);
            NewHolidayDiv3.appendTo(holidayDiv);

        }

        function datatableCustom(){

            $('#table_summary_filter').addClass('d-none')
            $('#table_summary_previous').addClass('mr-2')
            $('#table_summary_previous').find('a').text('<').addClass('pageinate-Mediceram')
            $('#table_summary_next').addClass('ml-2')
            $('#table_summary_next').find('a').text('>').addClass('pageinate-Mediceram')
        }


    </script>
@stop