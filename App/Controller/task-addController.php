<?php
    require "../UTILS/DatabaseUtils.php";
    require "../Model/Person.php";
    require "../Controller/mailController.php";

 $obj = new DatabaseUtils();
 $handler = $obj->connect();

$personObj = new Person(null, $_POST['fName'], $_POST['lName'], $_POST['email']);
$statement = $handler->prepare("insert into `person` (`firstName`, `lastName`, `email`)
			                          values (:firstName, :lastName, :email)");

$statement->bindValue(':firstName', $personObj->getFirstName(), PDO::PARAM_STR);
$statement->bindValue(':lastName', $personObj->getLastName(), PDO::PARAM_STR);
$statement->bindValue(':email', $personObj->getEmail(), PDO::PARAM_STR);
$statement->execute();
//email settings
$send_who_mail = "lizirukh@gmail.com";
$subject = "This is subject";
$body = "<h1>new user has just registered</h1>>";
$body.= "<h3> firstName: ".$personObj->getFirstName()."  </h3>";
$body.= "<h3> lastName: ".$personObj->getLastName()."  </h3>";
$body.= "<h3> email: ".$personObj->getEmail()."  </h3>";

send_email($send_who_mail, $subject, $body);























 /*
  *

if ($personObj->connect_error) {
    die("Connection failed: " . $personObj->connect_error);
}

$sql = "INSERT INTO person (firstName, lastName, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($personObj->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $personObj->error;
}

$personObj->close();
*/

 /*
 $statement = $handler->prepare("INSERT INTO 'person' ('firstName', 'lastName', 'email') VALUES(:firstName,:lastName, :email)");
 $statement->bindValue(':firstName', $obj->getfName, PDO::PARAM_STR);
 $statement->bindValue(':lastName', $obj->getlName, PDO::PARAM_STR);
 $statement->bindValue(':email', $obj->getemail, PDO::PARAM_STR);
 $statement->execute();
echo 'success';
*/