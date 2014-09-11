<?php
//continue : createpopup.php

class form{
		public $section;
		public $title;
		public $type;
		public $id;
		public $value;
		public $userid;
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
		public function addletter_internal($userid){
			$this->userid = (int) $userid;
			include 'config.php';
			include 'letternumber.function.php';
			$type="internal";

		echo '
			<form id="addletter" method="post" action="../addletter.php" enctype="multipart/form-data" accept-charset="utf-8">
			<div class="rightform">
			<label>شماره نامه : </label><input type="text" value="'.LetterNumber($type).'" name="letter_number" ><br>
			<label>موضوع : </label><input type="text" name="letter_subject"><br>
			<div id="form" ></div>
			<label>انتخاب گیرندگان : </label><br>

			<input type="checkbox" id="selecctall"/><label for="selecctall">انتخاب همه</label><br>
			<div class="receivers_result">
			  <ul id="list">';
				  //usertitle info
				$db->query("SELECT * FROM usertitle");
				$result = $db->get();
				foreach ($result as $usertitle) {
				echo '<li><a><input class="receivers_checkbox" type="checkbox" name="receivers[]" id="'.$usertitle[0].'" value="'.$usertitle[0].'">';
				//به دست آوردن نام و نام خانوادگی
				$db->query("SELECT user.firstname,user.lastname FROM user INNER JOIN usertitle ON user.userid=usertitle.userid WHERE usertitle.usertitleid='$usertitle[0]'");
				$result2 = $db->get();
				foreach ($result2 as $v) {
					foreach ($v as $user) {
        				echo '<label for="'.$usertitle[0].'">'.$v[0]." ".$v[1]."</label>";break;
    					}
    				}
    			//به دست آوردن سمت
				$db->query("SELECT title.title FROM title INNER JOIN usertitle ON title.titleid=usertitle.titleid WHERE usertitle.usertitleid='$usertitle[0]'");
				$result2 = $db->get();
				foreach ($result2 as $v) {
					foreach ($v as $user) {
        				echo " [".$v[0]."]";break;
    					}
    				}
				echo '</a></li>'; 
				}
			echo '
				</ul> 
			</div>

			</div>

			<div class="leftform">
			<label>ارسال از سمت : </label>
			<select name="title">';
			
			$db->query("SELECT title.titleid,title.title FROM title INNER JOIN usertitle ON title.titleid=usertitle.titleid WHERE usertitle.userid='$this->userid'");
				$result3 = $db->get();
				foreach ($result3 as $v) {
					foreach ($v as $user) {
					echo '<option value="'.$v[0].'">'.$v[1].'</option>';break;
					}
				}
			echo '
			</select>
			<br>
			<label>جهت : </label><select name="letter_action">
			<option value="استحضار">استحضار</option>
			<option value="دعوت به جلسه">دعوت به جلسه</option>
			<option value="اقدام">اقدام</option>
			<option value="اطلاع">اطلاع</option>
			</select><br>
			<label>فایل های ضمیمه : </label><input type="file" name="letter_attachment"><br>
			<input id="upload_attachment" type="button" value="ضمیمه کردن"><label>ضمیمه ها :</label><br>
			<div class="attachment_result"><ul id="attach_result"></ul></div>
			</div>

			<div class="bottomform">
			<label>متن اصلی : </label><textarea name="letter_maintext"></textarea>

            <br>			
			<input type="hidden" name="user_id" value="'.$this->userid.'">
			<input type="hidden" name="letter_type" value="'.$type.'">
			<input class="button" id="send" type="button" value="ارسال">
			<input class="button" id="draft" type="button" value="ذخیره پیشنویس">
			</div>
			</form>';
		//close the pop up
		echo '</div></div>';
		}


		// to manage open workdatabase.class.php
		public function addletter_incoming($userid){
			$this->userid = (int) $userid;
			include 'config.php';
			include 'letternumber.function.php';
			$type="incoming";

		echo '
			<form id="addletter" method="post" action="../addletter.php" enctype="multipart/form-data" accept-charset="utf-8">
			<div class="rightform">
			<label>شماره نامه : </label><input type="text" value="'.LetterNumber($type).'" name="letter_number" ><br>
			<label>شماره سند : </label><input type="text" name="docnumber"><br>
			</div>

			<div class="leftform">
			<label>فرستنده : </label><input type="text" name="sender"><br>
			<label>تاریخ سند : </label><input type="text" name="docdate"><br>
			<label>تصویر سند : </label><input type="file" name="letter_attachment"><br>
			<input id="upload_attachment" type="button" value="ضمیمه کردن">
			</div>

			<div class="bottomform">
			<label>تصاویر سند :</label><br>
			<div class="attachment_result"><ul id="attach_result">
			
			</ul></div>
			<input type="hidden" name="user_id" value="'.$this->userid.'">
			<input type="hidden" name="letter_type" value="'.$type.'">
			<input class="button" id="incoming" type="button" value="ثبت سند در سیستم">
			</div>
			</form>';
		//close the pop up
		echo '</div></div>';
		}

		// to manage open workdatabase.class.php
		public function addletter_external($userid){
			$this->userid = (int) $userid;
			include 'config.php';
			include 'letternumber.function.php';
			$type="external";

		echo '
			<form id="addletter" method="post" action="../addletter.php" enctype="multipart/form-data" accept-charset="utf-8">
			<div class="rightform">
			<label>شماره نامه : </label><input type="text" value="'.LetterNumber($type).'" name="letter_number" ><br>
			<label>موضوع : </label><input type="text" name="letter_subject"><br>
			</div>

			<div class="leftform">
			<label>گیرنده : </label><input type="text" name="to"><br>
			<label>جهت : </label><select name="letter_action">
			<option value="استحضار">استحضار</option>
			<option value="دعوت به جلسه">دعوت به جلسه</option>
			<option value="اقدام">اقدام</option>
			<option value="اطلاع">اطلاع</option>
			</select><br>
			</div>

			<div class="bottomform">
			<label>متن اصلی : </label><textarea name="letter_maintext"></textarea>

            <br>
			<input type="hidden" name="user_id" value="'.$this->userid.'">
			<input type="hidden" name="letter_type" value="'.$type.'">
			<input type="hidden" name="title" value="">
			<input class="button" id="external" type="button" value="ثبت سند در سیستم">
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