<?php
require_once("../../includes/initialise.php");
if (!$session->is_logged_in()) { redirect_to("login.php");}
include_layout_template("admin_header.php");
?>
<?php
if(isset($_POST['submit'])) {
  $job = new Jobs();

       // set product property values
      $job->job_name = $_POST['job_name'];
      $job->staff = $_POST['staff'];
      $job->start_date = $_POST['start_date'];
   	  $job->end_date = $_POST['end_date'];
   	  $job->client = $_POST['client'];
   	  $job->environment = $_POST['environment'];
   	  $job->status = $_POST['status'];

         // create the product
         if($job->save()){
           //Success!!!
             echo "<div class=\"alert alert-success alert-dismissable\">";
                 echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
                 echo "Job was created.";
                 $session->message("Job created.");
                 redirect_to("index.php");
             echo "</div>";
    }
    elseif(strlen($this->job_name) === 0){
      $this->errors[] = "Job name cannot be empty";
      return false;
    }
    else{
           echo "<div class=\"alert alert-danger alert-dismissable\">";
               echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
               echo "Unable to create job.";
               $message = join("<br />", $job->errors);
           echo "</div>";
     }
}

?>

<!-- Using output_message function -->
<?php echo output_message($message); ?>
<a href='index.php' class='btn btn-default pull-right'>Back to Index</a><br /><br />
<form id='add-job-form' action='add-job.php' method='POST'>

      <label for="job_name">Job Name (required)</label>
</label>
          <input type='text' id="job_name" name='job_name' class='form-control' />

      <label for="staff">Staff (required)</label>
               <select class='form-control' id='staff' name='staff' >

                       <option>Assign job to staff member(s)</option>
                       <option>RW</option>
                       <option>RD</option>
                       <option>LO</option>
                       <option>KR</option>
                       <option>AK</option>
                       <option>MH</option>
                       <option>RW&RD</option>
                       <option>RW & LO</option>
                       <option>RW & KR</option>
                       <option>RW & AK</option>
                       <option>RW & MH</option>
                       <option>RD & RW</option>
                       <option>RD & LO</option>
                       <option>RD & KR</option>
                       <option>RD & AK</option>
                       <option>RD & MH</option>
                       <option>LO & RD</option>
                       <option>LO & RW</option>
                       <option>LO & KR</option>
                       <option>LO & AK</option>
                       <option>LO & MH</option>
                       <option>KR & RD</option>
                       <option>KR & LO</option>
                       <option>KR & RW</option>
                       <option>KR & AK</option>
                       <option>KR & MH</option>
                       <option>AK & RD</option>
                       <option>AK & LO</option>
                       <option>AK & KR</option>
                       <option>AK & RW</option>
                       <option>MH & MH</option>
                       <option>MH & MH</option>
                       <option>MH & RW</option>
                       <option>MH & RD</option>
                       <option>MH & LO</option>
                       <option>MH & KR</option>
                       <option>MH & AK</option>
               </select>

     <label for="start_date">Start Date (required)</label>
       <input type='date' aria-label="Start Date required, enter information in Date, Month, Year Format" id="start_date" name='start_date' class='form-control' placeholder='DD/MM/YY' />

     <label for="end_date">End Date (required)</label>
       <input type='text' aria-label="End Date required, enter information in Date, Month, Year Format" id="end_date" name='end_date' class='form-control' placeholder='DD/MM/YY' />

     <label for="client">Client (required)</label>
       <select class='form-control' id='client' name='client' >
         <option>Select Client</option>
         <option>Destek</option>
         <option>Shaw Trust</option>
         <option>Turkish Airlines</option>
       </select>

      <label for="environment">Environment (required)</label>
       <select class='form-control' id='environment' name='environment'>
         <option>Select Environment</option>
         <option>None</option>
         <option>Web Only</option>
         <option>Mobile</option>
       </select>

      <label for="status">Status (required)</label>
       <select class='form-control' id='status' name='status'>
         <option>Select job status</option>
         <option>Not Started</option>
         <option>Started</option>
         <option>Finished</option>
       </select><br />

   <button type="submit" value="submit" name="submit" class="btn btn-primary">Create</button>


   </form><?php include_layout_template("admin_footer.php");?>
