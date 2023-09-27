<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.title{
			
			background-color: red;
		padding: 20px;
		color: #fff;
		}
		table {
    width: 100%;
    border: 2px solid #ddd;
}

th, td {
    text-align: center;
    padding: 8px;
  border: 2px solid #ddd;  
}

	</style>
</head>
<body>
<h1 class="title"><img src="https://technosmarter.com/assets/images/logo.png">Programming & Development </h1>
<hr>
<?php 
	 $website ='Techno Smarter'; 
	 $logo='https://yt3.ggpht.com/ytc/AMLnZu9_N5U7lD9TLzpUbZFx5oCsQM2O7KyPEvHurZwHXg=s176-c-k-c0x00ffffff-no-rj-mo';
	 $url='https://technosmarter.com';
	 $category='PHP';
?> 
<table>
	<tr>
		<th> Website Title</th>
		<th> Website Logo </th>
		<th> Website URL</th>
		<th> Category</th>
		
	</tr>
	<tr>
		<td><?php echo $website ;?></td>
		<td><img src="<?php echo $logo ;?>"></td>
		<td><?php echo $url;?></td>
		<td><?php echo $category;?></td>

	</tr>
</table>
<h2 style="background:yellow;"> This PDF is created with HTML,CSS and PHP code using HTML2PDF ... </h2>
<h2 style="background:yellow;">HTML code to PDF using PHP ...</h2>
<hr>
<h4 style="background:blue;color: #fff;">This is computer generated pdf.If you have any issue with it , you can contact on Techno Smarter ...  </h4>

</body>
</html>