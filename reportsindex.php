<?php
  include_once('dbconnect.php')
?>
<!doctype html>
<html>
  <head>
   <title>Reports in PHP</title>
   <link rel="stylesheet" type="text/css" href="reportsstyle.css"/>
  </head>
   <body>
    <div class="container">
       <div class="wrapper">
          <h1>My reports</h1>
    </div>
    <div class="data">
      <form action="reportsindex.php" method="POST">

       <select name="standards"> 
           <option>Select</option>
           <option>1 PUC</option>
           <option>2 PUC</option>

        </select>

        <select name="courses"> 
           <option>Select</option>
           <option>1 PUC</option>
           <option>2 PUC</option>
           
        </select>
        <input type="submit" name="submit" class="submit" />

<table border="1" class="table">
  <tr>
      <th>col1</th>
      <th>col2</th>
   </tr>
  </table>
</form>

</div>

</div>
</div>
   </body>
</html>