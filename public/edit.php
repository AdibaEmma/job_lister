<?php include '../classes/database.class.php'; ?>
<?php include '../classes/job.class.php'; ?>

<?php include '../includes/header.inc.php'; ?>

<?php

    $jobs = new Job();
    
    $categories = $jobs->getCategories();
    
    $job_id = isset($_GET['id']) ? $_GET['id'] : null;

    $single_job = $jobs->getJob($job_id);

    if(isset($_POST['submit'])) {

        // $data = array();

        // $data['job_title'] = $_POST['job_title'];
        // $data['company'] = $_POST['company'];
        // $data['category_id'] = $_POST['category_id'];
        // $data['description'] = $_POST['description'];
        // $data['location'] = $_POST['location'];
        // $data['salary'] = $_POST['salary'];
        // $data['contact_user'] = $_POST['contact_user'];
        // $data['contact_email'] = $_POST['contact_email'];

         $job_title = $_POST['job_title'];
         $company = $_POST['company'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];
        $contact_user = $_POST['contact_user'];
        $contact_email = $_POST['contact_email'];

        $create_job = $jobs->update($category_id,$job_title,$company,$description,$location,$salary,$contact_user,$contact_email,$job_id); 

        if($create_job) {

            redirect('index.php', 'Your job has been updated', 'success');

        } else {

            redirect('index.php', 'Something went wrong', 'error'); 
            
        }
    
 }
    
?>

        <h2>Edit Job Listing</h2>
        <form action="edit.php?id=<?php echo $single_job->job_id; ?>" method="POST">
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" id="company" class="form-control" value="<?php echo $single_job->company; ?>">
            </div>
             <div class="form-group">
                <label for="company">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                  <option value="0">Choose Category</option>
                <?php foreach($categories as $category): ?>
                    <?php if($single_job->cat_id == $category->cat_id): ?>
                        <option value="<?php echo $category->cat_id; ?>" selected><?php echo $category->cat_name; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_name; ?></option>
                    <?php endif; ?>
                    
                <?php endforeach; ?>
                </select>
            </div>
             <div class="form-group">
                <label for="company">Job Title</label>
                <input type="text" name="job_title" id="job_title" class="form-control" value="<?php echo $single_job->job_title; ?>">
            </div>
             <div class="form-group">
                <label for="company">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="6"><?php echo $single_job->description; ?></textarea>
            </div>
             <div class="form-group">
                <label for="company">Location</label>
                <input type="text" name="location" id="location" class="form-control" value="<?php echo $single_job->location; ?>">
            </div>
             <div class="form-group">
                <label for="company">Salary</label>
                <input type="text" name="salary" id="salary" class="form-control" value="<?php echo $single_job->salary; ?>">
            </div>
             <div class="form-group">
                <label for="company">Contact User</label>
                <input type="text" name="contact_user" id="contact_user" class="form-control" value="<?php echo $single_job->contact_user; ?>">
            </div>
            <div class="form-group">
                <label for="company">Contact Email</label>
                <input type="text" name="contact_email" id="contact_email" class="form-control" value="<?php echo $single_job->contact_email; ?>">
            </div>
            <input type="submit" class="btn btn-md btn-default" name="submit" value="Update">
            <br><br>
        </form>


<?php include '../includes/footer.inc.php'; ?>
