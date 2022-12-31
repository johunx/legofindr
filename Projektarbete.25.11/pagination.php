<?php
  

//Count the items in the first column to get the total number of items (rows)
$rowCountQuery = "select count($result)";
$rowCountResults = mysqli_query($connection, $rowCountQuery);
$data=mysqli_fetch_assoc($rowCountResults);

// print_r($data);
$rowCount = $data['total'];

//Calculate the amount of pages based on the total amount of items and how 
//many we are showing on each page
$totalPages= $rowCount/$itemsPerPage;
// Check if the total number of pages is a full number
if (!is_int($totalPages)) {
  $totalPages = round($totalPages)+1;
}

//Pagination, if we show 50 per page ($itemsPerPage=50) 
//it means page 1 = items 1-50, page 2 = items 51-100, page 3 = items 101-150 
//and page 4 = items 151-200
//Finding the offset (how many to skip), for example if we are on page 4 and we show 
// 50 items per page, we should show items 151-200, the offset should be 150.
//If we are on page 4 we should show items 


$offSet = ($currentPage-1) * $itemsPerPage;


for ($i=0; $i < $totalPages; $i++) { 
    $pageNumber = $i + 1; //Add one as we start the counter on 0
    echo '<a href="pagination.php?table='.$tableName.'&page='.$pageNumber.'&itemsperpage='.$itemsPerPage.'">Page '.$pageNumber.'</a> ';
  }

  ?>