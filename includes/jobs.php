<?php
require_once(LIB_PATH.DS."database.php");

// Inheriting common database methods from the superclass (DatabaseObject)

class Jobs extends DatabaseObject {

  protected static $table_name="jobs";
  protected static $db_fields = array('id', 'job_name', 'staff', 'start_date', 'end_date','client', 'environment', 'status');

  public $id;
  public $job_name;
  public $staff;
  public $start_date;
  public $end_date;
  public $client;
  public $environment;
  public $status;
  public $errors = array();
  
}

 ?>
