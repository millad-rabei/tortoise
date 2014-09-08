<?php 
	$db->query("SELECT * FROM options WHERE(option_name='letter_header')");
	$result = $db->get();
	foreach ($result as $v) {
		$letter_header = $v[2];
	}
	$db->query("SELECT * FROM options WHERE(option_name='deadline_archive')");
	$result = $db->get();
	foreach ($result as $v) {
		$deadline_archive = $v[2];
	}
?>
<div class="content">
	<div class="header-preview">
		<p>سربرگ موجود :</p>
		<a target="_blank" href="<?php echo $letter_header; ?>"><img src="<?php echo $letter_header; ?>"></a>
	</div>
	<div class="options-content">
	<p>تذکر : حجم فایل سربرگ نباید بیش تر از 400KB باشد.</p><br>
		<form id="options" method="post" action="applyoptions.php" enctype="multipart/form-data">
			<label>نام سازمان / شرکت : </label><input name="orgname" type="text" class="optionsinput" value="<?php echo $org_name; ?>"><br><br>
			<label>سربرگ نامه : </label><input name="letterheader" type="file" class="optionsinput"><br><br>
			<label>تعداد روز آرشیو خودکار : </label><input name="deadline_archive" type="text" class="optionsinput" value="<?php echo $deadline_archive; ?>"><br><br>
			<input name="currentheader" type="hidden" value="<?php echo $letter_header; ?>">
			<input type="submit" value="به روز رسانی">
		</form>
	</div>
</div>
