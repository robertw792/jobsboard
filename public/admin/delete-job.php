<?php require_once("../../includes/initialise.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php");} ?>
<?php

// Must have an id
if(empty($_GET['id'])) {
  $session->message("No Job ID was provided");
  redirect_to("index.php");
}
$job = Jobs::find_by_id($_GET['id']);
if($job->delete()) {
  $session->message("Job was deleted");
  redirect_to("index.php");
} else {
  $session->message("The job could not be deleted.");
  redirect_to("index.php");
}
 ?>

<?php if(isset($database)) { $database->close_connection();} ?>
