<?php
require_once("../../includes/initialise.php");
if (!$session->is_logged_in()) { redirect_to("login.php");}
include_layout_template("admin_header.php");
?>
<?php
      $jobs = Jobs::find_all();
      $user = User::find_by_id(2);
      echo "<strong>Welcome $user->username <a href='logout.php'> Logout</a></strong>";
      ?>

<?php echo output_message($message); ?>
  <a href='add-job.php' class='btn btn-default pull-right'>Create Job</a><br /><br /><br />
  <div class="table-responsive">
    <table id='index-table' class='table table-hover table-responsive table-bordered'>
    <tr style='background-color:#147646; color:#FFF;'>
        <th>Job Name</th>
        <th>Staff</th>
        <th>Start Date</th>
        <th>End Date</th>
			  <th>Client</th>
			  <th>Environment</th>
			  <th>Status</th>
        <th>Actions</th>
    </tr>
<?php foreach($jobs as $job): ?>
<tr>
<td><?php echo $job->job_name; ?></td>
<td><?php echo $job->staff; ?></td>
<td><?php echo $job->start_date; ?></td>
<td><?php echo $job->end_date; ?></td>
<td><?php echo $job->client; ?></td>
<td><?php echo $job->environment; ?></td>
<td><?php echo $job->status; ?></td>
<td>
    <a class="btn btn-default" href="#">View all info</a>
    <a class="btn btn-default" href="update-job.php?id=<?php echo $job->id;?>">Edit</a>
    <a class="btn btn-default" onclick="return confirm_alert(this);" href="delete-job.php?id=<?php echo $job->id;?>">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</table>
</div>
<?php include_layout_template("admin_footer.php");?>
