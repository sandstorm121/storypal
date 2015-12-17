<? $this->load->view("teacher/import"); ?>


<body style="background:#b33716;">
<div id="wrap" class="t_sub">
	<!-- header script include -->
	<div id="header">
	<?
		$this->load->view("teacher/header", $headerData);
	?>
	</div>
	
	<!-- header script include -->
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
						<div class="feedback_wrap">
							<div class="txt_wrap wrap">
								<textarea></textarea>
							</div>
							<ul class="wrap mt_10 btn_ul">
								<li class="f_left"><p>Comment here</p></li>
								<li class="f_right"><a href="" class="btn_send">Send<br />Feedback</a></li>
							</ul>
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
    $(window).load(function() {
		$(".monitor").removeClass("active");
		$(".feedback").addClass("active");
	});
});
</script>
