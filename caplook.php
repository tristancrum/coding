<!doctype html>


<html>
  <head>
    <meta charset="utf-8">
    <title>Search</title>
  </head>
  <body>

    <div class="search-form">
      <form action="" method="get">
        <label>search
          <input type="search" name="keywords" placeholder="Enter your address..." autocomplete="off" required>
        </label>
          <input type="submit" value="Search">
        </div>
      </form>
    </div>

      <div class="results-count">
        <p>
      </div>
      <div class="results-table">

          <div class="result">

          </div>

      </div>
    </body>
    </html>
    <?php
    require_once '10.110.2.50/apps/db/connect.php';

    if(isset($_GET['keywords'])) {

        $keywords = $db->escape_string($_GET['keywords']);

        $query = $db->query("
        SELECT address, day, route
        FROM area
        WHERE address LIKE '%{$keywords}%'
      ");
    ?>

    <div class="result-count">
      Found <?php echo $query->num_rows; ?> results.
    </div>



    <?php

    if($query->num_rows) {
      while($r = $query->fetch_object()) {
    ?>
    <div class="result">
      <?php
      if($r->route == 'B'){
        echo $r->address . " <b>/</b> " . $r->day . "<font color='blue'><b>/ WEEK</b></font>" . " " . "<font color='blue'><b>$r->route</b></font>"; if($r)
        $variable = mysql_real_escape_string(stripslashes(trim($_GET['keywords'])));
      }
      else{
        echo $r->address . " <b>/</b> " . $r->day . "<font color='#ead206'><b>/ WEEK</b></font>" . " " . "<font color='#ead206'><b>$r->route</b></font>"; if($r)
        $variable = mysql_real_escape_string(stripslashes(trim($_GET['keywords'])));
      }
      ;
      ?>

    </div>

      <?php
      }
    }

    }
