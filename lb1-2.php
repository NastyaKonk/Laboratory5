<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8"/>
  <title>ЛБ 1</title>
  <link href="style1.css" rel="stylesheet">
 </head>

 <body>
    <main>
    <h2 style=" margin: auto 20px; background: rgb(191, 191, 255); border-radius: 10px;
    padding: 20px;">Статистика работы в сети</h2>
       <?php
             include('connect.php');
             if(isset($_POST["time1"]))
             {
                 $time1 =$_POST["time1"];
                 $time2 =$_POST["time2"];
                 print "<h2>Промежуток времени:  с $time1 до  $time2</h2>";
             }
        ?>
                
                <table border="1">
            <tr>
                <th>Client</th>
                <th>Start</th>
                <th>Stop</th>
                <th>In_Trafic</th>
                <th>Out_Trafic</th>
            </tr>
               
            <?php
             include('connect.php');

             if(isset($_POST["time1"]) AND isset($_POST["time2"]))
             {
                 $time1=$_POST["time1"];
                 $time2=$_POST["time2"];
                    $sql = "SELECT client.name, seanse.start, seanse.stop, seanse.in_trafic, seanse.out_trafic FROM seanse, client WHERE seanse.start > :time1 AND seanse.stop < :time2 AND client.ID_Client=seanse.FID_Client";
                    $sth =  $dbh->prepare($sql);
                    $sth->execute(array(':time1' => $time1, ':time2' => $time2));
                    // $sth->execute(array(':time2' => $time2));
                    $timetable = $sth->fetchAll(PDO::FETCH_NUM);
                    foreach($timetable as $row)
                    {
                        $Client = $row[0];
                        $Start = $row[1];
                        $Stop = $row[2];
                        $In_Trafic = $row[3];
                        $Out_Trafic = $row[4];
                        print "<tr> <td>$Client</td> <td>$Start</td> <td>$Stop</td> <td>$In_Trafic</td> <td>$Out_Trafic</td> </tr>";
                    }
                }            
            ?>
        </table>
    </main>
 </body>
</html>
