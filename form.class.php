<?php

class form{
		public $section;
		public $title;
		public $type;
		function __construct($type,$title){
				$this->type = (string) $type;
				$this->title = (string) $title;
				echo '
				<div class="popup" id="popup-'.$this->type.'">
				<div class="titlewrap">'.$this->title.'</div>
				<div class="popcontent">';
		}
		public function add($section){
		$this->section = (string) $section;
		echo $this->section;
		echo '
			<form id="pgt-form" method="post" action="../pgt.php">
			<label>جدید : </label><input name="pgt" type="text" class="pgt">
			<input id="section" name="section" type="hidden" value="'.$this->section.'">
			<input name="submit" class="button" type="submit" value="ثبت">
			</form>
		';
		//close the pop up
		echo '</div></div>';
		}

		public function edit($section){
		$this->section = (string) $section;
		echo $this->section;
		echo '

		';
		//close the pop up
		echo '</div></div>';
		}

		public function delete($section){
		$this->section = (string) $section;
		echo $this->section;
		echo '

		';
		//close the pop up
		echo '</div></div>';
		}
}