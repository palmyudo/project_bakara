<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_base";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function checkadmin()
{
  if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0)
    return true;
  else
    return false;
}

function checkpermis()
{
  if ($_SESSION['user_level'] == 0)
    return 0;
  else if ($_SESSION['user_level'] == 1)
    return 1;
  else
    return -1;
}

function go($url)
{
  echo "<script>
  window.location = '".$url."';
</script>";
}

function alert($text)
{
  echo "<script>
    alert('$text');
  </script>";
}
?>
