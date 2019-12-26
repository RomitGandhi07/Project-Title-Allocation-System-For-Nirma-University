<?php
session_start();
if (empty($_SESSION['studentusername'])) {
?>
<script>
location.replace("login.php");
</script>
<?php
}
?>
