<? $this->load->view("teacher/import"); ?>


<body style="background:#b9472b;">
<div id="bg_left" class="col_50"></div>
<div id="wrap" class="t_login t_join">
	
	<div class="wrap full_height t_tabel" >
    	<div class="m_main">
			<div class="m_main1">
				<div class="r_wrap full_height">
					<div class="t_cell full_height">
						<div id="bg_left" class="col_bg full_height"></div>
						<ul class="outer_wrap wrap f_left">
							<li class="l1">
								<form name="forminput" action="/tlogin/successrgst" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
									<div class="r_wrap join_wrap ">
										<input type="text" id="tch_name" name="tch_name" placeholder="Teacher Name" />
										<select id="tch_sex" name="tch_sex">
											<option>Miss</option>
											<option>Mr.</option>
											<option>Ms.</option>
										</select>
										<input type="text" id="tch_birthday" name="tch_birthday" placeholder="BirthYear" />
										<input type="text" id="tch_organization" name="tch_organization" placeholder="Affiliated School/Organization" />
										
										<input type="text" id="tch_country" name="tch_country" placeholder="Country" />
										
										<!-- <select id="tch_country" name="tch_country">
											<option>Country</option>
											<option value="United States">United States</option>
											<option value="China">China</option>
											<option value="Russia">Russia</option>
											<option value="France">France</option>
											<option value="Italy">Italy</option>
											<option value="United Kingdom">United Kingdom</option>
										</select> -->
										<input type="text" id="tch_city" name="tch_city" placeholder="City" />
										<input type="text" id="tch_email" name="tch_email" placeholder="E-mail Account" class="requi"/>
										<input type="password" id="tch_pwd" name="tch_pwd" placeholder="Password" class="requi"/>
										<label class="icheck wrap">
											<input type="checkbox" id="tch_chk" name="tch_chk"/>
											<span>
												As an educator or a legal guardian of one or more 
												students under international standard age 18, I agree to 
												<a href="">Storypal Service Agreements</a> including Children Safety 
												Policies and Intellectual Property Policies.
											</span>
										</label>
										<a class="btn_join f_right" onclick="createUser()">Create a Storypal account.</a>
										<img src="<?=IMG_DIR?>/btn_join.png" class="ico" />
									</div>
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
	function createUser()
	{
		inputStr1 = document.forminput.tch_birthday.value;
		for (var i = 0; i < inputStr1.length; i++) {
			var oneChar = inputStr1.substring(i, i + 1);
			if (oneChar < '0' || oneChar > '9') {
				alert("Please correct your birthYear!");
				return false;
			}
		}
		
		name=document.forminput.tch_name.value;
		organization=document.forminput.tch_organization.value;
		country=document.forminput.tch_country.value;
		city=document.forminput.tch_city.value;
		email=document.forminput.tch_email.value;
		pwd=document.forminput.tch_pwd.value;
		
		if(name=="")
			alert("Please insert your name!");
		else if(organization=="")
			alert("Please insert your organization!");
		else if(country=="")
			alert("Please insert your country!");
		else if(city=="")
			alert("Please insert your city!");
		else if(email=="")
			alert("Please insert your email!");
		else if(pwd=="")
			alert("Please insert your pwd!");
			
		else {
			document.forminput.submit();
			return true;
		}
		return false;
	}
</script>

</body>
</html>
