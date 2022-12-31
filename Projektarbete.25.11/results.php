
<?php include "pagestart.php"; ?>

        


        <div id="list">
        <div class="Title">
            <h1>RESULTS</h1>
            <form action="results.php" method="put" class="realbar">
            <input type="text" placeholder="Search.." class="search" name="search"  required> 
            <button type="submit" class="searchButton"> <i class="fa fa-search"></i></button>
            </form>



    

        </div>
        <div id="ordermenu">
<?php



            $order = 'LENGTH (sets.Setname) asc';
           

            if(isset($_GET['order'])){
               
                $order = htmlspecialchars($_GET['order']);
               

            } 

          

        

        ?>
</div>


            
            <?php

            if (isset($_GET['page'])) {
                $currentPage = htmlspecialchars($_GET['page']);
             }else {
                $currentPage = 1;//default page
                }

                if (isset($_GET['itemsperpage'])) {
                    $itemsPerPage = htmlspecialchars($_GET['itemsperpage']);
                  }else {
                    $itemsPerPage = 50;//default limit
                  }




            



            $totalPages = 1; //default pages
            $offSet = 0; //Default value

            $offSet = ($currentPage-1) * $itemsPerPage;

           
            $value = $_GET['search'];


            $link = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";
               
                                   
            $connection	= mysqli_connect("mysql.itn.liu.se","lego","","lego");
        
             $question="SELECT sets.Setname, sets.SetID, sets.Year FROM sets
             WHERE sets.Setname LIKE '%$value%' OR sets.SetID LIKE '%$value%' 
             ORDER BY 
            $order
           


             limit $offSet, $itemsPerPage ";
            
            $que = "SELECT COUNT(*) as total FROM sets WHERE sets.Setname LIKE '%$value%' OR sets.SetID LIKE '%$value%'";
        

            $result= mysqli_query($connection, $question);
            $res2 = mysqli_query($connection, $que);
            $howmany = mysqli_fetch_array($res2)['total']/$itemsPerPage;

            


            if (!is_int($howmany)) {
                $howmany = round($howmany);
              }

              



$howmanytester = $howmany/2;
if (!is_int($howmanytester)) {
$howmanytester = round($howmanytester);
}
              
   

           $asc = 'sets.Year asc';
           $desc = 'sets.Year desc';
            ?>

</div>
            <div id="resultbarcontainer">
            <div id="resultbar">
            <?php
        
           


            echo"<h4 id='bordertable'>Current page: $currentPage</h4>";

            echo"<h4 id='bordertable'>Number of items per page: $itemsPerPage</h4>";

            print("<h4 id='bordertable'>number of pages: $howmany</h4>");

            
          
            if($howmanytester < $currentPage){
                if($howmanytester ==0){
                $howmanytester = 1;
                echo "<a id='bordertable' href='results.php?page=".$howmanytester."&itemsperpage=100&search=".$value."&order=$order'><h4>show 100 sets </h4></a> ";
                }
                else{
                echo"<a id='bordertable' href='results.php?page=".$howmanytester."&itemsperpage=100&search=".$value."&order=$order'><h4>show 100 sets </h4></a> ";
                }
                echo "<a id='bordertable' href='http://www.student.itn.liu.se/~johro712/tnmk30/experiment/Projektarbete.25.11/results.php?search=$value&order=$desc&page=".$howmanytester."'><h4>order by date descedning</h4>    </a>";
                
            echo "<a id='bordertable'href='http://www.student.itn.liu.se/~johro712/tnmk30/experiment/Projektarbete.25.11/results.php?search=$value&order=$asc&page=".$howmanytester."'><h4>order by date ascending</h4> </a>";
            }
            
            else {
            echo"<a id='bordertable' href='results.php?page=".$currentPage."&itemsperpage=100&search=".$value."&order=$order'><h4>show 100 sets</h4></a> ";

            echo "<a id='bordertable' href='http://www.student.itn.liu.se/~johro712/tnmk30/experiment/Projektarbete.25.11/results.php?search=$value&order=$desc&page=".$currentPage."'><h4>order by date descedning</h4>    </a>";
            
            echo "<a id='bordertable'href='http://www.student.itn.liu.se/~johro712/tnmk30/experiment/Projektarbete.25.11/results.php?search=$value&order=$asc&page=".$currentPage."'><h4>order by date ascending</h4> </a>";

            }

            echo"<a id='bordertable' href='results.php?page=".$currentPage."&itemsperpage=50&search=".$value."&order=$order&page=".$currentPage."'><h4>show 50 sets</h4> </a>";

                  
        
          



                  ?>
                  </div>
                  </div>
  

            <div id="listsets">


                  <?php

           






                if ($howmany === 0){
                    echo "<h2>sorry, didnt find any sets with that name or setid.</h2>";
                  }

                while ($row = mysqli_fetch_array($result))	{
                    $setid = $row ['SetID'];
                  
                    $gif = $row ['has_gif'];
                    $setname = $row ['Setname'];
                    $itemtypeid = $row ['itemtypeID'];
                    $year = $row['Year'];
                 
                  
                      echo "$itemtypeid";
                        ///is pack function
                        $ispack = "SELECT sets.SetID, sets.Setname COUNT(*) as total FROM inventory, sets WHEREinventory.SetID = '$value' AND inventory.ItemID = sets.SetID";
                        $many = mysqli_fetch_array($ispack)['total'];

          


                        

                        $packtest = "SELECT sets.SetID, sets.Setname
                        FROM inventory, sets
                        WHERE inventory.SetID = '$setid' AND inventory.ItemID = sets.SetID";


                        $checkpacks = "SELECT COUNT(*) as total FROM inventory, sets WHERE inventory.SetID = '$setid' AND inventory.ItemID = sets.SetID";


                        $packresult= mysqli_query($connection, $checkpacks);
                        $howmanypacks = mysqli_fetch_array($packresult)['total'];


                     




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

                    

//link for sets         
if($howmanypacks >= 1){
    echo "<a href='http://www.student.itn.liu.se/~johro712/tnmk30/experiment/Projektarbete.25.11/packs.php?setid=$setid&setname=$setname'><div class='content'> $image 
    setname: $setname<br>
    setid: $setid <br>
    year: $year<br>
     </div></a>";
}
// class='nummer1'
else{
    echo "<a href='http://www.student.itn.liu.se/~johro712/tnmk30/experiment/Projektarbete.25.11/setIDpage.php?setid=$setid&setname=$setname'><div class='content'> $image  
    setname: $setname<br> 
    setid: $setid <br>
    year: $year</div></a>";
   }
                   
                    }

                    

                    
                
    
                        mysqli_close($connection); 
                    

                    

            ?>

     

        
        </div>

<div class="contpage">
        <?php

        for($i = 0; $i < $howmany; $i++){
                    $pageNumber = $i + 1;
                    echo "<a id='bordertablepagination' href='http://www.student.itn.liu.se/~johro712/tnmk30/experiment/Projektarbete.25.11/results.php?page=$pageNumber&itemsperpage=$itemsPerPage&search=$value&order=$order'> Page $pageNumber </a>";
            
                        }
       ?>
      </div>

        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Top</button>
    </body>
</html>





<!-- -- http://www.student.itn.liu.se/~jakka150/ -->

