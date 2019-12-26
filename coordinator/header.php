<?php
session_start();
if (empty($_SESSION['coordinatorusername'])) {
?>
<script>
location.replace("login.php");
</script>
<?php
}
?>
