<!DOCTYPE html>
<html>
    <?php include "pagestart.php";?>
   
<div id="listpacks">
    <div class="Title">
    <?php   $setname = $_GET["setname"] ?? NULL;
            echo strtoupper ("<h1>" . $setname . "</h1>");
    ?>
    <form action="results.php" method="put" class="realbar" cols="50" rows="10">
    <input type="text" placeholder="Search.." name="search"  required/>
    <button type="submit">Search</button>
</div>
</div>

<!-- <div id="list2"> -->
    <?php $value = $_GET["setid"] ?? NULL; 
    $link = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";
    $connection	= mysqli_connect("mysql.itn.liu.se","lego","","lego");
    $question = "SELECT sets.SetID, sets.Setname
    FROM inventory, sets
    WHERE inventory.SetID = '$value' AND inventory.ItemID = sets.SetID";

    $result= mysqli_query($connection, $question);
 ?>
    <!-- </div> -->
    <div id='packsresults'>
<?php
while ($row = mysqli_fetch_array($result))	{
                    $setid = $row ['SetID'];
                    // $itemID = $row ['ItemID'];
                    $gif = $row ['has_gif'];
                    $setname = $row ['Setname'];
                    // $itemtypeid = $row ['itemtypeID'];
                    // echo "$itemtypeid";
                    // $url = "S/$itemID";
                    // if($gif){
                    //     $url .= ".gif";
                    // }
                    // else{
                    //     $url .= ".jpg";
                    // }
                    //$image = "<img src='$link$url' alt = '' >";
                  

                        ///is pack function
                        // $ispack = "SELECT sets.SetID, sets.Setname FROM inventory, sets WHERE inventory.SetID = '$value' AND Inventory.ItemID = sets.SetID";

                        // if ($ispack->num_rows === 0){
                        //     $setsFound = 0;
                        // }
                        // if ($ispack->num_rows != 0){
                        //     $setsFound = 1;
                        // }






                    $imagesearchquestion = "SELECT * FROM images WHERE ItemtypeID='S' AND ItemID = '$setid'";
                    $imagesearch = mysqli_query($connection, $imagesearchquestion);	
                    $imagevector = mysqli_fetch_array($imagesearch);
                    if($imagevector['has_largejpg']){
                        $endlink = "SL/$setid.jpg";
                        
                    }
                    else if($imagevector['has_largegif'])
                    {
                        $endlink = "SL/$setid.gif";
                       
                    }
                    else if ($imagevector['has_gif']){
                        $endlink = "S/$setid.gif";
                    }
                    else if ($imagevector['has_jpg']){
                        $endlink = "S/$setid.jpg";
                    }



                    $image = "<img src='$link$endlink' class='w3-circle' alt = 'bild saknas' style='width:100%'>";

                    ?>
                    


                    <?php
                    echo "<a href='http://www.student.itn.liu.se/~johro712/tnmk30/experiment/Projektarbete.25.11/setIDpage.php?setid=$setid&setname=$setname'><div class='content'> $image  $setname $setid </div></a>";
                }
//<a target='_blank'herf=\$link$endlink'> </a>
               
                    //  echo "<tr><td><a href='http://www.student.itn.liu.se/~johro712/tnmk30/Projektarbete.25.11/setIDpage.php?setid=$setid&setname=$setname'>" . $setname . "</a></td>";
                    //  echo strtoupper ( "<td>" . $setid . "</td>  
                    //  <td>" . $endlink . "</td>");
                    //  echo "<td> $image</td></tr>\n";  


//link for packs
                
?>
</div>
                    </body>
</html>