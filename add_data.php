<?php

session_start();
date_default_timezone_set('Asia/Calcutta');
$url=$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
$activePage = basename($_SERVER['PHP_SELF'], ".php");
include_once 'apAdmin/lib/dao.php';
$d = new dao();


include_once 'apAdmin/lib/model.php';
$m = new model();

$message = '';

$base_url = $m->base_url();

if (isset($_GET) && !empty($_GET['edit'])) {
    
    $old = $d->select1('office_address', '*','id = '.$_GET['edit'], '');
    $old = mysqli_fetch_all($old, MYSQLI_ASSOC);
}


if (isset($_GET) && !empty($_GET['delete'])) {
    
    $old = $d->delete('office_address','id = '.$_GET['delete']);
    $_SESSION['success'] = 'ok';
    $message = "ok";
}



if (isset($_POST) && !empty($_POST)) {

    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        unset($_POST['id']);
        $faqQuery = $d->update("office_address",$_POST,'id = '.$id );

        header('Location: add_data.php');
       
    }else{

    $_POST['uid'] = '1';

    $old = $d->select1('office_address','pos','uid = '.$_POST['uid'],'ORDER BY pos DESC');
    $old = mysqli_fetch_all($old, MYSQLI_ASSOC);


    if ( isset($old[0]['pos'])  && !empty($old[0]['pos'] )  && empty($_POST['pos'])) {
        $_POST['pos'] = $old[0]['pos'] + 1;
    }

    if ( empty($_POST['pos']) ) {
        $_POST['pos'] = '1';
    }

    $faqQuery = $d->insert("office_address",$_POST);
    header('Location: add_data.php');
    }
    

 
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
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>
<body>



    <header>
        <div class="header-area header-transparrent ">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="logo">
                                <a href=""><img class="img-logo" src="assets/img/logo/logotest1.png" height="100px" alt="My Company Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                      
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

<?php

if (isset($message) && !empty($message)) {
            echo '<div class="alert alert-alert-primary alert-dismissible alert-round" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <div class="alert-message">
            <span>'.$message.'</span>
            </div>
            </div>';
}




?>

	 <section class="section-padd4">
            <div class="container">
               
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="contact-title d-flex" id="contact_us_section">Add Address</h2>
                    </div>
               
                        
                 
                    <form id="form" method="post" action="" class="form-contact contact_form">
                        <div class="row">
                            <div class="col-12">
                               <div class="form-group">
                                    <input class="form-control" name="title" id="title" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Title'" placeholder="Enter Title" value="<?php if (isset($old[0]['title'])) { echo $old[0]['title']; }?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid number" name="mobile1" id="mobile1" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your mobile 1'" placeholder="Enter your mobile 1" value="<?php if (isset($old[0]['mobile1'])) { echo $old[0]['mobile1']; }?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid number" name="mobile2" id="mobile2" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your mobile 2'" placeholder="Enter your mobile 2" value="<?php if (isset($old[0]['mobile2'])) { echo $old[0]['mobile2']; }?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email1" id="email1" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email 1'" placeholder="Enter your email 1" value="<?php if (isset($old[0]['email1'])) { echo $old[0]['email1']; }?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email2" id="email2" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email 2'" placeholder="Enter your email 2" value="<?php if (isset($old[0]['email2'])) { echo $old[0]['email2']; }?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="address" id="address" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" placeholder="Enter Address"> <?php if (isset($old[0]['address'])) { echo $old[0]['address']; }?></textarea>
                                </div>
                            </div>
                            
                            <input name="id" id="id" type="hidden"  value="<?php if (isset($old[0]['id'])) { echo $old[0]['id']; }?>">

                            <input name="uid" id="uid" type="hidden"  value="<?php if (isset($old[0]['uid'])) { echo $old[0]['uid']; }?>">

                            <input name="pos" id="pos" type="hidden"  value="<?php if (isset($old[0]['pos'])) { echo $old[0]['pos']; }?>">
                            
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-info" >Save</button>
                        </div>

                    </form>
                    </div>
                </div>
        </section>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Titil</th>
                <th>Address</th>
                <th>Mobile 1</th>
                <th>Mobile 2</th>
                <th>Email 1</th>
                <th>Email 2</th>
                <th>Action</th>
            </tr> 
        </thead>
        <tbody id="tbody">
            
           
        </tbody>
        
    </table>



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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>



<script type="text/javascript">
$(document).ready(function() {

       $("#form").validate({
          rules: {
             title: 'required',
             mobile1: 'required',
             address: 'required',
             email1: {
                required: true,
                email: true,
             },
          },
           messages: {
                title: "Enter Your Address Title",
                mobile1: "Enter Your Mobile Number",
                address: "Enter Your Address",
                email1: "Enter your Email",
            }

       });

});


$(document).ready(function() {
    $('#example').DataTable();
} );



$.ajax({
    
        type: "GET",
        url: "<?php echo $base_url; ?>apAdmin/controller/addressController.php",
        dataType: 'json',
        cache: false,
        success: function(data){
    var html = '';
       

    for(var ii=0; ii<data.length; ii++){
    var n = ii+1;
                html +=     '<tr>';
                html +=     '<td>'+n+'</td>';
                html +=     '<td>'+data[ii]['title']+'</td>';
                html +=     '<td class="address_show">'+data[ii]['address']+'</td>';
                html +=     '<td>'+data[ii]['mobile1']+'</td>';
                html +=     '<td>'+data[ii]['mobile2']+'</td>';
                html +=     '<td>'+data[ii]['email1']+'</td>';
                html +=     '<td>'+data[ii]['email2']+'</td>';
                html +=     '<td><a href="<?php echo $base_url; ?>add_data.php?edit='+data[ii]['id']+'" class="btn btn-info" >Edit</a><a href="<?php echo $base_url; ?>add_data.php?delete='+data[ii]['id']+'" class="btn btn-info" onclick="if (confirm(\'Delete selected item?\') ){return true;}else{event.stopPropagation(); event.preventDefault();};">Delete</a></td>';
                html +=     '</tr>';
        }

          
        $('#tbody').html(html);
    }
});


$(".number").keypress(function (e) {

       if (e.which != 8 && e.which != 0 && e.which != 43 && e.which != 32  && (e.which < 48 || e.which > 57)) { return false; }
});



</script>
</html>