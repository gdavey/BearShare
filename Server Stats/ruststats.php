<!DOCTYPE html>
<html>
<head>
<title>PvP LeaderBoard</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <style>
  .table-dark {
     color: #000;
     background-color: #fff;
  }
  .table-dark td, .table-dark th, .table-dark thead th {
     border-color: #15151e;
     text-transform: uppercase;
  }
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
     padding: 8px;
     line-height: 1.42857143;
     vertical-align: top;
     border-top: 1px solid #fff;
     text-align: left;
  }
  span.circle-txt {
     
     border-radius: 30px;
   background-color: #eaeaea;
     padding: 0.5rem 0.75rem;
     text-transform: uppercase;
   padding-left: 20px;
     padding-right: 20px;
  }
  td.round {
     text-align: center;
   font-weight: 600;
     padding: 0.5rem;
  }
  th {
     font-weight: 100;
  }
  .tribe {
     text-transform: capitalize;
     margin-left: 0.75rem;
     color: #33e0ff;
   font-size: 12px;
     letter-spacing: initial;
  }
  span.player {
     padding-left: 1rem;
   font-size: 20px;
     letter-spacing: 0.05rem;
     text-transform: uppercase;
  }
  span.player.\31 {
     border-left: 4px solid goldenrod;
  }
  span.player.\32 {
     border-left: 4px solid grey;
  }
  span.player.\33 {
     border-left: 4px solid #f2ec59;
  }
	  .imgIconWrap {
    width: 300px;
    margin: auto;
		  text-align:center;
}
	  .iconinnerWrap {
    border: 1px solid #eaeaea;
    padding: 15px;
    margin: 0 0 60px;
}
	  h3, .h3 {
    font-size: 26px;
}
	  .imgIconWrap .h4 {
    text-align: center;
    color: #3de2ff;
		      font-size: 13px
}
	  h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
    color: #000;
    text-transform: uppercase;
}
	</style>
</head>
<body>
<div class="container">

                  <h1>Stats</h1>


                          <?php
                          // CHANGE ME BELOW
                             $servername = "";
                             $username = "";
                             $password = "";
                             $dbname = "";
                          // ENG OF CHANGE ME
                             

                             // Create connection
                             $conn = new mysqli($servername, $username, $password, $dbname);
                             // Check connection
                             if ($conn->connect_error) {
                               die("Connection failed: " . $conn->connect_error);
                             }

                  
                  // Top 50 Kills           
                  $sql = "SELECT * FROM `playerranksdb` ORDER by PVPKills DESC LIMIT 50";
                  $result = $conn->query($sql); 
                  //Top kills
                  $killspvp = "SELECT * FROM `playerranksdb` ORDER BY `playerranksdb`.`PVPKills` DESC LIMIT 1";
                  $kills = $conn->query($killspvp);
                  // Gather
                  $gatherssql = "SELECT * FROM `playerranksdb` ORDER BY `playerranksdb`.`ResourcesGathered` DESC LIMIT 1";
                  $gathers = $conn->query($gatherssql);
                  // Builder
                  $builderssql = "SELECT * FROM `playerranksdb` ORDER BY `playerranksdb`.`StructuresBuilt` DESC LIMIT 1";
                  $builders = $conn->query($builderssql);
                  // Helli
                  $hellissql = "SELECT * FROM `playerranksdb` ORDER BY `playerranksdb`.`HeliKills` DESC LIMIT 1";
                  $hellis = $conn->query($hellissql);
                  // Bradley
                  $bradleyssql = "SELECT * FROM `playerranksdb` ORDER BY `playerranksdb`.`APCKills` DESC LIMIT 1";
                  $bradleys = $conn->query($bradleyssql);
                  // Play time
                  $timessql = "SELECT * FROM `playerranksdb` ORDER BY `playerranksdb`.`TimePlayed` DESC LIMIT 1";
                  $times = $conn->query($timessql);
                  
                  // Return Results
                  $time = $times->fetch_row();
                  $bradley = $bradleys->fetch_row();
                  $helli = $hellis->fetch_row();
                  $builder = $builders->fetch_row();
                  $gather = $gathers->fetch_row();
                  $kill = $kills->fetch_row();
                       echo "<div class=\"iconWrap\">
                         <div class=\"row\">                        
                           <div class=\"col-xs-6 col-sm-4\">
                             <div class=\"iconinnerWrap\">
                               <div class=\"imgIconWrap\">
                                 <img width=\"182\" height=\"182\" class=\"img img-responsive iconImg larger-height ls-is-cached lazyloaded\" src=\"https://merric-gaming.co.uk/wp-content/uploads/2021/03/crosshair.png\">                  
                                 <div class=\"h3 text-center\">Most Kills</div>
                                 <div class=\"h4\">".$kill[1]."<span class=\"h5 text-center\"> - ".$kill[2]."</span></div>
                               </div>
                             </div>
                           </div>
                           <div class=\"col-xs-6 col-sm-4\">
                             <div class=\"iconinnerWrap\">
                               <div class=\"imgIconWrap\">
                                 <img width=\"182\" height=\"182\" class=\"img img-responsive iconImg larger-height ls-is-cached lazyloaded\" src=\"https://merric-gaming.co.uk/wp-content/uploads/2021/03/hammer.png\">                  
                                 <div class=\"h3 text-center\">Most Gathered</div>
                                 <div class=\"h4\">".$gather[1]."<span class=\"h5 text-center\"> - ".$gather[33]."</span></div>
                               </div>
                             </div>
                           </div>           
                           <div class=\"col-xs-6 col-sm-4\">
                             <div class=\"iconinnerWrap\">
                               <div class=\"imgIconWrap\">
                                 <img width=\"182\" height=\"182\" class=\"img img-responsive iconImg larger-height ls-is-cached lazyloaded\" src=\"https://merric-gaming.co.uk/wp-content/uploads/2021/03/house-1.png\">                  
                                 <div class=\"h3 text-center\">Top Builder</div>
                                 <div class=\"h4\">".$builder[1]."<span class=\"h5 text-center\"> - ".$builder[28]."</span></div>
                               </div>
                             </div>
                           </div>
                           <div class=\"col-xs-6 col-sm-4\">
                             <div class=\"iconinnerWrap\">
                               <div class=\"imgIconWrap\">
                                 <img width=\"182\" height=\"182\" class=\"img img-responsive iconImg larger-height ls-is-cached lazyloaded\" src=\"https://merric-gaming.co.uk/wp-content/uploads/2021/03/helicopter.png\">                  
                                 <div class=\"h3 text-center\">Helli Kills</div>
                                 <div class=\"h4\">".$helli[1]."<span class=\"h5 text-center\"> - ".$helli[19]."</span></div>
                               </div>
                             </div>
                           </div> 
                           <div class=\"col-xs-6 col-sm-4\">
                             <div class=\"iconinnerWrap\">
                               <div class=\"imgIconWrap\">
                                 <img width=\"182\" height=\"182\" class=\"img img-responsive iconImg larger-height ls-is-cached lazyloaded\" src=\"https://merric-gaming.co.uk/wp-content/uploads/2021/03/bradley.png\">                  
                                 <div class=\"h3 text-center\">Bradley Kills</div>
                                 <div class=\"h4\">".$bradley[1]."<span class=\"h5 text-center\"> - ".$bradley[21]."</span></div>
                               </div>
                             </div>
                           </div> 
                           <div class=\"col-xs-6 col-sm-4\">
                             <div class=\"iconinnerWrap\">
                               <div class=\"imgIconWrap\">
                                 <img width=\"182\" height=\"182\" class=\"img img-responsive iconImg larger-height ls-is-cached lazyloaded\" src=\"https://merric-gaming.co.uk/wp-content/uploads/2021/03/clock.png\">                  
                                 <div class=\"h3 text-center\">Top Playtime</div>
                                 <div class=\"h4\">".$time[1]."<span class=\"h5 text-center\"> - ".$time[36]."</span></div>
                               </div>
                             </div>
                           </div>  


                         </div>
                        </div>";


                         
                             
                   if ($result->num_rows > 0) {
                                echo " <div class=\"container-fluid\" style=\"background-color:#fff;\">
                          <div class=\"row\">
                          <table class=\"table table-dark\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                                        <thead>
                                          <tr>
                                          <th>POS</th>
                                          <th>Player Name</th>
                                          <th>KILLS</th>
                                          <th>DEATHS</th>
                                          <th>KDR</th>
                                          <th>Headshots</th>
                                          <th>NPC Kills</th>
                                          <th>PLAY TIME</th>
                                          </tr>
                                        </thead>
                            
                                        <tbody>";
                                        
                                
                                $counter = 0;
                               // output data of each row
                               while($row = $result->fetch_assoc()) {
                                ++$counter;
                      
                                  echo "<tr>
                                            <td># $counter</td>
                                            <td><span class=\"player $counter\"><a class=\"black\" href=\"http://steamcommunity.com/profiles/".$row["UserID"]."\">".$row["Name"]."</a></span><span class=\"tribe\">".$row["Clan"]."</span></td>
                                            <td class=\"round\"><span class=\"circle-txt\">".$row["PVPKills"]."</span></td>
                                            <td class=\"round\"><span class=\"circle-txt\">".$row["Deaths"]."</span></td>
                                            <td class=\"round\"><span class=\"circle-txt\">".$row["KDR"]."</span></td>
                                            <td class=\"round\"><span class=\"circle-txt\">".$row["HeadShots"]."</span></td>
                                            <td class=\"round\"><span class=\"circle-txt\">".$row["NPCKills"]."</span></td>
                                            <td class=\"round\"><span class=\"circle-txt\">".$row["TimePlayed"]."</span></td>
                                        </tr>";
                               
                               }
                             } else {
                               echo "0 results";
                             }
                             $conn->close();
                           ?>
      </div>
    </div>
  </div>
</body>
</html>