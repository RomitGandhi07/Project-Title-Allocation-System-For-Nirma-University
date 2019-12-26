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

    $SQLSELECT = "SELECT value FROM content WHERE function='No Of Choices'";
    $result_set =  mysqli_query($con,$SQLSELECT);
    while($row = mysqli_fetch_array($result_set)){
        $choices=$row['value'];
    }

    $flag=0;
    $studentrollno=$_POST['studentrollno'];
    if(empty($_POST['partnerrollno'])){
        $partnerrollno="null";
    }
    else{
        $partnerrollno=strtoupper($_POST['partnerrollno']);

        if($studentrollno==$partnerrollno){
            $flag=1;
            ?>
        <script type="text/javascript">
            alert("Please Enter Different Roll No...");
            location.replace("choiceFilling.php");
        </script>
        <?php
        }
    }


//Checking That Students Roll No Are Correct Or Not
if($flag!=1){
    if($partnerrollno=="null"){
        $SQLSELECT = "SELECT * FROM students WHERE email='".$studentrollno."@nirmauni.ac.in'";
        $result_set =  mysqli_query($con,$SQLSELECT);
        $number=mysqli_num_rows($result_set);
        if($number==0){
            $flag=1;
            ?>
            <script type="text/javascript">
                alert("Please Enter Valid Roll No...");
                location.replace("choiceFilling.php");
            </script>
        <?php
        }
    }
    else{

        $SQLSELECT = "SELECT * FROM students WHERE email='".$studentrollno."@nirmauni.ac.in'";
        $SQLSELECT2 = "SELECT * FROM students WHERE email='".$partnerrollno."@nirmauni.ac.in'";
        $result_set =  mysqli_query($con,$SQLSELECT);
        $result_set2 =  mysqli_query($con,$SQLSELECT2);
        $number=mysqli_num_rows($result_set);
        $number2=mysqli_num_rows($result_set2);
        if($number==0 || $number2==0){
            $flag=1;
            ?>
            <script type="text/javascript">
                alert("Please Enter Valid Roll No...");
                location.replace("choiceFilling.php");
            </script>
            <?php
        }
    }
}

// Checking That Choices Are Already Filled Or Not
    if($flag!=1){
        if($partnerrollno=="null"){
            $SQLSELECT = "SELECT * FROM choice_filling WHERE roll_no='".$studentrollno."'";
            $SQLSELECT2 = "SELECT * FROM students WHERE partner_roll_no='".$studentrollno."'";
            $result_set =  mysqli_query($con,$SQLSELECT);
            $result_set2 =  mysqli_query($con,$SQLSELECT2);
            $number=mysqli_num_rows($result_set);
            $number2=mysqli_num_rows($result_set2);
            if($number==1 || $number2==1){
                $flag=1;
                ?>
                <script type="text/javascript">
                    alert("You Had Already Submitted Your Response...");
                    location.replace("choiceFilling.php");
                </script>
                <?php
            }
        }
        else{
            $SQLSELECT = "SELECT * FROM choice_filling WHERE roll_no='".$studentrollno."'";
            $SQLSELECT2 = "SELECT * FROM choice_filling WHERE partner_roll_no='".$studentrollno."'";
            $result_set =  mysqli_query($con,$SQLSELECT);
            $result_set2 =  mysqli_query($con,$SQLSELECT2);
            $number=mysqli_num_rows($result_set);
            $number2=mysqli_num_rows($result_set2);
            $SQLSELECT = "SELECT * FROM choice_filling WHERE roll_no='".$partnerrollno."'";
            $SQLSELECT2 = "SELECT * FROM choice_filling WHERE partner_roll_no='".$partnerrollno."'";
            $result_set =  mysqli_query($con,$SQLSELECT);
            $result_set2 =  mysqli_query($con,$SQLSELECT2);
            $number3=mysqli_num_rows($result_set);
            $number4=mysqli_num_rows($result_set2);
            if($number==1 || $number2==1 || $number3==1 || $number4==1){
                $flag=1;
                ?>
                <script type="text/javascript">
                    alert("You Or Your Partner Had Already Submitted Their Response...");
                    location.replace("choiceFilling.php");
                </script>
                <?php
            }
        }
    }

// Checking That Students Have Filled Their Own Title Or Not
if($flag!=1){
        $SQLSELECT = "SELECT * FROM own_titles WHERE roll_no like'%".$studentrollno."%'" ;
        $SQLSELECT2 = "SELECT * FROM own_titles WHERE roll_no like '%".$partnerrollno."%'" ;
        $result_set =  mysqli_query($con,$SQLSELECT);
        $number=mysqli_num_rows($result_set);
        $result_set2 =  mysqli_query($con,$SQLSELECT2);
        $number2=mysqli_num_rows($result_set2);
        if($number>0 || $number2>0){
            $flag=1;
            ?>
            <script type="text/javascript">
                alert("You or Your Partner Had Already Submitted Own Title...");
                location.replace("choiceFilling.php");
            </script>
            <?php
        }
        else{
        }
}


// Insert
    if($flag!=1){
        if ($partnerrollno=="null") {
            $partnerrollno=" ";
        }
        $SQLSELECT="INSERT INTO choice_filling(roll_no,partner_roll_no";
        for($i=1;$i<=$choices;$i++){
            $temp=",choice_";
            $temp.=$i;
            $SQLSELECT.=$temp;
        }
        $SQLSELECT.=") VALUES ('$studentrollno','$partnerrollno'";

        for($i=1;$i<=$choices;$i++){
            $temp="choice";
            $temp.=$i;
            $ans=$_POST[$temp];
            $SQLSELECT.=",".$ans;
        }
        $SQLSELECT.=")";

        if ($con->query($SQLSELECT) === TRUE) {
            ?>
                <script type="text/javascript">
                    alert("Succesfully Filled Choices...");
                    location.replace("index.php");
                </script>
            <?php
        } else {
            echo "Error updating record: " . $conn->error;
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
