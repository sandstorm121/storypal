<? $this->load->view("teacher/import"); ?>

<body style="background:#b33716;">
<div id="wrap" class="t_sub">
	<!-- header  script  include -->
	<div id="header">
	<?
		$this->load->view("teacher/header", $headerData);
	?>
	</div>
	<!-- header  script  include -->
	<div id="container" class="full_height1">
		<div id="content" class="t_table monitor full_height1">
			<div class="m_main">
				<div class="m_main1">
					<div class="mwrap r_wrap">
						<div class="t_table full_height1">
							<div class="c_wrap" style="width:480px;margin-top:115px;">
								<div class="card">
									<input type="text" placeholder="Number of students" />
									<a href="javascript:makeStudent();" class="btn_1">Create Student Cards</a>
								</div>
							</div>	
						</div>
						<div class="monitor_wrap">
							<div class="c_wrap r_wrap mt_25">
								<a href="javascript:openSet();"><img src="<?=IMG_DIR?>/ico_set.png" style="height:50px;" /></a>
								<div class="set_wrap">
									<div class="r_wrap">
										<h3 class="wrap">
											<img src="<?=IMG_DIR?>/ico_set.png" class="ico" />&nbsp; Pending Options General Setting
											<a href="javascript:closeSet();"><i class="fa fa-times"></i></a>
										</h3>
										<div class="wrap set_con">
											<table class="wrap">
												<colgroup>
													<col width="145px" />
													<col width="*" />
												</colgroup>
												<tr>
													<th><span class="s1">About Me</span></th>
													<td>
														<ul class="wrap day_btn">
															<li class="f_left"><a href="javascript:;" class="active day_off">OFF</a></li>
															<li class="f_right">
																<input type="text" placeholder="day" class="day_on" />
															</li>
														</ul>
													</td>
												</tr>
												<tr>
													<th><span class="s2">Story Writing</span></th>
													<td>
														<ul class="wrap day_btn">
															<li class="f_left"><a href="javascript:;" class="active day_off">OFF</a></li>
															<li class="f_right">
																<input type="text" placeholder="day" class="day_on" />
															</li>
														</ul>
													</td>
												</tr>
												<tr>
													<th><span class="s3">Chats</span></th>
													<td>
														<ul class="wrap day_btn">
															<li class="f_left"><a href="javascript:;" class="active day_off">OFF</a></li>
															<li class="f_right">
																<input type="text" placeholder="day" class="day_on" />
															</li>
														</ul>
													</td>
												</tr>
												<tr>
													<th><span class="s4">Friend Requests</span></th>
													<td>
														<ul class="wrap day_btn">
															<li class="f_left"><a href="javascript:;" class="active day_off">OFF</a></li>
															<li class="f_right">
																<input type="text" placeholder="day" class="day_on" />
															</li>
														</ul>
													</td>
												</tr>
											</table>
										</div>
										<a href="" class="c_wrap btt_btn">OK</a>
									</div>
								</div>
							</div>
							<div class="box wrap mt_25">
								<ul class="c_wrap circle_ul">
									<li><a href=""><span class="circle c1"></span></a></li>
									<li><a href=""><span class="circle c2"></span></a></li>
									<li><a href=""><span class="circle c3"></span></a></li>
								</ul>
								<ul class="wrap f_left label">
									<li class="l1">
										<label class="icheck wrap"><input type="checkbox" id="chk_all" />&nbsp;All</label>
										<ul class="l2 f_left wrap all">
											<li class="l1">
												<label class="icheck">
													<input type="checkbox" /><span class="s1">About Me</span>
												</label>
											</li>
											<li class="l2">
												<label class="icheck">
													<input type="checkbox" /><span class="s2">Chats – About me</span>
												</label>
											</li>
											<li class="l3">
												<label class="icheck">
													<input type="checkbox" /><span class="s3">Story Writing</span>
												</label>
											</li>
											<li class="l4">
												<label class="icheck">
													<input type="checkbox" /><span class="s4">Chats – Story Writing</span>
												</label>
											</li>
											<li class="l5">
												<label class="icheck">
													<input type="checkbox" /><span class="s5">Friend Requests</span>
												</label>
											</li>
										</ul>
									</li>
									<li class="l2 mt_30">
										<label class="icheck"><input type="checkbox" /></label>
										<input type="text" placeholder="Search words" />
									</li>
								</ul>
							</div>
							<div class="c_wrap mt_15">
								<a href=""><img src="<?=IMG_DIR?>/ico_find.png" style="height:50px;"/></a>
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
					<div class="pic_wrap"></div>
					<a href="" class="c_wrap">Cancel</a>
				</li>
				<li class="l2">
					<div class="f_wrap wrap">
						<div class="inner wrap">
							<form>
								<div class="c_wrap img_wrap">
									<div class="pic_wrap">
										<!--<img src="../_images/pic.png" class="pic"/>-->
									</div>
								</div>
								<input type="text" placeholder="Name" />
								<input type="text" placeholder="Legal guardian email address" />
								<input type="text" placeholder="Nickname" />
								<input type="text" placeholder="Nickname" />
								<input type="text" placeholder="Login ID" class="black_yellow"/>
								<input type="text" placeholder="Password" class="black_yellow"/>
							</form>
						</div>
						<ul class="c_wrap paging">
							<li><a href=""><i class="fa fa-caret-left"></i></a></li>
							<li><span>1/3</span></li>
							<li><a href=""><i class="fa fa-caret-right"></i></a></li>
						</ul>
					</div>
					<a href="" class="c_wrap">OK</a>
				</li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>
<script>
$(document).ready(function() {
	$('input#chk_all').on('ifChecked', function(event){
		$('ul.all input').iCheck('check');
	});
	$('input#chk_all').on('ifUnchecked', function(event){
		$('ul.all input').iCheck('uncheck');
	});
	$('ul.day_btn').each(function(i){
		$('ul.day_btn').eq(i).find(" .day_off").click(function(){
			$('ul.day_btn').eq(i).find(" .day_on").removeClass("active");
			$('ul.day_btn').eq(i).find(" .day_on").val("");
			$('ul.day_btn').eq(i).find(" .day_off").addClass("active");
		})	
		$('ul.day_btn').eq(i).find(" .day_on").change(function(){
			if($('ul.day_btn').eq(i).find(" .day_on").val()){
				$('ul.day_btn').eq(i).find(" .day_off").removeClass("active");
				$('ul.day_btn').eq(i).find(" .day_on").addClass("active");	
			} else {
				$('ul.day_btn').eq(i).find(" .day_on").removeClass("active");
				$('ul.day_btn').eq(i).find(" .day_off").addClass("active");
				$('ul.day_btn').eq(i).find(" .day_on").val("");
			}	
		})
	})
})
function closeCard(){
	$("#ft1, #studentcard").hide();
}
function makeStudent(){
	$("#ft1, #studentcard").show();
}
function openSet(){
	$(".set_wrap").show();
}
function closeSet(){
	$(".set_wrap").hide();
}
</script>
