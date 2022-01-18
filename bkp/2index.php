<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
$url=$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
$activePage = basename($_SERVER['PHP_SELF'], ".php");

$url = 'https://master.my-company.app/commonApi/faq_controller.php';

$data = [
  'getFaq' => 'getFaq'
];
$subject = "FAQ Questions & Answers";

$target_url = "https://master.my-company.app/commonApi/faq_controller.php";
$post = array('getFaq' => 'getFaq');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$target_url);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec ($ch);
curl_close ($ch);
$faq_data = array();
$faq_data = json_decode($result, true);
$faq_data = $faq_data['faq'];

$useragent=$_SERVER['HTTP_USER_AGENT'];
$mobile = 0;
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{
    $mobile = 1;
}
else
{
    $mobile = 0;
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>My Company</title>

    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="My Company App for managing company">
    <meta name="keywords" content="my company, My Company, Manage Company, manage company, Manage My Company, manage my company, My Company App , my company app">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta property="og:url" content="https://www.my-company.app/"/>
    <meta property="og:type" content="Landing Page"/>
    <meta property="og:title" content="My Company"/>
    <meta property="og:description" content="My Company app provides you features like employee directory, notice board,geo tag, seasonal greetings."/>
    <meta property="og:image" content="https://www.my-company.app/assets/img/logo/link_logo.jpg"/>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">
    <link rel="stylesheet" href="assets/css/faq.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SEDK42C4S5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SEDK42C4S5');
</script>

</head>
<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/favicon.png" alt="My Company Loader Logo">
                </div>
            </div>
        </div>
    </div>

    <header>
        <div class="header-area header-transparrent ">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="logo">
                                <a href=""><img src="assets/img/logo/logotest5.png" style="height: 67px;" alt="My Company Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li class="active"><a data-scroll-nav="0" onmouseover="this.style.cursor='pointer'" class="new_test">Home</a></li>
                                        <li><a data-scroll-nav="5" onmouseover="this.style.cursor='pointer'" class="new_test">About</a></li>
                                        <li><a data-scroll-nav="1" onmouseover="this.style.cursor='pointer'" class="new_test">Feature</a></li>
                                        <li><a data-scroll-nav="2" onmouseover="this.style.cursor='pointer'" class="new_test">Overview</a></li>
                                        <li><a data-scroll-nav="3" onmouseover="this.style.cursor='pointer'" class="new_test">Download App</a></li>
                                        <li><a data-scroll-nav="4" onmouseover="this.style.cursor='pointer'" class="new_test">Contact Us</a></li>
                                        <li><a data-scroll-nav="6" onmouseover="this.style.cursor='pointer'" class="new_test">FAQ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="slider-area" data-scroll-index="0">
            <div class="slider-active">
                <div class="single-slider slider-height slider-padding sky-blue d-flex align-items-center">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-6 col-md-9 ">
                                <?php 
                                    if($mobile == 1)
                                    {
                                    ?>
                                        <div class="hero__caption pt-5 text-center">
                                            <h1 data-animation="fadeInUp" data-delay=".6s">A Perfect App<br>for your company</h1>
                                            <p data-animation="fadeInUp" data-delay=".8s">My Company is well-thought-out and seamlessly designed mobile application based digital platform that allows any enterprises to create successful and interconnected ecosystems that can help in budding professional culture and business enhancement processes enormously in larger benefits including connectivity, decision making processes, communication, knowledge sharing, emergency situations etc.</p>
                                            <div class="slider-btns">
                                                <a data-animation="fadeInLeft" data-delay="1.0s" href="images/My_Company_Brochure.pdf" target="_blank" class="button button-contactForm boxed-btn-new"><i class="fa fa-download" aria-hidden="true"></i> Download Brochure</a>

                                                <!-- <a data-animation="fadeInRight" data-delay="1.0s" class="popup-video video-btn ani-btn" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><i class="fas fa-play"></i></a> -->
                                            </div>

                                        </div>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <div class="hero__caption">
                                            <h1 data-animation="fadeInUp" data-delay=".6s">A Perfect App<br>for your company</h1>
                                            <p data-animation="fadeInUp" data-delay=".8s">My Company is well-thought-out and seamlessly designed mobile application based digital platform that allows any enterprises to create successful and interconnected ecosystems that can help in budding professional culture and business enhancement processes enormously in larger benefits including connectivity, decision making processes, communication, knowledge sharing, emergency situations etc.</p>
                                            <div class="slider-btns">
                                                <a data-animation="fadeInLeft" data-delay="1.0s" href="images/My_Company_Brochure.pdf" target="_blank" class="button button-contactForm boxed-btn-new"><i class="fa fa-download" aria-hidden="true"></i> Download Brochure</a>

                                                <!-- <a data-animation="fadeInRight" data-delay="1.0s" class="popup-video video-btn ani-btn" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><i class="fas fa-play"></i></a> -->
                                            </div>

                                        </div>
                                    <?php
                                    }
                                ?>
                                    
                            </div>
                            <div class="col-lg-6">
                                <div class="hero__img d-none d-lg-block f-right" data-animation="fadeInRight" data-delay="1s">
                                    <img src="assets/img/hero/hero_right.png" alt="My Company App First Step Page">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-area" data-scroll-index="5">
            <div class="slider-active">
                <div class="single-slider slider-padding d-flex align-items-center">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-4 col-md-9">
                                <div class="hero__img d-none d-lg-block pl-10" data-animation="fadeInRight" data-delay="1s">
                                    <img src="assets/img/ss/appbt2.png" alt="My Company App First Step Page" >
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="hero__caption pl-5">
                                    <h2 data-animation="fadeInUp" data-delay=".6s">Why My Company?</h2>
                                    <p data-animation="fadeInUp" data-delay=".8s">Everything, from managing vendors, clients and employees in a company requires a huge amount of time, money and resources. With the My Company App, you can manage the documentation, raise and solve internal complaints, communicate with teams, manage and track performance and set a process digitally, through your smartphone. </p>
                                </div>
                                <div class="hero__caption pl-5">
                                    <h2 data-animation="fadeInUp" data-delay=".6s">Manage Your Company Smartly</h2>
                                    <p data-animation="fadeInUp" data-delay=".8s">Smart management is doing right things, the right way. This innovative company management application lets business owners and team leaders manage the day-to-day operations of their company digitally and stay connected with their employees directly.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="best-features-area section-padd10 pb-4 sky-blue" id="features_section" data-scroll-index="1">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9">
                        <div class="section-tittle text-center">
                            <h2>Some of the best features Of Our App!</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-xl-8 col-lg-10">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="single-features mb-70">
                                    <div class="features-icon">
                                        <img src="assets/img/hero/Ic_member.png" alt="members logo">
                                    </div>
                                    <div class="features-caption">
                                        <h3>Members</h3>
                                        <p>Complete details of members.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="single-features mb-70">
                                    <div class="features-icon">
                                        <img src="assets/img/hero/ic_noticeboard.png" alt="noticeboard logo">
                                    </div>
                                    <div class="features-caption">
                                        <h3>Notice Board</h3>
                                        <p>All circular and notice can be shared at one click.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="single-features mb-70">
                                    <div class="features-icon">
                                        <img src="assets/img/hero/Ic_sos.png" alt="SOS logo">
                                    </div>
                                    <div class="features-caption">
                                        <h3>SOS</h3>
                                        <p>Easily locate fellow members in and around you.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="single-features mb-70">
                                    <div class="features-icon">
                                        <img src="assets/img/hero/Ic_greetings.png" alt="greetings logo">
                                    </div>
                                    <div class="features-caption">
                                        <h3>Seasonal Greetings</h3>
                                        <p>Send festival Greeting with name and images to anyone in company.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="single-features mb-70">
                                    <div class="features-icon">
                                        <img src="assets/img/hero/Ic_event.png" alt="events logo">
                                    </div>
                                    <div class="features-caption">
                                        <h3>Event Planning and Management</h3>
                                        <p>Manage and plan events using my company app is very efficient.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="single-features mb-70">
                                    <div class="features-icon">
                                        <img src="assets/img/hero/ic_service_provider.png" alt="service provider logo">
                                    </div>
                                    <div class="features-caption">
                                        <h3>Service Provider</h3>
                                        <p>Keep your list of important service providers like stationery suppliers, tea/coffee vendor, building maintenance and tech repair experts in handy and reach out to them when required.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="features-shpae d-none d-lg-block">
                <img src="assets/img/shape/best-features-12.png" alt="My Company Features">
            </div>
        </section>

        <!-- <div class="available-app-area" data-scroll-index="3">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-12">
                        <div class="app-caption">
                            <div class="section-tittle text-center section-tittle3">
                                <h2>Download Brochure Of My Company</h2>
                                <p>A smart organisation management application, developed for companies to manage everyday operations using their mobile devices.</p>
                                <p>By Downloading Brochure you will get to know many features of My Company App & many other details as well.</p>
                                <div class="app-btn">
                                    <a href="images/My_Company_Brochure.pdf" class="app-btn1" target="_blank"><img src="assets/img/shape/download_png.png" alt="download_img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-shape">
                <img src="assets/img/shape/app-shape-top.png" alt="App shape top" class="app-shape-top heartbeat d-none d-lg-block">
                <img src="assets/img/shape/app-shape-left.png" alt="App shape left" class="app-shape-left d-none d-xl-block">
            </div>
        </div> -->

        <section class="service-area pt-5 pb-5">
            <div class="container">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-tittle text-center">
                            <h2>How Can We Help Your<br>with our app!</h2>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <span class="flaticon-businessman"></span>
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">Employee Profile</a></h4>
                                <p>Maintain professional profiles of your employees, with important details like Designation, Shifts and Bank details.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <span class=""><i class="fa fa-bell" aria-hidden="true"></i></span>
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">Reminders & Circulars</a></h4>
                                <p>Send important announcements, notifications and reminders of activities, events and deadlines.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <span class="flaticon-plane"></span>
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">Internal Chat</a></h4>
                                <p>Employee can communicate via the Chat feature on the app, no matter which department or branch they belong to. It helps to keep personal and professional communication separate.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <span class=""><i class="fa fa-list" aria-hidden="true"></i></span>
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">Documentation</a></h4>
                                <p>All important documents of clients, vendors and employees stored at one place, accessed only by authorized personnel.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-caption text-center mb-30">
                            <div class="service-icon">
                                <span class=""><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                            </div>
                            <div class="service-cap">
                                <h4><a href="#">Complaints Management</a></h4>
                                <p>Manage and resolve complaints from employee about any internal issue they face while working. Employee can raise issues and they can be allotted to specific people for its resolution.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="applic-apps section-padd4 sky-blue" data-scroll-index="2">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-4 col-lg-4 col-md-8">
                        <div class="single-cases-info mb-30">
                            <h3>My Company Apps<br> Screenshot</h3>
                            <p>These are some screenshots of our app's amazing features. </p>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-col-md-7">
                        <div class="app-active owl-carousel">
                            <div class="single-cases-img">
                                <img src="assets/img/ss/App1.png" alt="Screenshot1">
                            </div>
                            <div class="single-cases-img">
                                <img src="assets/img/ss/App2.png" alt="Screenshot2">
                            </div>
                           <!--  <div class="single-cases-img">
                                <img src="assets/img/ss/App4.png" alt="Screenshot4">
                            </div> -->
                            <div class="single-cases-img">
                                <img src="assets/img/ss/App5.png" alt="Screenshot5">
                            </div>
                            <div class="single-cases-img">
                                <img src="assets/img/ss/App6.png" alt="Screenshot5">
                            </div>
                            <div class="single-cases-img">
                                <img src="assets/img/ss/App7.png" alt="Screenshot5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="available-app-area" data-scroll-index="3">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-6">
                        <div class="app-caption">
                            <div class="section-tittle section-tittle3">
                                <h2>Our App Available For Any Device Download now</h2>
                                <div class="app-btn">
                                    <a href="https://apps.apple.com/in/app/my-company-app/id1570587985" class="app-btn1" target="_blank"><img src="assets/img/shape/app_btn1.png" alt="Apple store image"></a>
                                    <a href="https://play.google.com/store/apps/details?id=com.mycompany.fhpl" class="app-btn2" target="_blank"><img src="assets/img/shape/app_btn2.png" alt="Play store image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="app-img">
                            <img src="assets/img/shape/available-app-2.png" alt="My Company App Available">
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-shape">
                <img src="assets/img/shape/app-shape-top.png" alt="App shape top" class="app-shape-top heartbeat d-none d-lg-block">
                <img src="assets/img/shape/app-shape-left.png" alt="App shape left" class="app-shape-left d-none d-xl-block">
            </div>
        </div>

        <section class="container service-area pt-5 pb-5" data-scroll-index="6">
        <div id="accordion" class="container" style="margin-top: 10%;">
            <h2 class="text-center">FAQ</h2>
            <?php
            if(isset($faq_data) && !empty($faq_data))
            {
                foreach ($faq_data as $key => $value) 
                { ?>
                <details>
                  <summary><?php echo $value['faq_question']; ?></summary>
                  <div class="faq__content">
                    <p class="container"><?php echo $value['faq_answer']; ?></p>
                  </div>
                </details>
                <?php 
                }
            }
            else
            {
            ?>
                <summary>No Questions Added</summary>
            <?php
            }
            ?>
        </div>
        </section>

        <section class="service-area sky-blue section-padd4" data-scroll-index="4">
            <div class="container">
                <div class="d-sm-block mb-5 pb-1">
                    <div id="googleMap" style="width:100%;height:400px;"></div>
                </div>
                <div class="row d-flex">
                    <div class="col-12">
                        <h2 class="contact-title d-flex" id="contact_us_section">Contact Us</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                        <div id="success_message"></div>
                    </div>
                    <div class="col-lg-3">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <p>First Floor, Parshwa Tower, Above Kotak Mahindra Bank, Nr. Pakwan Cross Road , SG Highway, Bodakdev, Ahmedabad 380054</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <a href="tel:+919638017000" class="text-dark">+91 96380 17000</a>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <a href="mailto:contact@mycompany.app" class="text-dark">contact@mycompany.app</a>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class=" sky-blue p-3 border-top">
        <div class="footer-main">
            <div class="footer-area ">
                <div class="container">
                    <p class="text-center m-0">
                        &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by My Company
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>

<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.scrollUp.min.js"></script>
<script src="assets/js/contact.js"></script>
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/scrollIt/scrollIt.js" type="text/javascript"></script>
    
<script type="text/javascript">
    $(function(){
      $.scrollIt();
    });
</script>


<script type="text/javascript">
    var lat = 23.037786;
    var long = 72.512043;

    function init() 
    {
        var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            center: new google.maps.LatLng(lat, long),
            styles: [
            {
                "featureType": "administrative.country",
                "elementType": "geometry",
                "stylers": [
                {
                    "visibility": "simplified"
                },
                {
                    "hue": "#ff0000"
                }
                ]
            }
            ]

        };
        var mapElement = document.getElementById('googleMap');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, long),
            map: map,
            title: 'My Company',
            icon: 'assets/img/logo/marker.png',
            animation: google.maps.Animation.BOUNCE
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFOOP_bfTGjI0AsnB6YMducjGplsOJOiw&callback=init"></script>