		<div class="m_main">
			<div class="m_main1">
				<ul class="wrap top">
					<li class="f_left">
						<div onclick="openMenu();" id="btn_menu">
							<img src="<?=IMG_DIR?>/btn_menu.png" class="btn_menu" />
							<div id="menu">
								<a href="javascript:closeMenu();"><i class="fa fa-times"></i></a>
								<h3 class="wrap"><?=$this->session->userdata('tch_sex')?>&nbsp;<?=$this->session->userdata('tch_name')?></h3>
								<ul class="f_left wrap btn_ul">
									<li><a href="javascript:showAccount();">Account</a></li>
									<li><a onclick="logoutSession()" >Log Out</a></li>
								</ul>
							</div>
						</div>
						<strong><?=$this->session->userdata('tch_sex')?>&nbsp;<?=$this->session->userdata('tch_name')?></strong>
					</li>
					<li class="f_right">
						<span class="mark">Make Storypal Better</span>
						<a href=""><img src="<?=IMG_DIR?>/btn_alarm.png" class="btn_alarm" /></a>
					</li>
				</ul>
				<ul class="wrap f_left btt">
					<li class="left">
						<ul class="f_left wrap">
							<li class="l1">
								<div class="r_wrap class_wrap">
									<a href="javascript:classAdd();" class="btn_add"><i class="fa fa-plus"></i></a>
									<select class="select1 className" id="selectClass" name="selectClass">
										<? foreach ($classList as $key => $value) { ?>
											<option <?if ($this->session->userdata('cur_clsIdx') == $value['cls_title']) { ?>selected <?}?> ><?=$value['cls_title']?></option>
										<? } ?>
										
									</select>
								</div>
							</li>
							<li class="l2">
								<div class="pic_wrap">
									<div class="pic_inner c_wrap r_wrap" onclick="updateProfile();">
										<i class="fa fa-user"></i>
										<img src="<?=IMG_DIR?>/pic.png" class="pic"/>
									</div>
								</div>
							</li>
							<li class="l3">
								<input type="text" placeholder="Search Student"/>
							</li>
						</ul>
						<h4 id="classname" class="c_wrap" onclick="editeClass();"></h4>
					</li>
					<li class="right">
						<div class="monitor active" onclick="location.href='/tpro/monitornostu';"></div>
						<div class="feedback"></div>					
					</li>
				</ul>
			</div>
		</div>
		<div class="bg_btt wrap"></div>
		
<div id="ft"></div>
<div id="profile" class="modal">
	<h3 class="tit r_wrap">
		Edit Profile
		<a href="javascript:closeProfile()"><i class="fa fa-times"></i></a>
	</h3>
	<div class="form_wrap">
		<ul class="f_left wrap">
			<li class="l1">
				<div class="pic_wrap">
					<div class="pic_inner">
						<i class="fa fa-user"></i>
						<img src="<?=IMG_DIR?>/pic.png" class="pic"/>
					</div>
					<ul class="btn_ul">
						<li><a href="">Change</a></li>
						<li><a href="">Reposition</a></li>
						<li><a href="">Delete</a></li>
					</ul>
				</div>
			</li>
			<li class="l2">
				<form name="editprofilefrm" id="editprofilefrm" method="post">
					<input type="hidden" id="selfurl" name="selfurl"/>
					<select id="tch_sex" name="tch_sex">
						<option <?if ($this->session->userdata('tch_sex') == "Miss.") { ?> selected <? } ?> >Miss.</option>
						<option <?if ($this->session->userdata('tch_sex') == "Mr.") { ?> selected <? } ?> >Mr.</option>
						<option <?if ($this->session->userdata('tch_sex') == "Ms.") { ?> selected <? } ?> >Ms.</option>
					</select>
					<input type="text" id="tch_name" name="tch_name" placeholder="Teacher Name" class="black_white" value="<?=$this->session->userdata('tch_name')?>"/>
					<input type="text" id="tch_organization" name="tch_organization" placeholder="Affiliated School/Organization" class="black_white" value="<?=$this->session->userdata('tch_organization')?>"/>
					<input type="text" id="tch_country" name="tch_country" placeholder="Country" class="black_white" value="<?=$this->session->userdata('tch_country')?>"/>
					<input type="text" id="tch_city" name="tch_city" placeholder="City" class="black_white" value="<?=$this->session->userdata('tch_city')?>"/>
					<label class="wrap">
						<span style="margin-bottom:0;">About me</span>
						<div class="txt_wrap">
							<textarea id="tch_aboutme" name="tch_aboutme"><?=$this->session->userdata('tch_aboutme')?></textarea>
						</div>
					</label>
				</form>
				<a class="submit c_wrap" onclick="editProfile()">OK</a>
			</li>
		</ul>
	</div>
	
	
	
</div>
<div id="account_wrap">
	<div class="r_wrap h_100">
		<div id="account">
			<h3 class="tit r_wrap">
				Account
				<a href="javascript:closeAccount()"><i class="fa fa-times"></i></a>
			</h3>
			<div class="form_wrap">
				<ul class="f_left wrap">
					<li><p class="c_wrap">Sumbal.sha@gmail.com</p></li>
					<li><a href="javascript:changPsw();" class="psw">Change my password</a></li>
					<li><a href="javascript:delId();" class="id">Delete my account</a></li>
				</ul>
			</div>
		</div>
		<div id="changepsw" class="modal">
			<div class="form_wrap wrap">
				<form>
					<ul class="f_left wrap">
						<li><input type="text" class="black_yellow" placeholder="Enter Current Password" /></li>
						<li><input type="password" class="black_yellow" placeholder="Enter New Password" /></li>
						<li><a href="javascript:;" class="c_wrap mt_25">Change my password</a></li>
					</ul>
				</form>
			</div>
		</div>
		
		<div id="delid" class="modal">
			<div class="form_wrap wrap">
				<form>
					<ul class="f_left wrap">
						<li><input type="password" class="black_yellow" placeholder="Enter New Password" /></li>
						<li><a href="javascript:;" class="c_wrap mt_50">Delete my account</a></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="pop p1" id="classEdit">
	<div class="r_wrap">
		<a href="javascript:closeEdit();" class="btn_close_pop"><i class="fa fa-times"></i></a>
		<div class="inner_wrap wrap">
			<input type="text" class="t_center ft20" placeholder="Type your class title." />
			<label class="icheck mt_25">
				<input type="radio" name="r1" />&nbsp;&nbsp;Junior (7-12)
			</label>
			<label class="icheck">
				<input type="radio" name="r1" />&nbsp;&nbsp;Senior (13-18)
			</label>
		</div>
		<ul class="f_left wrap l2 btn_ul">
			<li><a href="">Edit</a></li>
			<li><a href=""><i class="fa fa-trash-o"></i></a></li>
		</ul>
	</div>
</div>


<script>
	function editProfile() {
		document.editprofilefrm.selfurl.value = '<?=$selfurl?>';
		document.editprofilefrm.action = '/theader/editprofile';
		document.editprofilefrm.submit();
	}
	
	function logoutSession() {
		location.href='/theader/logout';
	}
	
	
</script>


<script>

$(document).ready(function() {
	$("select.className").selectOrDie({
    	onChange: function() {
	 		$("#classname").html($(this).val());
			$(".add_ul span").addClass("active"); 
	 	}
	});
	var url = location.href;
	
	if(url.match("/tpro/feedbacknostu") || url.match("/tpro/feedbackstu") || url.match("/tpro/feedbackcomment")){
		$(".monitor").removeClass("active");
		$(".feedback").addClass("active");
	} else {
		$(".monitor").addClass("active");
		$(".feedback").removeClass("active");
		$(".feedback").click(function(){
			location.href='/tpro/feedbacknostu';
		})
	}
	
	if($(".feedback").hasClass("active")){
		headerFeedback();		
	}
});

function classAdd(){
	location.href="/tpro/regclass";
}
function editeClass(){
	$("#ft, #classEdit").show();
}
function closeEdit(){
	$("#ft, #classEdit").hide();
}
function closeProfile(){
	$("#ft, #profile").hide();
}
function updateProfile(){
	$("#ft, #profile").show();
}
function openMenu() {
	$("#menu").show();
}
function closeMenu() {
	$("#menu").hide();
}
function showAccount() {
	$("#ft, #account_wrap").show();
}
function closeAccount() {
	$("#ft, #account_wrap").hide();
	closeMenu();
}
function changPsw() {
	$("a.psw").addClass("active");
	$("a.id").removeClass("active");
	$("#changepsw").show();
	$("#delid").hide();
}
function delId() {
	$("a.id").addClass("active");
	$("a.psw").removeClass("active");
	$("#delid").show();
	$("#changepsw").hide();
}

function headerFeedback(){
	htmlFeedback = [
		'<div class="feedback_info">',
		'	<ul class="wrap">',
		'		<li class="f_left">',
		'			<div class="pic_wrap"><img src="<?=IMG_DIR?>/pic.png" class="wrap" /></div>',
		'			<p class="f_left name">Sunny</p>',
		'		</li>',
		'		<li class="f_right">',
		'			<ul class="f_left circle_ul">',
		'				<li><a href="javascript:openSet();"><img src="<?=IMG_DIR?>/ico_set.png" /></a></li>',
		'				<li><a href=""><span class="circle c1"></span></a></li>',
		'				<li><a href=""><span class="circle c2"></span></a></li>',
		'				<li><a href=""><span class="circle c3"></span></a></li>',
		'			</ul>',
		'		</li>',
		'	</ul>',
		'	<ul class="wrap chk f_left">',
		'		<li class="active">Uploaded 2 hours ago </li>',
		'		<li class="active">6 days and 22 hours left until auto publishing</li>',
		'	</ul>',
		'</div>',
	].join('');
	$("#header .feedback").append(htmlFeedback);
}

</script>