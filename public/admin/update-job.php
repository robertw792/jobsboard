<?php
require_once("../../includes/initialise.php");
if (!$session->is_logged_in()) { redirect_to("login.php");}
include_layout_template("admin_header.php");
?>

<?php
$job = Jobs::find_by_id($_GET['id']);
if(isset($_POST['submit'])) {

       // set product property values
      $job->job_name = $_POST['job_name'];
      $job->staff = $_POST['staff'];
      $job->start_date = $_POST['start_date'];
   	  $job->end_date = $_POST['end_date'];
   	  $job->client = $_POST['client'];
   	  $job->environment = $_POST['environment'];
   	  $job->status = $_POST['status'];

         // update the job
         if($job->save()){
           //Success!!!
             echo "<div class=\"alert alert-success alert-dismissable\">";
                 echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
                 echo "Job was edited.";
             echo "</div>";
    }
    else{
           echo "<div class=\"alert alert-danger alert-dismissable\">";
               echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
               echo "Unable to edit job.";
           echo "</div>";
     }
}
?>
<a href='index.php' class='btn btn-default pull-right'>Back to Index</a><br /><br />
<form id='update-job-form' action='update-job.php?id=<?php echo $job->id;?>' method='POST'>

      <label for="job_name">Job Name (required)</label>
</label>
          <input type='text' id="job_name" value='<?php echo $job->job_name; ?>' name='job_name' class='form-control' required/>

      <label for="staff">Staff (required)</label>
               <select class='form-control' id='staff' name='staff' required>

                       <option><?php echo $job->staff; ?></option>
                       <option>RW</option>
                       <option>RD</option>
                       <option>LO</option>
                       <option>KR</option>
                       <option>AK</option>
                       <option>MH</option>
               </select>

     <label for="start_date">Start Date (required)</label>
       <input type='date' value='<?php echo $job->start_date; ?>' aria-label="Start Date required, enter information in Date, Month, Year Format" id="start_date" name='start_date' class='form-control' placeholder='DD/MM/YY' required/>

     <label for="end_date">End Date (required)</label>
       <input type='text'value='<?php echo $job->end_date; ?>' aria-label="End Date required, enter information in Date, Month, Year Format" id="end_date" name='end_date' class='form-control' placeholder='DD/MM/YY' required/>

     <label for="client">Client (required)</label>
       <select class='form-control' id='client' name='client' required>
         <option><?php echo $job->client; ?></option>
         <option>Destek</option>
         <option>Shaw Trust</option>
         <option>Turkish Airlines</option>
       </select>

      <label for="environment">Environment (required)</label>
       <select class='form-control' id='environment' name='environment' required>
         <option><?php echo $job->environment; ?></option>
         <option>None</option>
         <option>Web Only</option>
         <option>Mobile</option>
       </select>

      <label for="status">Status (required)</label>
       <select class='form-control' id='status' name='status' required>
         <option><?php echo $job->status; ?></option>
         <option>Not Started</option>
         <option>Started</option>
         <option>Finished</option>
       </select><br />

   <button type="submit" value="submit" name="submit" class="btn btn-primary">Update</button>
 </form>

 <?php include_layout_template("admin_footer.php");?>
