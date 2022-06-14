<?php
 include('connect.php');
?> 
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8"/>
  <title>ЛБ 1</title>
  <link href="style1.css" rel="stylesheet">
 </head>

 <body>  
 <main>
  <h1>Лабораторная №1. Вариант №8</h1>
  <form style = "margin-top: 20px;"action="lb1-1.php" method="POST">
  <h3>Статистика работы выбранного клиента</h3>
  <h3 style="color: rgb(57, 57, 57)">Выберете клиента:</h3>
        <select name="name" >
       <?php
            try
            {
                $sql = "SELECT name FROM client";
                foreach ($dbh->query($sql) as $row)
                {
                    $name = $row[0];
                    print "<option value='$name'>$name</option>";
                }
            }
            catch (PDOException $e)
            {
                print "Error!: " . $e ->getMessage() . "<br>";
                die();
            }
        ?>   
        </select>
          <input type = "submit" value = "Выбрать">
  </form>

  <form action="lb1-2.php" method="POST">
  <h3>Статистика работы в сети</h3>
  <h3 style="color: rgb(57, 57, 57)">Выберете промежуток времени:</h3>
  <h>с</h>
  <select name="time1">
  <option>01:00:00</option>
  <option>02:00:00</option>
  <option>03:00:00</option>
  <option>04:00:00</option>
  <option>05:00:00</option>
  <option>06:00:00</option>
  <option>07:00:00</option>
  <option>08:00:00</option>
  <option>09:00:00</option>
  <option>10:00:00</option>
  <option>11:00:00</option>
  <option>12:00:00</option>
  <option>13:00:00</option>
  <option>14:00:00</option>
  <option>15:00:00</option>
  <option>16:00:00</option>
  <option>17:00:00</option>
  <option>18:00:00</option>
  <option>19:00:00</option>
  <option>20:00:00</option>
  <option>21:00:00</option>
  <option>22:00:00</option>
  <option>23:00:00</option>
  <option>24:00:00</option>
  </select>    
  <h>до</h>
  <select name="time2">
  <option>01:00:00</option>
  <option>02:00:00</option>
  <option>03:00:00</option>
  <option>04:00:00</option>
  <option>05:00:00</option>
  <option>06:00:00</option>
  <option>07:00:00</option>
  <option>08:00:00</option>
  <option>09:00:00</option>
  <option>10:00:00</option>
  <option>11:00:00</option>
  <option>12:00:00</option>
  <option>13:00:00</option>
  <option>14:00:00</option>
  <option>15:00:00</option>
  <option>16:00:00</option>
  <option>17:00:00</option>
  <option>18:00:00</option>
  <option>19:00:00</option>
  <option>20:00:00</option>
  <option>21:00:00</option>
  <option>22:00:00</option>
  <option>23:00:00</option>
  <option>24:00:00</option>
  </select> 
  <input type = "submit" value = "Выбрать">
  </form>
   
  
  <form action="lb1-3.php" method="POST">
  <h3>Клиенты с отрицательным балансом счета</h3>
  <input style = "width: 300px;" type = "submit" value = "Просмотреть список клиентов">
  </form>

</main>
 </body>
</html>
