<?php
require_once("../includes/initialise.php");
include_layout_template("header.php");
?>
<title>Index - Destek Jobsboard</title>
<!-- find all jobs -->
<?php $jobs = Jobs::find_all();?>
    <table class='table table-hover table-responsive table-bordered'>
    <tr style='background-color:#147646; color:#FFF;'>
        <th>Job Name</th>
        <th>Staff</th>
        <th>Start Date</th>
        <th>End Date</th>
			  <th>Client</th>
			  <th>Environment</th>
			  <th>Status</th>
    </tr>
  <!-- For each loop used to show jobs in table format -->
<?php foreach($jobs as $job): ?>
<tr>
<td><?php echo $job->job_name; ?></td>
<td><?php echo $job->staff; ?></td>
<td><?php echo $job->start_date; ?></td>
<td><?php echo $job->end_date; ?></td>
<td><?php echo $job->client; ?></td>
<td><?php echo $job->environment; ?></td>
<td><?php echo $job->status; ?></td>

</tr>
<?php endforeach; ?>
</table>

<?php include_layout_template("footer.php"); ?>
