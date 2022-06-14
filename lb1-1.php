<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8"/>
  <title>ЛБ 1</title>
  <link href="style1.css" rel="stylesheet">
 </head>

 <body>
        <h2 style=" margin: auto 20px; background: rgb(191, 191, 255); border-radius: 10px;
    padding: 20px;">Статистика работы выбранного клиента</h2>
    
    <main>

       <?php
             include('connect.php');
             if(isset($_POST["name"]))
             {
                 $name =$_POST["name"];
                 print "<h2>Имя клиента: $name</h2>";
             }
        ?>
        
        <table border="1">
            <tr>
                <th>Start</th>
                <th>Stop</th>
                <th>In_Trafic</th>
                <th>Out_Trafic</th>
            </tr>
               
            <?php
             include('connect.php');

             if(isset($_POST["name"]))
             {
                 $name=$_POST["name"];
                 
                     $sql = "SELECT seanse.start, seanse.stop, seanse.in_trafic, seanse.out_trafic FROM seanse, client WHERE client.name=:name AND client.ID_Client=seanse.FID_Client";
                    $sth =  $dbh->prepare($sql);
                    $sth->execute(array(':name' => $name));
                    $timetable = $sth->fetchAll(PDO::FETCH_NUM);
                    foreach($timetable as $row)
                    {
                        $Start = $row[0];
                        $Stop = $row[1];
                        $In_Trafic = $row[2];
                        $Out_Trafic = $row[3];
                        print "<tr> <td>$Start</td> <td>$Stop</td> <td>$In_Trafic</td> <td>$Out_Trafic</td> </tr>";
                    }
                }            
            ?>
        </table>
    </main>
 </body>
</html>
