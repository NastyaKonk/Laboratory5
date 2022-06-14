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
    padding: 20px;">Клиенты с отрицательным балансом счета</h2>

                <table border="1">
            <tr>
                <th>Client</th>
                <th>Balance</th>
            </tr>
               
            <?php
             include('connect.php');
                    $sql = "SELECT name, balance FROM client WHERE balance < 0";
                    $sth =  $dbh->prepare($sql);
                    $sth->execute();
                    $timetable = $sth->fetchAll(PDO::FETCH_NUM);
                    foreach($timetable as $row)
                    {
                        $Client = $row[0];
                        $Balance = $row[1];
                        print "<tr> <td>$Client</td> <td>$Balance</td> </tr>";
                    }           
            ?>
        </table>
    </main>
 </body>
</html>
