<?php

//Use from openCon

$DBHOST = $dbServer;
$DBDATABASE = $dbDatabase;
$DBUSER = $dbUserName;
$DBPASSWORD = $dbPassword;



/**
 * Database PDO Functions.
 */
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__))
    exit;

//connect to the database.
try {
    $connection = new PDO("mysql:host=$DBHOST;dbname=$DBDATABASE;", "$DBUSER", "$DBPASSWORD");

    //Set MySQL Timezone to Match PHP Timezone specified in Config.
    $objDT = new DateTime();
    $offset = $objDT->getOffset();
    $offsetHours = round(abs($offset) / 3600);
    $offsetMinutes = round((abs($offset) - $offsetHours * 3600) / 60);
    $offsetString = ($offset < 0 ? '-' : '+');
    $offsetString .= (strlen($offsetHours) < 2 ? '0' : '') . $offsetHours;
    $offsetString .= ':';
    $offsetString .= (strlen($offsetMinutes) < 2 ? '0' : '') . $offsetMinutes;
    $connection->exec("SET time_zone = '{$offsetString}'");
} catch (PDOException $ex) {
    echo "Unable to connect to the database.<pre>"; //user friendly message
    print_r($ex->getMessage());
    echo "</pre>";
}

//Reader Functions
function SelectRecord($sql, $params) {

    //returns a single row or 0 if error
    global $connection;

    $stmt = $connection->prepare($sql);
    $stmt->execute($params);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $e = $stmt->errorInfo();
    errorLog(array("PDO exec:", $stmt, $params, $stmt->errorInfo(), $row));
    if ($e[2] == "") {
        return $row;
    } else {
        return "DB Error.<pre>" . $e[2] . "</pre>"; //descriptive error message
    }
}

function SelectRecordSet($sql, $params) {
    //returns a record set (array) or 0 if error
    global $connection;

    $stmt = $connection->prepare($sql);
    $stmt->execute($params);
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $e = $stmt->errorInfo();
    errorLog(array("PDO exec:", $stmt, $params, $stmt->errorInfo(), $rs));
    if ($e[2] == "") {
        return $rs;
    } else {
        return "DB Error.<pre>" . $e[2] . "</pre>"; //descriptive error message
    }
}

// Data Manipulation Functions
function UpdateData($sql, $params) {

    global $connection;

    $stmt = $connection->prepare($sql);
    $stmt->execute($params);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $e = $stmt->errorInfo();
    errorLog(array("PDO exec:", $stmt, $params, $stmt->errorInfo()));
    if ($e[2] == "") {
        return "";
    } else {
        return "DB Error.<pre>" . $e[2] . "</pre>"; //descriptive error message
    }
}

function InsertData($sql, $params) {

    //Inserts record into table and returns new primary key or error message if fails.
    global $connection;

    $stmt = $connection->prepare($sql);
    $stmt->execute($params);
    $e = $stmt->errorInfo();
    errorLog(array("PDO exec:", $stmt, $params, $stmt->errorInfo(), $connection->lastInsertId()));
    if ($stmt->errorCode() == "00000") {
        return $connection->lastInsertId();
    } else {
        return "DB Error.<pre>" . $e[2] . "</pre>"; //descriptive error message
    }
}

function DeleteData($sql, $params) {

    //NOT YET IMPLEMENTED
    global $connection;
    try {

        $stmt = $connection->prepare($sql);
        $stmt->execute($params);
        $affected_rows = $stmt->rowCount();
        return $affected_rows; // any number >= 0
    } catch (PDOException $ex) {

        $e = "DB Error.<pre>"; //user friendly message
        $e .= $ex->getMessage();
        $e .= "</pre>";
        return $e; //error.
    }
}

function errorLog($msg) {
    global $DEBUG;
    global $LOGFILE;
    if ($DEBUG) {
        $time = date("g:i:sa");
        $ip = $_SERVER['REMOTE_ADDR'];
        $string = $time . ":" . $ip . ":" . var_export($msg, true) . "\n";
        error_log($string, 3, $LOGFILE);
    }
}

?>
