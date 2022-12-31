<!-- 4207901-1 -->
<!DOCTYPE html>

<?php include "pagestart.php"; ?>

        


        <div id="list">
        <div class="Title">
            <h1>Results</h1>
            <form action="results.php" method="put" class="realbar" cols="50" rows="10">
            <input type="text" placeholder="Search.." name="search"  required/>
            <button type="submit">Search</button>
            </form>



        </div>
        <p></p>
            <table>
                <tr>
                    <th>Setname</th>
                    <th>Id</th>
                    <th>URL</th>
                    <th>Picture</th>
                </tr>

            <?php
            $link = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";
                $value = $_GET['setid'];
                   
                
                $connection	= mysqli_connect("mysql.itn.liu.se","lego","","lego");
                // $question = "SELECT sets.Setname, sets.SetID, images.ItemID, images.has_gif FROM sets 
                // WHERE sets.Setname LIKE '%$value%' OR sets.SetID LIKE '%$value%' LIMIT 60";
                

                   
                // $connection	= mysqli_connect("mysql.itn.liu.se","lego","","lego");
                // $question = "SELECT sets.Setname, sets.SetID, images.ItemID, images.has_gif FROM inventory, sets, images 
                // WHERE images.ItemID=sets.SetID AND sets.Setname LIKE '%$value%' OR sets.SetID LIKE '%$value%'";


                $question="SELECT * FROM inventory WHERE inventory.SetID = '$value'";

             
                // print "$value";

                // $question="SELECT sets.Setname, sets.SetID FROM sets WHERE sets.Setname LIKE '%$value%' OR sets.SetID LIKE '%$value%'";

                $result	= mysqli_query($connection, $question);	

                while ($row = mysqli_fetch_array($result))	{
                    $setid = $row ['SetID'];
                    // $itemID = $row ['ItemID'];
                    $gif = $row ['has_gif'];
                    $setname = $row ['Setname'];
                    // $url = "S/$itemID";
                    // if($gif){
                    //     $url .= ".gif";
                    // }
                    // else{
                    //     $url .= ".jpg";
                    // }
                    //$image = "<img src='$link$url' alt = '' >";
                    

                    $imagesearchquestion = "SELECT * FROM images WHERE ItemtypeID='S' AND ItemID = '$setid'";
                    $imagesearch = mysqli_query($connection, $imagesearchquestion);	
                    $imagevector = mysqli_fetch_array($imagesearch);
                    if($imagevector['has_jpg']){
                        $endlink = "S/$setid.jpg";
                        
                    }
                    else if($imagevector['has_gif'])
                    {
                        $endlink = "S/$setid.gif";
                       
                    }
                    $image = "<img src='$link$endlink' alt = '' >";





                     echo "<div><tr><td><a href='http://www.student.itn.liu.se/~johro712/tnmk30/Projektarbete.25.11/setIDpage.php?setid=$setid'>" . $setname . "</a></td> <td>" . $setid . "</td>  
                     <td>" . $endlink . "</td><td> $image</td></tr></div>\n";  
                    }
            ?>

        </table>
        </div>
    </body>
</html>





