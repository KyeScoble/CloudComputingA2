<?php
// Start the session
session_start();
?>
<html>
 <head class='structure'>
   <style>
   .title
   {
     text-align: center;
     margin: auto;
     width: 60%;
     padding-top: 30px;
     padding: 10px;
   }

   .center
   {
     text-align: center;
     margin: auto;
     width: 60%;
     border: 2px solid #000000;
     padding-top: 30px;
     padding: 10px;
   }

   .object
   {
     margin: auto;
     float: center;
     text-align: center;
     padding: 10px;
   }

   </style>
   <link rel="stylesheet" type="text/css" href="css/Style_Login.css">
  <?php


  require __DIR__ . '/vendor/autoload.php';
  use Google\Cloud\Datastore\DatastoreClient;
  $projectId = 's3780157-cca12020-p2';
  $datastore = new DatastoreClient(['projectId' => $projectId]);

  $userCheck1 = $datastore->key('user', 'Kye Scoble');
  $userid1 = $datastore->lookup($userCheck1);
  $userCheck2 = $datastore->key('user', 'Don');
  $userid2 = $datastore->lookup($userCheck2);
  $userCheck3 = $datastore->key('user', 'AdminGuest');
  $userid3 = $datastore->lookup($userCheck3);

  if (array_key_exists('id', $_POST) && array_key_exists('password', $_POST))
  {
    if($_POST['id']==$userid1['name'] && $_POST['password']==$userid1['password'])
    {
      $_SESSION['name'] = $_POST['id'];
      $_SESSION['password'] = $_POST['password'];
      echo "<script>\n
      window.location.href = '\main';\n
      </script>";
    }
    else if($_POST['id']==$userid2['name'] && $_POST['password']==$userid2['password'])
    {
      $_SESSION['name'] = $_POST['id'];
      $_SESSION['password'] = $_POST['password'];
      echo "<script>\n
      window.location.href = '\main';\n
      </script>";
    }
    else if($_POST['id']==$userid3['name'] && $_POST['password']==$userid3['password'])
    {
      $_SESSION['name'] = $_POST['id'];
      $_SESSION['password'] = $_POST['password'];
      echo "<script>\n
      window.location.href = '\main';\n
      </script>";
    }
    else
    {
      echo "User id or password is invalid";
    }
  }
    ?>

  </head>
  <div class="title"><h2>Online Robotics Controller</h2></div>
  <div class="center">
    <form action="" method="post">
      <div class="object">User Id:</div>
      <input class="object" type="text" id="id" name="id"><br>
      <div class="object" >Password:</div>
      <input class="object" type="password" id="password" name="password"><br>
      <div class="object" ><input id="submit" type="submit" value="Submit"></div>
  </div>
</html>
