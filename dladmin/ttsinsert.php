<?php
session_start();
include('dbconnect.php');
if(!isset($_SESSION['session_adid'])){
    header('Location: admin.php');
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NID = $_POST['NID'];
    $ttstatus = $_POST['ttstatus'];

    $queryftdate = "UPDATE trials SET ttr = '$ttstatus' WHERE NID = '$NID'";
    $result = mysqli_query($conn, $queryftdate);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INSERT</title>
</head>
<body>
<form id="myForm" action="deletelicense.php" method="POST">
  <input type="hidden" name="NID" value="<?php echo $NID?>">

  <input type="submit" value="Submit">
</form>
<script>
  document.getElementById('myForm').submit();
</script>
  
</body>
</html>

