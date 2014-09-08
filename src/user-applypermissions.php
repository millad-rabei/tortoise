<div class="content">
<form id="applyperm" method="post" action="../applyperm.php">
	<table class="permissionstbl">
		<tr>
			<td>مجوز</td>
<?php
include 'config.php';
$tdcount=0;
$db->query("SELECT * FROM groups");
$result = $db->get();
foreach ($result as $res) {
	$tdcount++;
	$gridarr[]=$res[0];
	echo "<td>".$res[1]."</td>";
}
?>
		</tr>
		<tr>
<?php
include 'config.php';
$db->query("SELECT * FROM permission");
$result = $db->get();
foreach ($result as $res2) {
	echo "<td>".$res2[1]."</td>";
	for ($i=0;$i<$tdcount;$i++){
		echo "<td><input type='checkbox' name='perm[]' class='checkperm' value='".$gridarr[$i]."@".$res2[0]."'";

				//checked ...
				$db->query("SELECT * FROM grouppermission WHERE groupid='$gridarr[$i]'");
				$result2 = $db->get();
				foreach ($result2 as $c) { if ($c[2]==$res2[0]) echo " checked"; }
					echo"></td>";
	}
	echo "</tr>";
}
?>			

	</table>
	<input type="submit" value="به روز رسانی">
</form>

</div>