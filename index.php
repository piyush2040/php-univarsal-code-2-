<html>  
      <head>  
           <title>bankname</title> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <style>
   
   .box
   {
    width:750px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>
      </head>  
      <body>  
        <div class="container box">
          <h3 align="center">Import JSON File Data into Mysql Database in PHP</h3><br />
          <?php
          $connect = mysqli_connect("localhost", "root", "", "bank"); //Connect PHP to MySQL Database
          $query = '';
          $table_data = '';
          $filename = "banknames.json";
          $data = file_get_contents($filename); //Read the JSON file in PHP
          $array = json_decode($data, true); //Convert JSON String into PHP Array
		echo count($array);
	$r = True;
          foreach($array as $key=>$value) //Extract the Array Values by using Foreach Loop
          {
           $query = "INSERT INTO bank_detail(bank_id,bank_name) VALUES ('".$key."', '".$value."'); ";  // Make Multiple Insert Query 
		$result = mysqli_query($connect,$query);
$r = $r & $result;
           $table_data .= '
            <tr>
       <td>'.$key.'</td>
       <td>'.$value.'</td>
      </tr>
           '; //Data for display on Web page
          }
         
     echo '<h3>Imported JSON Data</h3><br />';
     echo '
      <table class="table table-bordered">
        <tr>
         <th width="45%">bank_id</th>
         <th width="10%">bank_name</th>
        </tr>
     ';
     echo $table_data;  
     echo '</table>';
          




          ?>
     <br />
         </div>  
      </body>  
 </html>  