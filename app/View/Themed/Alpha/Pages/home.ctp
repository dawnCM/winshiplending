<div id="ws_masthd_wrap">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<div id="ws_mast_txthd">
                 Get Approval Decisions Online in a few Minutes!
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-sm-12">
            	<div id="ws_mast_lcol">
                	<div id="ws_mast_txt01">
                    LOANS FOR <span class="blue"><strong>ALL CREDIT TYPES</strong></span>
                    </div>
                    <div class="ws_mast_loantxt">
                    Short Term Loans
                    </div>
                    <div class="ws_row">
                    	<div class="ws_mast_smtxt">
                        up to
                        </div>
                        <div class="ws_mast_lgtxt">
                        $1,000
                        </div>
                    </div>
                    <div class="ws_mast_loantxt">
                    Longer Term Loans
                    </div>
                    <div class="ws_row">
                    	<div class="ws_mast_smtxt">
                        up to
                        </div>
                        <div class="ws_mast_lgtxt">
                        $25,000
                        </div>
                    </div>
                </div>
                <div id="ws_mast_rcol">
                	<div id="ws_formboxp1">
                		<form class="form-horizontal" role="form" id="LeadInForm" action="/application" method="post">
                          <div class="form-group">
                            <label for="LoanPurpose" class="col-sm-4 control-label">Intended Use:</label>
                            <div class="col-sm-8">
                              <select name="LoanPurpose" class="form-control" id="LoanPurpose" tabindex="1" data-parsley-required="true">
								            <option value="">-Choose-</option>
                            <option value="auto"<?php echo ($this->Session->read('Application.LoanPurpose') == 'auto') ? ' selected="selected"' : ''; ?>>Auto Repair</option>
                            <option value="debt"<?php echo ($this->Session->read('Application.LoanPurpose') == 'debt') ? ' selected="selected"' : ''; ?>>Debt Consolidation</option>
                            <option value="home"<?php echo ($this->Session->read('Application.LoanPurpose') == 'home') ? ' selected="selected"' : ''; ?>>Home Improvement</option>
                            <option value="major"<?php echo ($this->Session->read('Application.LoanPurpose') == 'major') ? ' selected="selected"' : ''; ?>>Major Purchase</option>
                            <option value="medical"<?php echo ($this->Session->read('Application.LoanPurpose') == 'medical') ? ' selected="selected"' : ''; ?>>Medical</option>
                            <option value="other"<?php echo ($this->Session->read('Application.LoanPurpose') == 'other') ? ' selected="selected"' : ''; ?>>Other</option>
                          </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="CreditRating" class="col-sm-4 control-label">Rate your credit:</label>
                            <div class="col-sm-8">
                              <select name="CreditRating" class="form-control" id="CreditRating" tabindex="2" data-parsley-required="true">
                <option value="">-Select-</option>
                <option value="excellent" <?php echo ($this->Session->read('Application.CreditRating') == 'excellent') ? 'selected="selected"' : '' ?>>Excellent (760+)</option>
                <option value="good"<?php echo ($this->Session->read('Application.CreditRating') == 'good') ? 'selected="selected"' : '' ?>>Good (700+)</option>
                <option value="fair"<?php echo ($this->Session->read('Application.CreditRating') == 'fair') ? 'selected="selected"' : '' ?>>Fair (640+)</option>
                <option value="poor"<?php echo ($this->Session->read('Application.CreditRating') == 'poor') ? 'selected="selected"' : '' ?>>Poor</option>
                <option value="unsure"<?php echo ($this->Session->read('Application.CreditRating') == 'unsure') ? 'selected="selected"' : '' ?>>Unsure</option>
              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="Zip" class="col-sm-4 control-label">Zip Code:</label>
                            <div class="col-sm-8">
                              <input name="Zip" type="number" class="form-control" id="Zip" tabindex="2" size="15" maxlength="5" value="<?php echo $this->Session->read('Application.Zip'); ?>" placeholder="Zip Code" 
								data-parsley-required="true" 
								data-parsley-pattern="/^[0-9]{5}?$/"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="Military" class="col-sm-4 control-label">Are you active Military?:</label>
                            <div class="col-sm-8">
                           		<select name="Military" class="form-control" id="Military" tabindex="3" data-parsley-required="true">
									<option value="true">Yes</option>
									<option value="false" selected>No</option>
								</select>
                            </div>
                          </div>
                       <!--    <div class="form-group">
                            <label for="MonthlyNetIncome" class="col-sm-4 control-label">Monthly Income:</label>
                            <div class="col-sm-8">
                              <div class="input-group">
                              <div class="input-group-addon">$</div>
                              <input type="number" class="form-control"	name="MonthlyNetIncome" id="MonthlyNetIncome" value="<?php echo $this->Session->read('Application.MonthlyNetIncome'); ?>" placeholder="Income" maxlength="5" tabindex="4"
								data-parsley-required="true" 
								data-parsley-type="digits" 
								data-parsley-length="[1,5]"/>
                              <div class="input-group-addon">.00</div>
                              </div>
                            </div>
                          </div> -->
                          <div class="form-group">
                            <div class="col-sm-12">
                              <div class="ckbox ckbox-success">
                              	<input type="checkbox" value="true" id="Agree" tabindex="5" name="Agree" <?php if($this->Session->read('Application.Agree')=="true"){ echo "checked";} ?> />
	                              <label
									for="Agree">I am / we are over Eighteen (18) years of age,
									am / are a U.S. resident and am not currently in bankruptcy.
									I/We have read and agree to the <a
									href="https://global.leadstudio.com/terms"
									data-title="Terms and Conditions" data-toggle="lightbox"
									data-gallery="remoteload">Terms and Conditions</a>, <a
									href="https://global.leadstudio.com/privacy?site=Winship Lending"
									data-title="Privacy Policy" data-toggle="lightbox"
									data-gallery="remoteload">Privacy Policy</a> and <a
									href="https://global.leadstudio.com/econsent"
									data-title="E-consent" data-toggle="lightbox"
									data-gallery="remoteload">E-consent</a>.
								</label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8 text-center">
                              <div id="button-app-start" class="btn-lg btn-warning cursor" role="button" id="button">NEXT <span class="glyphicon glyphicon-chevron-right"></span></div>
                            </div>
                          </div>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="ws_sec3_wrap">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<div id="ws_sec3_txt01">
                Your request is presented fast, safe and securely to our lender network.
                </div>
            </div>
        </div>
    </div>
</div>
<div id="ws_sec4_wrap">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-4">
            	<div class="ws_sec4_icon">
                <?php echo $this->Html->image('ws_icon01.png', array('alt'=>'Winshiplending', 'class'=>'', 'width'=>'150', 'height'=>'154', 'url'=>'')); ?>
                 </div>
                <div class="ws_sec4_icontxt">
                Safe & Secure
              </div>
            </div>
        	<div class="col-sm-4">
            	<div class="ws_sec4_icon">
                <?php echo $this->Html->image('ws_icon02.png', array('alt'=>'Winshiplending', 'class'=>'', 'width'=>'150', 'height'=>'154', 'url'=>'/')); ?>
                </div>
                <div class="ws_sec4_icontxt">
                Fast Approval Decisions
              </div>
            </div>
        	<div class="col-sm-4">
            	<div class="ws_sec4_icon">
                <?php echo $this->Html->image('ws_icon03.png', array('alt'=>'Winshiplending', 'class'=>'', 'width'=>'149', 'height'=>'154', 'url'=>'/')); ?> </div>
                <div class="ws_sec4_icontxt">
                Fast Cash For Any Use.
              </div>
            </div>
        </div>
    </div>
</div>

<script>
    /*jQuery(document).ready(function(){
    var current_url   = window.location.href;
    var popup_url     = " http://heis20.com/?r=70a7404138";

    if (document.cookie.indexOf("visited=") >= 0) {
      // They've been here before.
      }
    else {
      // set a new cookie
      expiry = new Date();
      //expiry.setTime(expiry.getTime()+(10*60*1000)); // Ten minutes
      expiry.setTime(expiry.getTime()+(2*60*1000)); // 2min

      // Date()'s toGMTSting() method will format the date correctly for a cookie
      document.cookie = "visited=yes; expires=" + expiry.toGMTString();
      //alert("this is your first time");
       window.location.replace(popup_url);
       window.open(current_url, "_blank");
    }
  });*/
</script>