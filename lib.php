
<?php

class ERS {


	public function isUniqueVisitor($email){


		$sql=mysql_query("SELECT * FROM reg_member WHERE email='$email'");


		if(mysql_num_rows($sql)>=1){
			return false;
		}else{

			return true;
		}
	}


	public function PrintVisitorBadge($email){

		echo "launch print command now!";
	}

	public function addNewVisitor($userForm){
		//var_dump($userForm);
		$col="";
		$vals="";

$userForm=array_filter($userForm);

//var_dump($userForm);
//echo "<hr/>";

		if ( !( (isset($userForm["firstname"])) && (isset($userForm["lastname"])) && (isset($userForm["email"]))  && (!empty($userForm)) ) ){

			?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p>Fill all the required fields before saving </p>

			</div>

			<?php
			return false;			
		}



		var_dump( !empty($userForm["email"]) );


		if ( ( isset($userForm["email"]) ) and (!empty($userForm["email"])) ){
			//var_dump($this->isUniqueVisitor($userForm["email"]));
echo "ok";
			if ( !($this->isUniqueVisitor($userForm["email"])) ) {
				?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<p>This mail is already used in our database. You can paste it in the "Already registred visitor" field to know more.</p>				
				</div>

				<?php

				return false;
			}

			$email=$this->securePostVar($userForm["email"]);
			$col.= "email,";
			$vals.= $email.",";

		}


		if ((isset($userForm["firstname"])) && ( !empty($userForm["firstname"]) ) ){
		
			$firstname=$this->securePostVar($userForm["firstname"]);
			$col.= "firstname,";
			$vals.= $firstname.",";
		}

		if ((isset($userForm["lastname"])) && (!empty($userForm["lastname"]))){
			$lastname=$this->securePostVar($userForm["lastname"]);
			$col.= "lastname,";
			$vals.= $lastname.",";
		}

		if ((isset($userForm["age"])) && ($userForm["age"] != "")){
			$age=$this->securePostVar($userForm["age"]);
			$col.= "age,";
			$vals.= $age.",";
		}

		if ((isset($userForm["gender"])) && ($userForm["gender"] != "")){
			$gender=$this->securePostVar($userForm["gender"]);
			$col.= "gender,";
			$vals.= $gender.",";
		}


		if ((isset($userForm["address"])) && ($userForm["address"] != "")){
			$address=$this->securePostVar($userForm["address"]);
			$col.= "address,";
			$vals.= $address.",";
		}


		if ((isset($userForm["c_number"])) && ($userForm["c_number"] != "")){
			$c_number=$this->securePostVar($userForm["c_number"]);
			$col.= "c_number,";
			$vals.= $c_number.",";

		}

		if ((isset($userForm["organisation"])) && ($userForm["organisation"] != "")){
			$organisation=$this->securePostVar($userForm["organisation"]);
			$col.= "organisation,";
			$vals.= $organisation.",";

		}
		$query="INSERT INTO reg_member(".substr($col, 0, -1).") VALUES (".substr($vals, 0, -1).")";

		//echo $query;
		if (true){
		//if (mysql_query($query)){

			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p>The user was succeesfully registred in the visitor's database.</p>				
			</div>

			<?php
		}


	}


	public function previewProfile($email){

	if ($email==""){

	?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p>Fill the fields before trying to check the visitor's profile. </p>
	</div>

	<?php
	exit();
}


$query=mysql_query("select * from reg_member WHERE (email = '$email')")or die(mysql_error());

if (mysql_num_rows($query) == 1){


	$row=mysql_fetch_assoc($query);
//var_dump($row);
	?>
	<h3><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></h3>

	<table class="table">
		<tr>
			<td>First Name</td>
			<td><?php echo $row['firstname']; ?></td>
		</tr>


		<tr>
			<td>Last Name</td>
			<td><?php echo $row['lastname']; ?></td>
		</tr>

		<tr>
			<td>Gender</td>
			<td><?php echo $row['gender']; ?></td>
		</tr>

		<tr>
			<td>Address</td>
			<td><?php echo $row['address']; ?></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><?php echo $row['email']; ?></td>
		</tr>

	</table>

	<?php
}else{
	?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<p>This visitor is not included in our database. We suggest to proceed to 1 of these 3 Options: </p>
		<ol>
			<li>Check the spelling of the name/surname or just type the email used for registration.</li>
			<li>Go to <a href="refresh.php" target="_blank">refresh visitor's list</a> to add the latest registation.</li>
			<li>If the visitor still unavailable, just fill the form at your right.</li>
		</ol>
	</div>

	<?php
}

}
public function securePostVar($var){
	return  mysql_real_escape_string(trim($var));
//return htmlentities($var);

}
public function typeheadQuery($q,$type="email"){
	$q="%".$q."%";
	switch ($type) {

		case 'name':
		$query=mysql_query("select * from reg_member WHERE (firstname LIKE '$q') OR (lastname LIKE '$q')")or die(mysql_error());

		break;

		case 'email':
		default:
		$query=mysql_query("select * from reg_member WHERE (email LIKE '$q')")or die(mysql_error());
		break;
	}


//var_dump($query);
	$numResults = mysql_num_rows($query);
	$counter = 0;
	echo "[";
	while($row=mysql_fetch_array($query)){
		?>

		{
		"name": "<?php echo $row['firstname']." ".$row['lastname']; ?>",
		"description": "<?php echo $row['address']; ?>",
		"language": "<?php echo $row['email']; ?>",
		"value": "<?php echo $row['email']; ?>",
		"tokens": [
		"<?php echo $row['firstname']; ?>",
		"<?php echo $row['email']; ?>"
		]
	}<?php
	if (++$counter != $numResults) {echo ",";}
}


echo "]";




/*
echo ',{
"name": "typeahead.js",
"description": "A fast and fully-featured autocomplete library",
"language": "JavaScript",
"value": "typeahead.js",
"tokens": [
  "typeahead.js",
  "JavaScript"
]
}';

*/
}

}


?>