@extends('multiauth::layouts.app')

@section('content')

    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title text-center"><strong>Statistics (completed)</strong></h3>
                    <hr class="border-danger"/>
                    <canvas id="myChart"></canvas>

                    <canvas id="myChart2"></canvas>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js" type="text/javascript"></script>

    <script>

        fetch('/api/stats').then((response) => response.json()).then(datas => {

            console.log(datas);

            // rearrange data

            const labels = datas.map(e => e.name);
            const total =  datas.map(e => e.total);
            const lastWeek = datas.map(e => e['last-week']);
            const lastMonth = datas.map(e => e['last-month']);


            // Show chart


            var ctx = document.getElementById('myChart').getContext('2d');
            var ctx2 = document.getElementById('myChart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Overall',
                        data: total,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',

                        ],
                        borderWidth: 2
                    },
                    {
                        label: 'Last Week',
                        data: lastWeek,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',

                        ],
                        borderWidth: 2
                    },
                        {
                            label: 'Last Month',
                            data: lastMonth,
                            backgroundColor: [
                                'rgba(120, 94, 235, 0.2)',
                            ],
                            borderColor: [
                                'rgba(120, 94, 235, 1)',

                            ],
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Overall',
                        data: total,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',

                        ],
                        borderWidth: 1
                    },
                        {
                            label: 'Last Week',
                            data: lastWeek,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',

                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',

                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Last Month',
                            data: lastMonth,
                            backgroundColor: [
                                'rgba(120, 94, 235, 0.2)',
                            ],
                            borderColor: [
                                'rgba(120, 94, 235, 1)',

                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });



        });





    </script>


@endsection
