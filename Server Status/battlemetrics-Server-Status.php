<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<body>
<div class="wrapper">
        <div class="container">
            <div class="row">
<?php

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
// Replace XXXXXX by your server id on battlemetrics.com
$server_id = array("xxx","xxx","xxx","xxx","xxx","xxx","xxx","xxx","xxx");

foreach ($server_id as $key => $value) {
  
// Execute curl and get server informations
$url="https://api.battlemetrics.com/servers/".$value;
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=json_decode(curl_exec($ch), true);
curl_close($ch);


if ($result){
 ?>

                <div class="col-md-6 col-lg-4">
                    <div class="card mx-30">
                        <img alt="..." class="card-img-top" src="<?php echo $result['data']['attributes']['details']['rust_headerimage']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $result['data']['attributes']['name']; ?></h5>
                            <h6><?php  echo $result['data']['attributes']['ip']; echo ":"; echo $result['data']['attributes']['port']; ?></h6>
                            <p class="card-text"><strong>Players:</strong> <?php echo $result['data']['attributes']['players']; echo "/"; echo $result['data']['attributes']['maxPlayers'];?> <br />
                            	<strong>Last Wipe:</strong> <?php echo time_elapsed_string($result['data']['attributes']['details']['rust_last_wipe']);  ?> <br />
                            	<strong>BM Rank:</strong> <?php echo $result['data']['attributes']['rank']; ?>
                            </p>
                            <div class="socials">
                                <a href="steam://connect/<?php  echo $result['data']['attributes']['ip']; echo ":"; echo $result['data']['attributes']['port']; ?>"><i class="fa fa-steam"></i></a> 
                                <a href="https://rustmaps.com/map/<?php  echo $result['data']['attributes']['details']['rust_world_size']; echo "_"; echo $result['data']['attributes']['details']['rust_world_seed']; ?>"><i class="fa fa-map"></i></a> 
                            </div>
                        </div>
                    </div>
                </div>
            

<?
} else {
  echo "server not found 1";
}

}

?>
</div>
        </div>
    </div>
</body>
</html>