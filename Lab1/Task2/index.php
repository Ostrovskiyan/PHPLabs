<html>
<head>
</head>
<body>
<form action="index.php">
    Year
    <select name="year">
        <?php
        for($i=1980;$i<2020;$i++){
            echo "<option value=".$i.">".$i."</option>";
        }
        ?>
    </select>
    <br/>
    Month
    <select name="month">
        <?php
        for($i=1;$i<=12;$i++){
            echo "<option value=".$i.">".$i."</option>";
        }
        ?>
    </select>
    <input type="submit"/>
</form>
    <?php
    if(isset($_GET['month'])&&$_GET['year']) {
        $countDays = cal_days_in_month(CAL_GREGORIAN, $_GET['month'], $_GET['year']);
    } else{
        $countDays = date("t");
    }

    $numberOfFirstDay = date('w', mktime(0,0,0,$_GET['month'],1,$_GET['year']));
    if($numberOfFirstDay==0){
        $numberOfFirstDay=7;
    }

    echo '<table border="5">';
    $weekDays= array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");

    echo '<tr>';
    for($i=0;$i<7;++$i){
         echo "<td>$weekDays[$i]</td>";
    }
    echo '</tr>';

    $k=1;
    for($i=0;$i<5;$i++){
        echo '<tr>';
        for($j=0;$j<7;$j++){
            echo '<td>';
            if($numberOfFirstDay!=1){
                $numberOfFirstDay--;
                continue;
            }
            if($k<=$countDays){
                echo $k++;
            }
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>
</html>
