<?php
session_start();
if (empty($_SESSION['facultyusername'])) {
?>
<script>
location.replace("login.php");
</script>
<?php
}
?>
