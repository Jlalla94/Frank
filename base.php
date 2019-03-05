<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>1
            
        </title>
    </head>
    <body>
        <header>
    
        <?php
            $dbhost = "localhost";
            $dbname = "films";
            $username = "root";
            $password = "";
            $db = new PDO("mysql:host=$dbhost; dbname=$dbname",$username,$password);
            $user = $db->query('SHOW TABLES');
            foreach ($user as $us){
            foreach($us as $key => $u){
            if (is_numeric($key))
            print_r('<td>' . "<button type='subm it' onClick=" . "DESCRIBE('" . $u . "')" . " name=". $u . "s>" ."DESCRIBE "  .$u ."</button>"."</td>");    
            }
            }
        ?>
        <form method="post" id="1">
            <textarea id="text" name="sql" rows="10" style="width:90%"></textarea><br/>    
                      <input type="submit" value="Run..">
                      <input type="button" form="1" value="select" onClick="sql_select()">
                      <input type="button" form="1" value="where" onClick="sql_where()">

        </form>
        <div class="alert alert-info" role="alert">
            Row count
        </div>
        </header>
        <footer>
        </footer>
    </body>
</html>   
<?php 
print_r($_POST['sql']);
$dbhost = "localhost";
$dbname = "films";
$username = "root";
$password = "";

$db = new PDO("mysql:host=$dbhost; dbname=$dbname",$username,$password);

function get_user () {
	global $db;
	$user = $db->query($_POST['sql']);
    print('<table>');
	foreach($user as $us){
        print_r('<tr>');
        foreach($us as $key => $u){
            if (is_numeric($key))
            print_r('<td>'. $u .'</td>');
        }
       print_r('</tr>');    
    }
    print('</table>');
}

get_user();

?>
<script>
function sql_select(){
    document.getElementById("text").innerHTML="select * from films";

}
function sql_where(){
    document.getElementById("text").innerHTML+=" where";

}
function DESCRIBE(u){
   document.getElementById("text").innerHTML="DESCRIBE " + u;
   document.getElementById('1').submit();
}
</script>
