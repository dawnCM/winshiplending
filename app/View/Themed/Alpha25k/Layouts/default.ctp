<?php
/**
 * keyStone(SD) - Site Development
 *
 * Licensed under GNU General Public License v.2
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     TBD
 * @link          TBD
 * @package       app.View.Themed.Alpha.Layouts
 * @since         keyStone(SD) v1.0 
 * @license       TBD
 */

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="Winship Lending, the cash you need now!  Approving you... not your credit score">
        <meta name="revisit-after" content="10 days">
        <meta name="author" content="Winshiplending.com">
        <title>Winship Lending - Get Your Share!  Online Approvals in Minutes!</title>
        <?php echo $this->Html->css(array(
        'bootstrap-3.0.2.css',
        'bootstrap-override.css',
        'pace.css',
        'siteStyles.css',
        'formStyles.css',
        'fontawesome.min.css',
        'ekko-lightbox.min.css'
        )); ?>
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,700,800">
		<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
        <?php 
        echo $this->Html->script(array(
		'/js/jquery/jquery-1.11.3.min.js',
        '/js/pace.js',
       	'/js/jquery/jquery-maskedinput.min.js',
        '/js/bootstrap/bootstrap-3.0.2.min.js',
        '/js/resources.js',
        '/js/ekko-lightbox.min.js',
        '/js/validation.js',
		'/js/custom.js'
		));
        
		//Ancillary
		echo "<script>  \n".$this->Session->read('Script.ancillaryConfig')."\n</script>";
		
        if($loadApplicationJS) {
        	echo $this->Html->script(array(
        	'/js/bootstrap/bootstrap-wizard.min.js',
        	'/js/bootstrap/bootstrap-datepicker.min.js',
        	'/js/moment.js',
        	'/js/application/functions.js',
        	));
        	
        	echo $this->Html->css(array(
        	'bootstrap-datepicker.css',
        	));
        }
        
       	echo $this->Html->meta('icon', $this->Html->url('/img/favicon.ico'));
        ?>
        
        <?php echo '<script type="text/javascript">var nonce="'.Configure::read('Ajax.nonce').'";</script>'; ?>
        <?php echo (Configure::read('Global.Mobile')) ? '<script type="text/javascript">var ismobile=true;</script>' : '<script type="text/javascript">var ismobile=false;</script>';?>
        
        
    </head>
	<body>
		<div id="ws_nav_wrap">
			<div class="container">
		    	<div class="row">
		            <nav class="navbar navbar-default" role="navigation">
		              <div class="container-fluid">
		                <!-- Brand and toggle get grouped for better mobile display -->
		                <div class="navbar-header">
		                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ws_navbar">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                  </button>
		                  <!--<a class="navbar-brand" href="#">Brand</a>-->
		                </div>
		            
		                <!-- Collect the nav links, forms, and other content for toggling -->
		                <div class="collapse navbar-collapse" id="ws_navbar">
		                  <ul class="nav navbar-nav navbar-right">
		                    <li><a href="https://global.leadstudio.com/works" data-title="How This Site Works" data-toggle="lightbox" data-gallery="remoteload"><span class="glyphicon glyphicon-cog"></span> How It Works</a></li>
		                    <li><a href="https://global.leadstudio.com/faq" data-title="FAQ's" data-toggle="lightbox" data-gallery="remoteload"><span class="glyphicon glyphicon-question-sign"></span> FAQs</a></li>
		                    <li><a href="https://global.leadstudio.com/privacy?site=Winship%20Lending" data-title="Privacy Policy" data-toggle="lightbox" data-gallery="remoteload"><span class="glyphicon glyphicon-eye-open"></span> Privacy</a></li>
		                    <li><a href="https://global.leadstudio.com/about" data-title="About our Credit Providers" data-toggle="lightbox" data-gallery="remoteload"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
		                    <li><a href="https://global.leadstudio.com/financial" data-title="Financial Fundamental Tips" data-toggle="lightbox" data-gallery="remoteload"><span class="glyphicon glyphicon-usd"></span> Financial Fundamentals</a></li>
		                    <li><a href="https://global.leadstudio.com/contact" data-title="Contact Us" data-toggle="lightbox" data-gallery="remoteload"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
		                  </ul>
		                </div><!-- /.navbar-collapse -->
		              </div><!-- /.container-fluid -->
		            </nav>
		        </div>
		    </div>
		</div>
		<div id="ws_pghd_wrap">
			<div class="container">
		    	<div class="row">
		        	<div class="col-sm-12">
		            	<div id="ws_logo">
		            	<?php echo $this->Html->image('ws_logo.png', array('alt'=>'Winshiplending', 'class'=>'img-responsive', 'width'=>'223', 'height'=>'84', 'url'=>'/')); ?>
		                </div>
		                <div id="ws_tag">
		                Lending The Cash You Need <strong>NOW!</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approving <strong>YOU</strong>...Not your credit score. </div>
		            </div>
		        </div>
		    </div>
		</div>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->Session->flash(); ?>
		
		<div id="ws_footerwrap">
			<div class="container">
		    	<div class="row">
		        	<div class="col-sm-12">
		                <div class="panel-group" id="accordion">
		                  <div class="panel panel-default">
		                    <div class="panel-heading">
		                      <h4 class="panel-title">
		                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
		                          Important information about procedures for opening a new account:
		                        </a>
		                      </h4>
		                    </div>
		                    <div id="collapseFour" class="panel-collapse collapse">
		                      <div class="panel-body">
		                        To help the government fight the funding of terrorism and money laundering activities, Federal law requires all financial institutions to obtain, verify, and record information that identifies each person who opens an account. 
		<br /><br />
		<strong>What this means for you:</strong> When you open an account, the lender will ask for your name, address, date of birth, and other information that will allow the lender to identify you. The lender may also ask to see your driver’s license or other identifying documents. 
		                      </div>
		                    </div>
		                  </div>
		                  <div class="panel panel-default">
		                    <div class="panel-heading">
		                      <h4 class="panel-title">
		                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
		                          What is APR and how does APR work for a loan on this site?
		                        </a>
		                      </h4>
		                    </div>
		                    <div id="collapseOne" class="panel-collapse collapse">
		                      <div class="panel-body">
		APR is a commonly used abbreviation that stands for Annual Percentage Rate. This is a formula computed to show consumers what the interest rate combined with all the fees of a loan will be, in total, when analyzed for an entire year. APR is a way for consumers to compare and shop by knowing what the representative APR ranges might be for a loan that you may receive on this site.
		<br><br> 
		After you are matched with a lender, the lender is required to provide you, the consumer, with all costs associated to be expressed as an annual percentage rate of interest (APR). This information will include the identity of the creditor, the amount financed, the itemization of amount financed, the finance charge, the annual percentage rate, your payment schedule and your total number of payments. You will be able to review all this information BEFORE you obligate yourself to any loan. Your interest rate will vary depending upon which product you select from which lender. In addition, the Federal Equal Credit Opportunity Act prohibits creditors from discriminating against applicants on the basis of color, race, religion, sex, marital status and age.                      </div>
		                    </div>
		                  </div>
		                  <div class="panel panel-default">
		                    <div class="panel-heading">
		                      <h4 class="panel-title">
		                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
		                          What is the APR for a loan that I may get from a lender when matched on this site?
		                        </a>
		                      </h4>
		                    </div>
		                    <div id="collapseTwo" class="panel-collapse collapse">
		                      <div class="panel-body">
		                        We are not your lender. This site is a lending matching network that matches you with the best online lenders. Because there are many lenders offering many different products we don’t know the product or the exact APR that your lender may offer you. But rest assured, your lender must disclose all this information to you before you obligate yourself to any loan. Generally speaking, there are two major types of products that you may be offered from the lending partners on this site. Those products are installment loans, and short term personal loans. Installment loans tend to be longer in terms and lower in interest rates than your typical short term loans. Usually the typical APR range for installment loans is anywhere from 6.59% up to 36.00% APR for most installment loan products offered through the lending partners on this site. Generally, the typical representative APR range is somewhere between 261% and 1404% for a short term loan that is intended for 14 days. It is important that you review your specific loan terms that you are offered from your lender before you obligate yourself to the terms. 
		                      </div>
		                    </div>
		                  </div>
		                  <div class="panel panel-default">
		                    <div class="panel-heading">
		                      <h4 class="panel-title">
		                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
		                          What happens if I'm late paying back the loan?
		                        </a>
		                      </h4>
		                    </div>
		                    <div id="collapseThree" class="panel-collapse collapse">
		                      <div class="panel-body">
		                        Once you are matched with a lender, you will be given all of your loan terms, in advance and in writing, for you to review. If you accept the terms and conditions of the loan offer, you are agreeing to pay that loan back in the amount of time expressed in the loan documents. If you do not understand anything in the loan agreement, you should not move forward. You should always pay your loan back on time to avoid additional fees and penalties. Partial payment, non-payment, or late payment is likely to result in the following:
		                        <ul>
		                        <li>Associated Fees/Interest rate adjustment - some lenders will charge fees, or adjust your interest rate if you are making late payments.</li>
		                        <li>Collection practices - If you refuse to repay the loan all together, it is likely that the lender will engage a collection company 
		                            to try and recoup what you owe them (just like any lender would).</li>
		                        <li>Credit Score impact - if you do not repay your loan on time, your delinquency may be reported to a credit bureau, 
		                            which could negatively impact your credit score.</li>
		                        <li>Renewal policy - As a convenience to you, some lenders may offer a renewed or "roll-over" loan that may have additional fees and may 
		                            renew automatically, unless you request otherwise. Please make sure to review your lender's renewal policies, and make sure that your 
		                            payment preferences are known to your lender.</li>
		                        </ul>
		                        This information will be disclosed by each individual lender. Please don't agree to any loan that you cannot repay. If you have questions or need more information on late payment or renewal policies, please contact the lender directly and they will be happy to provide you that information. While most lenders in this site's network do not run a traditional credit check, it is important for us to let you know that in some cases credit checks, consumer credit reports and other personal data may be obtained by some lenders. These checks typically are performed by Experian, Equifax, Trans Union or through alternative providers in order to make a decision on whether or not to offer you a loan. As with any loan, it's important to repay the loan on time or contact the lender to work out a payment plan just as soon as possible. 
		                      </div>
		                    </div>
		                  </div>
		                </div>
		            </div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-12" id="ws_auth">
		            <strong>For your protection:</strong> Our lender partners will never call and ask for advance payment. NEVER pay a lender in advance for a loan. The operator of this website is not an agent, representative or broker of any lender and does not endorse or charge you for any service or product. Cash transfer times may vary between lenders and may depend on your individual financial institution. In some circumstances faxing may be required. This service is not available in all states, and the states serviced by this website may change from time to time and without notice. For details, questions or concerns regarding your cash advance, please contact your lender directly. Cash advances are meant to provide you with short term financing to solve immediate cash needs and should not be considered a long term solution. Please borrow responsibly! </div>
		        </div>
		        <div class="row">
		        	<div class="col-sm-12 text-center" id="ws_footlinks">
		            Copyright &copy; <?php echo date('Y'); ?> Winship Lending<br />
		        <a href="https://global.leadstudio.com/terms" data-title="Terms and Conditions" data-toggle="lightbox" data-gallery="remoteload">Terms of Use</a> | <a href="https://global.leadstudio.com/privacy?site=Winship%20Lending" data-title="Privacy Policy" data-toggle="lightbox" data-gallery="remoteload">Privacy Policy</a> | <a href="https://global.leadstudio.com/contact" data-title="Contact Us" data-toggle="lightbox" data-gallery="remoteload">Contact Us</a> | <a href="http://www.optout-wvcx.net/o-fhqt-s86-7d44b1ce4ff127eb8453f27dde274108&cr=106" target="_blank">Unsubscribe</a> &nbsp;&nbsp;&nbsp;&nbsp;<script src="https://www.ola-memberseal.org/seal.js?seal=member&amp;sealwidth=100&amp;sealheight=100"></script>
		            </div>
		        </div>
		    </div>
		</div>
		<?php 
		echo "<script>
		console.log('".$this->Session->read('Application.TrackId')."');
		console.log('".$this->Session->read('Application.AffiliateId')."');
		console.log('".$this->Session->read('Application.CampaignId')."');
		console.log('".$this->Session->read('Application.RequestId')."');
		</script>";
		?>
		
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-71925930-3', 'auto');
		ga('send', 'pageview');
		
		</script>
    </body>
</html>