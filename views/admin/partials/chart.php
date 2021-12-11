<?php 
require_once('../models/ChartOrderModel.php');
$order = new ChartOrderModel();
$orderByMonth = [];
for ($i=1; $i <= 12 ; $i++) { 
    array_push($orderByMonth,count($order->getAllOrderByMonth($i)));
    
}
$usersByMonthIn = [];
$usersByMonth = [];
for ($i=1; $i <= 12 ; $i++) { 
    array_push($usersByMonth,count($order->getUserByMonthActive($i)));
    array_push($usersByMonthIn,count($order->getUserByMonthInactive($i)));
}
?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../../../public/css/chart.css">
<section class="statistic-chart">
    <!-- Thông kê đơn hàng -->
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">statistics</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <!-- CHART-->
                <div id="chart1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <!-- END CHART-->
            </div>
        </div>

    </div>
    <!-- Thống kê người dùng -->
    <div class="chart-users">
        <div class="container">
            <!-- Thống kê người dùng -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Registered user data</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <!-- TOP CAMPAIGN-->
                    <div class="recent-report3 m-b-40">
                        <div class="title-wrap">
                            <h3 class="title-3">recent reports</h3>
                            <div class="chart-info-wrap">
                                <div class="chart-note">
                                    <span class="dot dot--red"></span>
                                    <span>Inactive</span>
                                </div>
                                <div class="chart-note mr-0">
                                    <span class="dot dot--green"></span>
                                    <span>Active</span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="filters m-b-55">

                            <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                <select class="js-select2 au-select-dark" id="change-chart" name="time">
                                    <option selected="selected">All Time</option>
                                    <option value="month" >By Month</option>
                                    <option value="day" >By Day</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div> -->
                        <div class="chart-wrap">
                            <canvas id="recent-rep3"></canvas>
                        </div>
                    </div>
                    <!-- END TOP CAMPAIGN-->
                </div>
            </div>
        </div>
    </div>

</section>
<script>
$(function() {
    try {

        // Recent Report 3
        const bd_brandProduct3 = 'red';
        const bd_brandService3 = 'rgba(0,173,95,0.9)';
        const brandProduct3 = 'transparent';
        const brandService3 = 'transparent';

        var data5 = [<?php  foreach ($usersByMonth as $value) {echo $value.',';} ?>];

        var data6 = [<?php  foreach ($usersByMonthIn as $value) {echo $value.',';} ?>];

        var ctx = document.getElementById("recent-rep3");
        if (ctx) {
            ctx.height = 250;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ],
                    datasets: [{
                            label: 'Active',
                            backgroundColor: brandService3,
                            borderColor: bd_brandService3,
                            pointHoverBackgroundColor: '#fff',
                            borderWidth: 0,
                            data: data5,
                            pointBackgroundColor: bd_brandService3
                        },
                        {
                            label: 'Inactive',
                            backgroundColor: brandProduct3,
                            borderColor: bd_brandProduct3,
                            pointHoverBackgroundColor: '#fff',
                            borderWidth: 0,
                            data: data6,
                            pointBackgroundColor: bd_brandProduct3

                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: true
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                
                                drawOnChartArea: true,
                                color: '#f2f2f2'
                            },
                            ticks: {
                                fontFamily: "Poppins",
                                fontSize: 12
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                maxTicksLimit: 5,
                                stepSize: 5,
                               
                                fontFamily: "Poppins",
                                fontSize: 12
                            },
                            gridLines: {
                                display: true,
                                color: '#f2f2f2'
                            }
                        }]
                    },
                    elements: {
                        point: {
                            radius: 3,
                            hoverRadius: 4,
                            hoverBorderWidth: 3,
                            backgroundColor: '#333'
                        }
                    }


                }
            });
        }

        $('#change-chart').change(function() {
        var value = $(this).val();
        var _token = $('input[name="_token"]').val();
        //alert(value);
        $.ajax({
            url: "chart.php",
            method: "POST",
            dataType: "JSON",
            data: {value:value , _token:_token},
            success: function(data) {
                ctx.setData(data);
            } 
        });
    });
    } catch (error) {
        console.log(error);
    }
   
});
</script>
<script>
$(function() {
    Highcharts.chart('chart1', {
        title: {
            text: 'Chart Order By Month',
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ]
        },
        yAxis: {
            title: {
                text: 'The Number Of Products'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        // tooltip: {
        //     valueSuffix: '°C'
        // },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            data: [<?php 
                foreach ($orderByMonth as $value) {
                   echo $value.',';
                } 
                ?>]
        }]
    });
});
</script>