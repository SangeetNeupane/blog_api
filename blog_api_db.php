<?php
    $host='localhost';
    $user='root';
    $pwd='';
    $db='blog_api';
    $con= mysqli_connect($host,$user,$pwd,$db) or die("Could Not Connect Database Server.");

    $sql="SELECT * FROM categories";

    $res=mysqli_query($con,$sql) or die("Some Error in SQL Statement");

    $num_row =mysqli_num_rows($res);

            if($num_row==0)
                {
                  echo("No record Available");
                 }
            else
                 {
                    $data=array();
                    while($row=mysqli_fetch_assoc($res))
                     {
                            array_push($data,$row);
                        }

                  echo"<pre>";
                  print_r($data);
                  echo"</pre>";
                }

mysqli_close($con);
?>