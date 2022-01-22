<?php 
   
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: X-Requested-With');
    header('Content-type: Application/json; charset=UTF-8');
    
    include_once 'db.php';

    $user = new Database();

    $api = $_SERVER['REQUEST_METHOD'];
    $link = basename($_SERVER['REQUEST_URI']);
    
    $id = intval($_GET['id'] ?? '');
    $type = ($_GET['type'] ?? '');

      if ($api == 'GET' && ($link == "users" || $type == "users"))
      {
          if($id != 0)
          {
              $data = $user->fetchUsername($id);
          }
          else
          {
              $data = $user->fetchUsername();
          }
          echo json_encode($data);
      }
      else{
          echo json_encode(['Enter a id', true]);
      }



      // if ($api == 'GET' && ($link == "feedback" || $type == "feedback")) 
    // {
    //      if ($id != 0) 
    //      {
    //          $data = $user->fetchFeedback($id);
    //      } 
    //     else 
    //     {
    //         $data = $user->fetchFeedback();
    //     }
    //     echo json_encode($data);
    // }
    //  else
    //  {
    //      http_response_code(404);
    //      echo json_encode(['message' =>'Enter an correct id' , 'error' => true]);
    //  }

?>
    