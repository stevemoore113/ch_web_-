<!DOCTYPE html>
<html>
<head>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
    $("#mains").mousedown(function(){
           $("#iff").toggle(800);
    });
});
</script>



<style>
body {
  text-shadow: 3px 2px red;
   background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
}

 h1{
    color: green;
}
p.outset {border-style: outset;}

#mains{
float: right;
top: 50%;
left: 50%;
}
#iff{


}

</style>
</head>





<body>
<!--BODY OF SOCKET-->
<?php   
                echo $forc;
                echo $h2;
                echo $h3;       
?>

<div class="container-fluid" id="mains">
<h1><?php echo $title ?></h1>
  <h1>Hello World!</h1>
  <div class="row">
    <div class="col-xs-6 col-sm-6" style="background-color:lavender;">
<?php foreach ($news as $news_item): ?>
        <p class="outset">
            <?php echo $news_item['title'] ?></p>
        <div class="main">
                <?php echo $news_item['text'] ;          
                echo $hh;
               //echo $hhh;
                ?>
        </div>
    <p><a href="<?php echo $news_item['slug'] ?>">＋1</a></p>
<?php endforeach ?>
    </div>
    
 
    
  </div>
</div>
<div id = "iff">
<iframe src="http://localhost:3000/" width=850 height=850 ></iframe>
<!div>
<div id = "idf">
<iframe src="http://127.0.0.1/news/create" width=850 height=850 ></iframe>
<!div>

<?php   
//echo exec("cd /Users/shihhenyi0621/Desktop/123.command");
echo $h1;
//echo exec('whoami');
?>





</body>
</html>












