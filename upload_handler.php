
<div class="loading-indicator hidden">
  <img src="img/loading.gif">
</div>

<?php

sleep(0);

error_reporting(0);

$csv = array();

// echo '<pre>';print_r($_FILES);echo '</pre>';

// check there are no errors
if($_FILES['csvfile'] && $_FILES['csvfile']['error'] == 0){
  $name = $_FILES['csvfile']['name'];
  $ext = strtolower(end(explode('.', $_FILES['csvfile']['name'])));
  $type = $_FILES['csvfile']['type'];
  $tmpName = $_FILES['csvfile']['tmp_name'];

  // check the file is a csv
  if($ext === 'csv'){
    if(($handle = fopen($tmpName, 'r')) !== FALSE) {
      // necessary if a large csv file
      set_time_limit(0);

      $row = 0;
      echo '<button id="scrollToBottom">Bottom..</button>';
      echo '<table style="margin:0 auto;"><tbody>';
      while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {

        echo '<tr>';

        // number of fields in the csv
        $num = count($data);

        // output the values from the csv
        for($i = 0; $i <= $num; $i++){
          $csv[$row]["row{$i}"] = $data[$i];
        }

        /*$csv[$row]['row1'] = $data[0];
        $csv[$row]['row2'] = $data[1];
        $csv[$row]['row3'] = $data[2];
        $csv[$row]['row4'] = $data[3];*/

        foreach($csv[$row] as $column){
          echo '<td>'.$column.'</td>';
        }

        // inc the row
        $row++;
        echo '</tr>';
      }
      echo '</tbody></table>';
      echo '<button id="scrollToTop">Top..</button>';
      fclose($handle);
      echo '
  <div class="clear"></div><button id="bigredbutton">
    Send Mails
  </button><div class="clear"></div>';
    } else {
      echo 'there was an error...';
    }
  } else {
    echo 'only csv files please...';
  }
} ?>