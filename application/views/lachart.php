



<h1>測試資料輸入</h1>
<div class="row">
<div class="form-group">
     <div class="col-xs-2">
      <label for="stuname">姓名</label>
      <input type="text" class="form-control" id="stuname">
    </div>
</div>
<div class="form-group">
         <div class="col-xs-2">
      <label for="age">年齡</label>
      <input type="text" class="form-control" id="age">
    </div>
</div>
    <div class="form-group">
         <div class="col-xs-2">
      <label for="sex">性別 male/female</label>
      <input type="text" class="form-control" id="sex">
    </div>
</div>
      <div class="form-group">
         <div class="col-xs-2">
      <label for="tall">身高  cm</label>
      <input type="text" class="form-control" id="tall">
    </div>
    </div>
      <div class="form-group">
         <div class="col-xs-2">
      <label for="weight">體重  kg</label>
      <input type="text" class="form-control" id="weight">
    </div>
</div>
</div>
    <!--bmi   age sex tall weight-->
    <div class="row">
      <div class="form-group">
         <div class="col-xs-2">
      <label for="strt">直線反應時間   秒</label>
      <input type="text" class="form-control" id="strt">
    </div>
</div>
      <div class="form-group">
         <div class="col-xs-2">
      <label for="zrt">z反應時間   秒</label>
      <input type="text" class="form-control" id="zrt">
  </div>
    </div>
      <div class="form-group">
         <div class="col-xs-2">
      <label for="shrt">射門反應時間   秒</label>
      <input type="text" class="form-control" id="shrt">
  </div>
    </div>
</div>
<!-- 上面三項 總和平均 為反應時間-->
<div class="row">
<div class="form-group">
         <div class="col-xs-2">  
      <label for="stouts">直線出界   次數</label>
      <input type="text" class="form-control" id="stouts">
    </div>
</div>
<div class="form-group">
         <div class="col-xs-2">
      <label for="zoutss">z字出介   次數</label>
      <input type="text" class="form-control" id="zoutss">
    </div>
</div>
<!--上面兩項 0-5 succes p-->
      <div class="form-group">
         <div class="col-xs-2">
      <label for="angle">射門角度   角度</label>
      <input type="text" class="form-control" id="angel">
    </div>
</div>
</div>
<!--準確率  絕對值0-90 -->
<div class="row">
     <div class="form-group">
         <div class="col-xs-2">
      <label for="stotaltime">直線總時間   秒</label>
      <input type="text" class="form-control" id="stotaltime">
    </div> 
</div>
      <div class="form-group">
         <div class="col-xs-2">
      <label for="ztotaltime">z字總時間   秒</label>
      <input type="text" class="form-control" id="ztotaltime">
    </div>
</div>
</div>
<!-- 上肢測試字料-->

<button id = "go" onclick="chart1()">圖表產生</button>
<button id = "goo" onclick="ss1()">產生</button>

<!-- ==========================================-->




 <div class="container_main" id = "chart">
    <div class="row">
     <div class="col-lg-6">
      <div class="mainchart" id="container" style="min-width: 400px; max-width: 500px; height: 400px; margin: 0 auto"></div>
      <br>
     </div>
    <div class="col-lg-6" id = "ttl">
    <div class="mainchart" id="container2" style="min-width: 400px; max-width: 500px; height: 400px; margin: 0 auto"></div>
    </div>
 </div>
</div>

<!-- =============學生個人 每個小圖        全班平均 以及標準差圖      
bmi          xy 數值 時間
sp1 身高圖 資料庫                              ssp1
sp2 體重圖 資料庫                              ssp2
sp3 bmi圖（由以上兩圖數值）                     ssp3




下肢體==========================================================================
 成功率 xy數值 時間
  sp4直線次數                                 ssp4
  sp5z字總次數                                ssp5
  sp6相加總次數                               ssp6

 準確率 xy數值 時間
  sp7 角度                                 ssp7

 反應時間 xy數值 時間
  sp8 z反應時間                             ssp8
  sp9 直線反應時間                           ssp9
  sp10射門反應時間                           ssp10
  sp11 反應時間                             ssp11

 下肢協調 xy數值 時間
  sp12  直線總時間                         ssp12
  sp13  z自總時間                          ssp13
  sp14協調 數值由上                         ssp14


上肢體================================================================
  反應時間 xy數值 時間
   sp15拿球反應                         ssp15
   sp16拋球反應                         ssp16
   sp17反應時間                         ssp17
  手眼協調 
   sp18滾球空                           ssp18
   sp19拋球空                           ssp19
   sp20手眼協                           ssp20
  成功率(是否接到)
   sp21滾球成功                         ssp21
   sp22拋球成功                         ssp22
   sp23成功率                           ssp23
  準確率（是否打到）
    sp24 是否有打到次數                   ssp24   

    ==================five atrribute=================================-->

<div class="container_main2" id = "chart24" style="display = none" >  
    <div class="row">
     <div class="col-lg-4">
      <div class="mainchart" id="sp1" style=" display:none min-width: 400px; max-width: 500px; height: 400px; margin: 0 auto"></div>
      <br>
     </div>
    <div class="col-lg-4">
    <div class="mainchart" id="sp2" style="display:none min-width: 400px; max-width: 500px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="col-lg-4">
    <div class="mainchart" id="sp3" style="display:none min-width: 400px; max-width: 500px; height: 400px; margin: 0 auto"></div>
    </div>
 </div>
</div>
<div class="container_main2" id = "chart2"  style="display:none">
    <div class="row">
     <div class="col-lg-4">
      <div class="mainchart" id="sp4" style="display:none min-width: 400px; max-width: 500px; height: 400px; margin: 0 auto"></div>
      <br>
     </div>
    <div class="col-lg-4">
    <div class="mainchart" id="sp5" style="display:none min-width: 400px; max-width: 500px; height: 400px; margin: 0 auto"></div>
    </div>
    <div class="col-lg-4">
    <div class="mainchart" id="sp6" style="display:none min-width: 400px; max-width: 500px; height: 400px; margin: 0 auto"></div>
    </div>
 </div>
</div>

 


<?php
$a = '20000';
$b = '30000';
$name1 = '最新數值';
$name2 = '上次紀錄';
$name3 = '自我平均';
$name4 = '全班平均';
?>
<!-- 
 下肢體所有雷達圖 都需要最近一次該生紀錄 跟最近一次全班平均紀錄
（身高 體重 年齡 性別）雷達圖 上下肢體 為一角  點進去  身高 體重 年齡 bmi 四個小圖 每個小圖為歷史紀錄 以及全班平均歷史紀錄 標準差
 以及最高最低點
（踢球角度 0-90度）絕對值 下肢雷達圖準確率 點進去  一個小圖 全班 以及個人 歷史紀錄    班級 個人
（直線踢球反應時間 z 反應時間 跟射門反應時間） 四個小圖 準確率 三項數值 歷史紀錄      班級 個人
（z+直線的總時間）雷達圖呈現最近一次跟平均的一角    三樣數值   班級個人
（直線 跟z的出局次數）也是為一角  三樣數值小圖  歷史 
-->


<!-- highcharts========================================-->
  <script type="text/javascript">


  function chart1()
  {
//top
var namess = document.getElementById("stuname").value;

var age = document.getElementById("age").value;
var sex = document.getElementById("sex").value;
var weight =parseInt(document.getElementById("weight").value);
var tall = parseInt(document.getElementById("tall").value);

var strt =  parseFloat(document.getElementById("strt").value);
var zrt = parseFloat(document.getElementById("zrt").value);
var shrt = parseFloat(document.getElementById("shrt").value);

var ztotaltime = parseFloat(document.getElementById("ztotaltime").value);
var stotaltime = parseFloat(document.getElementById("stotaltime").value);

var angel = parseInt(document.getElementById("angel").value);

var  stout=  parseInt(document.getElementById("stouts").value);
var  zouts=  parseInt(document.getElementById("zoutss").value);
if((stout+zouts)>=5)
{
  stout=5;
  zouts=0;
}

tall = tall/100;
var bmi = weight/(tall*tall);
var bmi2 = bmi;
bmi = parseInt(bmi)*4;

var rt   = (strt+zrt+shrt)/3;
rt=rt+30;
totaltime=totaltime+15;
//前5%當角  必須運算出前五趴  當作

var totaltime = (ztotaltime+stotaltime)/2;
//前5%當角


var times = (stout + zouts)*20;
console.log(times);
if(times>=100)
 times = 100;
if(times<=10)
    times =10;
if(times<=100&&times>=0)
   times = 100- times;
console.log(times);
var act = 100 - angel;
//=============================
  sp1();
  sp2();
  sp3();
             $("#sp1").slideToggle("slow");
             $("#sp2").slideToggle("slow");
             $("#sp3").slideToggle("slow");
//=============================


Highcharts.chart('container', {

    chart: {
        polar: true,
        type: 'line',
        animation: true
    },

    title: {
        text: '上肢',
        x: -80
    },

    pane: {
        size: 280
    },

    xAxis: {
        categories: ['反應時間', '手眼協調', '準確率', 'BMI',
                '成功率'],
        tickmarkPlacement: 'on',
        lineWidth: 0
    },

    yAxis: {
        gridLineInterpolation: 'polygon',
        lineWidth: 0.05,
        max: 100,
        min: 0,
        minorGridLineColor: '#C5AAFA',
        minorTickInterval: 5
    },

    tooltip: {
        shared: false,
        pointFormat: '<span style="color:{series.color}">{series.name}: <h1>健康</h1><b>{point.y:,.0f}</b><br/>'
       


    },

    legend: {
        align: 'right',
        verticalAlign: 'top',
        y: 100,
        layout: 'vertical'
    },

    plotOptions: {
        series: { 
            //pointStart: ,
            cursor: 'pointer',
            point:{
            events: {


                click: function (event) {
                   
                    var data='erro';
                   

             if(this.name == '平均值')
                data=<?php echo $a?>;
             else
                data=<?php echo $b?>;
             data= this.y;
             data2 = this.category;

             if(data2=='反應時間')
             {  
             $("#sp1").slideToggle("slow");
             $("#sp2").slideToggle("slow");
             $("#sp3").slideToggle("slow");
             }
             console.log(data);
             
             //datas=data.values('object');
             /*
                    alert(
                       this.name+' clicked\n' +data2+
                        'Alt: ' + event.altKey + '\n' +
                        'Control: ' + event.ctrlKey + '\n' +
                        'Meta: ' + event.metaKey + '\n' +
                        'Shift: ' + event.shiftKey
                    );
                 */
                }
            }




            }
        }
    },
    series: [

      
        {
        name: '個案'+" "+namess,
        data: [ rt, totaltime, act,bmi,times],
        pointPlacement: 'on'
    }
       ,
        {
        name: '全班平均',
        data: [ rt+20, totaltime+10,act,bmi-20,times+10],
        pointPlacement: 'on'
    }
    ]

});

Highcharts.chart('container2', {

    chart: {
        polar: true,
        type: 'line',
        animation: true
    },

    title: {
        text: '上肢',
        x: -80
    },

    pane: {
        size: 280
    },

    xAxis: {
        categories: ['反應時間', '下肢協調', '準確率', 'BMI',
                '成功率'],
        tickmarkPlacement: 'on',
        lineWidth: 0
    },

    yAxis: {
        gridLineInterpolation: 'polygon',
        lineWidth: 0.05,
        max: 100,
        min: 0,
        minorGridLineColor: '#C5AAFA',
        minorTickInterval: 5
    },

    tooltip: {
        shared: false,
        pointFormat: '<span style="color:{series.color}">{series.name}: <h1>健康</h1><b>{point.y:,.0f}</b><br/>'
       


    },

    legend: {
        align: 'right',
        verticalAlign: 'top',
        y: 100,
        layout: 'vertical'
    },

    plotOptions: {
        series: { 
            //pointStart: ,
            cursor: 'pointer',
            point:{
            events: {


                click: function (event) {
                   
                    var data='erro';
                   

             if(this.name == '平均值')
                data=<?php echo $a?>;
             else
                data=<?php echo $b?>;
             data= this.y;
             data2 = this.category;

             if(data2=='反應時間')
             {  
             $("#sp1").slideToggle("slow");
             $("#sp2").slideToggle("slow");
             $("#sp3").slideToggle("slow");
             }
             console.log(data);
             
             //datas=data.values('object');
             /*
                    alert(
                       this.name+' clicked\n' +data2+
                        'Alt: ' + event.altKey + '\n' +
                        'Control: ' + event.ctrlKey + '\n' +
                        'Meta: ' + event.metaKey + '\n' +
                        'Shift: ' + event.shiftKey
                    );
                 */
                }
            }




            }
        }
    },
    series: [

      
        {
        name: '個案'+" "+namess,
        data: [ rt, totaltime, act,bmi,times],
        pointPlacement: 'on'
    }
       ,
        {
        name: '全班平均',
        data: [ rt+20, totaltime+10,act,bmi-20,times+10],
        pointPlacement: 'on'
    }
    ]

});
}

</script>







<script type="text/javascript">

var ranges = [
        [1286406400000, 1, 2],
        [1296492800000, 1.2, 1.8],
        [1326579200000, 1.0, 1.4],
        
    ],
    averages = [
        [1286492800000, 1.5],
        [1296406400000, 1.5],
        [1326579200000, 1.2], 
    ], 
    averages1 = [
        [1286492800000, 1.3],
        [1296406400000, 1.6],
        [1326579200000, 1.2], 
    ];
    //========================

    var a11 = [
        [1286406400000, 1, 1.8],
        [1296492800000, 1.2, 1.6],
        [1326579200000, 1.0, 1.2],
        
    ],
    a22 = [
        [1286492800000, 1.4],
        [1296406400000, 1.4],
        [1326579200000, 1.1], 
    ],
     a33 = [
        [1286492800000, 1.5],
        [1296406400000, 1.6],
        [1326579200000, 1.2], 
    ], aa1 = [
        [1286406400000, 1.2, 2],
        [1296492800000, 1.3, 1.7],
        [1326579200000, 1.0, 1.4],
        
    ],
   aa2= [
        [1286492800000, 1.45],
        [1296406400000, 1.45],
        [1326579200000, 1.15], 
    ],
    aa3 = [
        [1286492800000, 1.4],
        [1296406400000, 1.6],
        [1326579200000, 1.2], 
    ];
    //============================================================================

function sp1(){
Highcharts.chart('sp1', {

    title: {
        text: '拿球反應時間'
    },

    xAxis: {
        type: 'datetime'
    },

    yAxis: {
        title: {
            text: null
        }
    },

    tooltip: {
        crosshairs: true,
        shared: false,
        valueSuffix: '秒'
    },

    legend: {
    },

    series: [{
        name: '班級平均',
        data: averages,
        zIndex: 1,
        marker: {
            fillColor: 'white',
            lineWidth: 1,
            lineColor: Highcharts.getOptions().colors[0]
        }
    }, 
   {
        name: '個案',
        data: averages1,
        zIndex: 1,
        marker: {
            fillColor: 'blue',
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[0]
        }
    }, 
    {
        name: '標準差',
        data: ranges,
        type: 'arearange',
        lineWidth: 0,
        linkedTo: ':previous',
        color: Highcharts.getOptions().colors[0],
        fillOpacity: 0.3,
        zIndex: 0
    }]
});

}



function sp2(){

Highcharts.chart('sp2', {

    title: {
        text: '拋球反應時間'
    },

    xAxis: {
        type: 'datetime'
    },

    yAxis: {
        title: {
            text: null
        }
    },

    tooltip: {
        crosshairs: true,
        shared: true,
        valueSuffix: '秒'
    },

    legend: {
    },

    series: [{
        name: '個案',
        data: a22,
        zIndex: 1,
        marker: {
            fillColor: 'blue',
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[0]
        }
    }, 
{
        name: '班級平均',
        data: a33,
        zIndex: 1,
        marker: {
            fillColor: 'white',
            lineWidth: 1,
            lineColor: Highcharts.getOptions().colors[0]
        }
    },
    {
        name: '標準差',
        data: a11,
        type: 'arearange',
        lineWidth: 0,
        linkedTo: ':previous',
        color: Highcharts.getOptions().colors[0],
        fillOpacity: 0.3,
        zIndex: 0
    }]
});
}

function sp3(){
Highcharts.chart('sp3', {

    title: {
        text: '反應時間'
    },

    xAxis: {
        type: 'datetime'
    },

    yAxis: {
        title: {
            text: null
        }
    },

    tooltip: {
        crosshairs: true,
        shared: true,
        valueSuffix: '秒'
    },

    legend: {
    },

    series: [{
        name: '個案',
        data: aa3,
        zIndex: 1,
        marker: {
            fillColor: 'blue',
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[0]
        }
    }, 
    {
        name: '班級平均',
        data: aa2,
        zIndex: 1,
        marker: {
            fillColor: 'white',
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[0]
        }
    },{
        name: '標準差',
        data: aa1,
        type: 'arearange',
        lineWidth: 0,
        linkedTo: ':previous',
        color: Highcharts.getOptions().colors[0],
        fillOpacity: 0.3,
        zIndex: 0
    }]
});

}


//=====================================================================================

Highcharts.chart('sp4', {

    title: {
        text: 'July temperatures'
    },

    xAxis: {
        type: 'datetime'
    },

    yAxis: {
        title: {
            text: null
        }
    },

    tooltip: {
        crosshairs: true,
        shared: true,
        valueSuffix: '°C'
    },

    legend: {
    },

    series: [{
        name: 'Temperature',
        data: averages,
        zIndex: 1,
        marker: {
            fillColor: 'white',
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[0]
        }
    }, {
        name: 'Range',
        data: ranges,
        type: 'arearange',
        lineWidth: 0,
        linkedTo: ':previous',
        color: Highcharts.getOptions().colors[0],
        fillOpacity: 0.3,
        zIndex: 0
    }]
});


Highcharts.chart('sp5', {

    title: {
        text: 'July temperatures'
    },

    xAxis: {
        type: 'datetime'
    },

    yAxis: {
        title: {
            text: null
        }
    },

    tooltip: {
        crosshairs: true,
        shared: true,
        valueSuffix: '°C'
    },

    legend: {
    },

    series: [{
        name: 'Temperature',
        data: averages,
        zIndex: 1,
        marker: {
            fillColor: 'white',
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[0]
        }
    }, {
        name: 'Range',
        data: ranges,
        type: 'arearange',
        lineWidth: 0,
        linkedTo: ':previous',
        color: Highcharts.getOptions().colors[0],
        fillOpacity: 0.3,
        zIndex: 0
    }]
});</script>
<!-- highcharts========================================-->















