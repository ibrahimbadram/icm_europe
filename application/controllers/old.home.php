<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
      public function __construct()
    {
        parent::__construct();
		$this->load->view('widgets/common');
		$this->lg = $this->lang->lang();
    }  
    public function index() {
		//load content
		$this->lang->load('content');

		//define an array to bind the data to the template
		$data = array();

		// Set the title
		$title = 'Home page';

		// Dynamically add a stylesheet and Javascript files 
		$this->template->stylesheet->add('assets/css/owl-carousel/owl.carousel.css');

		//language detect
		$lang = $this->lang->lang();

		$data['lang'] = $lang;
		
		//default language code is english
        $language_code = 'en-GB';
		if($lang == 'ar'){
			$language_code = 'ar-AE';
		}elseif($lang == 'fa'){
			$language_code = 'fa-IR';
		}elseif($lang == 'es'){
			$language_code = 'es-ES';
		}elseif($lang == 'ru'){
			$language_code = 'ru-RU';
		}elseif($lang == 'zh'){
			$language_code = 'zh-CN';
		}elseif($lang == 'pl'){
			$language_code = 'pl-PL';
		}else{
			$language_code = 'en-GB';
		}

		$data['language_code'] = $language_code;

		if($lang == 'ar' || $lang == 'fa' ){//RTL
			$this->template->stylesheet->add('assets/css/rtl/default.css');
			$this->template->stylesheet->add('assets/css/rtl/common.css');
			$this->template->stylesheet->add('assets/css/rtl/responsive-slider.css');
			$this->template->stylesheet->add('assets/bootstrap/css/rtl-bootstrap.css');
			$this->template->stylesheet->add('assets/bundles/2015/rtl-economic_calendar.css');
			
			$this->template->stylesheet->add('assets/css/rtl/amd.css');
			$this->template->stylesheet->add('assets/css/rtl/ib.css');
			
			//Load Scripts files
			$this->template->javascript->add('assets/js/rtl/initialise_owl_carousel.js');
			$this->template->javascript->add('assets/bundles/2015/rtl-footer-jsf9c2?v=yE3KNoPvb528pDzwlBMrJh0IqZxyHYkPl2jCR4dHAMQ1');
		}else{//LTR
			$this->template->stylesheet->add('assets/css/default.css');
			$this->template->stylesheet->add('assets/css/common.css');
			$this->template->stylesheet->add('assets/css/responsive-slider.css');
			$this->template->stylesheet->add('assets/bootstrap/css/bootstrap.css');
			$this->template->stylesheet->add('assets/bundles/2015/economic_calendar.css');
			$this->template->stylesheet->add('assets/css/amd.css');
			$this->template->stylesheet->add('assets/css/ib.css');

			//Load Scripts files
			$this->template->javascript->add('assets/js/initialise_owl_carousel.js');
			$this->template->javascript->add('assets/bundles/2015/footer-jsf9c2?v=yE3KNoPvb528pDzwlBMrJh0IqZxyHYkPl2jCR4dHAMQ1');
		}

		//Set SEO attributes
		$newtitle = str_replace('-', ' ', $title);
        $this->template->title = $this->sm->getword('ICM',$this->lg).' - '.$newtitle;
        $this->template->description = $this->sm->getword('ICM',$this->lg).' '.$newtitle;
		$this->template->trigger_meta('keyword',$this->sm->getword('ICM',$this->lg).' '.$newtitle);
	
		$this->template->javascript->add('assets/js/jquery.event.move.js');
        $this->template->javascript->add('assets/js/responsive-slider2.js');
		$this->template->javascript->add('assets/js/owl-carousel/owl.carousel.min.js');
		$this->template->javascript->add('assets/js/materialize.min.js');
		$this->template->javascript->add('assets/js/amd.js');
		$this->template->javascript->add('assets/js/home.js');
        $this->template->javascript->add('assets/js/ib.js');

        $this->template->content->view('home', $data);
        
        // Publish the template
        $this->template->publish();
    }
	public function loadbanner(){
		$this->lang->load('content');
		if ( $this->agent->is_mobile() ) {
				
				$this->load->view('banner-mobile');
		} else {
			
			$this->load->view('banner');
		}
	}
	public function send_newsletter(){
		$this->load->model('newsletter_model');
		
		$email =  $this->input->post('email');
		
		//check if email already exist
		$emails_where = $this->newsletter_model->findWhere(array('email' => $email));
		
		if(count($emails_where) > 0){//Email already exist
			$result = 2;
		}else{
			$inserted_id = $this->newsletter_model->create();
			if($inserted_id >0 ){
				$result = 1;
			}
		}
		
		echo $result;
		exit;
	}
	
	function send_email(){
$this->load->library('email');	
$m = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="IE=edge, chrome=1" http-equiv="X-UA-Compatible">
</head>
<body style="margin: 0; padding: 0;">
<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#e2e2e2" style="background-color:#e2e2e2">
  <tbody>
    <tr>
      <td align="center" style="text-align:left"><table align="center" cellpadding="0" cellspacing="0" id="topMessageWrapper" style="width: 620px; background-color: #e2e2e2; color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; padding-bottom: 20px; padding-top: 20px; margin: 0 auto;" bgcolor="#e2e2e2" width="620">
          <tbody>
            <tr>
              <td><!-- DESIGNER TEMPLATE: SpringOneColumn --> 
                <!-- BASIC DERIVATION: BodyWithTwoHeadsAndFoot -->
                
                <table border="0" cellpadding="0" cellspacing="0" height="100%" id="topMessageWrapperMainTable" style="border:10px solid #00477f;">
                  <tbody>
                  <tbody>
                    <tr>
                      <td class="responsiveColumn" style="color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td valign="top" style="color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><div>
                                  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="word-wrap: break-word; table-layout: fixed;">
                                    <tbody>
                                      <tr>
                                        <td style="color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><a href="http://wwww.icmtrader.com.vc/" target="_blank"><img src="https://www.icm.com/assets/images/email/ahi/email-top-new.jpg" alt="" style="display: block; width:100%" border="0" /></a></p></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                    <tr>
                      <td class="responsiveColumn" style="background-color: #ffffff; color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;" bgcolor="#ffffff"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td valign="top" style="background-color: #ffffff; padding-bottom: 25px; padding-left: 25px; padding-right: 25px; color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;" bgcolor="#ffffff"><div>
                                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="word-wrap: break-word; table-layout: fixed;">
                                    <tbody>
                                      <tr>
                                        <td style="color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><br />
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><br />
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0; color:#00467f"><strong>Your VPS Hosting Login Details</strong>
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><br />
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;">Dear </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><br />
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0; ">Thank you for applying for the VPS hosting service. We are pleased to inform you that you qualify for the free VPS hosting Service. .</p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><br/>
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;">Please note: This VPS is free for existing and new clients who maintain a balance of 4,000 USD in their account.</p>
                                          <br>
                                          
                                          
                                          <table width="100%" border="0"  align="center"  style="color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;" >
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;">
                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0; color:#00467f "> <strong>Download & Install</strong> </p>                    
                                              Download:<a href="http://test.com" >[ Download RDP File ]</a> <br><br></p></td>
                                            </tr>
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;">After installation you will be asked for host, username and password. <br><br></p></td>
                                              </tr>
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;"><strong>Host: </strong></p></td>
                                            </tr>
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;"><strong>Port:</strong> </p></td>
                                              </tr>
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;"><strong>Username:</strong> </p></td>
                                            </tr>
                                            <tr>
                                              <td width="3100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;"><strong>Password:</strong> </p></td>
                                              </tr>
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;"> <br><br></p></td>
                                            </tr>
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;">With this information, you will be able to login to the VPS portal. For support on installing please visit the online <a href="http://test.com">user guide</a>. <br><br></p></td>
                                              </tr>
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;"><strong>POM Application <br><br></strong></p></td>
                                            </tr>
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;">The POM (Peace Of Mind) application alerts the user (via email) if the platform crashes/freezes. If the platform freezes for over 30 seconds, it will end the session and restart automatically.<br><br>
</p></td>
</tr>
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;">To assist traders BeeksFX offers POM which will automatically start MT4 on any VPS reboot. This is already on the VPS desktop. It is a simple drag and drop application which requires you to drag any application you wish to start into the desktop app.<br><br></p></td>
                                            </tr>
                                            <tr>
                                              <td width="100%" valign="top"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding:0;">To configure POM please <a href="http://test.com" >click here</a>.</p></td>
                                              
                                            </tr>
                                          </table>
                                          <br>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0; ">You can also contact us via telephone on +44 207 634 9779 or email .
                                          
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"></p>
                                          <br>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;">Thanking you for allowing us to serve you.</p></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div>
                                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="word-wrap: break-word; table-layout: fixed;">
                                    <tbody>
                                      <tr>
                                        <td style="color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><br />
                                          
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><br />
                                          
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"> Kind
                                            regards,</p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><br />
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"> <strong> Client Services Team</strong></p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"> <a href="mailto:support@icmcapital.com" style="outline: none; color: #00467f; font-size:11px; text-decoration: none;" target="_blank"> support@ICMCapital.com</a></p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"> <span style="font-size:11px;"> Tel +44 207 634 9779</span></p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><br />
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"><br />
                                          </p></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div>
                                  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="word-wrap: break-word; table-layout: fixed;">
                                    <tbody>
                                      <tr>
                                        <td style="color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:0;  border-bottom: 1px solid #dedede;">
                                    <tr>
                                      <td width="234" align="left" ><a href="http://www.linkedin.com/company/2407578" target="_blank"><img src="http://www.icmcapital.co.uk/images/linkedin-n.png" border="0" alt="" width="28" height="29"></a>&nbsp;<a href="https://twitter.com/ICMCapital" target="_blank"><img src="http://www.icmcapital.co.uk/images/twitter-n.png" border="0" alt="" width="28" height="29"></a>&nbsp;<a href="http://www.facebook.com/ICMCapital" target="_blank"><img src="http://www.icmcapital.co.uk/images/facebook-n.png" border="0" alt="" width="28" height="29"></a> <a href="http://www.youtube.com/user/ICMCapital" target="_blank"><img src="http://www.icmcapital.co.uk/images/youtube-n.png" border="0" alt="" width="28" height="29"></a>&nbsp;<a href="https://www.instagram.com/icmcapital" target="_blank"><img src="http://www.icmcapital.co.uk/images/instagram-n.png" border="0" alt="" width="28" height="29"></a></td>
                                      <td width="156" align="center"><a href="http://www.icmtrader.com.vc" target="_blank"><img src="http://www.icmcapital.co.uk/static/media/906705/polologo-mail.png" alt="" width="180"  border="0" /></a> 
                                        <!--<a href="http://www.icmcapital.co.uk/ar/sponsorship_nottingham.php" target="_blank"><img src="http://www.icmcapital.co.uk/images/nottingham-forest-logo_ar.jpg" alt="Multi-Award Winning Broker" width="165" height="100" border="0" /></a>--></td>
                                      <td width="200" align="center"><a href="https://www.icmtrader.com.vc/AccountFunding.php" target="_blank"> <img src="http://www.icmcapital.co.uk/static/media/906708/paylogos-mail.png" width="180" height="81" style="display: inline;"></a></td>
                                    </tr>
                                    <tr>
                                      <td style="color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; padding-bottom:10px"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"> <a href="#" target="_blank"><img src="http://www.icmcapital.co.uk/images/mailshot/multi-award.png" alt="" style="display: inline;" width="150" border="0" /></a></p></td>
                                      <td align="center"><a href="http://www.icmtrader.com.vc/" target="_blank"><img src="http://www.icmcapital.co.uk/static/media/906704/fulhamlogo-mail.png" alt="" width="180"  border="0" /></a></td>
                                      <td align="center" ><a href="http://www.icmtrader.com.vc/" target="_blank"><img src="https://www.icmcapital.co.uk/static/media/1305220/world-cycling.png" alt="" width="180" height="63" border="0" /></a></td>
                                    </tr>
                                  </table>
                                </div>
                                <div>
                                  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="word-wrap: break-word; table-layout: fixed;">
                                    <tbody>
                                      <tr>
                                        <td style="color:#999999; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"> <br/>
                                            <strong>CFDs and Spot FX are leveraged products. Trading CFD`s or Spot FX carries a high risk to your capital and can result in losses that exceed your deposits. You should not engage in this form of investing unless you understand the nature of the transactions you are entering into and the true extent of your exposure to the risk of loss. Your profit and loss will vary according to the extent of the fluctuations in the price of the underlying markets on which the trade is based.</strong></p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;  text-align:justify;"><br/>
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;  text-align:justify;"> ICM Capital Limited  (“Saint Vincent”), Suite 305, Griffith Corporate Centre, Beachmont, P.O. Box 1510, Kingstown, Saint Vincent and the Grenadines, is incorporated in Saint Vincent and the Grenadines and regulated by the Financial Services Authority of Saint Vincent and the Grenadines under Number: 23683 IBC 2016.
                                            520965.</p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"> <br>
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"> <br>
                                          </p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;  text-align:justify;"> IMPORTANT
                                            NOTICE:
                                            The
                                            information
                                            in
                                            this
                                            email
                                            (and
                                            any
                                            attachments)
                                            is
                                            confidential.
                                            If
                                            you
                                            are
                                            not
                                            the
                                            intended
                                            recipient,
                                            you
                                            must not
                                            use
                                            or
                                            disseminate
                                            the
                                            information.
                                            If
                                            you
                                            have
                                            received
                                            this
                                            email
                                            in
                                            error,
                                            please
                                            immediately
                                            notify
                                            us
                                            by
                                            "Reply"
                                            command
                                            and
                                            permanently
                                            delete
                                            the
                                            original
                                            and
                                            any
                                            copies
                                            or
                                            printouts
                                            thereof.
                                            Although
                                            this
                                            email
                                            and
                                            any
                                            attachments
                                            are
                                            believed
                                            to be
                                            free
                                            of
                                            any
                                            virus
                                            or
                                            other
                                            defect
                                            that
                                            might
                                            affect
                                            any
                                            computer
                                            system
                                            into
                                            which
                                            it
                                            is
                                            received
                                            and
                                            opened,
                                            it is
                                            the
                                            responsibility
                                            of
                                            the
                                            recipient
                                            to
                                            ensure
                                            that
                                            it
                                            is
                                            virus
                                            free
                                            and
                                            no
                                            responsibility
                                            is
                                            accepted
                                            by
                                            ICM
                                            Capital
                                            or affiliates
                                            either
                                            jointly
                                            or
                                            severally,
                                            for
                                            any
                                            loss
                                            or
                                            damage
                                            arising
                                            in
                                            any
                                            way
                                            from
                                            its
                                            use.</p>
                                          <p style="margin-bottom: 0; margin-left: 0; margin-right: 0; margin-top: 0; padding: 0;"> <br>
                                          </p></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
';
$config= Array(
'mailtype'  => 'html'
);
$this->email->initialize($config);
$this->email->set_newline("\r\n");
$this->email->from('noreply@icm.com', 'test');
$this->email->to('ahmad.aibrahim@icmcapital.co.uk');
$this->email->subject('Email template');
$this->email->message($m);
$this->email->send();
	}
	
	
		function send_email_2(){
$this->load->library('email');	
$m = '<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#e2e2e2" style="background-color:#e2e2e2" align="center">
  <tbody>
    <tr>
      <td  valign="top" width="100%">
	  <table  cellpadding="0" cellspacing="0" id="topMessageWrapper" style="width: 595px;  color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;  padding-top:0px; margin: 0 auto; height:1000px" bgcolor="#ffffff" width="595" height="1000"  align="center" >
          <tbody valign="top">
            <tr>
              <td valign="top"><table border="0" cellpadding="0" cellspacing="0" height="100%"  width="100%" >
                  <tbody>
                    <tr valign="top" >
                      <td class="responsiveColumn" style="color: #333333; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px;"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td valign="top" style="color: #324868; font-family:Verdana, Arial, Helvetica, sans-serif;"><img src="https://www.icm.com/assets/images/email/ahi/Internal-Mmeorandum1.png"  /></td>
                            </tr>
                            <tr>
                              <td valign="top" style="color: #324868; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:42px;padding:12px 25px" > Internal <br />
                                Memorandum<br /></td>
                            </tr>
                            <tr>
                              <td valign="top" style="color: #324868; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;padding:12px 25px"><strong><br />
                                ICMTrader.com Domain Changed into ICMCapital.com </strong> <br />
                                <br /></td>
                            </tr>
                            <tr>
                              <td valign="top" style="color: #324868; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;padding:12px 25px"> Dear ICM team,<br /></td>
                            </tr>
                            <tr>
                              <td valign="top" style="color: #324868; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;padding:12px 25px"> This is to announce to you that ICMTrader.com is now replaced by <br />
                                ICMCapital.com, hence you are kindly requested to start using ICMCapital.com E-Mail address.<br />
                                <br />
                                <br /></td>
                            </tr>
                            <tr>
                              <td valign="top" style="color: #324868; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><img src="https://www.icm.com/assets/images/email/ahi/Internal-Mmeorandum2.png"  /></td>
                            </tr>
                            <tr>
                              <td valign="top" style="color: #324868; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;padding:12px 25px"><br />
                                <br />
                                <strong>ICM Updates its Iconic Logo and Brand Identity </strong> <br /></td>
                            </tr>
                            <tr>
                              <td valign="top" style="color: #324868; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;padding:12px 25px"><br />
                                July .18, 2018– ICM reached today a new milestone by consolidating all group entities & launching its all new unified brand. With almost a decade of fruitful experience in the financial markets, ICM (ICM.com) is poised to build on its proven success with a new website and brand identity. <br />
                                <br />
                                The new website ICM.COM was created as a response to ICM’S exponential growth over the past 10 years. The company has been expanding globally, thus the redesign & the newly introduced corporate identity is an integral part of the expansion.<br />
                                <br />
                                From state of the art trading platforms to the new interactive website, ICM.COM will give the traders a more personalized responsive service.<br />
                                <br />
                                ICM.COM provider of innovative online foreign Exchange trading services, has added one more award to its well-earned success stories. ICM.COM was nominated the most trusted online trading firm 2018. </td>
                            </tr>
                            <tr>
                              <td valign="top" style="color: #324868; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><img src="https://www.icm.com/assets/images/email/ahi/Internal-Mmeorandum3.png"  /></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>';
$config= Array(
'mailtype'  => 'html'
);
$this->email->initialize($config);
$this->email->set_newline("\r\n");
$this->email->from('noreply@icm.com', 'test2');
$this->email->to('ahmad.aibrahim@icmcapital.co.uk');
$this->email->subject('Email template');
$this->email->message($m);
$this->email->send();
	}
}