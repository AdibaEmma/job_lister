<?php

class Job extends Database {

    // Get All Jobs
    public function getAllJobs() {
        
        $query = "SELECT jobs.*, categories.cat_name AS cname 
        FROM jobs 
        INNER JOIN categories 
        ON jobs.cat_id = categories.cat_id 
        ORDER BY post_date DESC
        ";

        $stmt = $this->connect()->query($query);
        $jobs = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $jobs;
    }

    public function getCategories() {

         $query = "SELECT * FROM categories";

        $stmt = $this->connect()->query($query);
        $categories = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }


    public function getCategory($category) {

    $query = "SELECT * FROM categories WHERE cat_id = ?";

        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$category]);

        while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $result = $row['cat_name'];
        }
       return $result;
    }


    public function getByCategory($category) {

        $query = "SELECT jobs.*, categories.cat_name AS cname 
        FROM jobs 
        INNER JOIN categories 
        ON jobs.cat_id = categories.cat_id 
        WHERE jobs.cat_id = ?
        ORDER BY post_date DESC
        ";

        $stmt = $this->connect()->prepare($query);
         $stmt->execute([$category]);

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

       return $result;
    }

    // Get Single Job
    public function getJob($id) {

         $query = "SELECT * FROM jobs WHERE job_id = ?";

        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    // Create job
    public function create($category_id,$job_title,$company,$description,$location,$salary,$contact_user,$contact_email) {
      $query = "INSERT INTO jobs (cat_id, job_title, company, description, location, salary, contact_user, contact_email) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $this->connect()->prepare($query);

    //   $stmt->bindValue(':cat_id',$data['category_id'],PDO::PARAM_INT);
    //   $stmt->bindValue(':job_title',$data['job_title'],PDO::PARAM_STR);
    //   $stmt->bindValue(':company',$data['company'],PDO::PARAM_STR);
    //   $stmt->bindValue(':description',$data['description'],PDO::PARAM_STR);
    //   $stmt->bindValue(':location',$data['location'],PDO::PARAM_STR);
    //   $stmt->bindValue(':salary',$data['salary'],PDO::PARAM_STR);
    //   $stmt->bindValue(':contact_user',$data['contact_user'],PDO::PARAM_STR);
    //   $stmt->bindValue(':contact_email',$data['contact_email'],PDO::PARAM_STR);

       $result = $stmt->execute([$category_id, $job_title,$company,$description,$location,$salary,$contact_user,$contact_email]);

      if($result) {
          return true;
      } else {
          return false;
      }

    }
}