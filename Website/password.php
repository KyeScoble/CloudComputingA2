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

    if (array_key_exists('newPassword', $_POST) && array_key_exists('oldPassword', $_POST)) {
    if($_POST['oldPassword']==$userid1['password']){
        $userid1['password'] = $_POST['newPassword'];
        $transaction->update($userid1);
        $transaction->commit();
        echo '<script type="text/javascript"> window.location = "https://s3780157-cca12020-p2.appspot.com/"</script>';
    } else if($_POST['oldPassword']==$userid2['password']){
        $userid2['password'] = $_POST['newPassword'];
        $transaction->update($userid2);
        $transaction->commit();
        echo '<script type="text/javascript"> window.location = "https://s3780157-cca12020-p2.appspot.com/"</script>';
    } else if($_POST['oldPassword']==$userid3['password']){
        $userid3['password'] = $_POST['newPassword'];
        $transaction->update($userid3);
        $transaction->commit();
        echo '<script type="text/javascript"> window.location = "https://s3780157-cca12020-p2.appspot.com/"</script>';
    } else {
        echo "Old Password is incorrect";
    }
    }
    echo "Logged in as: " . $_SESSION['name'];


    ?>
    <script>
function validateForm() {
  var x = document.forms["passwordForm"]["newPassword"].value;
  if (x == "" || x == null) {
    alert("New Password must be filled out");
    return false;
  }
}
</script>
</head>
<body>
<br>
    <form action="" method="post" name="passwordForm" onsubmit="return validateForm()">
      <div>Old Password:</div>
      <input type="password" id="oldPassword" name="oldPassword"><br>
      <div>New Password:</div>
      <input type="password" id="newPassword" name="newPassword"><br>
      <br>
      <div><input type="submit" value="Change Password"></div>
</body>
</html>
