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
					<div class="t_cell h_con">
						<div class="mwrap c_wrap">
							<div class="pop p1">
								<div class="r_wrap">
									<form name="createclassfrm" id="createclassfrm" method="post">
									<a href="/tmain/mainpage" class="btn_close_pop"><i class="fa fa-times"></i></a>
									<div class="inner_wrap wrap">
										<input type="text" id="cls_title" name="cls_title" class="t_center ft20" placeholder="Type your class title." />
										<label class="icheck mt_25">
											<input type="radio" id="r1" name="r1" value="0" checked/>&nbsp;&nbsp;Junior (7-12)
										</label>
										<label class="icheck">
											<input type="radio" id="r1" name="r1" value="1"/>&nbsp;&nbsp;Senior (13-18)
										</label>
									</div>
									</form>
									<a class="btn_submit" onclick="createClass()">Create a class</a>
								</div>
							</div>				
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script>
$(document).ready(function() {
    $(".icheck").each(function(i){
		$('.icheck input').eq(i).on('ifChecked', function(event){
			$(".icheck").eq(i).addClass("active");
		});
		$('.icheck input').eq(i).on('ifUnchecked', function(event){
		  	$(".icheck").eq(i).removeClass("active");
		});
	})
});

function createClass() {
	name = document.createclassfrm.cls_title.value;
	if(name=="")
		alert("Please insert class name!");
		
	else {
		document.createclassfrm.action = "/tpro/regclassButton";
		document.createclassfrm.submit();
		return true;
	}
	return false;
}

</script>
