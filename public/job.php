<?php include '../classes/database.class.php'; ?>
<?php include '../classes/job.class.php'; ?>

<?php include '../includes/header.inc.php'; ?>

<?php

    $select_jobs = new Job();
    
        $job_id = isset($_GET['id']) ? $_GET['id'] : null;

        $single_job = $select_jobs->getJob($job_id);

      
?>

<h2 class="page-header"><?php echo $single_job->job_title; ?> (<?php echo $single_job->location; ?>)</h2>
<small>Posted By <?php echo $single_job->contact_user; ?> on <?php echo $single_job->post_date; ?></small>
<hr>
<p class="lead"><?php echo $single_job->description; ?></p>
<ul class="list-group">
    <li class="list-group-item"><strong>Company:</strong> <?php echo $single_job->company; ?></li>
    <li class="list-group-item"><strong>Salary:</strong> <?php echo $single_job->salary; ?></li>
    <li class="list-group-item"><strong>Contact Email:</strong> <?php echo $single_job->contact_email; ?></li>
</ul>
<br><br>
    <a href="index.php" class="btn btn-primary">Go Back</a>
    <br>
    <br>
    </div> <!-- /container -->

<?php include '../includes/footer.inc.php'; ?>
