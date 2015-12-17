<? $this->load->view("teacher/import"); ?>

<script>
	var str = "<?=$error?>";
	if (str != "") alert(str);
</script>

<body style="background:#b9472b;">
<div id="bg_left" class="col_50"></div>
<div id="wrap" class="t_login">
	
	<div class="wrap full_height t_tabel" >
    	<div class="m_main">
			<div class="m_main1">
				<div class="r_wrap full_height">
					<div class="t_cell full_height">
						<div id="bg_left" class="col_bg full_height"></div>
						<ul class="outer_wrap wrap f_left">
							<li class="l1">
								<a href="#" class="login_linked"><span class="ico"><i class="fa fa-linkedin"></i></span><span>Login width LinkdIn</span></a>
								<p class="c_wrap mt_30">or</p>
								<form name="frmMain" id="frmMain" method="post">
								<input type="hidden" id="pos" name="pos" value="<?=$focuspos?>">
									<div class="wrap form_wrap">
										<input type="text" id = "username" name = "username" style = "color: #FFFFFF" placeholder="E-mail" />
										<input type="password" id = "password" name = "password" style = "color: #FFFFFF" placeholder="Password" />
										<a class="c_wrap submit" onclick="login('/tlogin/check')">Enter</a>
									</div>
									<a href="/tlogin/newlogin" class="btn_join"><img src="<?=IMG_DIR?>/btn_join.png" /><br />Create an account.</a>
								</form>
							</li>
							<li class="l2">
								<div class="main_bg">
									<a href="/tlogin/login"><span class="txt t1 active"></span></a>
									<a href="#"><span class="txt t2"></span></a>
								</div>		
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

		$('#username').keypress(function (e) {
	            if (e.which == 13) {
	               $('#password').focus();
	                return false;
	            }
	        });
			
		$('#password').keypress(function (e) {
	            if (e.which == 13) {
	               login('/tlogin/check');
	                return false;
	            }
	        });	
			
		function login(url) {
			document.frmMain.action = url;
			document.frmMain.submit();
		}
		
		$(document).ready(function () {
			if (document.frmMain.pos.value == 1) 
			{
				document.frmMain.username.focus();
			}
			else
			{
				document.frmMain.password.focus();
			}
			
		});
		
</script>

</body>
</html>


