<?php
//continue : createpopup.php

class form{
		public $section;
		public $title;
		public $type;
		public $id;
		public $value;
		function __construct($type,$title){
				$this->type = (string) $type;
				$this->title = (string) $title;
				echo '
				<div class="popup" id="popup-'.$this->type.'">
				<div class="titlewrap">'.$this->title.'</div>
				<div class="btnclose"><img id="imgclose" src="../images/close_on.gif"></div>
				<div class="popcontent">';
		}
		public function add($section){
		$this->section = (string) $section;
		echo '
			<form id="pgt-form-add" method="post" action="../run-query-pgt.php">
			<label>جدید : </label><input name="pgt" type="text" class="pgt">
			<input name="whatwork" type="hidden" value="add">
			<input type="hidden" name="id" value="">
			<input id="section" name="section" type="hidden" value="'.$this->section.'">
			<input name="submit" class="button" type="submit" value="ثبت">
			</form>
		';
		//close the pop up
		echo '</div></div>';
		}

		public function edit($section,$id,$value){
		$this->section = (string) $section;
		$this->id = (int) $id;
		$this->value = (string) $value;
		echo '
			<form id="pgt-form-edit" method="post" action="../run-query-pgt.php">
			<label>محتوی : </label><input  name="pgt" type="text" class="pgt" value="'.$this->value.'">
			<input name="whatwork" type="hidden" value="edit">
			<input type="hidden" name="id" value="'.$this->id.'">
			<input id="section" name="section" type="hidden" value="'.$this->section.'">
			<input name="submit" class="button" type="submit" value="ویرایش">
			</form>
		';
		//close the pop up
		echo '</div></div>';
		}



		public function delete($section,$id,$value){
		$this->section = (string) $section;
		$this->id = (int) $id;
		$this->value = (string) $value;
		echo '
			<form id="pgt-form-delete" method="post" action="../run-query-pgt.php">
			<label>محتوی : </label><input name="pgt" type="text" class="pgt" value="'.$this->value.'">
			<input name="whatwork" type="hidden" value="delete">
			<input type="hidden" name="id" value="'.$this->id.'">
			<input id="section" name="section" type="hidden" value="'.$this->section.'">
			<input name="submit" class="button" type="submit" value="حذف">
			</form>
		';
		//close the pop up
		echo '</div></div>';
		}


		// to manage open workdatabase.class.php
		public function addtitle($section){
		$this->section = (string) $section;
		echo '
			<form id="pgt-form-addtitle" method="post" action="../run-query-pgt.php">
			<label>عنوان : </label><input name="pgt" type="text" class="pgt"></br></br>
			<label>انتخاب گروه : </label></br>
			<input name="whatwork" type="hidden" value="addtitle">
			<input type="hidden" name="id" value="">
			<input id="section" name="section" type="hidden" value="'.$this->section.'">';
			include 'config.php';
    		//user info
    		$db->query("SELECT * FROM groups");
    		$result = $db->get();
     		foreach ($result as $v) {
     			echo "<input type='radio' name='grname' value='".$v[0]."' checked> ".$v[1]."</br>";
     		}

			echo '
			<input name="submit" class="button" type="submit" value="ایجاد سمت جدید">
			</form>';
		//close the pop up
		echo '</div></div>';
		}



		// to manage open workdatabase.class.php
		public function addletter(){
		echo '
			<form id="addletter" method="post" action="../addletter.php" enctype="multipart/form-data">

			<div class="topform">
			<label>نوع نامه :</label>
			<input id="type1" name="letter_type" type="radio" class="letter_type" value="internal" checked><label for="type1">داخلی</label> 
			<input id="type2" name="letter_type" type="radio" class="letter_type" value="incoming" ><label for="type2">وارده</label> 
			<input id="type3" name="letter_type" type="radio" class="letter_type" value="external" ><label for="type3">صادره</label>
			</div>

			<div class="rightform">
			<label>شماره نامه : </label><input type="text" value="1111" name="letter_number" disabled><br>
			<label>موضوع : </label><input type="text" name="letter_subject"><br>
			<label>انتخاب گیرندگان : </label><input type="text" name="letter_subject"><br>
			</div>

			<div class="leftform">
			<label>از : </label><input type="text" value="" name="letter_from" disabled><br>
			<label>جهت : </label><select name="letter_acion">
			<option value="eghdam">استحضار</option>
			<option value="eghdam">دعوت به جلسه</option>
			<option value="eghdam">اقدام</option>
			<option value="eghdam">اطلاع</option>
			</select><br>
			<label>فایل های ضمیمه : </label><input type="text" name="letter_subject"><br>
			</div>

			<div class="bottomform">
			<label>متن اصلی : </label><textarea class="ckeditor" name="letter_maintext"></textarea>
			<script>
                CKEDITOR.replace("letter_maintext"  );
            </script>
            <br>			
			<input name="submit" class="button" type="submit" value="ارسال">
			<input name="submit" class="button" type="submit" value="ذخیره">

			</div>
			</form>';
		//close the pop up
		echo '</div></div>';
		}

		public function adduser($section){
		$this->section = (string) $section;
		echo '
			<form id="pgt-form-adduser" method="post" action="../adduser.php" enctype="multipart/form-data">
			<div class="containli"><label>نام کاربری : </label>*<input style="direction:LTR;" name="username" type="text" class="pgt"></div></br>
			<div class="containli"><label>رمز عبور : </label>*<input style="direction:LTR;" name="password" type="password" class="pgt"></div></br>
			<div class="containli"><label>تکرار رمز عبور : </label>*<input style="direction:LTR;" name="confirm-password" type="password" class="pgt"></div></br>
			<div class="containli"><label>نام : </label>*<input name="firstname" type="text" class="pgt"></div></br>
			<div class="containli"><label>نام خانوادگی : </label>*<input name="lastname" type="text" class="pgt"></div></br>
			<div class="containli"><label>فایل امضاء : </label><input style="direction:LTR;" name="signature" id="signature" type="file" class="pgt"></div></br>
			<div class="containli"><label>کدملی : </label>*<input style="direction:LTR;" name="melicode" type="text" class="pgt"></div></br>
			<div class="containli"><label>تلفن همراه : </label>*<input style="direction:LTR;" name="cellphone" type="text" class="pgt"></div></br>
			<div class="containli"><label>تاریخ تولد : </label>*<input style="direction:LTR;" name="birthdate" type="text" class="pgt"></div></br>
			<div class="containli"><label>آدرس : </label>*<input name="address" type="text" class="pgt"></div></br>
			<div class="containli"><label>جانشنین : </label>
			<select class="pgt" name="successor">
				<option value="not-select">___ انتخاب کنید ___</option>';
		//get users to set successor
		include 'config.php';
		$db->query("SELECT * FROM user");
		$result = $db->get();
		foreach ($result as $v) {
				echo '<option value="'.$v[0].'">'.$v[3].' '.$v[4].'</option>';
			}

			echo '</select> 
			</div></br>
			<div class="containselect">
			<div class="containli"><label>انتخاب سمت اول : </label>
			*<select class="pgt" name="title1" >
			<option value="not-select">___ انتخاب کنید ___</option>';
		//get titles
		$db->query("SELECT * FROM title");
		$result = $db->get();
		foreach ($result as $v) {
				echo '<option value="'.$v[0].'">'.$v[1].'</option>';
			}
			echo '
				</select>
				</div>
			</div>
			</br>



		<div class="containli"><label>انتخاب سمت دوم : </label>
			<select class="pgt" name="title2" >
			<option value="not-select">___ انتخاب کنید ___</option>';
		//get title2
		$db->query("SELECT * FROM title");
		$result = $db->get();
		foreach ($result as $v) {
				echo '<option value="'.$v[0].'">'.$v[1].'</option>';
			}
			echo '
			</select>
			</div></br>

			<input id="section" name="section" type="hidden" value="'.$this->section.'">
			<div class="containli"><input name="submit" class="button" type="submit" value="ثبت">
			<input class="button" type="reset" value="از نو"></div>
			</form>
		';
		//close the pop up
		echo '</div></div>';
		}


		//edit user popup form
		public function edituser($section,$id){
		$this->section = (string) $section;
		$this->id = (int) $id;
		include 'config.php';
		$db->query("SELECT * FROM user WHERE userid='$this->id'");
		$result = $db->get();
		foreach ($result as $res) {
		echo '
			<div class="imgsign">امضا کاربر : <img src="../';
			if($res[5]=='null' || $res[5]==''){echo '/images/signature/default.jpg';}else{echo $res[5];}
			echo '"></div>
			<form id="pgt-form-edituser" method="post" action="../edituser.php">
			<div class="containli"><label>نام کاربری : </label><input disabled style="direction:LTR;" name="username" type="text" class="pgt" value="'.$res[1].'"></div></br>
			<div class="containli"><label>رمز عبور : </label>*<input style="direction:LTR;" name="password" type="password" class="pgt"></div></br>
			<div class="containli"><label>تکرار رمز عبور : </label>*<input style="direction:LTR;" name="confirm-password" type="password" class="pgt"></div></br>
			<div class="containli"><label>نام : </label>*<input name="firstname" type="text" class="pgt" value="'.$res[3].'"></div></br>
			<div class="containli"><label>نام خانوادگی : </label>*<input name="lastname" type="text" class="pgt" value="'.$res[4].'"></div></br>
			<div class="containli"><label>فایل امضاء : </label><input style="direction:LTR;" name="signature" type="file" class="pgt"></div></br>
			<div class="containli"><label>کدملی : </label>*<input style="direction:LTR;" name="melicode" type="text" class="pgt" value="'.$res[7].'"></div></br>
			<div class="containli"><label>تلفن همراه : </label>*<input style="direction:LTR;" name="cellphone" type="text" class="pgt" value="'.$res[8].'"></div></br>
			<div class="containli"><label>تاریخ تولد : </label>*<input style="direction:LTR;" name="birthdate" type="text" class="pgt" value="'.$res[9].'"></div></br>
			<div class="containli"><label>آدرس : </label>*<input name="address" type="text" class="pgt" value="'.$res[10].'"></div></br>
			<div class="containli"><label>جانشنین : </label>
			<select class="pgt" name="successor">
				<option value="not-select">___ انتخاب کنید ___</option>';
		//get users to set successor

		$db->query("SELECT * FROM user WHERE userid!='$this->id'");
		$result = $db->get();
		foreach ($result as $v) {
				echo '<option value="'.$v[0].'"';
				if ($v[0]==$res[11]){echo " selected";}
				echo '>'.$v[3].' '.$v[4].'</option>';
			}

			echo '</select> 
			</div></br>
			<div class="containselect">
			<div class="containli"><label>انتخاب سمت اول : </label>*
			<select class="pgt" name="title1" >
			<option value="not-select">___ انتخاب کنید ___</option>';
		//get title1
		$db->query("SELECT * FROM title  ORDER BY titleid DESC");
		$result = $db->get();
		foreach ($result as $v) {
				echo '<option value="'.$v[0].'"';
				//get title for usertitle table
				$count=0;
				$db->query("SELECT * FROM usertitle WHERE userid='$res[0]' ORDER BY usertitleid DESC");
				$result2 = $db->get();
				foreach ($result2 as $t) {
					$count++;
				if ($v[0]==$t[2]){echo " selected";}
				}
				echo '>'.$v[1].'</option>';
			}
			echo '
				</select>
				</div>
			</div>
			</br>



		<div class="containli"><label>انتخاب سمت دوم : </label>
			<select class="pgt" name="title2" >
			<option value="not-select">___ انتخاب کنید ___</option>';
		//get title2
		$db->query("SELECT * FROM title ORDER BY titleid DESC");
		$result3 = $db->get();
		foreach ($result3 as $vv) {
				echo '<option value="'.$vv[0].'"';
				//get title for usertitle table
				if($count>1){
				$db->query("SELECT * FROM usertitle WHERE (userid='$res[0]' AND titleid!='$t[2]') ORDER BY usertitleid DESC");
				$result4 = $db->get();
				foreach ($result4 as $tt) {
				if ($vv[0]==$tt[2] ){echo " selected";}
					}
				}
				echo '>'.$vv[1].'</option>';
			}
			echo '
				</select>
			</div></br>

			<input id="section" name="section" type="hidden" value="'.$this->section.'">
			<input name="userid" type="hidden" value="'.$this->id.'">
			<div class="containli"><input name="submit" class="button" type="submit" value="ثبت">
			</div>
			</form>
		';
		//close the pop up
		echo '</div></div>';
		}
	}

}