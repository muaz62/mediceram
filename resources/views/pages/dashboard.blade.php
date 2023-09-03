@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Chartjs', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="row py-2">
        <div class="col-12 col-xl-6">
            <x-adminlte-card class="mx-1">
                <a href="{{url('rumusan')}}" class="text-decoration-none text-dark">
                    <div class="font-20 my-3">
                        <strong>Transaction Report</strong>
                    </div>
                </a>
                <canvas id="chartSalary"></canvas>
            </x-adminlte-card>
        </div>

        {{-- <div class="col-12 col-xl-6">
            <x-adminlte-card class="mx-1">
                <a href="{{url('rumusan')}}" class="text-decoration-none text-dark">
                    <div class="text-center font-20 my-3">
                        <strong>Shift</strong>
                    </div>
                </a>
                
            </x-adminlte-card>
        </div>

        <div class="col-12 col-xl-6">
            <x-adminlte-card class="mx-1">
                <a href="{{url('rumusan')}}" class="text-decoration-none text-dark">
                    <div class="text-center font-20 my-3">
                        <strong>History</strong>
                    </div>
                </a>
                <canvas id="chartHistory"></canvas>
            </x-adminlte-card>
        </div> --}}
    </div>
@endsection

@section('css')
@stop

@section('js')
    <script>

        //chart Salary
        const ctxSalary = document.getElementById('chartSalary');

        new Chart(ctxSalary, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mac', 'Apr', 'May', 'Jun'],
                    datasets: [{
                    label: '',
                    data: [20, 12, 7,14, 8, 15],
                    borderWidth: 1,
                    backgroundColor: "#3db9c6ff"
                    }]
                },
                options: {
                    plugins: {
                        legend:{
                            display:false,
                        },
                    },
                    scales: {
                        y: {
                            grid:{
                                display: false
                            },
                            beginAtZero: true,
                            ticks: {
                                stepSize: 5,
                                callback: function(value, index, ticks) {
                                            return value + 'K';
                                        } 

                            }
                        },
                        x: {
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
                        callbacks: {
                            title: () => {
                                return "";
                            },
                            label: (tooltipItems, data) => {

                                return tooltipItems.yLabel+' cm';

                            }
                            
                        }
                    }
                 
                }
        });

        //chart employee
        // const ctxEmployee = document.getElementById('chartEmployee');

        // new Chart(ctxEmployee, {
        //         type: 'bar',
        //         data: {
        //             labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        //             datasets: [{
        //             label: '# of Votes',
        //             data: [12, 19, 3, 5, 2, 3],
        //             borderWidth: 1
        //             }]
        //         },
        //         options: {
        //             scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //             }
        //         }
        // });
        
        // chart History
        // const ctxHistory = document.getElementById('chartHistory');

        // new Chart(ctxHistory, {
        //         type: 'line',
        //         data: {
        //             labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        //             datasets: [{
        //             label: '# of Votes',
        //             data: [12, 19, 3, 5, 2, 3],
        //             borderWidth: 1
        //             }]
        //         },
        //         options: {
        //             scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //             }
        //         }
        // });

    </script>
@stop