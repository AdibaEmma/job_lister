<?php include '../classes/database.class.php'; ?>
<?php include '../classes/job.class.php'; ?>

<?php include '../includes/header.inc.php'; ?>

<?php

    $select_jobs = new Job();
    
        $category= isset($_GET['category']) ? $_GET['category'] : null;

        if($category) {

             $jobs = $select_jobs->getByCategory($category);
             $job_title = 'Latest Jobs in anything'; 

        } else {

            $job_title = 'Latest Jobs';
            $jobs = $select_jobs->getAllJobs();
        }
       

        $categories = $select_jobs->getCategories();

      
?>

      <div class="jumbotron">
        <h1>Find A Job</h1>
        <form action="index.php" method="GET">
            <select class="form-control" name="category" id="">
                <option value="0">Choose Category</option>
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_name; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" class="btn btn-lg btn-success" value="FIND">
        </form>
      </div>
      <h3><?php echo $job_title; ?></h3>
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
