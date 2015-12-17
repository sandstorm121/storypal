<? $this->load->view("teacher/import"); ?>


<body style="background:#b33716;">
<div id="wrap" class="t_sub">
	<!-- header script include -->
	<div id="header">
	<?
		$this->load->view("teacher/header", $headerData);
	?>
	<!-- header script include -->
	<div id="container" class="full_height1">
		<div id="add">
			<div class="m_main">
				<div class="m_main1">
					<ul class="f_left l2 wrap add_ul">
						<li class="l1">
							<a href="/tpro/regstu"><span></span><!-- addclass active --></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="content" class="t_table">
			<div class="m_main">
				<div class="m_main1">
					<div class="t_cell h_con">
						<div class="mwrap c_wrap">
							<div class="card">
								<form name="crtStuCards" id = "crtStuCards" action="/tpro/regstu" method="POST">
								<input type="hidden" id="isButtonClick" name="isButtonClick"/>
								<input type="text" id="numCards" name="numCards" placeholder="Number of students" />
								</form>
								<a class="btn_1" onclick="createCards()">Create Student Cards</a>
							</div>				
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="ft1"></div>
	<div id="studentcard" class="modal">
		<h3 class="tit r_wrap">
			Storypal Student Card Maker
			<i class="fa fa-times" onclick="closeCard();"></i>
		</h3>
		<div class="form_wrap wrap">
			<ul class="f_left wrap">
				<li class="l1">
					<ul class="wrap btn_ul">
						<li class="f_left">
							<label>
								<span>Import image from device</span>
								<input type="file" />
							</label>
						</li>
						<li class="f_right">
							<a href="javascript:;"><span>Import image from camera</span></a>
						</li>
					</ul>
					<div class="pic_wrap">
						<ul class="f_left wrap">
							<? for ($i = 0; $i < $numCards; $i++) { ?>
								<li>
									<img src="<?=IMG_DIR?>/s1.png" class="thum"/>
									<a href=""><i class="fa fa-trash-o"></i></a>
								</li>
							<? } ?>
						</ul>
					</div>
					<a href="" class="c_wrap">Cancel</a>
				</li>
				<li class="l2">
					<div class="f_wrap wrap">
						<div class="inner wrap">
							<form name="insertStu" id="insertStu" action="/tpro/regstu" method="POST">
								<input type="hidden" name="isButtonClick" id="isButtonClick"/>
								<input type="hidden" name="curSelCard" id="curSelCard"/>
								<input type="hidden" name="numCards" id="numCards"/>
								
								
								<div class="c_wrap img_wrap">
									<div class="pic_wrap">
										<img src="<?=IMG_DIR?>/s1.png" class="wrap"/>
									</div>
								</div>
								
								<? if ($isButtonClick == 3) { ?>
								
									<input type="text" name="stu_name" id="stu_name" placeholder="Name" value="<?=$stu_name?>"/>
									<input type="text" name="stu_grdemail" id="stu_grdemail" value="<?=$stu_grdemail?>" placeholder="Legal guardian email address" />
									<input type="text" name="stu_nickname" id="stu_nickname" value="<?=$stu_nickname?>" placeholder="Nickname" />
									<input type="text" name="stu_id" id="stu_id" value="<?=$stu_id?>" placeholder="Login ID" class="black_yellow"/>
									<input type="text" name="stu_pwd" id="stu_pwd" value="<?=$stu_pwd?>" placeholder="Password" class="black_yellow"/>
								
								<? } else { ?>
								
								
									<input type="text" name="stu_name" id="stu_name" placeholder="Name"/>
									<input type="text" name="stu_grdemail" id="stu_grdemail" placeholder="Legal guardian email address" />
									<input type="text" name="stu_nickname" id="stu_nickname" placeholder="Nickname" />
									<input type="text" name="stu_id" id="stu_id" placeholder="Login ID" class="black_yellow"/>
									<input type="text" name="stu_pwd" id="stu_pwd" placeholder="Password" class="black_yellow"/>
								
								<? } ?>
							</form>
						</div>
						<ul class="c_wrap paging">
							<li><a onclick="prevCard()"><i class="fa fa-caret-left"></i></a></li>
							<li><span><?=$curSelCard?>/<?=$numCards?></span></li>
							<li><a onclick="nextCard()"><i class="fa fa-caret-right"></i></a></li>
						</ul>
					</div>
					<a href="/tpro/editstu" class="c_wrap">OK</a>
				</li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>
<script>

$(document).ready(function() {
	<? if ($isButtonClick) { ?>
		$("#ft1, #studentcard").show();
	<? } else { ?>
		$("#ft1, #studentcard").hide();
	<? } ?>
});

function closeCard(){
	$("#ft1, #studentcard").hide();
}
function makeStudent(){
	$("#ft1, #studentcard").show();
}

function createCards() {
	document.crtStuCards.isButtonClick.value = 1;
	document.crtStuCards.submit();
}

function nextCard() {
		
		name=document.insertStu.stu_name.value;
		grdemail=document.insertStu.stu_grdemail.value;
		nickname=document.insertStu.stu_nickname.value;
		id=document.insertStu.stu_id.value;
		pwd=document.insertStu.stu_pwd.value;
		
		if(name=="")
			alert("Please insert name!");
		else if(grdemail=="")
			alert("Please insert Grdemail!");
		else if(nickname=="")
			alert("Please insert nickname!");
		else if(id=="")
			alert("Please insert id!");
		else if(pwd=="")
			alert("Please insert pwd!");			
		else {
			document.insertStu.curSelCard.value = "<?= min($curSelCard + 1, $numCards) ?>";
			document.insertStu.isButtonClick.value = 2;
			document.insertStu.numCards.value = "<?=$numCards?>";
			document.insertStu.submit();
			return true;
		}
		return false;

	
}

function prevCard() {
	
		// name=document.insertStu.stu_name.value;
		// grdemail=document.insertStu.stu_grdemail.value;
		// nickname=document.insertStu.stu_nickname.value;
		// id=document.insertStu.stu_id.value;
		// pwd=document.insertStu.stu_pwd.value;
		
		// if(name=="")
			// alert("Please insert name!");
		// else if(grdemail=="")
			// alert("Please insert Grdemail!");
		// else if(nickname=="")
			// alert("Please insert nickname!");
		// else if(id=="")
			// alert("Please insert id!");
		// else if(pwd=="")
			// alert("Please insert pwd!");			
		// else {
			document.insertStu.curSelCard.value = "<?= max($curSelCard - 1, 1) ?>";
			document.insertStu.isButtonClick.value = 3;
			document.insertStu.numCards.value = "<?=$numCards?>";
			document.insertStu.submit();
			// return true;
		// }
		// return false;


}

</script>
