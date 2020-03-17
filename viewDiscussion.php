<?php

if(isset($_REQUEST["Delete"])){
    $hid = $_POST["id"];
    $fileset=file("messagesOOP.txt");           // file function reads entire file into an array
    $len=count($fileset);
    for($i=0;$i<$len;$i++)
    {

        if($i==$hid)
        {
            $fileset[$i]="";
            break;                               //then we will stop searching
        }
    }
    $fileset_improve=implode($fileset);             //implode- join array elements with a string
    $handle=fopen("messagesOOP.txt","w");           //opening your file in write mode
    fwrite($handle,$fileset_improve);               //writing file with improved lines
    fclose($handle);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel = "stylesheet" type = "text/css" href = "stylesheet.css" />
</head>
<body>
<div class="main"> <br>
    <h1>Guestbook Entries</h1>
    <table >
        <colgroup span="1" width="5%" allign="center" />
              
        <?php
        include("forumEntry.php");

        if (!file_exists("messagesOOP.txt") || filesize("messagesOOP.txt") == 0)
        {
            echo "<p>There are no messages posted <p>";
        }
        else
        {
            $MessageArray = file("messagesOOP.txt");
            for ($i=0; $i <count($MessageArray); $i++)
            {
                $CurrentObject = unserialize($MessageArray[$i]);
                echo "<tr id=row>";
                //echo "<td> <strong>" . ($i + 1) . "</strong> . </td>";
                echo "<td> <strong> Topic </strong>: " . stripslashes($CurrentObject->getTopic()) . "<br>";
                echo "<strong> Name </strong>: " . stripslashes($CurrentObject->getName()) . "<br>";
                echo "<strong> Date - Time </strong>: " . date("Y M d - H:i", $CurrentObject->getTimeStamp()) . "<br>";
                echo "<strong> Message </strong>: " . stripslashes($CurrentObject->getMessage()). "<br>";
                echo "<form method=post>
                <input  name='id' type=hidden value='$i' >
                <input id='knapp'  name=Delete type='submit' value='Delete'>
                </form>";
                echo "</td> </tr>";
            }
        }
        ?>  

    </table>
    <p><form action="index.php" method="post">
        <input id="knapp" type="submit" value="New Entry">
    </form> <br></p>
    <hr />
</div>
</body>
</html>





