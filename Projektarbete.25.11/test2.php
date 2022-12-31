<!doctype html>
<head>


</head>

<body>
<div class="row justify-content-center my-5  ">
        <div class="col-6 text-center">
            <form>
                <div class="input-group mb-3">
                    <input type="text" id="search" class="form-control form-control-lg" placeholder="Search Here" autocomplete="off">
                    <button type="submit" id="submit" class="input-group-text btn-success px-4"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <div id="list"></div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <div id="card"> </div>
        </div>
    </div> 

</body>
</html>



if($howmanytester < $currentPage){
                if($howmanytester ==0){
                    $url100setsif0 = "results.php?page=".$howmanytester."&itemsperpage=100&search=".$value."&order=$order";

                    $encodedurl100setsif0 = urlencode($url100setsif0);
                $howmanytester = 1;
                echo "<a id='bordertable' href='$encodedurl100setsif0'><h4>show 100 sets </h4></a> ";

                }
                else{
                    $url100setsifnot0 = "results.php?page=".$howmanytester."&itemsperpage=100&search=".$value."&order=$order";
                    $encodedurl100setsifnot0 = urlencode($url100setsifnot0);
                echo"<a id='bordertable' href='$encodedurl100setsifnot0'><h4>show 100 sets </h4></a> ";
                }
                    $orderbydatedescurl = "http://www.student.itn.liu.se/~johro712/tnmk30/experiment/Projektarbete.25.11/results.php?search=$value&order=$desc&page=$howmanytester";
                    $encodedOrderbydatedescurl = urlencode($orderbydatedescurl);

                echo "<a id='bordertable' href='$encodedOrderbydatedescurl'><h4>order by date descedning</h4>    </a>";


                $orderbydateascurl = "http://www.student.itn.liu.se/~johro712/tnmk30/experiment/Projektarbete.25.11/results.php?search=$value&order=$asc&page=".$howmanytester."";
                $encodeOrderbydateasc = urlencode($orderbydateasc);
                 echo "<a id='bordertable'href=''><h4>order by date ascending</h4> </a>";
            }
            