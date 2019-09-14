<?php
session_start();
if (!isset($_SESSION['user_info'])){
    header("location:login.php");
}

?>
<?php
include "includes/header-content.php";
include "includes/sidebar-content.php";
?>
<section id="content">
    <div class="page charts-page">
        <!-- bradcome -->
        <div class="b-b mb-10">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <h1 class="h3 m-0">All claims by level</h1>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <span>Referral Start Date</span>
                    <input type="date" id="level_start_date" name="level_start_date" class="form-control">
                </div>
                <div class="col-sm-3 col-xs-12">
                    <span>Referral End Date</span>
                    <input type="date" id="level_end_date" name="level_end_date" class="form-control">
                </div>
                <div class="col-sm-3 col-xs-12">
                    <button class="btn btn-blue" onclick="get_level_date()">Filter</button>
                    <button class="btn btn-cyan" onclick="clear_filter_level()">Clear</button>
                </div>

            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <section class="boxs">
                    <div class="boxs-body">
                        <div id="combined-chart" style="height: 250px"></div>
                    </div>
                </section>

            </div>
        </div>
        <div class="b-b mb-10">
            <div class="row">

                    <div class="col-sm-3 col-xs-12">
                        <h1 class="h3 m-0">Payment Info</h1>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <span>Referral Start Date</span>
                        <input type="date" id="payment_start_date" name="payment_start_date" class="form-control">
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <span>Referral End Date</span>
                        <input type="date" id="payment_end_date" name="payment_end_date" class="form-control">
                    </div>
                <div class="col-sm-3 col-xs-12">
                    <button class="btn btn-blue" onclick="get_payment_date()">Filter</button>
                    <button class="btn btn-cyan" onclick="clear_filter_payment()">Clear</button>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <section class="boxs">
                    <div class="boxs-header">
                            <h3 class="custom-font">
                            </h3>
                    </div>
                    <div class="boxs-body">
                        <div id="bar-chart" style="height: 250px"></div>
                    </div>
                </section>
            </div>
            <div class="col-md-5 col-sm-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font">
                            <strong>Appeal File </strong>This week</h3>
                    </div>
                    <div class="boxs-body">
                        <div id="pie-chart" style="height: 250px"></div>
                    </div>
                </section>
            </div>
        </div>
        <div class="b-b mb-10">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <h1 class="h3 m-0">Close This Week by Reason</h1>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <span>Referral Start Date</span>
                    <input type="date" id="reason_start_date" name="reason_start_date" class="form-control">
                </div>
                <div class="col-sm-3 col-xs-12">
                    <span>Referral End Date</span>
                    <input type="date" id="reason_end_date" name="reason_end_date" class="form-control">
                </div>
                <div class="col-sm-3 col-xs-12">
                    <button class="btn btn-blue" onclick="get_payment_date()">Filter</button>
                    <button class="btn btn-cyan" onclick="clear_filter_reason()">Clear</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <section class="boxs">

                    <div class="boxs-body">
                        <div id="close-chart" style="height: 250px"></div>
                        <table class="">
                            <tr>
                                <td class="one">A: &nbsp;&nbsp;</td><td class="two">No work credits &nbsp;&nbsp;</td> 
                                <td class="one">B: &nbsp;&nbsp;</td><td class="two">Client did not return paper work &nbsp;&nbsp;</td>
                                <td class="one">C: &nbsp;&nbsp;</td><td class="two">No work credits and too many assets &nbsp;&nbsp;</td> 
                                <td class="one">D: &nbsp;&nbsp;</td><td class="two">Won at Initial Application &nbsp;&nbsp;</td> 

                            </tr>
                            <tr>
                                <td class="one">E: &nbsp;&nbsp;</td><td class="two">Client Went Back to Work &nbsp;&nbsp;</td> 
                                <td class="one">F: &nbsp;&nbsp;</td><td class="two">Duplicate Profile &nbsp;&nbsp;</td> 
                                <td class="one">G: &nbsp;&nbsp;</td><td class="two">Won at Reconsideration &nbsp;&nbsp;</td> 
                                <td class="one">H: &nbsp;&nbsp;</td><td class="two">Client fired Citizens &nbsp;&nbsp;</td> 

                            </tr>
                            <tr>
                                <td class="one">I: &nbsp;&nbsp;</td><td class="two">Won at Hearing &nbsp;&nbsp;</td> 
                                <td class="one">J: &nbsp;&nbsp;</td><td class="two">L3 Legal Review Eliminate &nbsp;&nbsp;</td> 
                                <td class="one">K: &nbsp;&nbsp;</td><td class="two">Client unreachable &nbsp;&nbsp;</td> 
                                <td class="one">L: &nbsp;&nbsp;</td><td class="two">Lost at hearing not appealing &nbsp;&nbsp;</td> 
                                <td class="one">M: &nbsp;&nbsp;</td><td class="two">Level 4 Denial &nbsp;&nbsp;</td> 
                            </tr>

                        </table>
                    </div>

            </div>
        </div>
    </div>
</section>
</div>
<!--/ Application Content -->

<!-- Vendor JavaScripts  -->



<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
<script src="assets/bundles/flotscripts.bundle.js"></script>
<script src="assets/js/vendor/gaugejs/gauge.min.js"></script>
<script src="assets/js/vendor/raphael/raphael-min.js"></script>
<script src="assets/js/vendor/d3/d3.v2.js"></script>
<!--<script src="assets/js/vendor/rickshaw/rickshaw.min.js"></script>-->
<script src="assets/js/vendor/morris/morris.min.js"></script>
<script src="assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>
<script src="assets/js/vendor/countTo/jquery.countTo.js"></script>
<!--/ vendor javascripts -->

<!--  Custom JavaScripts -->
<script src="assets/bundles/mainscripts.bundle.js"></script> <!-- Custom Js -->
<script src="assets/js/page/all-chart.js"></script>

<script type="text/javascript">
    $('.header-title').html('Dashboard');
    function get_level_date() {
        if($("#level_start_date").val() == '' || $("#level_end_date").val() == '') return;

        $.ajax({
            url: "/ajax.php",
            method: 'post',
            data: {
                task:'get_dashboard',
                level_start_value:$("#level_start_date").val(),
                level_end_value:$("#level_end_date").val()
            },
            async: false,
            success: function(result){
                var dashboard = JSON.parse(result);
                var data5_data = [];
                for(i = 0; i < dashboard[0].length; i++) {
                    var temp_arr = [];
                    temp_arr.push(i);
                    temp_arr.push(dashboard[0][i].c);
                    data5_data.push(temp_arr);
                }
                var data5 = [{
                    // data: [[0, 5], [1, 9], [2, 10], [3, 8], [4, 9], [5, 12], [6, 14], [7, 12], [8, 14]],
                    data: data5_data,
                    label: '',
                    bars: {
                        show: true,
                        barWidth: 0.4,
                        lineWidth: 0,
                        fillColor: { colors: [{ opacity: 0.6 }, { opacity: 0.8 }] }
                    },
                    font: {
                        color: '#3d4c5a'
                    },
                    position: 'bottom',
                    ticks: [
                        [1, 'Jan'], [2, 'Feb'], [3, 'Mar'], [4, 'Apr'], [5, 'May'], [6, 'Jun'], [7, 'Jul'], [8, 'Aug'], [9, 'Sep'], [10, 'Oct'], [11, 'Nov'], [12, 'Dec']
                    ]
                }];

                var options5 = {
                    colors: ['#5e90b5'],
                    series: {
                        shadowSize: 0
                    },
                    xaxis: {
                        font: {
                            color: '#3d4c5a'
                        },
                        position: 'bottom',
                        ticks: [
                            [0, 'Level 1'],[1, 'Level 2'], [2, 'Level 3'], [3, 'Level 4'], [4, 'Level 5'],[5, 'Pending Level 3 Remand'],[6, 'Post AC Denial'],[7, 'Level 3 Remand FDC'],[8, 'Level 3 Remand FDC']
                        ]
                    },
                    yaxis: {
                        font: {
                            color: '#3d4c5a'
                        }
                    },
                    grid: {
                        hoverable: false,
                        clickable: true,
                        borderWidth: 0,
                        color: '#ccc'
                    },
                    tooltip: true,
                    tooltipOpts: { content: '%s of %x.1 is %y.4', defaultTheme: false, shifts: { x: 0, y: 20 } }
                };

                plot5 = $.plot($("#combined-chart"), data5, options5);

                $(window).resize(function () {
                    // redraw the graph in the correctly sized div
                    plot5.resize();
                    plot5.setupGrid();
                    plot5.draw();
                });
               //pie chart
                var data6 = [];


                var dashboard6 = dashboard[2];
                var dashboard5 = dashboard[0];
                for(i = 0; i < dashboard6.length; i++) {
                    // var temp_arr = [];
                    // temp_arr.push(i);
                    // temp_arr.push(dashboard5[i].c);
                    // data6_data.push(temp_arr);
                    var temp = {label: dashboard6[i],data: dashboard5[i].c};
                    data6.push(temp);
                }

                // var data6 = [
                //     { label: 'Level1', data: 40 },
                //     { label: 'Level2', data: 35 },
                //     { label: 'Level3', data: 17 },
                //     { label: 'Level4', data: 9 },
                //     { label: 'FDC', data: 4 },
                //     { label: 'Closed', data: 10 }
                // ];

                var options6 = {
                    series: {
                        pie: {
                            show: true,
                            innerRadius: 0.01,
                            stroke: {
                                width: 0
                            }
                            // label: {
                            //     show: true,
                            //     threshold: 0.005
                            // }
                        }
                    },
                    colors: ['#46bc9f', '#e56b6b', '#ecc755', '#9bbd5a', '#a994cd', '#46add4','#56a334','#66ccd4','#76afd4'],
                    grid: {
                        hoverable: false,
                        clickable: true,
                        borderWidth: 0,
                        color: '#3d4c5a'
                    },
                    tooltip: true,
                    tooltipOpts: { content: '%s: %p.0%' }
                };

                var plot6 = $.plot($("#pie-chart"), data6, options6);

                $(window).resize(function () {
                    // redraw the graph in the correctly sized div
                    plot6.resize();
                    plot6.setupGrid();
                    plot6.draw();
                });
            }});
    }
    function get_payment_date() {
        if($("#payment_start_date").val() == '' || $("#payment_end_date").val() == '') return;
        $.post('/ajax.php',
            {
                task: 'get_dashboard',
                payment_start_value:$("#payment_start_date").val(),
                payment_end_value:$("#payment_end_date").val()
            },
            function (data) {
                var dashboard = JSON.parse(data);
                var barData = [];

                var dashboard2 = dashboard[3];

                for (var j=0; j<dashboard2.length; j++){
                    var tempdata2 = [];
                    tempdata2.push(j);
                    tempdata2.push(dashboard2[j].c);
                    barData.push(tempdata2);
                }
                var data2 = [{
                    data: barData,
                    label: '',
                    color: '#ff8fa7'
                }];
                var options2 = {
                    series: {
                        shadowSize: 0
                    },
                    bars: {
                        show: true,
                        barWidth: 0.5,
                        lineWidth: 0,
                        fillColor: {
                            colors: [{ opacity: 0.8 }, { opacity: 0.8 }]
                        }
                    },
                    xaxis: {
                        font: {
                            color: '#3d4c5a'
                        },
                        position: 'bottom',
                        ticks: [
                            [0, 'No Retroactive Award'],[1, 'Received Direct Deposit'], [2, 'Not Received'], [3, 'Received Check']
                        ]

                    },

                    yaxis: {
                        font: {
                            color: '#3d4c5a'
                        }

                    },
                    grid: {
                        hoverable: false,
                        clickable: true,
                        borderWidth: 0,
                        color: '#ccc'
                    },
                    tooltip: true
                };

                var plot2 = $.plot($("#bar-chart"), data2, options2);

                $(window).resize(function () {
                    // redraw the graph in the correctly sized div
                    plot2.resize();
                    plot2.setupGrid();


                    plot2.draw();
                });
            })
    }
    function get_reason_date() {
        if($("#reason_start_date").val() == '' || $("#reason_end_date").val() == '') return;
        var a = $("#reason_start_date").val();
        console.log(a);
        $.post('/ajax.php',
            {
                task: 'get_dashboard',
                reason_start_value:$("#reason_start_date").val(),
                reason_end_value:$("#reason_end_date").val()
            },
            function (data) {
                var dashboard = JSON.parse(data);
                var data9_data = [];
                var dashboard9 = dashboard[1];
                for (i = 0; i < dashboard9.length; i++){
                    var temp_data9 = [];
                    temp_data9.push(i);
                    temp_data9.push(dashboard9[i].c);
                    data9_data.push(temp_data9);
                }

                var data9 = [{
                    // data: [[0, 5], [1, 9], [2, 10], [3, 8], [4, 9], [5, 12], [6, 14], [7, 13], [8, 10], [9, 12],[10,15],[11,19],[12,10]],
                    data: data9_data,
                    label: '',
                    bars: {
                        show: true,
                        barWidth: 0.4,
                        lineWidth: 0,
                        fillColor: { colors: [{ opacity: 0.6 }, { opacity: 0.8 }] }
                    }
                }];

                var options9 = {
                    colors: ['#5e90b5'],
                    series: {
                        shadowSize: 0
                    },
                    xaxis: {
                        font: {
                            color: '#3d4c5a'
                        },
                        position: 'bottom',
                        ticks: [
                            [0, 'A'],[1, 'B'], [2, 'C'], [3, 'D'], [4, 'E'],[5, 'F'],[6, 'G'],[7,'H'],[8,'I'],[9,'J'],[10,'K'],[11,'L'],[12,'M']
                        ]

                    },
                    yaxis: {
                        font: {
                            color: '#3d4c5a'
                        }
                    },
                    grid: {
                        hoverable: false,
                        clickable: true,
                        borderWidth: 0,
                        color: '#ccc'
                    },
                    tooltip: true,
                    tooltipOpts: { content: '%s of %x.1 is %y.4', defaultTheme: false, shifts: { x: 0, y: 20 } }
                };

                var plot9 = $.plot($("#close-chart"), data9, options9);

                $(window).resize(function () {
                    // redraw the graph in the correctly sized div
                    plot5.resize();
                    plot5.setupGrid();
                    plot5.draw();
                });
            })
    }
    function clear_filter_level() {
        $('#level_start_date').val('');
        $('#level_end_date').val('');
    }
    function clear_filter_payment() {
        $('#payment_start_date').val('');
        $('#payment_end_date').val('');
    }
    function clear_filter_reason() {
        $('#reason_start_date').val('');
        $('#reason_end_date').val('');
    }
</script>
<!--/ custom javascripts -->
</body>
</html>
