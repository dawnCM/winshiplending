<div id="p2_sec01_wrap">
	<div class="container">
		<?php 
		if($this->Session->read('Application.AppType') == 'payday'){?>
    	<div class="row">
        	<div class="col-sm-12">
                <div class="ws_subpg_hd_txt01">
                <span class="orng">Good News!</span>	
                </div>
            </div>
        </div>
        <?php } ?>
    	<div class="row">
        	<div class="col-sm-12">
                <div class="ws_subpg_hd_txt">
                <?php 
                if($this->Session->read('Application.AppType') == 'payday'){
                	echo 'Lenders online now with up to $1,000 to deposit in your account by <span class="orng">tomorrow!</span>';
                }else{
                	echo 'Your better credit gets you <strong>larger loan amounts</strong> and <strong>better repayment terms</strong>';
                }?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="formwrapper" class="container">
	<div class="row">
    	<div class="col-sm-12">
          <form method="post" id="basicWizard" class="panel-wizard">
        	  <input type="hidden" id="AppType" value="<?php echo $this->Session->read('Application.AppType');?>">
        	  <input type="hidden" id="IPAddress" value="<?php echo $this->Session->read('Application.IPAddress');?>">
        	  <input type="hidden" id="Url" value="<?php echo $this->Session->read('Application.Url');?>">
              <ul id="applicationtabnav" class="nav nav-justified nav-wizard">
              	  <li id="li1"><a href="<?php if($this->Session->read('Application.AppType') == 'payday') { echo '#tab1'; }else{echo '#tab7'; }?>" data-toggle="tab">Personal Info</a></li>
                  <li id="li2"><a href="#tab2" data-toggle="tab">Verify Identity</a></li>
                  <li id="li3"><a href="#tab3" data-toggle="tab">Employment Info</a></li>
                  <li id="li6" <?php if($this->Session->read('Application.CoApplicant') == 'No' || $this->Session->check('Application.CoApplicant') == false || $this->Session->read('Application.AppType') == 'payday'){echo "style='display:none'";}?>><a href="#tab6" data-toggle="tab">Co-Applicant</a></li>
                  <li id="li4"><a href="#tab4" data-toggle="tab">Deposit Cash</a></li>
                  <li id="li5"><a href="#tab5" data-toggle="tab">Finalize</a></li>
              </ul>
              <div class="tab-content <?php echo $this->Session->read('Application.AppType');?>">
                  <div class="tab-pane tab1" id="tab1">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="p2_sectionhd">Tell Us More About Yourself</div>
                          </div>
                      </div>
                    <div class="row">
                    	<div class="col-sm-4">
                        <label for="LoanAmount">Desired Loan Amount</label>
						<select name="LoanAmount" class="form-control" id="LoanAmount" tabindex="1" 
						data-parsley-required="true" 
						data-parsley-group="step1">
							<option value="">-Choose Amount-</option>
							<?php 
							foreach($LoanAmount as $key=>$value){
								$selected = '';
								if($this->Session->read('Application.LoanAmount') == $key){
									$selected = ' selected="selected"';
								}
								
								if($key=='1001'){$key='600';}
								echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
							}
							?>
						</select>
                        </div>
                    	<div class="col-sm-4">
						<label for="FirstName">First Name:</label>
						<input name="FirstName" type="text" class="form-control" id="FirstName" tabindex="4" size="15" maxlength="50" value="<?php echo $this->Session->read('Application.FirstName'); ?>" placeholder="First Name" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z\s-\'\.]{2,50})$/" 
						data-parsley-group="step1"/>
                        </div>
                        <div class="col-sm-4">
						<label for="LastName">Last Name:</label>
						<input name="LastName" type="text" class="form-control" id="LastName" tabindex="6" size="15" maxlength="50"  value="<?php echo $this->Session->read('Application.LastName'); ?>" placeholder="Last Name" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z\s-\'\.]{2,50})$/" 
						data-parsley-group="step1"/>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
						<label for="Email">Email:</label>
						<input name="Email" type="email" class="form-control" id="Email" tabindex="7" size="20" maxlength="50"  value="<?php echo $this->Session->read('Application.Email'); ?>" placeholder="Email" 
						data-parsley-required="true" 
						data-parsley-pattern="/^[\w-]+(\.[\w-]+)*@([a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*?\.[a-zA-Z]{2,6}|(\d{1,3}\.){3}\d{1,3})(:\d{4})?$/" 
						data-parsley-group="step1"/>
                        </div>
                    	<div class="col-sm-4">
						<label for="Address1">Address:</label>
						<input name="Address1" type="text" class="form-control" id="Address1" tabindex="8" size="20" maxlength="50"  value="<?php echo $this->Session->read('Application.Address1'); ?>" placeholder="Street Address" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z0-9\s-\'\.\,\_\#\&\/]{2,50})$/" 
						data-parsley-group="step1"/>
                        </div>
                    	<div class="col-sm-4">
						<label for="Address2">Address 2 (if needed):</label>
						<input name="Address2" type="text" class="form-control" id="Address2" tabindex="8" size="20" maxlength="50"  value="<?php echo $this->Session->read('Application.Address2'); ?>" placeholder="Street Address" 
						data-parsley-pattern="/^([a-zA-Z0-9\s-\'\.\,\_\#\&\/]{1,50})$/" 
						data-parsley-group="step1"/>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
                    	<label for="Zip">Zip Code:</label>
						<input name="Zip" type="number" class="form-control" id="Zip" tabindex="9" size="20" maxlength="5" value="<?php echo $this->Session->read('Application.Zip'); ?>" placeholder="Zip Code" 
						data-parsley-required="true" 
						data-parsley-pattern="/^[0-9]{5}?$/" 
						data-parsley-group="step1"/>
                        </div>
                    	<div class="col-sm-4">
                    	<label for="City">City:</label>
						<input name="City" type="text" class="form-control" id="City" tabindex="10" size="20" maxlength="50"  value="<?php echo $this->Session->read('Application.City'); ?>" placeholder="City" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z\s-\.\']{1,50})$/" 
						data-parsley-group="step1"/>
                        </div>
                    	<div class="col-sm-4">
						<label for="ResidenceType">Type of Residence:</label>
						<select name="ResidenceType" class="form-control" id="ResidenceType" tabindex="11" 
						data-parsley-required="true" 
						data-parsley-group="step1">
							<option value="">-Choose Type-</option>
							<option value="rent"<?php echo ($this->Session->read('Application.ResidenceType') == 'rent') ? ' selected="selected"' : ''; ?>>Rent</option>
							<option value="ownwmtg"<?php echo ($this->Session->read('Application.ResidenceType') == 'ownwmtg') ? ' selected="selected"' : ''; ?>>Own with mortgage</option>
							<option value="ownwomtg"<?php echo ($this->Session->read('Application.ResidenceType') == 'ownwomtg') ? ' selected="selected"' : ''; ?>>Own without mortgage</option>
						</select>
						</div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4" onClick="">
						<label for="ResidentSinceDate">Move-in Date:</label>
							<input id="ResidentSinceDate" tabindex="12" name="ResidentSinceDate" data-date-format="mm/yyyy" value="<?php echo $this->Session->read('Application.ResidentSinceDate'); ?>" placeholder="Move In Date" type="text" class="form-control"  
							data-parsley-required="true" 
							data-parsley-group="step1"/>
                        </div>
                    	<div class="col-sm-4">
                        
                        </div>
                    	<div class="col-sm-4"></div>
                    </div>
                  </div><!-- tab-pane payday-->
                  
                  <div class="tab-pane tab7" id="tab7">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="p2_sectionhd">Tell Us More About Yourself</div>
                          </div>
                      </div>
                    <div class="row">
                    	<div class="col-sm-4">
                        <label for="LoanAmount">Desired Loan Amount</label>
						<select name="LoanAmount" class="form-control" id="LoanAmount" tabindex="1" 
						data-parsley-required="true" 
						data-parsley-group="step1">
							<option value="">-Choose Amount-</option>
							<?php 
							foreach($LoanAmount as $key=>$value){
								$selected = '';
								if($this->Session->read('Application.LoanAmount') == $key){
									$selected = ' selected="selected"';
								}
								
								if($key=='1001'){$key='600';}
								echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
							}
							?>
						</select>
                        </div>
                        
                        <div class="col-sm-4">
						<label for="LoanPurpose">Intended Use:</label>
						<select name="LoanPurpose" id="LoanPurpose" tabindex="2" class="form-control" 
						data-parsley-required="true" 
						data-parsley-group="step1">
							<option value="">-Choose-</option>
							<option value="auto"<?php echo ($this->Session->read('Application.LoanPurpose') == 'auto') ? ' selected="selected"' : ''; ?>>Auto Repair</option>
							<option value="debt"<?php echo ($this->Session->read('Application.LoanPurpose') == 'debt') ? ' selected="selected"' : ''; ?>>Debt Consolidation</option>
							<option value="home"<?php echo ($this->Session->read('Application.LoanPurpose') == 'home') ? ' selected="selected"' : ''; ?>>Home Improvement</option>
							<option value="major"<?php echo ($this->Session->read('Application.LoanPurpose') == 'major') ? ' selected="selected"' : ''; ?>>Major Purchase</option>
							<option value="medical"<?php echo ($this->Session->read('Application.LoanPurpose') == 'medical') ? ' selected="selected"' : ''; ?>>Medical</option>
							<option value="other"<?php echo ($this->Session->read('Application.LoanPurpose') == 'other') ? ' selected="selected"' : ''; ?>>Other</option>
						</select>
                        </div>
                        <div class="col-sm-4">
						<label for="CoApplicant">Applying With Co-Applicant?:</label>
						<select name="CoApplicant" id="CoApplicant" tabindex="3" class="form-control" 
						data-parsley-required="true" 
						data-parsley-group="step1">
							<option value="">-Choose-</option>
							<option value="Yes"<?php echo ($this->Session->read('Application.CoApplicant') == 'Yes') ? ' selected="selected"' : ''; ?>>Yes</option>
							<option value="No"<?php echo ($this->Session->read('Application.CoApplicant') == 'No') ? ' selected="selected"' : ''; ?>>No</option>
						</select>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
						<label for="FirstName">First Name:</label>
						<input name="FirstName" type="text" class="form-control" id="FirstName" tabindex="4" size="15" maxlength="50" value="<?php echo $this->Session->read('Application.FirstName'); ?>" placeholder="First Name" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z\s-\'\.\-]{2,50})$/" 
						data-parsley-group="step1"/>
                        </div>
                        <div class="col-sm-4">
						<label for="LastName">Last Name:</label>
						<input name="LastName" type="text" class="form-control" id="LastName" tabindex="5" size="15" maxlength="50"  value="<?php echo $this->Session->read('Application.LastName'); ?>" placeholder="Last Name" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z\s-\'\.\-]{2,50})$/" 
						data-parsley-group="step1"/>
                        </div>
                    	<div class="col-sm-4">
						<label for="Email">Email:</label>
						<input name="Email" type="email" class="form-control" id="Email" tabindex="6" size="20" maxlength="50"  value="<?php echo $this->Session->read('Application.Email'); ?>" placeholder="Email" 
						data-parsley-required="true" 
						data-parsley-pattern="/^[\w-]+(\.[\w-]+)*@([a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*?\.[a-zA-Z]{2,6}|(\d{1,3}\.){3}\d{1,3})(:\d{4})?$/" 
						data-parsley-group="step1"/>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-sm-4">
						<label for="Address1">Address:</label>
						<input name="Address1" type="text" class="form-control" id="Address1" tabindex="7" size="20" maxlength="50"  value="<?php echo $this->Session->read('Application.Address1'); ?>" placeholder="Street Address" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z0-9\s-\'\.\,\_\#\&\/]{2,50})$/" 
						data-parsley-group="step1"/>
                        </div>
                    	<div class="col-sm-4">
						<label for="Address2">Address 2 (if needed):</label>
						<input name="Address2" type="text" class="form-control" id="Address2" tabindex="8" size="20" maxlength="50"  value="<?php echo $this->Session->read('Application.Address2'); ?>" placeholder="Street Address" 
						data-parsley-pattern="/^([a-zA-Z0-9\s-\'\.\,\_\#\&\/]{1,50})$/" 
						data-parsley-group="step1"/>
                        </div>
                    	<div class="col-sm-4">
                    	<label for="Zip">Zip Code:</label>
						<input name="Zip" type="number" class="form-control" id="Zip" tabindex="9" size="20" maxlength="5" value="<?php echo $this->Session->read('Application.Zip'); ?>" placeholder="Zip Code" 
						data-parsley-required="true" 
						data-parsley-pattern="/^[0-9]{5}?$/" 
						data-parsley-group="step1"/>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
						<label for="City">City:</label>
						<input name="City" type="text" class="form-control" id="City" tabindex="10" size="20" maxlength="50"  value="<?php echo $this->Session->read('Application.City'); ?>" placeholder="City" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z\s-\.\']{1,50})$/" 
						data-parsley-group="step1"/>
                        </div>
                    	<div class="col-sm-4">
						<label for="ResidenceType">Type of Residence:</label>
						<select name="ResidenceType" class="form-control" id="ResidenceType" tabindex="11" 
						data-parsley-required="true" 
						data-parsley-group="step1">
							<option value="">-Choose Type-</option>
							<option value="rent"<?php echo ($this->Session->read('Application.ResidenceType') == 'rent') ? ' selected="selected"' : ''; ?>>Rent</option>
							<option value="ownwmtg"<?php echo ($this->Session->read('Application.ResidenceType') == 'ownwmtg') ? ' selected="selected"' : ''; ?>>Own with mortgage</option>
							<option value="ownwomtg"<?php echo ($this->Session->read('Application.ResidenceType') == 'ownwomtg') ? ' selected="selected"' : ''; ?>>Own without mortgage</option>
						</select>
                        </div>
                    	<div class="col-sm-2">
							<label for="RentMortgage" class="control-label">Rent/Mortgage:</label>
							<div class="input-group">
								<div id="RentMortgageAddon1" class="input-group-addon">$</div>
								<input type="number" class="form-control"	name="RentMortgage" id="RentMortgage" value="<?php echo $this->Session->read('Application.RentMortgage'); ?>"placeholder="Rent/Mortgage" maxlength="5" tabindex="12"
								data-parsley-required="true" 
								data-parsley-type="digits" 
								data-parsley-length="[1,5]"
								data-parsley-group="step1"/>
							</div>
                        </div>
                        <div class="col-sm-2" onClick="">
                        <label for="ResidentSinceDate">Move-in Date:</label>
							<input id="ResidentSinceDate" name="ResidentSinceDate" data-date-format="mm/yyyy" value="<?php echo $this->Session->read('Application.ResidentSinceDate'); ?>" placeholder="Move In Date" type="text" tabindex="13" class="form-control"  
							data-parsley-required="true" 
							data-parsley-group="step1"/>
                        </div>
                    </div>
                    
                  </div><!-- tab-pane -->
                  
                  <div class="tab-pane tab2" id="tab2">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="p2_sectionhd">
                              For Your Protection, Verify Your Identity
                              </div>
                          </div>
                      </div>
                    <div class="row">
                    	<div class="col-sm-4" onClick="">
	                        <label for="DateOfBirth">Date of Birth</label>
	                        <input name="DateOfBirth" id="DateOfBirth" tabindex="1" data-date-format="mm/dd/yyyy" placeholder="Birthdate" type="text" value="<?php echo $this->Session->read('Application.DateOfBirth'); ?>" class="form-control" 
	                        data-parsley-required="true" 
	                        data-parsley-group="step2"/>
                        </div>
                        <div class="col-sm-4">
						<label for="Ssn">Social Security <a href="https://global.leadstudio.com/whyssn" data-title="Terms and Conditions" data-toggle="lightbox" data-gallery="remoteload"><?php echo $this->Html->image('help.png', array('alt'=>'Help', 'width'=>'10', 'height'=>'10')); ?></a></label>
						<input name="Ssn" type="text" class="form-control" id="Ssn" tabindex="2" size="20" placeholder="SSN" value="<?php echo $this->Session->read('Application.Ssn'); ?>" 
						data-parsley-required="true"
						data-parsley-pattern="/^(\d{3})-(\d{2})-(\d{4})$/" 
						data-parsley-group="step2"/>
                        </div>
                        <div class="col-sm-4">
						<label for="DriversLicenseNumber">Driver's License</label>
						<input name="DriversLicenseNumber" type="text" class="form-control" id="DriversLicenseNumber" tabindex="3" size="20" maxlength="50" value="<?php echo $this->Session->read('Application.DriversLicenseNumber'); ?>" placeholder="License Number" 
						data-parsley-required="true" 
						data-parsley-group="step2"/>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
						<label for="DriversLicenseState">Driver's License State</label>
						<select name="DriversLicenseState" id="DriversLicenseState" class="form-control" tabindex="4" 
						data-parsley-required="true" 
						data-parsley-group="step2">
							<option value="">-Choose State-</option>
							<?php foreach($StateDrop as $key=>$value){
								$selected = '';
								if($this->Session->read('Application.DriversLicenseState') == $key){
									$selected = ' selected="selected"';
								}
								echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
							}
							?>
							</select>
                        </div>
                    	<div class="col-sm-4">
                        <label for="PrimaryPhone">Primary Phone</label>
                        <input name="PrimaryPhone" id="PrimaryPhone" type="text" class="form-control" tabindex="5" size="20" value="<?php echo $this->Session->read('Application.PrimaryPhone'); ?>" placeholder="Primary Phone" 
                        data-parsley-required="true" 
                        data-parsley-pattern="/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/"
						data-parsley-group="step2"/>
                        </div>
                    	<div class="col-sm-4">
                        <label for="PrimaryPhoneType">Primary Phone Type</label>
							<select name="PhoneType" class="form-control" id="PhoneType" tabindex="6"
								data-parsley-required="true" 
								data-parsley-group="step2">
                                <option value="">-Choose-</option>
                                <option value="Mobile"<?php echo ($this->Session->read('Application.PhoneType') == 'Mobile') ? ' selected="selected"' : ''; ?>>Cell Phone</option>
                                <option value="Home"<?php echo ($this->Session->read('Application.PhoneType') == 'Home') ? ' selected="selected"' : ''; ?>>Home Phone</option>
							</select>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4"><?php echo $this->Html->image('additional_number.png', array('alt'=>'Increase Your Loan Chance', 'class'=>'img-responsive', 'width'=>'323', 'height'=>'62', 'id'=>'add_number_img', 'style'=>'margin-top:38px; float:right;')); ?></div>
                    	<div class="col-sm-4">
	                        <label for="SecondaryPhone">Additional Phone</label>
	                        <input name="SecondaryPhone" id="SecondaryPhone" type="text" class="form-control" tabindex="7" size="20" value="<?php echo $this->Session->read('Application.SecondaryPhone'); ?>" placeholder="Additional Phone" 
	                        data-parsley-pattern="/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/" 
							data-parsley-group="step2"/>
                        </div>
                    	<div class="col-sm-4"></div>
                    </div>
				</div><!-- tab-pane -->
				<div class="tab-pane tab3" id="tab3">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="p2_sectionhd">
                              Employment Information
                              </div>
                          </div>
                      </div>
                    <div class="row">
                    	<div class="col-sm-4">
						<label for="EmployeeType">Employment Type</label>
                        	<select name="EmployeeType" class="form-control" id="EmployeeType" tabindex="1" 
                            data-parsley-required="true" 
                            data-parsley-group="step3">
                            	<option value="">-Choose-</option>
                                <?php 
                                foreach($EmployeeType as $key=>$value){
	                                $selected = '';
									if($this->Session->read('Application.EmployeeType') == $key){
										$selected = ' selected="selected"';
									}
									echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                                }
                                ?>
                        	</select>
                        </div>
                    	<div class="col-sm-4">
						<label for="EmployerName">Employer Name</label>
						<input name="EmployerName" type="text" class="form-control" id="EmployerName" tabindex="2" size="20" maxlength="50" value="<?php echo $this->Session->read('Application.EmployerName');?>" placeholder="Employer Name" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z0-9\s-'\.\,#_\&\/]{1,50})$/" 
						data-parsley-group="step3"/>
                        </div>
                    	<div class="col-sm-4">
						<label for="EmploymentTime">Start Date of Your Present Job</label>
                            <input id="EmploymentTime" name="EmploymentTime" data-date-format="mm/yyyy" placeholder="Start Date" type="text" tabindex="3" value="<?php echo $this->Session->read('Application.EmploymentTime')?>" class="form-control"
                            data-parsley-required="true" 
                            data-parsley-group="step3"/>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
                        <label for="WorkPhone">Work Phone</label>
                        <input type="text" placeholder="Work Phone" name="WorkPhone" id="WorkPhone" class="form-control" tabindex="4" value="<?php echo $this->Session->read('Application.WorkPhone');?>" 
                        data-parsley-required="true" 
                        data-parsley-pattern="/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/" 
						data-parsley-group="step3"/>
                        </div>
                    	<div class="col-sm-4">
						<label for="EmployerAddress">Employer Address</label>
						<input name="EmployerAddress" type="text" class="form-control" id="EmployerAddress" tabindex="5" maxlength="50" placeholder="Employer Address" value="<?php echo $this->Session->read('Application.EmployerAddress');?>" 
						data-parsley-required="true" 
                        data-parsley-pattern="/^([a-zA-Z0-9\s-\'\.\,\_\#\&\/]{2,50})$/" 
						data-parsley-group="step3"/>
                        </div>
                    	<div class="col-sm-4">
						<label for="EmployerZip">Employer Zip Code</label>
						<input name="EmployerZip" type="number" class="form-control" id="EmployerZip" tabindex="6" maxlength="5" placeholder="Employer Zip" value="<?php echo $this->Session->read('Application.EmployerZip');?>" 
						data-parsley-required="true" 
						data-parsley-pattern="/^[0-9]{5}?$/" 
						data-parsley-group="step3"/>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
							<label for="EmployerCity">Employer City</label>
							<input name="EmployerCity" type="text" class="form-control" id="EmployerCity" tabindex="7" maxlength="50" value="<?php echo $this->Session->read('Application.EmployerCity')?>" placeholder="Employer City" 
							data-parsley-required="true" 
							data-parsley-pattern="/^([a-zA-Z\s-\.\']{1,50})$/" 
							data-parsley-group="step3"/>
                        </div>
                    	<div class="col-sm-4">
							<label for="MonthlyNetIncome">Monthly Income:</label>
							<div class="input-group">
								<div id="MonthlyIncomeAddon1" class="input-group-addon">$</div>
								<input type="number" class="form-control"	name="MonthlyNetIncome" tabindex="9" id="MonthlyNetIncome" value="<?php echo $this->Session->read('Application.MonthlyNetIncome'); ?>" data-parsley-required="true"  maxlength="5" tabindex="13"  
								data-parsley-required="true" 
								data-parsley-type="digits" 
								data-parsley-length="[1,5]"
								data-parsley-group="step3"/>
								<div id="MonthlyNetIncomeAddon2" class="input-group-addon">.00</div>
							</div>
                        </div>
                        <div class="col-sm-2">
							<label for="PayFrequency">Pay Frequency</label>
	                        <select name='PayFrequency' class="form-control" id='PayFrequency' tabindex="10" 
	                        data-parsley-required="true" 
							data-parsley-group="step3">
							<option value=''>-Choose-</option>
							<option value='bi-weekly'<?php echo ($this->Session->read('Application.PayFrequency') == 'bi-weekly') ? ' selected="selected"' : ''; ?>>Every 2 Weeks</option>
							<option value='semi-monthly'<?php echo ($this->Session->read('Application.PayFrequency') == 'semi-monthly') ? ' selected="selected"' : ''; ?>>Twice a Month</option>
							<option value='monthly'<?php echo ($this->Session->read('Application.PayFrequency') == 'monthly') ? ' selected="selected"' : ''; ?>>Monthly</option>
							<option value='weekly'<?php echo ($this->Session->read('Application.PayFrequency') == 'weekly') ? ' selected="selected"' : ''; ?>>Every Week</option>
							</select>
						</div>
						<div class="col-sm-2" onClick="">
							<label for="Paydate1">Next Paydate</label>
							<input name="Paydate1" type="text" class="form-control" id="Paydate1" value="<?php echo $this->Session->read('Application.Paydate1'); ?>" tabindex="11" 
							data-parsley-required="true" 
							data-parsley-group="step3"/>
						</div>
						<input type="hidden" id="Paydate2" name="Paydate2">
                    </div>
                  </div><!-- tab-pane -->
                  
                  <div class="tab-pane tab4" id="tab4">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="p2_sectionhd">Tell Us Where To Deposit Your Funds</div>
                          </div>
                      </div>
                	<div class="row">
                    	<div class="col-sm-12">
                        	<div class="ws_checkimg"></div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
						<label for="BankAccountType">Bank Account Type</label>
						<select name="BankAccountType" class="form-control" id="BankAccountType" tabindex="1"
						data-parsley-required="true"
						data-parsley-group="step5"/>
							<option value="">-Choose Account-</option>
							<option value="checking" <?php echo ($this->Session->read('Application.BankAccountType') == 'checking') ? ' selected="selected"' : ''; ?>>Checking</option>
							<option value="savings" <?php echo ($this->Session->read('Application.BankAccountType') == 'savings') ? ' selected="selected"' : ''; ?>>Savings</option>
						</select> 
                        </div>
                        <div class="col-sm-4">
						<label for="BankRoutingNumber">Routing Number</label>
						<input name="BankRoutingNumber" type="number" class="form-control" id="BankRoutingNumber" tabindex="2" size="20" maxlength="9" placeholder="Routing Number" value="<?php echo $this->Session->read('Application.BankRoutingNumber'); ?>"
						data-parsley-required="true"
						data-parsley-pattern="/^([0-9]{9})$/" 
						data-parsley-group="step5"/>
                        </div>
                        <div class="col-sm-4">
						<label for="BankAccountNumber">Account Number</label>
						<input name="BankAccountNumber" type="number" class="form-control" id="BankAccountNumber" tabindex="3" size="20" maxlength="50" placeholder="Account Number" value="<?php echo $this->Session->read('Application.BankAccountNumber'); ?>"
						data-parsley-required="true"
						data-parsley-pattern="/^[0-9]{4,17}$/" 
						data-parsley-group="step5"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
						<label for="BankName">Bank Name</label>
						<input name="BankName" class="form-control" type="text" id="BankName" tabindex="4" size="20" maxlength="50" readonly style="background-color:lightgrey;" value="<?php echo $this->Session->read('Application.BankName'); ?>"
						data-parsley-required="true"
						data-parsley-group="step5"/>
                        </div>
                    	<div class="col-sm-4">
                          <label for="timeAtBank">Time at Bank</label>
                          <select name="BankTime" id="BankTime" class="form-control" tabindex="5"
                          data-parsley-required="true"
						  data-parsley-group="step5"/>
                                <option value="">-Choose-</option>
                                <option value="60" <?php echo ($this->Session->read('Application.BankTime') == '60') ? ' selected="selected"' : ''; ?>>5+ Years</option>
                                <option value="48" <?php echo ($this->Session->read('Application.BankTime') == '48') ? ' selected="selected"' : ''; ?>>4+ Years</option>
                                <option value="36" <?php echo ($this->Session->read('Application.BankTime') == '36') ? ' selected="selected"' : ''; ?>>3+ Years</option>
                                <option value="24" <?php echo ($this->Session->read('Application.BankTime') == '24') ? ' selected="selected"' : ''; ?>>2+ Years</option>
                                <option value="12" <?php echo ($this->Session->read('Application.BankTime') == '12') ? ' selected="selected"' : ''; ?>>1+ Years</option>
                                <option value="9" <?php echo ($this->Session->read('Application.BankTime') == '9') ? ' selected="selected"' : ''; ?>>Less than 1 year</option>
                          </select>
                        </div>
                    	<div class="col-sm-4">
						<label for="DirectDeposit">Paid By Direct Deposit?</label>
						<select name="DirectDeposit" class="form-control" id="DirectDeposit" tabindex="6" 
						data-parsley-required="true"
						data-parsley-group="step5"> 
						<option value="true" <?php echo ($this->Session->read('Application.DirectDeposit') == 'true') ? ' selected="selected"' : ' selected="selected"'; ?>>Yes</option>
						<option value="false" <?php echo ($this->Session->read('Application.DirectDeposit') == 'false') ? ' selected="selected"' : ''; ?>>No</option>
						</select>
                        </div>
                    </div>
                    <div class="row">
                    		<div class="col-sm-4">
                    			<span class="pull-right"><a href="<?php echo Configure::read('Global.NoCheckingUrl');?>" target="_blank"><?php echo $this->Html->image('no_bank_acct.png', array('alt'=>'No Bank Account', 'class'=>'img-responsive', 'width'=>'130', 'height'=>'30', 'id'=>'no_bank')); ?></a></span>
                    		</div>
                    	<span id="additional_lenders" style="display:none";>
	                    	<div class="col-sm-4">
		                        <label for="Increase">Improve your chances by going to all lenders.</label>
		                        <select name='swap' class="form-control" id='swap' tabindex="7" 
		                        data-parsley-required="true" 
								data-parsley-group="step5">
								<option value='true' selected="selected">Yes, include lenders under $1,500</option>
								<option value='false'>No, do NOT include lenders under $1,500</option>
								</select>
	                        </div>
	                  	</span>
                    	<div class="col-sm-4" id="captcha-container">
                    		<?php echo $captcha; ?>
                    	</div>
                    </div>
                                        
                    <div class="row" style="margin-top:20px;">
                        <div class="col-sm-12">
                            <div class="ckbox ckbox-success">
                            	<input type="checkbox" value="true" id="AgreeConsent" name="AgreeConsent"/>
                                <label for="AgreeConsent">
                                <?php echo ($this->Session->read('Application.CoApplicant') == 'Yes') ? 'We' : 'I';?>
                                 understand, agree, and authorize that my information may be sent to lenders on my behalf who may obtain consumer reports and related information about me from one or more consumer reporting agencies, such as TransUnion, Experian, and Equifax.</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="ckbox ckbox-success">
                            	<input type="checkbox" value="true" id="AgreePhone" name="AgreePhone"/>
                                <label for="AgreePhone">By providing my mobile and/or home number, including a number that I later convert to a mobile number, I consent to receive from participating lenders, calls, text messages and pre-recorded messages (including by auto-dialers) to the mobile and home numbers provided in regards to this credit inquiry, even if you have previously indicated your preference of "do not call" with a government registry. (Consent not required to proceed with application. Consent can be revoked any time)</label>
                            </div>
                        </div>
                      </div>
                  </div><!-- tab-pane -->
                  <div class="tab-pane tab5" id="tab5">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="p2_sectionhd">
                              Your application was successfully submitted, please wait while we search our lenders for your best offer...
                              </div>
                          </div>
                      </div>
                      <div class="row">
                      	<div class="col-sm-4">
                        <?php echo $this->Html->image('additional_offers.png', array('alt'=>'Offers For You', 'class'=>'', 'style'=>'margin-top:100px', 'width'=>'330', 'height'=>'67', 'id'=>'add_offers_img')); ?>
                        </div>
                      	<div class="col-sm-4">
							<a href="http://bytemgdd.com/clk.aspx?l=23192&c=13837" target='_blank'><?php echo $this->Html->image('imp.gif', array('id'=>'ad1'))?></a>
                        </div>
                        <div class="col-sm-4"></div>
                      </div>
                      <div class="row" style="text-align:center;">
                      	<div class="col-sm-12">
                      	<br/>
                      		<p>Offers above will open in a new window and will not interfere with your application that is currently processing.</p>
                      	</div>
                      </div>
                  </div><!-- tab-pane -->
                  <!-- Co-App Tab -->
                  <div class="tab-pane tab6" id="tab6">
					<div class="row">
                          <div class="col-sm-12">
                              <div class="p2_sectionhd">
                              Co-Application Information - <a href="#tab4" data-toggle="tab" class="link" id="removecoapp">Remove Co-Applicant</a>
                              </div>
                          </div>
                      </div>
                                            
                  	<div class="row">
                        <div class="col-sm-4">
						<label for="CoFirstName">First Name:</label>
						<input name="CoFirstName" type="text" class="form-control" id="CoFirstName" tabindex="1" size="15" maxlength="50" value="<?php echo $this->Session->read('Application.CoFirstName'); ?>" placeholder="Co-Applicant First Name" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z\s-\'\.]{2,50})$/" 
						data-parsley-group="step6"/>
                        </div>
                        <div class="col-sm-4">
						<label for="CoLastName">Last Name:</label>
						<input name="CoLastName" type="text" class="form-control" id="CoLastName" tabindex="2" size="15" maxlength="50"  value="<?php echo $this->Session->read('Application.CoLastName'); ?>" placeholder="Co-Applicant Last Name" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z\s-\'\.]{2,50})$/" 
						data-parsley-group="step6"/>
                        </div>
                        <div class="col-sm-4">
                        <label for="CoPrimaryPhone">Primary Phone</label>
                        <input name="CoPrimaryPhone" id="CoPrimaryPhone" type="text" class="form-control" tabindex="3" size="20" value="<?php echo $this->Session->read('Application.CoPrimaryPhone'); ?>" placeholder="Co-Applicant Primary Phone" 
                        data-parsley-required="true" 
                        data-parsley-pattern="/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/"
						data-parsley-group="step6"/>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
						<label for="CoSsn">Social Security <a href="https://global.leadstudio.com/whyssn" data-title="Terms and Conditions" data-toggle="lightbox" data-gallery="remoteload"><?php echo $this->Html->image('help.png', array('alt'=>'Help', 'width'=>'10', 'height'=>'10')); ?></a></label>
						<input name="CoSsn" type="text" class="form-control" id="CoSsn" tabindex="4" size="20" placeholder="Co-Applicant SSN" value="<?php echo $this->Session->read('Application.CoSsn'); ?>" 
						data-parsley-required="true"
						data-parsley-pattern="/^(\d{3})-(\d{2})-(\d{4})$/" 
						data-parsley-group="step6"/>
                        </div>
                        <div class="col-sm-4" onClick="">
	                        <label for="CoDateOfBirth">Date of Birth</label>
	                        <input name="CoDateOfBirth" id="CoDateOfBirth" data-date-format="mm/dd/yyyy" tabindex="5" placeholder="Co-Applicant Birthdate" type="text" value="<?php echo $this->Session->read('Application.CoDateOfBirth'); ?>" class="form-control" 
	                        data-parsley-required="true" 
	                        data-parsley-group="step6"/>
                        </div>
                        <div class="col-sm-4">
						<label for="CoEmployeeType">Employment Type</label>
                        	<select name="CoEmployeeType" class="form-control" id="CoEmployeeType" tabindex="6" 
                            data-parsley-required="true" 
                            data-parsley-group="step6">
                            	<option value="">-Choose-</option>
                                <?php 
                                foreach($EmployeeType as $key=>$value){
	                                $selected = '';
									
									if($this->Session->read('Application.CoEmployeeType') == $key){
										$selected = ' selected="selected"';
									}
									echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                                }
                                ?>
                        	</select>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
						<label for="CoEmployerName">Employer Name</label>
						<input name="CoEmployerName" type="text" class="form-control" id="CoEmployerName" tabindex="7" size="20" maxlength="50" value="<?php echo $this->Session->read('Application.CoEmployerName');?>" placeholder="Co-Applicant Employer Name" 
						data-parsley-required="true" 
						data-parsley-pattern="/^([a-zA-Z0-9\s-'\.\,#_\&\/]{1,50})$/" 
						data-parsley-group="step6"/>
                        </div>
                    	<div class="col-sm-4">
                        <label for="CoWorkPhone">Work Phone</label>
                        <input type="text" placeholder="Co-Applicant Work Phone" name="CoWorkPhone" id="CoWorkPhone" class="form-control" tabindex="8" value="<?php echo $this->Session->read('Application.CoWorkPhone');?>" 
                        data-parsley-required="true" 
                        data-parsley-pattern="/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/" 
						data-parsley-group="step6"/>
                        </div>
                    	<div class="col-sm-4">
						<label for="CoEmploymentTime">Start Date of Your Present Job</label>
                            <input id="CoEmploymentTime" name="CoEmploymentTime" data-date-format="mm/yyyy" placeholder="Co-Applicant Start Date" type="text" tabindex="9" value="<?php echo $this->Session->read('Application.CoEmploymentTime')?>" class="form-control"
                            data-parsley-required="true" 
                            data-parsley-group="step6"/>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-4">
							<label for="CoMonthlyNetIncome">Monthly Income:</label>
							<div class="input-group">
								<div id="CoMonthlyIncomeAddon1" class="input-group-addon">$</div>
								<input type="number" class="form-control"	name="CoMonthlyNetIncome" id="CoMonthlyNetIncome" value="<?php echo $this->Session->read('Application.CoMonthlyNetIncome'); ?>" data-parsley-required="true"  maxlength="5" tabindex="10"  
								data-parsley-required="true" 
								data-parsley-type="digits" 
								data-parsley-length="[1,5]"
								data-parsley-group="step6"/>
								<div id="CoMonthlyNetIncomeAddon2" class="input-group-addon">.00</div>
							</div>
							
						</div>
						<div class="col-sm-4">
                        <label for="CoAppSameAddr">Co-Applicant resides with you?</label>
							<select name="CoAppSameAddr" class="form-control" id="CoAppSameAddr" tabindex="11"
								data-parsley-required="true" 
								data-parsley-group="step6">
                                <option value="">-Select-</option>
                                <option value="No"<?php echo (($this->Session->read('Application.CoAppSameAddr') == 'No') ? ' selected="selected"' : ''); ?>>No</option>
                                <option value="Yes" <?php echo (($this->Session->read('Application.CoAppSameAddr') == 'Yes') ? ' selected="selected"' : ''); ?>>Yes</option>
							</select>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    <div id="CoAppAddress" style="display:none;" class="row">
						<div class="col-sm-4">
							<label for="CoAddress1">Address:</label>
							<input name="CoAddress1" type="text" class="form-control" id="CoAddress1" tabindex="12" maxlength="50"  value="<?php echo $this->Session->read('Application.CoAddress1'); ?>" placeholder="Co-Applicant Street Address" 
							data-parsley-required="true" 
							data-parsley-pattern="/^([a-zA-Z0-9\s-\'\.\,\_\#\&\/]{2,50})$/" 
							data-parsley-group="step6"/>
                        </div>
                    	<div class="col-sm-4">
							<label for="CoAddress2">Address 2 (if needed):</label>
							<input name="CoAddress2" type="text" class="form-control" id="CoAddress2" tabindex="13" maxlength="50"  value="<?php echo $this->Session->read('Application.CoAddress2'); ?>" placeholder="Co-Applicant Street Address" 
							data-parsley-pattern="/^([a-zA-Z0-9\s-\'\.\,\_\#\&\/]{1,50})$/" 
							data-parsley-group="step6"/>
                        </div>
                        <div class="col-sm-2">
							<label for="CoZip">Zip Code:</label>
							<input name="CoZip" type="number" class="form-control" id="CoZip" tabindex="14" maxlength="5" value="<?php echo $this->Session->read('Application.CoZip'); ?>" placeholder="Co-Applicant Zip Code" 
							data-parsley-required="true" 
							data-parsley-pattern="/^[0-9]{5}?$/" 
							data-parsley-group="step6"/>
                        </div>
                        <div class="col-sm-2">
                        	<label for="CoCity">City:</label>
							<input name="CoCity" type="text" class="form-control" id="CoCity" tabindex="15" maxlength="50"  value="<?php echo $this->Session->read('Application.CoCity'); ?>" placeholder="Co-Applicant City" 
							data-parsley-required="true" 
							data-parsley-pattern="/^([a-zA-Z\s-\.\']{1,50})$/" 
							data-parsley-group="step6"/>
                        </div>		                
                   </div>
                  </div><!-- tab-pane -->
              </div><!-- tab-content -->

              <ul class="list-unstyled wizard">
                  <li class="pull-left previous"><button type="button" class="btn-lg btn-primary btnprev"><span class="glyphicon glyphicon-chevron-left"></span> Previous</button></li>
                  <li class="pull-right next"><button tabindex="20" type="button" class="btn-lg btn-warning btnnext">Next <span class="glyphicon glyphicon-chevron-right"></span></button></li>
              </ul>
              
          </form><!-- #basicWizard -->
        
        </div>
    </div>
</div>