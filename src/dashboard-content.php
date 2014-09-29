	<div class="content">
	<?php include 'config.php'; ?>
			<ul class="report">
			<li>
			<div class="rmain">
				<div class="icon"></div>
				<div class="num">
				<?php 
				//Get new unread mail
				$user_id=$_SESSION['user_id'];
				$db->query("SELECT COUNT(*) FROM receivers WHERE(userid='$user_id' AND view='no')");
				$resultt = $db->get();
				foreach ($resultt as $vv) {echo $vv[0];}
				?>
				</div>
				<div class="bottom">نامه خوانده نشده</div>
			</div>
			<div class="rlink"><a href="dashboard/letters">مشاهده بیش تر ...</a></div>
			</li>
			
			<li>
			<div class="rmain">
				<div class="icon"></div>
				<div class="num">
				<?php
				//Get ALl mails
				$user_id=$_SESSION['user_id'];
				$db->query("SELECT COUNT(*) FROM receivers WHERE(userid='$user_id')");
				$resultt = $db->get();
				foreach ($resultt as $vv) {echo $vv[0];}
				?>
				</div>
				<div class="bottom">نامه دریافت شده</div>
			</div>
			<div class="rlink"><a href="dashboard/letters">مشاهده بیش تر ...</a></div>
			</li>

			<li>
			<div class="rmain">
				<div class="icon"></div>
				<div class="num">
				<?php
				//Get sent mails
				$user_id=$_SESSION['user_id'];
				$db->query("SELECT COUNT(*) FROM letter WHERE(userid='$user_id' AND status='ارسال شده')");
				$resultt = $db->get();
				foreach ($resultt as $vv) {echo $vv[0];}
				?>
				</div>
				<div class="bottom">نامه ارسال شده</div>
			</div>
			<div class="rlink"><a href="dashboard/newletter">مشاهده بیش تر ...</a></div>
			</li>
		</ul>

	</div>