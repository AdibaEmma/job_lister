<?php

class Job extends Database {

    // Get All Jobs
    public function getAllJobs() {
        
        $query = "SELECT jobs.*, categories.cat_name AS cname 
        FROM jobs 
        INNER JOIN categories 
        ON jobs.cat_id = categories.cat_id 
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

} 