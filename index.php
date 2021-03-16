<!DOCTYPE html>
<?php
        $json_string	=	file_get_contents("https://armory.warmane.com/api/guild/Moon+Eclipse/Frostmourne/members");
	    $guild_string	=	json_decode($json_string);

//TRANSLATIONS

$var_name			=	"Name";
$var_race			=	"Race";
$var_class			=	"Class";
$var_level			=	"Level";
$var_achievementpoints  =	"Achievement Points";
$var_online			= 	"Status";
?>


<html>

<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="sorting.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="sorting.js"></script>

</head>

<body class="bg-dark text-light">



<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Moon Eclipse</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample03">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-md-0">
      <input class="form-control" type="text" placeholder="Search">
    </form>
  </div>
</nav>


<a href="loot_council.php">Loot Council</a>
<table  class="table table-dark table-striped table-bordered table-sortable">
	<thead>
					
		<tr>
			<th><?php echo $var_online; ?></th>
			<th><?php echo $var_name; ?></th>
			<th><?php echo $var_race; ?></th>
			<th><?php echo $var_class; ?></th>
			<th><?php echo $var_level; ?></th>
			<th><?php echo $var_achievementpoints; ?></th>				
		</tr>
	</thead>
	<tbody>
	<?php
                //Decoding json string into an array.

		$guild_roster = json_decode($json_string, true);
		$guild_roster = $guild_roster['roster'];

                //Looping trought an array and using its values.

		foreach($guild_roster as $key => $value)
		{
			echo '<tr>';
				echo '<td>' .($value['online'] > 0 ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>" ). '</td>';

                                //What i did in next line of code is a link on a name to open a new page with user information. In my case the page is called 
                               // user_info.php with an ID extension which will be name, so its auto set for each name.(Check user_info.php tutorial how to fetch ID)

				echo '<td><a href="user_info.php?id=' . $value['name'] . '">' . $value['name'] . '</a></td>'; 
				echo '<td>' . $value['race'] . '</td>';
				echo '<td>' . $value['class'] . '</td>';
				echo '<td>' . $value['level'] . '</td>';
				echo '<td>' . $value['achievementpoints'] . '</td>';
			        echo '</tr>';
				echo '</a>';
		}
	?>
	</tbody>
</table>
</body>
</html>