<?php
include 'header.php';
include 'connection.php';

$sql  = "SELECT flag FROM events WHERE id=2";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $flag=$row['flag'];
    }
  }
    if ($flag==1) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $domain = $_POST['domain'];
    $type = $_POST['type'];
    $students = $_POST['studentsCount'];
    $guide = $_POST['guide'];
    $ans="";
    for($i=1;$i<=$students;$i++){
        $temp="student".$i;
        $ans.=strtoupper($_POST[$temp]);
        if($i!=$students){
            $ans.=",";
        }
    }
    $mark=explode(',',$ans);//Comma Separated
    $count=0;
    foreach($mark as $out) {
      $roll[$count]=$out;
      $count++;
    }
    $flag=0;
    $unique=count(array_unique($roll));
    if($students!=$unique){
        $flag=1;
        ?>
        <script type="text/javascript">
            alert("Please Enter Different Roll No...");
            location.replace("ownTitle.php");
        </script>
        <?php
    }

// Checking That Roll No Are Correct Or Not
if($flag!=1){
    for($i=0;$i<$students;$i++){
        $SQLSELECT = "SELECT * FROM students WHERE email='".$roll[$i]."@nirmauni.ac.in'";
        $result_set =  mysqli_query($con,$SQLSELECT);
        $number=mysqli_num_rows($result_set);
        if($number==0){
            $flag=1;
            ?>
            <script type="text/javascript">
                alert("Please Enter Valid Roll No...");
                location.replace("ownTitle.php");
            </script>
            <?php
        }
    }
}
//Checking That Already Choices Are Filled or not
if($flag!=1){
    for($i=0;$i<$students;$i++){
        $SQLSELECT = "SELECT * FROM choice_filling WHERE roll_no='".$roll[$i]."'";
        $SQLSELECT2 = "SELECT * FROM choice_filling WHERE partner_roll_no='".$roll[$i]."'";
        $result_set =  mysqli_query($con,$SQLSELECT);
        $result_set2 =  mysqli_query($con,$SQLSELECT2);
        $number=mysqli_num_rows($result_set);
        $number2=mysqli_num_rows($result_set2);
        if($number==1 || $number2==1){
            $flag=1;
            ?>
            <script type="text/javascript">
                alert("Choices Are Already Filled...");
                location.replace("ownTitle.php");
            </script>
            <?php
            break;
        }
    }
}

// Checking That Already Submitted Own Title Or Not
if($flag!=1){
    for($i=0;$i<$students;$i++){
        $SQLSELECT = "SELECT * FROM own_titles WHERE roll_no like '%".$roll[$i]."%'";
        // echo $SQLSELECT;
        $result_set =  mysqli_query($con,$SQLSELECT);
        $number=mysqli_num_rows($result_set);
        // echo $number;
        if($number>0){
            $flag=1;
            ?>
            <script type="text/javascript">
                alert("You Have Already Submitted Title...");
                location.replace("ownTitle.php");
            </script>
            <?php
            break;
        }
    }
}


// Insert
if($flag!=1){
    $sql  = "INSERT INTO own_titles (title,description,domain,type,roll_no,faculty,students) VALUES('$title','$description','$domain','$type','$ans','$guide','$students')";
    if (mysqli_query($con, $sql)) {
        ?>
        <script type="text/javascript">
            alert("Choice Filled Successfully...");
            location.replace("ownTitle.php");
        </script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
            echo "<script>alert('Something Went Wrong !');</script>";
    }
}

}
else{
  ?>
  <script>
    alert("This Phase Is Currently Unavailable...");
    location.replace("index.php");
  </script>
  <?php
}
?>
