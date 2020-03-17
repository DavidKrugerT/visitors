
<div>
    <h1>Messages Posted</h1>
    <hr />
    <?php
    include("forumEntry.php");

    if (isset($_POST['addEntry']))
    {
        if(strlen($_REQUEST["name"])>0)
        {

            // Create three variables to recieve the form's input
            $Name = $_POST["name"];
            $Topic = $_POST["topic"];
            $Message = $_POST["message"];



            // Instantiate a new object to hold the data
            $TheEntry = new ForumEntry();

            //Fill the new object's data fields
            //Check for blank entries. If blank, do not set the
            //field values and leave the constructors()'s initial values there
            if ($Name != "")
            {
                $TheEntry->setName($Name);
            }
            if ($Topic != "")
            {
                $TheEntry->setTopic($Topic);
            }
            if ($Message != "")
            {
                //Get rid of the \n because they will break the program when unserializing
                $scrubbedMsg = str_replace("\n", " " , $Message);
                $TheEntry->setMessage($Message);
            }

            //Note that the MyTimeStamp field was already set by calling the php
            //function time() with the object's constructors

            //Serialize the object (convert its data to a string)
            $MySavedObject = serialize($TheEntry);

            //Open the file: messageOOP.txt for an append edit
            $MessageFileHandle = fopen("messagesOOP.txt", "a");

            //Write the serialized data to the file.
            fwrite($MessageFileHandle, $MySavedObject . "\n");

            //All opened files must be closed
            fclose($MessageFileHandle);
            echo "<p> <string> Topic </strong>: $Topic <br>";
            echo "<p> <string> Name </strong>: $Name <br>";
            echo "<p> <string> Message </strong>: $Message <br>";
        }
        else
        {
            echo "Don't leave it blank...";
        }
    }

    ?>
    <hr />

    <form class="" action="index.php" method="post">

    </form>
    <p>
    <form method="post">
        <input id="knapp" type="submit" value="New Entry">
    </form>
    <br>
    <form action="viewDiscussion.php" method="post">
        <input id="knapp" type="submit" value="Guestbook">
    </form> <br>
    </p>
</div>
