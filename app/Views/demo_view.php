<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</head>
<body hx-ext="ajax-header" class="text-bg-light p-3" >
<?php
$strNetwork = null;
$strinfliencer_id = null;

if (isset($_GET["network"])) {
  $strNetwork = $_GET["network"];
}
if (isset($_GET["txtKeyword"])) {
  $strinfliencer_id = $_GET["txtKeyword"];

}

?>

  
<form method="get" action="">
<header class="p-3 bg-dark text-white">
        <p align='center' class = "blockquote">ID-influencer
          <input type="text" name="txtKeyword" value="<?php echo $strinfliencer_id; ?>" placeholder="Search.....">&nbsp;&nbsp;&nbsp;&nbsp;
          <select type="text" name="network" >
            <option value="">select Network</option>
            <option value="facebook">facebook</option>
            <option value="instagram">instagram</option>
            <option value="twitter">twitter</option>
            <option value="tiktok">tiktok</option>
          </select>&nbsp;&nbsp;&nbsp;&nbsp;
          
            <button class="btn btn-primary" type="submit" >Search</button>
        </p>  
</header>
</form>

<?php


//Facebook
if ($strNetwork == 'facebook') {

  foreach ($id24 as $key => $value24) {
    $facebook_link = $value24["facebook_link"];
    echo "<h3 align='center'><a href= $facebook_link target='_blank' ><button type='button' class='btn btn-primary'>  $strinfliencer_id   $strNetwork</button></a></h3>";

  } ?>

    
  <table border='2' align='center' width='50%' class="table table-bordered table-hover" >
  <thead align='center'   class="table-primary">
  <th >No</th>
  <th>Id_post</th>
  <th>Like</th>
  <th>Comment</th>
  <th>Share</th>
  <th>View</th>
  <th>Createddate_post</th>
  <th>total</th>
</thead>
  <?php
  foreach ($id63 as $key => $value_63) {
    $rawdata_63 = json_decode($value_63["rawdata"]);

    $follower_63 = json_decode($value_63["follower"]);




    $total_sum = array();


    echo "</pre>";
    $i = 1;
    if (!isset($rawdata_63)) {
      echo "<center><h2>No data Found...</h2></center>&nbsp;&nbsp;";
    } else {
      foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) {

        $count_post = 0;
        $total_sum[$key] = $count_post + $value_rawdata->like + $value_rawdata->comment + $value_rawdata->share;
  ?>
              <tr align='center' class="table-light">
              <td><?php echo $i ?></td>
              <td><?php echo "<a href= $value_rawdata->link target='_blank' >$value_rawdata->id_post</a>" ?> </td>
              
              <td><?php echo $value_rawdata->like ?></td> 
              <td><?php echo $value_rawdata->comment ?></td> 
              <td><?php echo $value_rawdata->share ?></td> 
              <td><?php echo @"$value_rawdata->view" ?></td> 
              <td><?php echo @"$value_rawdata->createddate_post" ?></td> 

              <td><?php echo number_format(intval($value_rawdata->like) + intval($value_rawdata->comment) + intval($value_rawdata->share)) ?></td> 
            <?php
        $i++;
      }

      $posts_tot = round(count($rawdata_63));
            ?>
            
            <table border='2' align='center' width='50%' class="table table-bordered">
            <thead  align='center' class="table-primary">
            <th>server_name</th>
            <th>หลังจากลบโพสต์มากสุดและน้อยสุด</th>
            <th>Engage_Average</th>
            <th>follower</th>
            <th>Engage_Rate</th>
            </thead>
            </thead>
            <?php

      if ($posts_tot <= 4) {
        sort($total_sum, SORT_NUMERIC);
        $sum = array_sum($total_sum);
        $engage_average_63 = ($sum / count($total_sum));
        // var_dump($follower_63);



            ?>

                  <tr align='center' class="table-light">
                  
                  <td>122.155.166.63</td>
                  <td><?php echo number_format($sum, 2) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }


      }

      if ($posts_tot > 4 && $posts_tot <= 14) {
        sort($total_sum, SORT_NUMERIC);
        $summ = array_sum($total_sum);
        array_shift($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        $engage_average_63 = @($sum / count($total_sum));


                    ?>
                
                  <tr align='center' class="table-light">
                  <td>122.155.166.63</td>
                  <td><?php echo number_format($sum) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }


      }
      if ($posts_tot > 14) {

        $sum = array_sum($total_sum);
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_shift($total_sum);
        array_pop($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        $engage_average_63 = @($sum / count($total_sum));
                    ?>

                  <tr align='center' class="table-light">
                  <td>122.155.166.63</td>
                  
                  <td><?php echo number_format($sum, 2) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></th>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }

      }



    }




  }
                    ?>
  <table border='2' align='center' width='50%' class="table table-bordered">
  <tr align='center' bgcolor='#CCCCCC'  class="table-primary">
  <th>server_name</th>
  <th>Engage_Average</th>
  <th>Engage_Rate</th>
  <?php
  foreach ($id24 as $key => $value24) {
    $facebook_engage_average = json_decode($value24["facebook_engage_average"]);
    $facebook_engage_rate = json_decode($value24["facebook_engage_rate"]);
  ?>
      
      <tr align='center' class="table-light">
      <td>192.168.11.24</td>
      <td><?php echo number_format($facebook_engage_average, 2) ?></td>
      <td><?php echo number_format($facebook_engage_rate, 2) ?></td>
      <?php
  }


}


// Instagram
else if ($strNetwork == 'instagram') {
  foreach ($id24 as $key => $value24) {
    $instagram_link = $value24["instagram_link"];
    echo "<h3 align='center'><a href= $instagram_link target='_blank'><button type='button' class='btn btn-primary'>  $strinfliencer_id   $strNetwork</button></a></h3>";
  }
      ?>

    
  <table border='2' align='center' width='50%' class="table table-bordered table-hover" >
  <thead align='center'   class="table-primary">
  <th>No</th>
  <th>Id_post</th>
  <th>Like</th>
  <th>Comment</th>
  <th>View</th>
  <th>Createddate_post</th>
  <th>total</th>
</thead>

  <?php

  foreach ($id63 as $key => $value_63) {
    $rawdata_63 = json_decode($value_63["rawdata"]);
    $follower_63 = json_decode($value_63["follower"]);
    $total_sum = array();
    echo "</pre>";
    $i = 1;
    if (!isset($rawdata_63)) {
      echo "<center><h2>No data Found...</h2></center>&nbsp;&nbsp;";
    } else {
      $count_post = 0;
      foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) {
        $total_sum[$key] = $count_post + $value_rawdata->like + $value_rawdata->comment;
  ?>
            <tr align='center' class="table-light">
            <td><?php echo $i ?></td>
            <td><?php echo "<a href= $value_rawdata->link target='_blank' >$value_rawdata->id_post</a>" ?> </td>
            <td><?php echo number_format($value_rawdata->like) ?></td> 
            <td><?php echo number_format($value_rawdata->comment) ?></td>
            <td><?php echo number_format($value_rawdata->view) ?></td> 
            <td><?php echo @($value_rawdata->createddate_post) ?></td> 
            <td><?php echo number_format(intval($value_rawdata->like) + intval($value_rawdata->comment)) ?></td> 
            <?php
        $i++;
      }
      $posts_tot = count($rawdata_63);
            ?>

            <table border='2' align='center' width='50%' class="table table-bordered">
            <thead  align='center' class="table-primary">
            <th>server_name</th>
            <th>หลังจากลบโพสต์มากสุดและน้อยสุด</th>
            <th>Engage_Average</th>
            <th>follower</th>
            <th>Engage_Rate</th>
            </thead>
            <?php

      if ($posts_tot <= 4) {
        sort($total_sum, SORT_NUMERIC);
        $sum = array_sum($total_sum);
        $engage_average_63 = @($sum / count($total_sum));
            ?>

                  <tr align='center' class="table-light">
                
                  <td>122.155.166.63</td>
                
                  <td><?php echo number_format($sum, 2) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }
      }
      if ($posts_tot > 4 && $posts_tot <= 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        $engage_average_63 = @($sum / count($total_sum));
                    ?>
                  <tr align='center' class="table-light">
                  
                  <td>122.155.166.63</td>
                  
                  <td><?php echo number_format($sum, 2) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }
      }
      if ($posts_tot > 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_shift($total_sum);
        array_pop($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        $engage_average_63 = @($sum / count($total_sum));
                    ?>
                  <tr align='center' class="table-light">
                  
                  <td>122.155.166.63</td>
                  
                  <td><?php echo number_format($sum, 2) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }

      }

    }
  }


                    ?>
  <table border='2' align='center' width='50%' class="table table-bordered">
  <thead  align='center' class="table-primary">
  <th>server_name</th>
  <th>Engage_Average</th>
  <th>Engage_Rate</th>
  </thead>
  <?php
  foreach ($id24 as $key => $value24) {
    $instagram_engage_average = json_decode($value24["instagram_engage_average"]);
    $instagram_engage_rate = json_decode($value24["instagram_engage_rate"]);
  ?>
    <tr align='center' class="table-light">
    <td>192.168.11.24</td>
    <td><?php echo number_format($instagram_engage_average, 2) ?></td>
    <td><?php echo number_format($instagram_engage_rate, 2) ?></td>
    <?php
  }
}



//Twitter
else if ($strNetwork == 'twitter') {
  foreach ($id24 as $key => $value24) {
    $twitter_link = $value24["twitter_link"];
    echo "<h3 align='center'><a href= $twitter_link target='_blank'><button type='button' class='btn btn-primary'>  $strinfliencer_id   $strNetwork</button></a></h3>";
  } ?>

    
  <table border='2' align='center' width='50%' class="table table-bordered table-hover" >
  <thead align='center'   class="table-primary">
  <th>No</th>
  <th>Id_post</th>
  <th>Like</th>
  <th>Comment</th>
  <th>retweet</th>
  <th>Createddate_post</th>
  <th>total</th>
  </thead>
  
  <?php
  foreach ($id63 as $key => $value_63) {
    $rawdata_63 = json_decode($value_63["rawdata"]);
    $follower_63 = json_decode($value_63["follower"]);
    $total_sum = array();
    echo "</pre>";
    $i = 1;
    if (!isset($rawdata_63)) {
      echo "<center><h2>No data Found...</h2></center>&nbsp;&nbsp;";
    } else {
      $count_post = 0;
      foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) {
        $total_sum[$key] = $count_post + $value_rawdata->like + $value_rawdata->comment + $value_rawdata->retweet;
  ?>
          <tr align='center' class="table-light">
          <td><?php echo $i ?></td>
          <td><?php echo "<a href= $value_rawdata->link target='_blank' >$value_rawdata->id_post</a>" ?> </td>
          <td><?php echo number_format($value_rawdata->like) ?></td> 
          <td><?php echo number_format($value_rawdata->comment) ?></td> 
          <td><?php echo number_format($value_rawdata->retweet) ?></td> 
          <td><?php echo @$value_rawdata->createddate_post ?></td> 
          <td><?php echo number_format(intval($value_rawdata->like) + intval($value_rawdata->comment) + intval($value_rawdata->retweet)) ?></td> 
          <?php
        $i++;

      }
      $posts_tot = count($rawdata_63); ?>

        <table border='2' align='center' width='50%' class="table table-bordered">
        
          <thead  align='center' class="table-primary">
        <th>server_name</th>
        <th>หลังจากลบโพสต์มากสุดและน้อยสุด</th>
        <th>Engage_Average</th>
        <th>follower</th>
        <th>Engage_Rate</th>
        </thead>
        <?php

      if ($posts_tot <= 4) {
        sort($total_sum, SORT_NUMERIC);
        $sum = array_sum($total_sum);
        $engage_average_63 = @($sum / count($total_sum));


        ?>
              
              <tr align='center' class="table-light">
              
              <td>122.155.166.63</td>
            
              <td><?php echo number_format($sum, 2) ?></td>
              <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
              <td><?php echo number_format($follower_63) ?></td> 
              <?php if ($follower_63 == 0) {
              ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }
      }


      if ($posts_tot > 4 && $posts_tot <= 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        $engage_average_63 = @($sum / count($total_sum));

                    ?>
              <tr align='center' class="table-light">
              
              <td>122.155.166.63</td>
              
              <td><?php echo number_format($sum, 2) ?></td>
              <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
              <td><?php echo number_format($follower_63) ?></td> 
              <?php if ($follower_63 == 0) {
              ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }
      }
      if ($posts_tot > 14) {
        array_shift($total_sum);
        array_shift($total_sum);
        array_pop($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        sort($total_sum, SORT_NUMERIC);
        $engage_average_63 = @($sum / count($total_sum));
                    ?>
              <tr align='center' class="table-light" >
              <td>122.155.166.63</td>
              
              
              <td><?php echo number_format($sum, 2) ?></td>
              <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
              <td><?php echo number_format($follower_63) ?></td> 
              <?php if ($follower_63 == 0) {
              ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }

      }
    }

  }



                    ?>
  <table border='2' align='center' width='50%' class="table table-bordered">
  <thead  align='center' class="table-primary">
  <th>server_name</th>
  <th>Engage_Average</th>
  <th>Engage_Rate</th>
  </thead>
  <?php
  foreach ($id24 as $key => $value24) {
    $twitter_engage_average = json_decode($value24["twitter_engage_average"]);
    $twitter_engage_rate = json_decode($value24["twitter_engage_rate"]);
  ?>
  <tr align='center' class="table-light">
  <td>192.168.11.24</td>
  <td><?php echo number_format($twitter_engage_average, 2) ?></td>
  <td><?php echo number_format($twitter_engage_rate, 2) ?></td>
  <?php
  }
}


//Tiktok
else if ($strNetwork == 'tiktok') {
  foreach ($id24 as $key => $value24) {
    $tiktok_link = $value24["tiktok_link"];
    echo "<h3 align='center'><a href= $tiktok_link target='_blank'><button type='button' class='btn btn-primary'>  $strinfliencer_id   $strNetwork</button></a></h3>";
  } ?>

    
  <table border='2' align='center' width='50%' class="table table-bordered table-hover" >
  <thead align='center'   class="table-primary">
  <th>No</th>
  <th>Id_post</th>
  <th>Like</th>
  <th>Comment</th>
  <th>view</th>
  <th>share</th>
  <th>Createddate_post</th>
  <th>total</th>
</thead>
  <?php
  foreach ($id63 as $key => $value_63) {
    $rawdata_63 = json_decode($value_63["rawdata"]);
    $follower_63 = json_decode($value_63["follower"]);
    $total_sum = array();
    echo "</pre>";
    $i = 1;
    if (!isset($rawdata_63)) {
      echo "<center><h2>No data Found...</h2></center>&nbsp;&nbsp;";
    } else {
      $count_post = 0;
      foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) {
        $total_sum[$key] = $count_post + $value_rawdata->like + $value_rawdata->comment + $value_rawdata->share;
  ?>
            <tr align='center' class="table-light" width='50%'>
            <td><?php echo $i ?></td>
            <td><?php echo "<a href= $value_rawdata->link target='_blank' >$value_rawdata->id_post</a>" ?> </td>
            <td><?php echo number_format($value_rawdata->like) ?></td> 
            <td><?php echo number_format($value_rawdata->comment) ?></td> 
            <td><?php echo number_format($value_rawdata->view) ?></td> 
            <td><?php echo number_format($value_rawdata->share) ?></td> 
            <td><?php echo $value_rawdata->createddate_post ?></td> 
            <td><?php echo number_format(intval($value_rawdata->like) + intval($value_rawdata->comment) + intval($value_rawdata->share)) ?></td>
            <?php
        $i++;
      }
      $posts_tot = count($rawdata_63);
            ?>

          <table border='2' align='center' width='50%'class="table table-bordered">
          <thead  align='center' class="table-primary">
          <th>server_name</th>
          <th>หลังจากลบโพสต์มากสุดและน้อยสุด</th>
          <th>Engage_Average</th>
          <th>follower</th>
          <th>Engage_Rate</th>
          </thead>

          <?php
      if ($posts_tot <= 4) {
        sort($total_sum, SORT_NUMERIC);
        $sum = array_sum($total_sum);
        $engage_average_63 = @($sum / count($total_sum));
          ?>
            <tr align='center' class="table-light">
            
            <td>122.155.166.63</td>
            
            
            <td><?php echo number_format($sum, 2) ?></td>
            <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
            <td><?php echo number_format($follower_63) ?></td> 
            <?php if ($follower_63 == 0) {
            ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }
      }
      if ($posts_tot > 4 && $posts_tot <= 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        $engage_average_63 = @($sum / count($total_sum));
                    ?>
            <tr align='center' class="table-light">
           
            <td>122.155.166.63</td>
            
            <td><?php echo number_format($sum, 2) ?></td>
            <td><?php echo number_format($follower_63) ?></td> 
            <td><?php echo number_format($engage_average_63, 2) ?></td>
            <?php if ($follower_63 == 0) {
            ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }

      }
      if ($posts_tot > 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_shift($total_sum);
        array_pop($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        $engage_average_63 = @($sum / count($total_sum));
                    ?>

            <tr align='center' class="table-light">

            <td>122.155.166.63</td>

            <td><?php echo number_format($sum, 2) ?></td>
            <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
            <td><?php echo number_format($follower_63) ?></td> 
            <?php if ($follower_63 == 0) {
            ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  
                  <?php
        } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    <?php
        }
      }

    }

                    ?>
<table border='2' align='center' width='50%' class="table table-bordered">
<thead  align='center' class="table-primary">
<td>server_name</td>
<td>Engage_Average</td>
<td>Engage_Rate</td>
</thead>
<?php
    foreach ($id24 as $key => $value24) {
      $tiktok_engage_average = json_decode($value24["tiktok_engage_average"]);
      $tiktok_engage_rate = json_decode($value24["tiktok_engage_rate"]);
?>
      <tr align='center' class="table-light">
      <td>192.168.11.24</td>
      <td><?php echo number_format($tiktok_engage_average, 2) ?></td>
      <td><?php echo number_format($tiktok_engage_rate, 2) ?></td>
      <?php
    }
  }
} 
else {

  $i = 1;
      ?>
  
  <table border='2' align='center' width='50%'class="table table-bordered">
  <thead  align='center' class="table-primary">
  <td>No</td>
  <td>Influencer_id</td>
  <td>Network</th>
  <td>Follower</th>
  <td>Post_Total</td>
  <td>Create_Date</td>

  <?php
  foreach ($id25 as $key => $value24) {
    $influencer_id = $value24["influencer_id"];
    $network = $value24["network"];
    $follower = $value24["follower"];
    $post_total = $value24["post_total"];
    $create_date = $value24["create_date"]; ?>
    <tr align='center' class="table-light">
    <td><?php echo $i ?></td>
    <td><?php echo $influencer_id ?></td> 
    <td><?php echo $network ?></td> 
    <td><?php echo number_format($follower) ?></td> 
    <td><?php echo number_format($post_total) ?></td> 
    <td><?php echo $create_date ?></td> 
    <?php
    $i++;
  }
}

    ?>

</body>
</html>