<?php
    // include 'header.php';
    // $dbHost = "localhost";
    // $dbDatabase = "mini_project";
    // $dbPasswrod = "";
    // $dbUser = "root";
    // $conn=mysqli_connect($dbHost,$dbUser,$dbPasswrod,$dbDatabase) or die("Could not connect");
    include 'header.php';
    include 'connection.php';
    $SQLSELECT = "SELECT value FROM content WHERE function='No Of Choices'";
    $result_set =  mysqli_query($con,$SQLSELECT);
    while($row = mysqli_fetch_array($result_set)){
        $choices=$row['value'];
    }

    $SQLSELECT = "SELECT * FROM choice_filling";


    $result_set =  mysqli_query($con,$SQLSELECT);
    while($row = mysqli_fetch_array($result_set)){
        $studentrollno=$row['roll_no'];
        $partnerrollno=$row['partner_roll_no'];
        for($t=1;$t<=$choices;$t++)
        {
            $choicename="choice_".$t;

            $choiceno=$row[$choicename];

            $SQLSELECT2="SELECT flag FROM project_titles WHERE id=".$choiceno;

            $result_set2 = mysqli_query($con,$SQLSELECT2);
            while($row2= mysqli_fetch_array($result_set2)){
                $flagvalue=$row2['flag'];

            }

            if($flagvalue==0){
                $SQLSELECT3="UPDATE project_titles SET flag=1 WHERE id=".$choiceno;
                // out.print(sql3);
                if ($con->query($SQLSELECT3) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }

                $SQLSELECT4="UPDATE titles_allocated SET student_roll_no='".$studentrollno."' ,   partner_roll_no='".$partnerrollno."' WHERE title_id=".$choiceno;
                // out.println(sql4);
                if ($con->query($SQLSELECT4) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                break;
           }

        }

    }
    $SQLSELECT5="UPDATE content SET flag=1 WHERE function='Apply FCFS'";
    // out.println(sql4);
    if ($con->query($SQLSELECT5) === TRUE) {
        // echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

?>
<script type="text/javascript">
  alert("FCFS Applied");
  location.replace("allocatedTitles.php");
</script>
