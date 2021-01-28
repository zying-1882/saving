<section id="chart">
<?php  
  $title = "Chart Ex";
  function get_content() {
  require_once '../connection.php';

 $query =   "SELECT
              expenses.expenses_id,
              SUM(expenses.amount_spend) AS sum_amount,
              category_ex.name
            FROM
              expenses
            JOIN category_ex ON expenses.category_id = category_ex.category_id
            GROUP BY category_ex.name";

 $result = mysqli_query($cn,$query);

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
          ['Task','Amount Spend'],

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
          title: 'My Expenses',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
     <div class="row">
         <div class="col-md-6 mx-auto">
             <div class="card mt-5 mb-5">
                 <div class="card-header">
                     <h3 class="text-1-1 text-center">Expenses Record</h3>
                 </div>
                 <div class="card-body">
                     <div id="donutchart" style="width: 550px; height: 350px;" class="mx-auto"></div>
                 </div>
             </div>
         </div>
     </div> 
    
</body>
</html>
         
 
<?php  
  }
  require_once '../../views/partials/layout.php';
?>
</section>


   


    