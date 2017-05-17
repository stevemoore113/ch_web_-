<?php
		require_once("php/connMysql.php");
	$query_RecMember = "SELECT * FROM `graph_avg` WHERE `d_id` IN (SELECT MAX(`d_id`) FROM `graph_avg`)";
	$RecFindUser=$db_link->query($query_RecMember);
	$avgGraph=$RecFindUser->fetch_assoc();

	$query_RecMember = "SELECT * FROM `student` WHERE `s_id`={$_GET['s_id']}";
	$RecFindUser=$db_link->query($query_RecMember);
	$studnetInfo=$RecFindUser->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title>graphDisplay</title>
	<meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../css/bootstrap.css">
   <!-- load api-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
   <!--========================================================================================-->
   <script src="../js/bootstrap.js" type="text/javascript"></script>
   <!--=======================laod highchart=================================================================-->
   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script src="http://code.highcharts.com/modules/offline-exporting.js"></script>
    <link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.min.css">
    <link rel="stylesheet" href="http://docs.handsontable.com/0.19.0/scripts/removeRow-demo/handsontable.removeRow.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.js "></script>
    <script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.0.0.js "></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta1/html2canvas.js"></script>
<script src="https://canvg.github.io/canvg/canvg.js"></script>
<script src="https://canvg.github.io/canvg/StackBlur.js"></script>
<script src="http://canvg.github.io/canvg/rgbcolor.js"></script>
<script type="text/javascript">

/* 使用說明
個人：
上肢為dataUp: 裡面的元素分別有，[reactionTime, coordination, Accuracy, successfulRate, BMI] 五種
要取用元素的方法為：dataUp['reactionTime'];
下肢為dataLow: 裡面的元素分別有，[reactionTime, coordination, Accuracy, successfulRate, BMI] 五種
要取用元素的方法為：dataLow['reactionTime'];
全體：
要取用全體的元素有：[	
		up_reaction: 上肢反應的平均
		up_accuracy: 上之準確的平均
		up_successful: 上肢成功率的平均
		up_coordination: 上之協調的平均
		low_reaction: 下肢反應的平均
		low_accuracy: 下之準確的平均
		low_successful: 下肢成功率的平均
		low_coordination: 下之協調的平均

		avg_bmi: bmi的平均
		sd_bmi: bmi的標準差

		sd_up_reaction: 上肢反應的標準差
		sd_up_accuracy: 上之準確的標準差
		sd_up_successful: 上肢成功率的標準差
		sd_up_coordination: 上之協調的標準差
		sd_low_reaction: 下肢反應的標準差
		sd_low_accuracy: 下之準確的標準差
		sd_low_successful: 下肢成功率的標準差
		sd_low_coordination: 下之協調的標準差
		]
	使用的方法為：dataAvg['up_reactino'];
	
	雷達圖中間的地方為平均值
	雷達圖最上界的界線為平均+2*(標準差)
	最下界的界線為平均-2*(標準差)
	
	而雷達圖八成的地方為平均+1*(標準差)
	雷達圖兩成的地方為平均+1*(標準差)
    換句話說 就是四倍的標準差 / 100

    5 4 3    6 
	studnetInfo['s_name']
	{
		s_id
		s_name
		s_sex
		s_birthday
		s_email
		s_phone
		s_address
		s_high
		s_weight
		s_hand
		s_foot
		s_bmi
		s_parents
		s_teacher
		s_statue
		s_school
		s_grade
		s_class
		s_obstacle
		s_text
		del_member
		s_jointime
	}
*/	

	//此四行不便，讀資料
	var dataUp = <?php echo $_GET["dataUp"]; ?>,
	dataLow = <?php echo $_GET["dataLow"]; ?>,
	dataAvg = <?php echo json_encode($avgGraph); ?>;
	studnetInfo = <?php echo json_encode($studnetInfo); ?>;


var doc = new jsPDF('p', 'mm');

	//alert(dataAvg['d_id']);

	//document.getElementById('show').text ='123
var  go1=50+25/dataAvg['sd_up_reaction'] * (dataUp['reactionTime']-dataAvg['up_reaction']);
var  go2=50+25/dataAvg['sd_up_accuracy']* (dataUp['Accuracy']-dataAvg['up_accuracy']);
var  go3=50+25/dataAvg['sd_up_successful']* (dataUp['successfulRate']-dataAvg['up_successful']);
var  go4=50+25/dataAvg['sd_up_coordination']* (dataUp['coordination']-dataAvg['up_coordination']);

var  d1 =50+25/dataAvg['sd_low_reaction'] * (dataLow['reactionTime']-dataAvg['low_reaction']);
var  d2 =50+25/dataAvg['sd_low_accuracy']* (dataLow['Accuracy']-dataAvg['low_accuracy']);
var  d3 =50+25/dataAvg['sd_low_successful']* (dataLow['successfulRate']-dataAvg['low_successful']);
var  d4 =50+25/dataAvg['sd_low_coordination']* (dataLow['coordination']-dataAvg['low_coordination']);

var  bm1 = 50+25/dataAvg['sd_bmi']* (dataUp['BMI']-dataAvg['avg_bmi']);
//console.log(go1,go2,go3,go4,bm1);
//console.log(dataAvg['sd_bmi'],dataUp['BMI'],dataAvg['avg_bmi']);
	</script>




	<style type="text/css">
body {
    overflow:hidden;
}

#fixx {
  float:right;
/*  position: fixed;*/
   }
#confirm1{
  float:right;

}
#cons{
right: 0;
z-index:100;
}
#complete{
z-index:1100;
}
#modal-backdrop{

}
</style>



</style>



</head>


<body>




















<div class="container" id="cons">
  <button  id = "confirm1" type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">下載</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button> 
          <h4 class="modal-title">請選擇 </h4>
          <p>請選擇所需頁面 並確定銀幕視窗是否為100% </p>
        </div>
        <div class="modal-body">
  <form>
    <div class="checkbox">
      <label><input type="checkbox" value="" id="clickall">全部</label>
    </div>
    <div class="checkbox">
      <label><input name="st" type="checkbox" value="" id="clickfirst">封面</label>
    </div>
    <div class="checkbox">
      <label><input  name="st"  type="checkbox" value="" id="clicklist">目錄</label>
    </div>
      <div class="checkbox ">
      <label><input  name="st" type="checkbox" value=""id="clickiformation" >個人基本資訊</label>
    </div>
    <div class="checkbox ">
      <label><input   name="st" type="checkbox" value="" id="clickpicture">雷達圖</label>
    </div>
    <p>雷達圖各角呈現</p>
     <div class="checkbox disabled">
      <label><input type="checkbox" value="" disabled>上肢 成功率</label>
      <label><input type="checkbox" value="" disabled>上肢 準確率</label>
      <label><input type="checkbox" value="" disabled>上肢 手眼協調</label>
      <label><input type="checkbox" value="" disabled>上肢 反應速度</label>
    <br>

      <label><input type="checkbox" value="" disabled>下肢 成功率</label>
      <label><input type="checkbox" value="" disabled>下肢 準確率</label>
      <label><input type="checkbox" value="" disabled>下肢 下肢協調</label>
      <label><input type="checkbox" value="" disabled>下肢 反應速度</label>
    <br>
      <label><input type="checkbox" value="" disabled>BMI</label>
    </div>
  </form>

  <div class="form-group">
      <label for="comment">輸入檔案名稱</label>
      <textarea class="form-control" rows="1" id="comment"></textarea>
    </div>
      <div class="form-group">
      <label for="comment">輸入標題名稱</label>
      <textarea class="form-control" rows="1" id="comment1"></textarea>
    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info "id="complete">產生</button>
      
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        </div>
      </div>
    </div>
  </div>
   <button id="fixx" type="button" class="btn btn-info "  onclick="history.back()">back</button>
</div>

<div class="container" id="container3">
  <h2>基本資料</h2>

    <div class="col-lg-6">
    <div class="panel panel-default">
    <div class="panel-heading">姓名:<?php echo $studnetInfo['s_name'] ?></div>
    <div class="panel-body">ID:<?php echo $studnetInfo['s_id'] ?></div>
    <div class="panel-heading">性別:<?php echo $studnetInfo['s_sex'] ?></div>
    <div class="panel-body">生日:<?php echo $studnetInfo['s_birthday'] ?></div>
    <div class="panel-heading">email:<?php echo $studnetInfo['s_email'] ?></div>
    <div class="panel-body">聯絡方式:<?php echo $studnetInfo['s_phone'] ?></div>
    <div class="panel-heading">地址:<?php echo $studnetInfo['s_address'] ?></div>
    <div class="panel-body">身高:<?php echo $studnetInfo['s_high'] ?></div>
    <div class="panel-heading">體重:<?php echo $studnetInfo['s_weight'] ?></div>
    <div class="panel-body">bmi:<?php echo $studnetInfo['s_bmi'] ?></div>
  </div>
  </div>
   <div class="col-lg-6">
      <div class="panel panel-default">
    <div class="panel-heading">親人:<?php echo $studnetInfo['s_parents'] ?></div>
    <div class="panel-body">教師:<?php echo $studnetInfo['s_teacher'] ?></div>
    <div class="panel-heading">狀況:<?php echo $studnetInfo['s_statue'] ?></div>
    <div class="panel-body">學校:<?php echo $studnetInfo['s_school'] ?></div>
    <div class="panel-heading">年級:<?php echo $studnetInfo['s_grade'] ?></div>
    <div class="panel-body">班級:<?php echo $studnetInfo['s_class'] ?></div>
    <div class="panel-heading">障礙類別:<?php echo $studnetInfo['s_obstacle'] ?></div>
    <div class="panel-body">補充文字:<?php echo $studnetInfo['s_text'] ?></div>
    <div class="panel-heading">加入時間:<?php echo $studnetInfo['s_jointime'] ?></div> 
    <div class="panel-body">詳細:<?php echo $studnetInfo['del_member'] ?></div>                                                                          
  </div></div>
</div>

 

<div class="container" id="container4">
  <h2>測量各項數值</h2>
   <div class="col-lg-6">

  <div class="panel panel-default">
    <div class="panel-heading">上肢</div>

    <div class="panel-body">反應時間  
<script>
document.write(dataUp['reactionTime'] );
</script>
</div>

     <div class="panel-body">手眼協調 
     <script>
document.write(dataUp['coordination']);
</script> 秒</div>

      <div class="panel-body">成功率 
         <script>
document.write(dataUp['successfulRate']+0);
</script></div>

       <div class="panel-body">準確率 
        <script>
document.write(dataUp['Accuracy']+0);
</script></div>

        <div class="panel-body">BMI 
            <script>
document.write(dataUp['BMI']+0);
</script></div>

  </div>
</div>
  <div class="col-lg-6">
     <div class="panel panel-default">
    <div class="panel-heading">下肢</div>

    <div class="panel-body">反應時間  
<script>
document.write(dataLow['reactionTime'] );
</script>
</div>

     <div class="panel-body">手眼協調 
     <script>
document.write(dataLow['coordination']);
</script> 秒</div>

      <div class="panel-body">成功率 
         <script>
document.write(dataLow['successfulRate']+0);
</script></div>

       <div class="panel-body">準確率 
        <script>
document.write(dataLow['Accuracy']+0);
</script></div>

        <div class="panel-body">BMI 
            <script>
document.write(dataLow['BMI']+0);
</script></div>

  </div>
</div>
</div>





   <div class="col-lg-12">
      <div class="panel panel-default">
    <div class="panel-heading">健康小提示</div>
    <div class="panel-body"></div>                                                                         
  </div></div>



  <div class="row">
    <div class="col-lg-6">
     <div id="container" style="min-width: 400px; max-width: 500px; height: 400px; margin: 0 auto"></div>
     </div>
    <div class="col-lg-6" >
    <div id="container2" style="min-width: 400px; max-width: 500px; height: 400px; margin: 0 auto"></div>
    </div>
      </div>



<script type="text/javascript">

$("#clickall").click(function() {
  $("input[name='st']").prop("checked", true);
});</script>



<script type="text/javascript" >
$(function() {


  $(document).ready(function() {
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
        categories: ['反應時間', '準確率', '成功率', '協調',
                'BMI'],
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
        pointFormat: '<span style="color:{series.color}">{series.name}: <h1>位於</h1><b>{point.y:,.0f}％</b><br/>'
       


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
                   

       
             data= this.y;
             data2 = this.category;
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
      credits: {
        enabled: false
    },
    series: [

      
        { type: 'area',
        name: '個案'+studnetInfo['s_name'],
         data: [d1, d2, d3, d4,61],
        pointPlacement: 'on'
    }
       ,
        {
        name: '平均',
           data: [50, 50, 50, 50, 50],
        pointPlacement: 'on'
    }
    ]

});
  });






 $(document).ready(function() {

 Highcharts.chart('container2', {

    chart: {
        polar: true,
        type: 'line',
        animation: true
    },

    title: {
        text: '下肢',
        x: -80
    },

    pane: {
        size: 280
    },

    xAxis: {
        categories: ['反應時間', '準確率', '成功率', '協調',
                'BMI'],
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
       pointFormat: '<span style="color:{series.color}">{series.name}: <h1>位於</h1><b>{point.y:,.0f}％</b><br/>'

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
    credits: {
        enabled: false
    },
    series: [

      
        { type: 'area',
         name: '個案'+studnetInfo['s_name'],
         data: [go1, 40, go3, go4, 61],
        pointPlacement: 'on'
    }
       ,
        {
        name: '平均',
           data: [50, 50, 50, 50, 50],
        pointPlacement: 'on'
    }
  
    ]


});
  });

function getStyle(el, styleProp) {
  var camelize = function(str) {
    return str.replace(/\-(\w)/g, function(str, letter) {
      return letter.toUpperCase();
    });
  };

  if (el.currentStyle) {
    return el.currentStyle[camelize(styleProp)];
  } else if (document.defaultView && document.defaultView.getComputedStyle) {
    return document.defaultView.getComputedStyle(el, null)
      .getPropertyValue(styleProp);
  } else {
    return el.style[camelize(styleProp)];
  }
}
  });
</script>







<script type="text/javascript">



function downloadPNG(imgArray, idx, id ,xc,yc,w,h,page){   
 // console.log(id);
var svgElements = $(id).find('svg');
    if (svgElements.length !==  0){
      //replace all svgs with a temp canvas
      svgElements.each(function() {
        var canvas, xml;

        // canvg doesn't cope very well with em font sizes so find the calculated size in pixels and replace it in the element.
        $.each($(this).find('[style*=em]'), function(index, el) {
          $(this).css('font-size', getStyle(el, 'font-size'));
        });

        canvas = document.createElement("canvas");
        canvas.className = "screenShotTempCanvas";
        //convert SVG into a XML string
        xml = (new XMLSerializer()).serializeToString(this);

        // Removing the name space as IE throws an error
        xml = xml.replace(/xmlns=\"http:\/\/www\.w3\.org\/2000\/svg\"/, '');

        //draw the SVG onto a canvas
        canvg(canvas, xml);
        $(canvas).insertAfter(this);
        //hide the SVG element
        ////this.className = "tempHide";
        $(this).attr('class', 'tempHide');
        $(this).hide();
      });
    }
    
console.log($(id).get(),"test");
//$(id).get()



      html2canvas($(id), {
        onrendered: function(canvas) {
              imgArray[idx] = new Image();
              imgArray[idx] = canvas.toDataURL('images/png',4.0);
               aaa(idx,imgArray[idx]);
                 console.log(idx,imgArray[idx]);
              checkDone(imgArray,xc,yc,w,h,page);
        }

      });
       
    
    if (svgElements.length !==  0){  
      $(id).find('.screenShotTempCanvas').remove();
      $(id).find('.tempHide').show().removeClass('tempHide');
    }
}



function aaa(idx, img){
console.log(idx,img);
}


function checkDone(imgArray,xc,yc,w,h,page){
  var flag = true;
  // for (var idx = 0 ; idx< imgArray.length ; idx++){
      for (var idx = 0 ; idx<5 ; idx++){
    console.log(idx);
    if (!imgArray[idx]){
      flag=false;
      break;
    }
  }
  console.log(imgArray);
  if(flag){
    for (var idx in imgArray)
    {
      if(imgArray[idx]!== -1)
      {
        pisoo = (idx%2);
//================================================================================頁碼浮動bug除錯
       if(idx==1||idx==0){
        if(pisoo==1){
          yc=180;
          h=100;
        }
        else{
          h=150;
          yc=25;
        }
       }

      if(idx==3||idx==2){
        if(pisoo==1)
          yc=150;
        else
          yc=25;
       }
         //可以做到貼第二張圖時候yc往下移動
    //============================================================================
        console.log(xc,yc,w,h,page,"123123123123123");
        doc.addImage(imgArray[idx], 'PNG',xc,yc,w,h);
        console.log(idx,imgArray[idx]);
            if(idx==1)
        {
        doc.addPage();
    imagetop = "data:image/jpeg;base64,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";
          doc.addImage(imagetop, 'PNG',5,5,20,20);
        }
      }
      else {
         savedoc(page);
      }
       
    }
  }
}//之所以沒對齊 是因為上面有很長的字串

function savedoc(a)
{
 doc.save(a);

}

function open(b)
{
doc.output('datauri');
}
</script>







<script type="text/javascript">



  // $('#selectagain').click(



  
  //           });

  $('#complete').click(
  function() {  //1
               var first1=document.getElementById('clickfirst').checked; 
               var second2=document.getElementById('clicklist').checked; 
               var third3=document.getElementById('clickiformation').checked; 
               var fourth4=document.getElementById('clickpicture').checked; 
               var textname=document.getElementById('comment').value;
               var texttitle=document.getElementById('comment1').value;
               var pagenameber = 0;
              // var imgArray = [];
             var imgArray = new Array();
              imgArray[4] = -1;
              var imagetop;
              imagetop = "data:image/jpeg;base64,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";
              alert("確認");
              var count=0;
              doc.setFont("courier");
              doc.setFontType("bolditalic");


 if(first1)
 { count++;
               doc.setTextColor(150);
               doc.addImage(imagetop, 'PNG',60,30,80,80);
               doc.text( texttitle +' -  semester Report', 40, 150);

}
if(second2)

{
count++;
  	         doc.addPage();//2
  	         doc.text('~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~', 35, 110);
             doc.text('* title page--------------------------------', 35, 135);
             doc.text('* list--------------------------------------', 35, 150); 
             pagenameber++;
             doc.text('* basic information -------------------------'+pagenameber, 35, 165);
             if(fourth4)
             {
             pagenameber++;
             doc.text('* picture -----------------------------------'+pagenameber, 35, 180);  
             }
             doc.addPage();
}

if(third3)
{       pagenameber=0;
        pagenameber++;         
  
  count++;
            doc.addImage(imagetop, 'PNG',5,5,20,20);
            downloadPNG(imgArray, 0, "#container3",30,15,155,140,textname);
            downloadPNG(imgArray, 1, "#container4",30,145,150,130,textname);
          }
//3


if(fourth4)
{
count++;
if(count==0)
 doc.addPage();
             downloadPNG(imgArray, 2, "#container",40,25,120,125,textname);
             downloadPNG(imgArray, 3, "#container2",40,125,120,125,textname);

           }
//4
if(third3==false&&fourth4==false&&first1==true&&second2==true)
{
  savedoc(textname);
}
if(first1==false && second2==false && third3==false && fourth4==false)
{
alert("請選擇所需頁面");
}


  
            });
</script>






</body>
</html>

<!-- var doc = new jsPDF();
doc.setFontSize(22);
doc.text(20, 20, 'This is a title');

doc.setFontSize(16);
doc.text(20, 30, 'This is some normal sized text underneath.'); 

// Output as Data URI
doc.output('datauri'); -->

<!-- var doc = new jsPDF();

doc.setTextColor(100);
doc.text(20, 20, 'This is gray.');
  
doc.setTextColor(150);
doc.text(20, 30, 'This is light gray.');  
  
doc.setTextColor(255,0,0);
doc.text(20, 40, 'This is red.');
  
doc.setTextColor(0,255,0);
doc.text(20, 50, 'This is green.');
  
doc.setTextColor(0,0,255);
doc.text(20, 60, 'This is blue.'); -->
