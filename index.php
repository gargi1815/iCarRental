<?php include_once '../includes/autoload.php'; ?>
<?php
if ($_SESSION['isUserLoggedIn']) {
  header('location:login');
} else if ($_SESSION['isAgencyLoggedIn']) {
  header('location:agency');
} else {
  header('location:login');
}
?>
