<?php
$query ="select * from pages";
$result = mysqli_query($con,$query);

$total_records = mysqli_num_rows($result);
//Ceil function - per page records
$total_pages = ceil($total_records/$per_page);

echo"
<center>
<div id='page'>
<a href='cr_page.php?page=1'>First Page</a>
";
for ($i=1; $i<=$total_pages; $i++){
    echo"<a href='cr_page.php?page=$i'>$i</a>";

}
echo"<a href='cr_page.php?page=$total_pages'>Last Page</a></center></div>";

?>