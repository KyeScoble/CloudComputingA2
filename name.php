<?php
session_start();
?>
<html>
<head>
<?php
    require __DIR__ . '/vendor/autoload.php';
    use Google\Cloud\Datastore\DatastoreClient;
    $projectId = 's3780157-cca12020-p2';
    $datastore = new DatastoreClient(['projectId' => $projectId]);

    $transaction = $datastore->transaction();
    $userCheck1 = $datastore->key('user', 'Kye Scoble');
    $userid1 = $datastore->lookup($userCheck1);
    $userCheck2 = $datastore->key('user', 'Don');
    $userid2 = $datastore->lookup($userCheck2);
    $userCheck3 = $datastore->key('user', 'AdminGuest');
    $userid3 = $datastore->lookup($userCheck3);

    if (array_key_exists('id', $_POST)) {
    if($_SESSION['name']==$userid1['name']){
        $_SESSION['name'] = $_POST['id'];
        $userid1['name'] = $_POST['id'];
        $transaction->update($userid1);
        $transaction->commit();
        echo '<script type="text/javascript"> window.location = "https://s3780157-cca12020-p2.appspot.com/main"</script>';
    } else if($_SESSION['name']==$userid2['name']){
        $_SESSION['name'] = $_POST['id'];
        $userid2['name'] = $_POST['id'];
        $transaction->update($userid2);
        $transaction->commit();
        echo '<script type="text/javascript"> window.location = "https://s3780157-cca12020-p2.appspot.com/main"</script>';
    } else if($_SESSION['name']==$userid3['name']){
        $_SESSION['name'] = $_POST['id'];
        $userid3['name'] = $_POST['id'];
        $transaction->update($userid3);
        $transaction->commit();
        echo '<script type="text/javascript"> window.location = "https://s3780157-cca12020-p2.appspot.com/main"</script>';
    } else {
        echo "Invalid session username!";
    }
    }
    echo "Logged in username:" . $_SESSION['name'];


    ?>
<script>
function validateForm() {
  var x = document.forms["nameForm"]["id"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
}
</script>
</head>
<body>
<br>
    <form action="" method="post" name="nameForm" onsubmit="return validateForm()">
      <div>New Name:</div>
      <input type="text" id="id" name="id"><br>
      <div><input type="submit" value="Change Name"></div>
</body>
</html>
