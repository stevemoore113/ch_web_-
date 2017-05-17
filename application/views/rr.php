
 <script type="text/javascript">
Highcharts.chart('cer', {

    title: {
        text: 'Solar Employment Growth by Sector, 2010-2016'
    },

    subtitle: {
        text: 'Source: thesolarfoundation.com'
    },

    yAxis: {
        title: {
            text: 'Number of Employees'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            pointStart: 2010
        }
    },

    series: [


            
        




    {  point:{
        events: {       
        name: 'Installation',  
       data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175],
//=====================================================      
         <?php    $a[1]=123;                ?>
                      
        click: function () {
                 alert(this.events.name);
                          //if(<?php echo $a[1] ?> == 43934)
               window.open(' http://tw.yahoo.com ', 'Yahoo', config='height=500,width=500');
                                          
                        }
                       }
                       },               
                      
//=======================================================

 data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]

        
    }, {
        name: 'Manufacturing',
        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    }, {
        name: 'Sales & Distribution',
        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    }, {
        name: 'Project Development',
        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    }, {
        name: 'Other',
        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    }]

});
</script>


<style type="text/css">
#cer {
  min-width: 310px;
  max-width: 800px;
  height: 400px;
  margin: 0 auto;
}
.ec_info {
  position: relative;
  overflow: hidden;
  width: 300px;
  height: 340px; }
  .ec_info ul {
    position: absolute;
    display: inline;
    width: 1000%; }
    .ec_info ul li {
      width: 300px !important;
      height: 300px !important;
      margin-right: 20px;
      float: left;
      width: 100%;
      height: 100%;
      border: 1px #41494f solid;
      overflow: hidden;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      -ms-border-radius: 10px;
      -o-border-radius: 10px;
      border-radius: 10px; }
      .ec_info ul li.blue {
        border: 2px #1c97b9 solid; }
      .ec_info ul li .hover {
        position: absolute;
        bottom: 0;
        max-width: 100%;
        padding: 0 5% 5% 5%;
        height: 37px;
        width: 100%;
        opacity: 0.9;
        background: #323232;
        color: #FFF; }
        .ec_info ul li .hover .title {
          word-wrap: break-word;
          white-space: nowrap;
          text-overflow: ellipsis;
          height: 35px;
          line-height: 24px;
          padding: 0;
          overflow: hidden;
          text-align: center; }
        .ec_info ul li .hover.selected .title {
          color: #fe5455;
          margin-bottom: 10px; }
      .ec_info ul li .hover {
        height: 96px;
        font-size: 12px; }
        .ec_info ul li .hover .title {
          margin: 8px 0;
          color: #fe5455;
          height: 25px;
          line-height: 25px; }
        .ec_info ul li .hover .desc {
          height: 35px;
          overflow: hidden; }

</style>
