<section id="chart">
<?php  
  $title = "HOME";
  function get_content() {
  require_once '../connection.php';

 $query =   "SELECT
              income.income_id,
              SUM(income.amount_save) AS sum_amount,
              category_in.name
            FROM
              income
            JOIN category_in ON income.category_id = category_in.category_id
            GROUP BY category_in.name";

 $result = mysqli_query($cn,$query);
   /*while($value = mysqli_fetch_assoc($result))
   {
    echo $value['amount_save'].$value['name'];
   }*/


?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task','Amount Save'],

           <?php                 
             if(mysqli_num_rows($result)>0)
            {
              while($category = mysqli_fetch_assoc($result))           
              {
                 echo "['".$category['name']."',".$category['sum_amount']."],";
                 //echo $category["amount_save"]
              }
            }
           ?>

        ]);

         var options = {
          title: 'My Income',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
    
     <div class="row">
         <div class="col-md-6 mx-auto">
             <div class="card mt-5 mb-5">
                 <div class="card-header">
                     <h3 class="text-1-1 text-center">Income Record</h3>
                 </div>
                 <div class="card-body">
                     <div id="donutchart1" style="width: 550px; height: 350px;"></div>
                 </div>
             </div>
         </div>
     </div> -->
    
</body>
</html>
         
 
<?php  
  }
  require_once '../../views/partials/layout.php';
?>
</section>



   


    