<?php
if (isset($_COOKIE['avaibleFly']) && $_COOKIE['avaibleFly'])
    $avaibleFly = json_decode($_COOKIE['avaibleFly'], true);

if (isset($_COOKIE['requestFly']))
    $requestFly = json_decode($_COOKIE['requestFly'], true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>View Fly - Road Trip</title>
    <!--CDN-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <!--FILE JS-->
    <script src="../engine/client/script.js" defer></script>
    <!--STYLE-->
    <link rel="stylesheet" href="../assets/style/flyPage.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700,900&display=swap" rel="stylesheet" />
</head>

<body class="bg-slate-200 min-h-screen">
    <?php require_once("../assets/components/user/header.php"); ?>
    <div class="relative" style="top: -50px">
        <div class="relative w-3/5 bg-blue-500 floating-header-hero">
                <div class="w-44">
                    <p>Partenza:</p>
                    <p><?php echo $requestFly['departure']; ?></p>
                </div>
                <div class="w-44">
                    <p>Arrivo: </p>
                    <p><?php echo $requestFly['destination']; ?></p>
                </div>
                <div class="w-44">
                    <p>Data Partenza:</p>
                    <p><?php echo date("g-m-Y", strtotime($requestFly['departureDate'])); ?></p>
                </div>
                <div class="w-44">
                    <p>Data Ritorno:</p>
                    <p><?php echo $requestFly['returnDate'] != "one way" ? date("g-m-Y", strtotime($requestFly['departureDate'])) : "nessuna data di ritorno"; ?>
                    </p>
                </div>
        </div>

        <div class="pt-20 w-4/5 mx-auto py-6 flex px-10 items-center bg-slate-300 relative rounded-lg grid grid-cols-1 grid-row-1" id="formFlySchedule">
            <?php
                $flag = true;
                foreach($avaibleFly as $day){
                    $date = date('Y-m-d',strtotime($day[0]['DataPartenza']));
                    if($date != $requestFly['departureDate'] && $flag){
                        echo '<div class="grid grid-cols-1">';
                        require('../assets/components/user/errorCard.php');
                        echo '</div>';
                    }
                    $flag = false;


                    require('../assets/components/user/separatorDate.php');

                    echo '<div class="grid grid-cols-2 gap-2" id="flySection">';
                    foreach($day as $fly)
                        require('../assets/components/user/flyCard.php');
                    echo '</div>';
                    
                }
            ?>
        </div>
    </div>
    </div>
    <?php require_once('../assets/components/user/footer.php'); ?>
</body>

</html>