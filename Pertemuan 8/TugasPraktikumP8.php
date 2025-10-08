<?php
//Multiple Exception Class
class customException extends Exception {
    public function errorMessage() {
        //error message
        $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
        .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}

$emails = array (
    "lab4a@polsub.ac.id",
    "lab4b@polsub.ac.id",
    "lab4c@polsub.ac.id",
    "lab4d@polsub.ac.id",
    "lab5a@polsub.ac.id",
    "lab5b@polsub.ac.id",
    "lab5c@polsub.ac.id",
    "admin@polsub.ac.id"
);

$lab4Count = 0;
$lab5Count = 0;
$invalidCount = 0;

foreach ($emails as $email) {
try {
    //check if
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //throw exception if email is not valid
        throw new customException("Format email tidak valid: " . $email);
    }

    //check for "example" in mail address
    if(stripos($email, "lab4") !== FALSE) {
         echo $email . "mengandung kata 'lab4' dan E-mail valid<br>";
        $lab4Count++;

        }
        elseif (stripos($email, "lab5") !== FALSE) {
            echo $email . "mengandung kata 'lab5' dan E-mail valid<br>";
            $lab5Count++;
        }
        else {
            throw new customException("$email bukan termasuk lab4/lab5");
        } 
    }

    catch (customException $e) {
        echo $e->errorMessage();
        $invalidCount++;
    }
}

echo "</br></br> Terdapat $lab4Count email lab 4 dan $lab5Count email lab 5<br>";
echo "Terdapat $invalidCount email bukan lab4/5<br>";
?>