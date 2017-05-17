 <!DOCTYPE html>
<html lang="en">
<head>


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
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.19.0/bower_components/handsontable/dist/handsontable.full.min.css">
    <link rel="stylesheet" href="http://docs.handsontable.com/0.19.0/scripts/removeRow-demo/handsontable.removeRow.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.js "></script>
    <script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.0.0.js "></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/…/li…/jspdf/1.2.61/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/…/h…/0.5.0-beta1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/…/0.5.0-bet…/html2canvas.svg.js"></script>




   <title><?php echo $title?></title>


<!-- load style-->
<style type="text/css">

        .mainchart{
     z-index:1;
     position: relative;}
        #navbar-example{
          background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
          }
        #pwdcss{
          float: right;
        }
       
        #changefile {padding-top:100px;height:100%; background-color: hsla(120,65%,75%,0.3);}
        #readfile {padding-top:100px;height:100%; background-color: hsla(120,65%,75%,0.3);}
        #upfile {padding-top:50px;height:100%; background-color: hsla(120,65%,75%,0.3);}

        #newp{padding-top:50px;height:100%; background-color: hsla(120,65%,75%,0.3);}
        #changep{padding-top:50px;height:100%; background-color: hsla(120,65%,75%,0.3);}
         
        #admin{float: right; color: hsla(233,80%,80%,0.8); } 
        #textarrr{opacity: 0.0;}
footer {
    background-color: #808080;
    color: #f5f5f5;
    max-height:150px; 
    padding: 25px;
}

footer a {
    color: #f5f5f5;
}

footer a:hover {
    color: #777;
    text-decoration: none;
}

</style>





<script type="text/javascript">
$(document).ready(function(){

 $("#textarrr1").mouseenter(
  function(){
    $("#myCarousel").animate({
            opacity: '0.8',
            opacity: '0.4',
            opacity: '0.1',
            height: '0px',
        });
    $("#textarrr").animate({
            display:'block',
            right: '-890px',
            opacity: '1',
            height: '90%',
            width: '90%'
        });
  
    });
  $("#textarrr1").mouseleave(
  function(){
  $("#myCarousel").animate({
         height: '0px',
         height: '500px',
           height: '100%',
            opacity: '0.1',
            opacity: '0.4',
            opacity: '1.0',

        });
    $("#textarrr").animate({
           
            height: '0px',
            width: '0px'
        });
  
    });


   $('#myCarousel').css("display","block");
  $('#changefile').css("display","none");
    $('#readfile').css("display","none");
      $('#upfile').css("display","none");
        $('#newp').css("display","none");
            $('#lotnew').css("display","none");
          $('#changep').css("display","none");
           $('#chartofl').css("display","none");
 

    $("#read1").click(function(){
         $('#myCarousel').css("display","none");
       $('#changefile').css("display","block");
    $('#readfile').css("display","block");
      $('#upfile').css("display","block");
        $('#newp').css("display","none");
                   $('#lotnew').css("display","none");
          $('#changep').css("display","none");
           $('#chartofl').css("display","none");

    });
      $("#up1").click(function(){
           $('#myCarousel').css("display","none");
         $('#changefile').css("display","block");
    $('#readfile').css("display","block");
      $('#upfile').css("display","block");
        $('#newp').css("display","none");
                   $('#lotnew').css("display","none");
          $('#changep').css("display","none");
           $('#chartofl').css("display","none");

    });
        $("#change1").click(function(){
             $('#myCarousel').css("display","none");
           $('#changefile').css("display","block");
    $('#readfile').css("display","block");
      $('#upfile').css("display","block");
        $('#newp').css("display","none");
                   $('#lotnew').css("display","none");
          $('#changep').css("display","none");
           $('#chartofl').css("display","none");

    });
          $("#change2").click(function(){
               $('#myCarousel').css("display","none");
             $('#changefile').css("display","none");
    $('#readfile').css("display","none");
      $('#upfile').css("display","none");
        $('#newp').css("display","block");
                   $('#lotnew').css("display","block");
          $('#changep').css("display","block");
           $('#chartofl').css("display","none");

    });
            $("#charrt").click(function(){
                 $('#myCarousel').css("display","none");
               $('#changefile').css("display","none");
    $('#readfile').css("display","none");
      $('#upfile').css("display","none");
        $('#newp').css("display","none");
                   $('#lotnew').css("display","none");
          $('#changep').css("display","none");
           $('#chartofl').css("display","block");

    });
              $("#new1").click(function(){
                   $('#myCarousel').css("display","none");
                 $('#changefile').css("display","none");
    $('#readfile').css("display","none");
      $('#upfile').css("display","none");
        $('#newp').css("display","block");
                   $('#lotnew').css("display","block");
          $('#changep').css("display","block");
           $('#chartofl').css("display","none");

    });
                         $("#r1").click(function(){
                   $('#myCarousel').css("display","block");
                 $('#changefile').css("display","none");
    $('#readfile').css("display","none");
      $('#upfile').css("display","none");
        $('#newp').css("display","none");
                   $('#lotnew').css("display","none");
          $('#changep').css("display","none");
           $('#chartofl').css("display","none");

    });

});
</script>




   




<!-- 拉霸 ====================================================================-->
   <script type="text/javascript">
   $(function(){
     //$('body').scrollspy({target: '#navbar-example'})
    $("ul>li>a").click(function(event) {
      event.preventDefault();
      var ref = $(this).attr("href");
      $("body,html").animate({scrollTop: $(ref).offset().top },900);
    });
    $('body').scrollspy({target: '#navbar-example'})
        });
   </script>
<!--scroll-->
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="20" >

  <!-- bar special code-->
    <div>
      <nav id="navbar-example" class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">早期醫療之足球研究</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


         <ul class="nav navbar-nav">
          <li class="active">
          <a id = "r1" href="#index">首頁</a>
          </li>
   <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">資料編輯
            <span class="caret"></span>
          </a>
            <ul class="dropdown-menu">
              <li><a id = "up1" href="#upfile">上傳</a></li>
              <li><a  id = "change1" href="#changefile">更改</a></li>
               <li><a  id = "read1" href="#readfile">查閱</a></li>
            </ul>
          </li>
      
       <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">學生資訊
            <span class="caret"></span>
          </a>
            <ul class="dropdown-menu">
              <li><a id = "new1" href="#newp">單體新增</a></li>
              <li><a id = "new1" href="#lotnew">文件新增</a></li>
              <li><a id = "change2" href="#changep">檢視學生資料</a></li>
            </ul>
          </li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">雷達圖報表
            <span class="caret"></span>
          </a>
            <ul class="dropdown-menu">
              <li><a id = "charrt"href="#lachart2">整體</a></li>
              <li><a href="#chart2">單體</a></li>
            </ul>
          </li>

         </ul>
         <img src="../../imgs/icon_ann.svg" class="img-rounded" width=3% height=3% style="float : right " id = "textarrr1">
         <a id = "admin" href="../../CCEI/member_admin.php">管理帳號</a>

      



        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
     </nav>
    </div>
<!--bar bar bar==============================================================-->
<div id="index" class="banner">
  <div>
<div class="container">
  <h2>C</h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="../img/01.jpg" alt="bo" style="width:80%;">
      </div>

      <div class="item">
        <img src="../img/03.jpg" alt="bo" style="width:80%;">
      </div>
    
      <div class="item">
        <img src="../img/02.jpg" alt="bo" style="width:80%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<!--公告欄-->
<div class="w3-container" id = "textarrr" style="position: fixed"> 
  <div class="w3-container">
  <div class="w3-card-4" style="width:20% ">
    <header class="w3-container w3-light-grey">
      <h3>公告欄</h3>
    </header>
    <div class="w3-container">
      <p>最新事項</p>
      <hr>
      <p>blabalbalbalbalbalbalbabl</p><br>
    </div>
  </div>
</div>
</div>
<!--公告欄-->


</div>
</div>
<!-- ======================規劃中版面===========-->
<div id="newp" class="container-fluid">
<h1 >單項新增</h1>
<iframe  src="http://127.0.0.1/CCEI/student_join.php" frameborder="0" height="1000px" width="100%" scrolling="auto"></iframe>
</div>
<div id = "lotnew">
<h1 >整份新增</h1>
<iframe  src="http://127.0.0.1/CCEI/student_join_auto.php" frameborder="0" height="1000px" width="100%" scrolling="auto"></iframe>
</div>
<div id="changep" class="container-fluid">
  <h1>學生資料檢視</h1>
  <iframe  src="http://127.0.0.1/CCEI/data_select.php" frameborder="0" height="1000px" width="100%" scrolling="auto"></iframe>
 </div>

<div id="upfile" class="container-fluid">
  <h1>資料上傳</h1>
    <iframe  src="http://127.0.0.1/CCEI/data_upload.php" frameborder="0" height="1000px" width="100%" scrolling="auto"></iframe>
    <h1>檔案輸入上傳</h1>
    <iframe  src="http://127.0.0.1/CCEI/data_upload_auto.php" frameborder="0" height="1000px" width="100%" scrolling="auto"></iframe>
 </div>

<div id="readfile" class="container-fluid">
  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>  <h1>資料查閱</h1>
  <p>頁面規劃中</p>
</div>
<div id="changefile" class="container-fluid">
  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>  <h1>資料更改</h1>
  <p>頁面規劃中</p>
</div>
<!--=======================================學生選擇===============-->
<!--==========================================================================-->

<div id="chartofl" class="container-fluid">
<iframe id = "lachart2" src="http://127.0.0.1/CCEI/data_select.php" frameborder="0" height="1000px" width="100%" scrolling="auto"></iframe>
<?php 
//echo $lachart;
?>


</div>

<footer class="text-center">
  <a class="up-arrow" href="#index" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>聯絡方式<a data-toggle="tooltip" title="Visit w3schools">222222222222222</a></p> 
   <p>copyrifht<a data-toggle="tooltip" title="Visit w3schools">222222222222222</a></p> 
</footer>

<script>
$(document).ready(function(){
    // Initialize Tooltip
    $('[data-toggle="tooltip"]').tooltip(); 
})
</script>




















</body>
