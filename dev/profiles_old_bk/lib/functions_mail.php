<?php
include('openCon.php');
function emailToCustomer($email, $password, $name, $pid) {
    $Query = mysql_query("SELECT * FROM auto_email WHERE ae_id=1");
    $results = mysql_num_rows($Query);
    if($results>0){
        $em_row = mysql_fetch_object($Query);
        $fromMail = $em_row->ae_from;
        $subject  = $em_row->ae_subject;

        $message = str_replace("[NAME]", $name, $em_row->ae_text);
        $message = str_replace("[EMAIL]", $email, $message);
        $message = str_replace("[PASSWORD]", $password, $message);
        $message = str_replace("[PROFILEID]", $pid, $message);
        $message = '<html><head><title>'.$subject.'</title></head><body> '. $message .' </body></html>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Guest Services <guestservices@talonlodge.com>' . "\r\n";

        @mail($email, $subject, $message, $headers);
        @mail("guestservices@talonlodge.com", $subject, $message, $headers);
    }
}
function emailToGroupLeader($email, $password, $name, $pid) {
    $Query = mysql_query("SELECT * FROM auto_email WHERE ae_id=2");
    $results = mysql_num_rows($Query);
    if($results>0){
        $em_row = mysql_fetch_object($Query);
        $fromMail = $em_row->ae_from;
        $subject  = $em_row->ae_subject;

        $message = str_replace("[NAME]", $name, $em_row->ae_text);
        $message = str_replace("[EMAIL]", $email, $message);
        $message = str_replace("[PASSWORD]", $password, $message);
        $message = str_replace("[PROFILEID]", $pid, $message);
        $message = '<html><head><title>'.$subject.'</title></head><body> '. $message .' </body></html>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Guest Services <guestservices@talonlodge.com>' . "\r\n";

        @mail($email, $subject, $message, $headers);
        @mail("guestservices@talonlodge.com", $subject, $message, $headers);
    }
}
function profile_completed_updated($email, $name, $pid, $grp, $glname, $comp_upd) {
    $Query = mysql_query("SELECT * FROM auto_email WHERE ae_id=3");
    $results = mysql_num_rows($Query);
    if($results>0){
        $em_row = mysql_fetch_object($Query);
        $fromMail = $em_row->ae_from;
        $subject  = $em_row->ae_subject;

        $message = str_replace("[NAME]", $name, $em_row->ae_text);
        $message = str_replace("[GROUPLEADER]", $glname, $message);
        $message = str_replace("[EMAIL]", $email, $message);
        $message = str_replace("[PROFILEID]", $pid, $message);
        $message = str_replace("[GROUP]", $grp, $message);
        $message = str_replace("[STATUS]", $comp_upd, $message);
        $message = '<html><head><title>'.$subject.'</title></head><body> '. $message .' </body></html>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Guest Services <guestservices@talonlodge.com>' . "\r\n";

        @mail($email, $subject, $message, $headers);
        @mail("guestservices@talonlodge.com", $subject, $message, $headers);
    }
}
function profile_change_email($email, $name, $password, $pid) {
    $Query = mysql_query("SELECT * FROM auto_email WHERE ae_id=4");
    $results = mysql_num_rows($Query);
    if($results>0){
        $em_row = mysql_fetch_object($Query);
        $fromMail = $em_row->ae_from;
        $subject  = $em_row->ae_subject;

        $message = str_replace("[NAME]", $name, $em_row->ae_text);
        $message = str_replace("[EMAIL]", $email, $message);
        $message = str_replace("[PASSWORD]", $password, $message);
        $message = str_replace("[PROFILEID]", $pid, $message);
        $message = '<html><head><title>'.$subject.'</title></head><body> '. $message .' </body></html>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Guest Services <guestservices@talonlodge.com>' . "\r\n";

        @mail($email, $subject, $message, $headers);
        @mail("guestservices@talonlodge.com", $subject, $message, $headers);
    }
}
?>