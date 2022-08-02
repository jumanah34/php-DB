
<!DOCTYPE HTML>
<html>  
<body>

<form action="w.php" method="get">
ID: <input type="text" name="id"><br>
sensor' value: <input type="text" name="value"><br>
<button type="submit" name="btn" value="sub">Add Value</button> 
<button type="submit" name="put" value="sub">Show value</button> 

</form>


<?php echo $_GET["id"]; ?>
<?php echo $_GET["value"]; 
$x=$_GET["id"]; 
$y=$_GET["value"]; ?>

<?php

$host = "localhost";
$user = "root";
$pass = "123456";
$db   = "test1";

$conn = mysqli_connect($host, $user, $pass, $db);

if( isset( $_GET['btn'] ) ){
$insert = "insert into sensor values($x,$y)";

$q = mysqli_query($conn, $insert);
if($q){echo "OK^";}
else{echo "XXXXXXXXX";}

}?>
<table>
<tr>
    <th>  ID  </th>
    <th>  vlaue  </th> 
</tr>
<?php
if( isset( $_GET['put'] ) ){
    $r = mysqli_query($conn, "select *from sensor");
    
//echo mysqli_fetch_array($r)[1];
    while ($row = mysqli_fetch_array($r)){
        echo "<tr>";
        echo "<td>" . $row['sensno'] . "</td>" ;
        echo "<td>" . $row['value']  . "</td>" ;
        echo "</tr>";
    }
    }
?>
</table>


</body>
</html>