<?php
include 'config.php';
$keyword=$_GET['search_keyword'];

$db->query("SELECT * FROM user WHERE (firstname like '%$keyword%' OR lastname like '%$keyword%')");
$result = $db->get();
$numrs = count($result);
echo '<ul class="chk-container">';
foreach ($result as $v) {
	echo $numrs." ".$v[4].'
<li><input class="receivers_checkbox" type="checkbox" name="check[]" value="item1"> This is Item 1</li>
<br>';
}
echo '</ul>';