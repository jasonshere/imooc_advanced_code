<?php
    $this->title = '控制台';
?>
	<!-- main container -->

        <div class="container-fluid">

            <!-- upper main stats -->
            <div id="main-stats">
                <div class="row-fluid stats-row">
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">2457</span>
                            个访客
                        </div>
                        <span class="date">今天</span>
                    </div>
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">3240</span>
                            个用户
                        </div>
                        <span class="date">2016年3月</span>
                    </div>
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">322</span>
                            个订单
                        </div>
                        <span class="date">本周</span>
                    </div>
                    <div class="span3 stat last">
                        <div class="data">
                            <span class="number">$2,340</span>
                            成交金额
                        </div>
                        <span class="date">最近30天</span>
                    </div>
                </div>
            </div>
            <!-- end upper main stats -->

            <div id="pad-wrapper">

                <!-- statistics chart built with jQuery Flot -->
                <div class="row-fluid chart">
                    <h4>
                        统计
                         <div class="btn-group pull-right">
                            <button class="glow left">天</button>
                            <button class="glow middle active">月</button>
                            <button class="glow right">年</button>
                        </div>
                    </h4>
                    <div class="span12">
                        <div id="statsChart"></div>
                    </div>
                </div>
                <!-- end statistics chart -->

                <!-- table sample -->
                <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
                <div class="table-products section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>商品列表</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <div class="ui-select">
                                <select>
                                  <option />过滤用户
                                  <option />最近30天注册的
                                  <option />已激活的用户
                                </select>
                            </div>
                            <input type="text" class="search" />
                            <a class="btn-flat new-product">+ 添加商品</a>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        <input type="checkbox" />
                                        商品名称
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>商品描述
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>商品状态
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row -->
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                            <img src="/admin/img/table-img.png" />
                                        </div>
                                        <a href="#">There are many variations </a>
                                    </td>
                                    <td class="description">
                                        if you are going to use a passage of Lorem Ipsum.
                                    </td>
                                    <td>
                                        <span class="label label-success">Active</span>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- row -->
                                <tr>
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                            <img src="/admin/img/table-img.png" />
                                        </div>
                                        <a href="#">Internet tend</a>
                                    </td>
                                    <td class="description">
                                        There are many variations of passages.
                                    </td>
                                    <td>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- row -->
                                <tr>
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                            <img src="/admin/img/table-img.png" />
                                        </div>
                                        <a href="#">Many desktop publishing </a>
                                    </td>
                                    <td class="description">
                                        if you are going to use a passage of Lorem Ipsum.
                                    </td>
                                    <td>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- row -->
                                <tr>
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                            <img src="/admin/img/table-img.png" />
                                        </div>
                                        <a href="#">Generate Lorem </a>
                                    </td>
                                    <td class="description">
                                        There are many variations of passages.
                                    </td>
                                    <td>
                                        <span class="label label-info">Standby</span>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- row -->
                                <tr>
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                            <img src="/admin/img/table-img.png" />
                                        </div>
                                        <a href="#">Internet tend</a>
                                    </td>
                                    <td class="description">
                                        There are many variations of passages.
                                    </td>
                                    <td>                                        
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                      <ul>
                        <li><a href="#">&#8249;</a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">&#8250;</a></li>
                      </ul>
                    </div>
                    
                </div>
                <!-- end table sample -->
            </div>
        </div>
<?php
$js = <<<JS
$(function () {

    // jQuery Knobs
    $(".knob").knob();



    // jQuery UI Sliders
    $(".slider-sample1").slider({
        value: 100,
        min: 1,
        max: 500
    });
    $(".slider-sample2").slider({
        range: "min",
        value: 130,
        min: 1,
        max: 500
    });
    $(".slider-sample3").slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 40, 170 ],
    });

    

    // jQuery Flot Chart
    var visits = [[1, 50], [2, 40], [3, 45], [4, 23],[5, 55],[6, 65],[7, 61],[8, 70],[9, 65],[10, 75],[11, 57],[12, 59]];
    var visitors = [[1, 25], [2, 50], [3, 23], [4, 48],[5, 38],[6, 40],[7, 47],[8, 55],[9, 43],[10,50],[11,47],[12, 39]];

    var plot = $.plot($("#statsChart"),
        [ { data: visits, label: "注册量"},
         { data: visitors, label: "访客量" }], {
            series: {
                lines: { show: true,
                        lineWidth: 1,
                        fill: true, 
                        fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.13 } ] }
                     },
                points: { show: true, 
                         lineWidth: 2,
                         radius: 3
                     },
                shadowSize: 0,
                stack: true
            },
            grid: { hoverable: true, 
                   clickable: true, 
                   tickColor: "#f9f9f9",
                   borderWidth: 0
                },
            legend: {
                    // show: false
                    labelBoxBorderColor: "#fff"
                },  
            colors: ["#a7b5c5", "#30a0eb"],
            xaxis: {
                ticks: [[1, "一月"], [2, "二月"], [3, "三月"], [4,"四月"], [5,"五月"], [6,"六月"], 
                       [7,"七月"], [8,"八月"], [9,"九月"], [10,"十月"], [11,"十一月"], [12,"十二月"]],
                font: {
                    size: 12,
                    family: "Open Sans, Arial",
                    variant: "small-caps",
                    color: "#697695"
                }
            },
            yaxis: {
                ticks:3, 
                tickDecimals: 0,
                font: {size:12, color: "#9da3a9"}
            }
         });

    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y - 30,
            left: x - 50,
            color: "#fff",
            padding: '2px 5px',
            'border-radius': '6px',
            'background-color': '#000',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#statsChart").bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(0),
                    y = item.datapoint[1].toFixed(0);

                var month = item.series.xaxis.ticks[item.dataIndex].label;

                showTooltip(item.pageX, item.pageY,
                            item.series.label + " of " + month + ": " + y);
            }
        }
        else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
});
JS;
$this->registerJs($js);
?>


