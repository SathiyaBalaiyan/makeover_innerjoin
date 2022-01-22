<?php
include_once 'config.php';

class Database extends Config 
{
    // public function fetchFeedback($id = null) 
    // {
    //     $sql = 'SELECT * FROM feedback';
    //      if ($id != null) 
    //      {
    //        $sql .= ' WHERE id = :id';
    //      }
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

     public function fetchUsername($id = null)
     {
       $sql = "SELECT users.user_name as puname, users.user_name as cuname, feedback.comment FROM users,feedback WHERE users.id = feedback.post_u_id AND users.id = feedback.comment_u_id) ";
         if ($id != null) 
         {
            $sql .= ' WHERE users.id = :id';
         }
       $stmt = $this->conn->prepare($sql);
       $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
}

?>