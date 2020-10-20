<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
};
     
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OMES Smart Home Web App: login</title>
    <link rel="icon" type="image/ico" href="/images/thunder.png">
    <meta name="description" content="Home Automation Oladmuni Home App">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/animate2.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="dash-grid/smallscreen.css">
    <link rel="stylesheet" href="dash-grid/widescreen.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="scripts/js/switch.js"></script>   

</head>
<style>
.body {
    background: #cfcfcf7e;
}
.grey{
    background: #cfcfcf7e;
}
</style>
<body onload="startTime()">
    <div id="MainBody" class="dashboard col-4 col-md-10 col-s-12">
        <div class="header col-s-12 col-12">
            <div class="col-8 col-s-8">
                <div class="col-12 hello borderb col-s-12 col-12">
               <?php require '../OMES/scripts/php/read.php'; 
             echo 'Hello' .' '. $row['firstname'] .',';
               ?>
                </div>
                <div class="col-12 welcome-msg borderb col-s-12 col-12">
                    Manage your home.
                </div>
            </div>

            <div class="col-4 col-s-4 user-image">
                <div class="image text-center">
                    <i class="fa fa-user-circle"></i>
                </div>
            </div>
        </div>

        <div class="body col-s-12 col-12">
            <div class="climate col-12 col-s-12 borderb">
                <div class="col-8 col-s-8">
                    <div id="Date" class="col-12 date col-s-12 col-12">
                        <span id="TodayDate"></span><span id=month></span><span id=year></span>
                    </div>
                    <div id="Time" class="col-12 time col-s-12 col-12">

                    </div>
                    <script>
                        function startTime() {
                            var today = new Date();
                            var h = today.getHours();
                            var m = today.getMinutes();
                            var s = today.getSeconds();
                            var Lumi = document.getElementById("Luminous");

                            m = checkTime(m);
                            s = checkTime(s);
                            var currentTime = document.getElementById("Time");
                            var timeStatAm;

                            if (h > 22) {
                                timeStatAm = 'AM';
                                Lumi.classList.add('fa-sun');
                                Lumi.classList.add('grey');
                                Lumi.classList.remove('fa-moon');
                            } else if (h > -1 && h < 12) {
                                timeStatAm = 'AM';
                                Lumi.classList.add('fa-sun');
                                Lumi.classList.remove('fa-moon');
                                Lumi.classList.remove('grey');
                            } else if (h > 11) {
                                timeStatAm = 'PM';
                                Lumi.classList.remove('fa-sun');
                                Lumi.classList.add('fa-moon');
                                Lumi.classList.remove('grey');
                            }
                            
                            currentTime.innerHTML = h + " : " + m + " : " + s + " " + timeStatAm;
                            var t = setTimeout(startTime, 500);

                            var date = document.getElementById("TodayDate");
                            var month = document.getElementById("month");
                            var year = document.getElementById("year");
                            var DD = today.getDate();
                            var YY = today.getFullYear();
                            DD = checkTime(DD);
                            MM = checkTime(MM);

                            myMonth = new Array();
                            myMonth[0] = 'Jan';
                            myMonth[1] = 'Feb';
                            myMonth[2] = 'March';
                            myMonth[3] = 'April';
                            myMonth[4] = 'May';
                            myMonth[5] = 'June';
                            myMonth[6] = 'July';
                            myMonth[7] = 'Aug';
                            myMonth[8] = 'Sept';
                            myMonth[9] = 'Oct';
                            myMonth[10] = 'Nov';
                            myMonth[11] = 'Dec';
                            var d = new Date();
                            var MM = myMonth[d.getMonth()];
                            date.innerHTML = DD;
                            month.innerHTML = ' ' + MM + ', ';
                            year.innerHTML = YY;

                          
                           
                        }

                        function checkTime(i) {
                            if (i < 10) {
                                i = "0" + i
                            };
                            return i;
                        }
                    </script>
                </div>


                <div class="col-4 col-s-4 weather text-center">
                    <div class="energy">
                        <i id="Luminous" class="fa fa-sun"></i>
                    </div>
                </div>
                <div class="col-12 col-s-12 text-center temp">
                    <hr>
                    <h1 class="currentLocation"></h1>
				<p class="currentTemperature" style="font-size: 1.5em"></p>
				<a class="btn btn-lg btn-default btn-celsius">Get Celsius Temp</a>
				<a class="btn btn-lg btn-default btn-fahrenheit">Get Fahrenheit Temp</a>
                    <div class="col-4 col-s-4 indoor-temp">
                        <span class="green">0`C</span> <br> <span class="temp-text">Indoor Temp</span>
                    </div>
                    <div class="col-4 col-s-4 outdoor-temp">
                        <span class="green">0`C</span> <br> <span class="temp-text">Outdoor Temp</span>
                    </div>
                    <div class="col-4 col-s-4 ideal-temp">
                        <span class="green">0`C</span> <br> <span class="temp-text">Ideal Temp</span>
                    </div>
                </div>
            </div>

            <div class="rooms col-12 col-s-12 text-center">
                <div id="KitchenBtn" onclick="openKitchen()" class="kitchen active-room room-block borderb">
                    <i class="fa fa-utensils"></i> Kitchen
                </div>
                <div id="LivingBtn" onclick="openLiving()" class="living-room room-block borderb">
                    <i class="fa fa-couch"></i> Living Room
                </div>
                <div id="BedBtn" onclick="openBed()" class="bedroom room-block borderb">
                    <i class="fa fa-bed"></i> Bedrooms
                </div>
                <div id="ToiletBtn" onclick="openToilet()" class="toilet room-block borderb">
                    <i class="fa fa-toilet"></i> Toilets
                </div>
            </div>
            <div class="dev col-12 col-s-12">
                <div id="KitchenDev" class="kitchen-dev room-dev text-center col-12 col-s-12">
                    <div class="col-12 col-s-12 device mb text-left">
                        <i class="fa fa-list"></i> Devices<span id="DevNo">(0)</span>
                    </div>
                    <div onclick="openKitchenLight()" class="room-block-inner float-left">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-lightbulb"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 Lights
                        </div>
                    </div>
                    <div onclick="openKitchenAc()" class="room-block-inner float-right">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-wind"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 AC
                        </div>
                    </div>
                </div>
                <div id="LivingDev" class="living-dev room-dev text-center col-12 col-s-12">
                    <div class="col-12 col-s-12 device mb text-left">
                        <i class="fa fa-list"></i> Devices<span id="DevNo">(0)</span>
                    </div>
                    <div class="room-block-inner float-left">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-lightbulb"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 Lights
                        </div>
                    </div>
                    <div class="room-block-inner float-right">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-wind"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 AC
                        </div>
                    </div>
                    <div class="room-block-inner mt float-left">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-fan"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 Fans
                        </div>
                    </div>
                    <div class="room-block-inner mt float-right">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-plug"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 Sockets
                        </div>
                    </div>
                </div>
                <div id="BedDev" class="bedroom-dev room-dev text-center col-12 col-s-12">
                    <div class="col-12 col-s-12 device mb text-left">
                        <i class="fa fa-list"></i> Devices<span id="DevNo">(0)</span>
                    </div>
                    <div class="room-block-inner float-left">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-lightbulb"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 Lights
                        </div>
                    </div>
                    <div class="room-block-inner float-right">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-wind"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 AC
                        </div>
                    </div>
                    <div class="room-block-inner mt float-left">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-fan"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 Fans
                        </div>
                    </div>
                    <div class="room-block-inner mt float-right">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-plug"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 Sockets
                        </div>
                    </div>
                </div>
                <div id="ToiletDev" class="toilet-dev room-dev text-center col-12 col-s-12">
                    <div class="col-12 col-s-12 device mb text-left">
                        <i class="fa fa-list"></i> Devices<span id="DevNo">(0)</span>
                    </div>
                    <div class="room-block-inner float-left">
                        <div class="col-12 col-s-12 green text-center">
                            <i class="fa fa-lightbulb"></i>
                        </div>
                        <div class="mt col-12 col-s-12 text-center">
                            0 Lights
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kitchenLight" class="kitchen-light room-control col-12 col-s-12">
            <div class="room-control-header col-12 col-s-12">
                <div class="text-left col-2 col-s-2"><i onclick="closeKitchenLight()" class="fa fa-long-arrow-alt-left"></i></div>
                <div class="text-center col-8 col-s-8"><i class="fa fa-utensils"></i> Kitchen</div>
                <div class="text-left col-2 col-s-2">. . .</div>
                <div class="room-dev-grid pt">
                    <div class="room-device-control">
                   
                    <?php
$file = "connection_Rpi/buttonStatus.txt";
$handle = fopen($file,'w+');
if (isset($_POST['on']))
{
$onstring = "ON";
fwrite($handle,$onstring);
fclose($handle);

}
else if(isset($_POST['off']))
{
$offstring = "OFF";
fwrite($handle, $offstring);
fclose($handle);
}?>
                        <form id="myForm" name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="room-device-title slideanim">
                                Light 1
                            </div>
                            <div class="device-control-button text-center on-button col-6 col-s-6">
                            <button type="submit" name="on" id="on">On</button>
                            </div>
                            <div class="device-control-button text-center off-button col-6 col-s-6">
                                <button type="submit" name="off" id="off">Off</button>
                            </div>
                        </form>                        
                    </div>
                    <div class="room-device-control">
                        <form >
                            <div class="room-device-title slideanim">
                                Light 2
                            </div>
                            <div class="device-control-button text-center on-button col-6 col-s-6">
                                <button type="submit" name="on" id="on">On</button>
                            </div>
                            <div class="device-control-button text-center off-button col-6 col-s-6">
                                <button type="submit" name="off" id="off">Off</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="Air" class="kitchen-ac room-control col-12 col-s-12">
            <div class="room-control-header col-12 col-s-12">
                <div class="text-left pointer col-2 col-s-2"><i onclick="closeKitchenAc()" class="fa fa-long-arrow-alt-left"></i></div>
                <div class="text-center col-8 col-s-8"><i class="fa fa-utensils"></i> Kitchen</div>
                <div class="text-left pointer col-2 col-s-2">. . .</div>
            </div>
            ac

        </div>

        <div class="footer text-center col-s-12 col-12">
            <div class="col-3 col-s-3">
                <i class="fa green fa-home"></i>
            </div>
            <div class="col-3 col-s-3">
                <i class="fa fa-comment"></i>
            </div>
            <div class="col-3 col-s-3">
                <i class="fa fa-heart"></i>
            </div>
            <div class="col-3 col-s-3">
            <a href="../OMES/scripts/php/logout.php"><i class="fa fa-gear"></i></a>
            </div>
        </div>



    </div>
    <script src="scripts/js/rooms.js"></script>
    <script src="scripts/js/kitchen.js"></script>
    <script src="scripts/js/float-panel.js"></script>   
    <script>
        $("#myForm").on("submit", function() {    
    $.ajax({
        type: "POST",
        url: "../../connection_Rpi/switch.php",           
      }
    });
});
    </script>    

</body>

</html>