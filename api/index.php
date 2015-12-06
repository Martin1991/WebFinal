<?php
$con = mysqli_connect('localhost','root','199058','books');
if (!$con)
{
	die('Could not connect: ' . mysqli_error($con));
}
//mysqli_select_db($con,"ajax_demo");
$id=explode("/books", $_SERVER['REQUEST_URI']);
if($id[1]=="")
{
	$sql="SELECT title FROM book";
	$result = mysqli_query($con,$sql);
	echo "<table border='1'>
	<tr>
	<th>title</th>
	</tr>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['title'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else
{
	$id_exact = explode("/",$id[1]);
	//$result = mysqli_query($con,"SELECT * FROM babynames WHERE Gender='".$_SESSION['Gender']."' and year='".$_SESSION['Year']."'");
	$sql_books="SELECT book.`Book-id`, title, year, price, category, authors.`Author-id`, authors.`Author-Name` FROM book, `book-authors`, authors
	WHERE book.`Book-id` = $id_exact[1] AND book.`Book-id`=`book-authors`.`Book-id` and `book-authors`.`Author-id`=authors.`Author-id`";
	$result = mysqli_query($con,$sql_books);
	echo "<table border='1'>
	<tr>
	<th>Book-id</th>
	<th>title</th>
	<th>year</th>
	<th>price</th>
	<th>category</th>
	<th>Author-Name</th>
	</tr>";
	$row = mysqli_fetch_array($result);
	echo "<tr>";
	echo "<td>" . $row['Book-id'] . "</td>";
	echo "<td>" . $row['title'] . "</td>";
	echo "<td>" . $row['year'] . "</td>";
	echo "<td>" . $row['price'] . "</td>";
	echo "<td>" . $row['category'] . "</td>";
	$author_name = $row['Author-Name'];
	while($row = mysqli_fetch_array($result))
	{
		$author_name = $author_name.",".$row['Author-Name'];
	}
	echo "<td>" . $author_name . "</td>";
	echo "</tr>";
	echo "</table>";
}
mysqli_close($con);
?> 
