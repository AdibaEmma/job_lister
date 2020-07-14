<?php include '../classes/database.class.php'; ?>
<?php include '../classes/job.class.php'; ?>

<?php include '../includes/header.inc.php'; ?>

<?php
    $select_jobs = new Job();
    $jobs = $select_jobs->getAllJobs();

    $categories = $select_jobs->getCategories();

    
?>

      <div class="jumbotron">
        <h1>Find A Job</h1>
        <form action="">
            <select class="form-control" name="category" id="">
                <option value="0">Choose Category</option>
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_name; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
      </div>
<?php foreach($jobs as $job): ?>
        <div class="row marketing">
            <div class="col-md-10">
              <h4><?php echo $job->job_title; ?></h4>
              <p><?php echo $job->description; ?></p>
            </div>
            <div class="col-md-2">
                    <a href="" class="btn btn-default" href="# ">View</a>
            </div>
        </div>
    <?php endforeach; ?>
    </div> <!-- /container -->

<?php include '../includes/footer.inc.php'; ?>
