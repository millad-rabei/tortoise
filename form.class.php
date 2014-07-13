<?php

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
			<label>محتوی : </label><input name="pgt" type="text" class="pgt" value="'.$this->value.'">
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


		public function adduser(){
		echo '
			<form id="pgt-form-adduser" method="post" action="../run-query-pgt.php">
			<div class="containli"><label>نام کاربری : </label><input style="direction:LTR;" name="username" type="text" class="pgt"></div></br>
			<div class="containli"><label>رمز عبور : </label><input style="direction:LTR;" name="password" type="password" class="pgt"></div></br>
			<div class="containli"><label>تکرار رمز عبور : </label><input style="direction:LTR;" name="confirm-password" type="password" class="pgt"></div></br>
			<div class="containli"><label>نام : </label><input name="firstname" type="text" class="pgt"></div></br>
			<div class="containli"><label>نام خانوادگی : </label><input name="lastname" type="text" class="pgt"></div></br>
			<div class="containli"><label>فایل امضاء : </label><input style="direction:LTR;" name="signature" type="file" class="pgt"></div></br>
			<div class="containli"><label>کدملی : </label><input style="direction:LTR;" name="melicode" type="text" class="pgt"></div></br>
			<div class="containli"><label>تلفن همراه : </label><input style="direction:LTR;" name="cellphone" type="text" class="pgt"></div></br>
			<div class="containli"><label>تاریخ تولد : </label><input style="direction:LTR;" pattern="[A-Za-z]{3}" name="birthdate" type="text" class="pgt"></div></br>
			<div class="containli"><label>آدرس : </label><input name="address" type="text" class="pgt"></div></br>
			<div class="containli"><label>جانشنین : </label>
			<select class="pgt" >
				<option value="volvo">Volvo</option>
				<option value="saab">Saab</option>
				<option value="mercedes">Mercedes</option>
				<option value="audi">Audi</option>
			</select> 
			</div></br>
		<div class="containselect">
			<div class="containli"><label>انتخاب گروه ها : </label>
			<select class="pgt" >
				<option value="volvo">Volvo</option>
				<option value="saab">Saab</option>
				<option value="mercedes">Mercedes</option>
				<option value="audi">Audi</option>
			</select>
			</div>
						<input name="submit" class="button" type="submit" value="ثبت"> 
		</div>
			</br>
			<input name="whatwork" type="hidden" value="adduser">
			<input type="hidden" name="id" value="">
			<input id="section" name="section" type="hidden" value="'.$this->section.'">
			<div class="containli"><input name="submit" class="button" type="submit" value="ثبت">
			<input class="button" type="reset" value="از نو"></div>
			</form>
		';
		//close the pop up
		echo '</div></div>';
		}
}