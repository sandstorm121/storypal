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
					<div class="mwrap c_wrap">
						<p class="c_wrap mt_60 p1">
							Successfully registered!<br />
							You are now one step away from a full access to Storypal.<br /> 
							Please check your email to verify your account. 
						</p>
						<img src="<?=IMG_DIR?>/btn_join.png" style="height:110px;" class="mt_40"/><br />
						<a href="#" class="mt_30 p1 c_wrap fw_700">Resend a verification email.</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
