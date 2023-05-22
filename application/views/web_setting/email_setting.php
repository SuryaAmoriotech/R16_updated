<link rel="stylesheet" type="text/css" href="
  <?php echo base_url('assets/css/mail.css'); ?>">
<script src="
    <?php echo base_url('assets/ckeditor/ckeditor.js'); ?>">
</script>
<!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
<!-- Add new customer start -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="header-icon">
      <i class="pe-7s-note2"></i>
    </div>
    <div class="header-title">
      <h1> <?php echo display('update_setting') ?> </h1>
      <small>Email</small>
      <ol class="breadcrumb">
        <li>
          <a href="#">
            <i class="pe-7s-home"></i> <?php echo display('home') ?> </a>
        </li>
        <li>
          <a href="#"> <?php echo display('web_settings') ?> </a>
        </li>
        <li class="active"> <?php echo display('update_setting') ?> </li>
      </ol>
    </div>
  </section>
  <section class="content">
    <!-- Alert Message --> <?php
         $message = $this->session->userdata('message');
         if (isset($message)) {
             ?> <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <?php echo $message ?>
    </div> <?php
         $this->session->unset_userdata('message');
         }
         $error_message = $this->session->userdata('error_message');
         if (isset($error_message)) {
         ?> <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <?php echo $error_message ?>
    </div> <?php
         $this->session->unset_userdata('error_message');
         }
         ?>
    <!-- New customer -->
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>Webmail</h4>
            </div>
          </div>
          <div class="mail-box">
            <aside class="sm-side">
              <div class="user-head">
                <a class="inbox-avatar" href="javascript:;">
                  <img width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                </a>
                <div class="user-name">
                  <h5>
                    <a href="#">Admin User</a>
                  </h5>
                  <span>
                    <a href="#">admin@gmail.com</a>
                  </span>
                </div>
                <!-- <a class="mail-dropdown pull-right" href="javascript:;"><i class="fa fa-chevron-down"></i></a> -->
              </div>
              <div class="inbox-body">
                <a href="#composeModal" data-toggle="modal" title="Compose" class="btn btn-compose"> Compose </a>
              </div>
              <ul class="inbox-nav inbox-divider">
                <li class="active">
                  <a href="#" class="tablinks" onclick="openCity(event, 'Inbox')" id="defaultOpen" onclick="$.data.load(1);">
                    <i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right" id="count_app"></span>
                  </a>
                </li>
                <li>
                  <a href="#" class="tablinks" onclick="openCity(event, 'Sentbox')" onclick="$.data.load(2);">
                    <i class="fa fa-envelope-o"></i> Sent </a>
                </li>
                <!--  <li><a href="#"><i class="fa fa-bookmark-o"></i> Important</a></li><li><a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a></li> -->
                <li>
                  <a href="#" class="tablinks" onclick="openCity(event, 'Trash')" onclick="$.data.load(3);">
                    <i class=" fa fa-trash-o"></i> Trash </a>
                </li>
              </ul>
              <!--  <div class="inbox-body text-center"><div class="btn-group"><a class="btn mini btn-primary" href="javascript:;"><i class="fa fa-plus"></i></a></div><div class="btn-group"><a class="btn mini btn-success" href="javascript:;"><i class="fa fa-phone"></i></a></div><div class="btn-group"><a class="btn mini btn-info" href="javascript:;"><i class="fa fa-cog"></i></a></div></div> -->
            </aside>
            <aside class="lg-side">
              <div class="inbox-head">
                <h3>Inbox</h3>
                <form action="#" class="pull-right position">
                  <div class="input-append">
                    <input type="text" id="search" class="sr-input" placeholder="Search Mail">
                    <button class="btn sr-btn" type="button">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </form>
              </div>
              <div class="inbox-body">
                <div class="mail-option">
                  <div class="chk-all">
                    <input type="checkbox" id="checkAll" class="mail-checkbox mail-group-checkbox">
                    <div class="btn-group">
                      <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false"> All <i class="fa fa-angle-down "></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="#"> None</a>
                        </li>
                        <li>
                          <a href="#"> Read</a>
                        </li>
                        <li>
                          <a href="#"> Unread</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="btn-group">
                    <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                      <i class=" fa fa-refresh"></i>
                    </a>
                  </div>
                 <!--  <div class="btn-group hidden-phone">
                    <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false"> More <i class="fa fa-angle-down "></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-pencil"></i> Mark as Read </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-ban"></i> Spam </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#">
                          <i class="fa fa-trash-o"></i> Delete </a>
                      </li>
                    </ul>
                  </div> -->
                  <!-- <div class="btn-group">
                    <a data-toggle="dropdown" href="#" class="btn mini blue"> Move to <i class="fa fa-angle-down "></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-pencil"></i> Mark as Read </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-ban"></i> Spam </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#">
                          <i class="fa fa-trash-o"></i> Delete </a>
                      </li>
                    </ul>
                  </div> -->
                  <ul class="unstyled inbox-pagination">
                    <li>
                      <span>1-50 of 234</span>
                    </li>
                    <li>
                      <a class="np-btn" href="#">
                        <i class="fa fa-angle-left  pagination-left"></i>
                      </a>
                    </li>
                    <li>
                      <a class="np-btn" href="#">
                        <i class="fa fa-angle-right pagination-right"></i>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- Table Inbox -->
                <div id="Inbox" class="tabcontent">
                  <table class="table table-inbox table-hover" id="live_search">
                    <tbody>
                      <?php 
                        $conn = mysqli_connect('localhost', 'wwwstockeai_stockie_user_uat', 'amoriotech2022', 'wwwstockeai_stockeai_test');        
                          $sql = "SELECT * FROM `email_config`";
                          $result = mysqli_query($conn, $sql);
                          foreach ($result as $key => $value) {
                            $stm_user = $value['smtp_user'];
                            $stm_pass = $value['smtp_pass'];
                          }
                        set_time_limit(4000); 
                        $imapPath = '{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}Inbox';
                        $username = $stm_user;
                        $password = $stm_pass; 
                        $inbox = imap_open($imapPath,$username,$password) or 
                        die('Cannot connect to Gmail: ' . imap_last_error());
                        $emails = imap_search($inbox,'UNSEEN');
                        foreach ($emails as $key => $mail) { 
                          $headerInfo = imap_headerinfo($inbox,$mail); 
                          // echo "<pre>";
                          // print_r($headerInfo); 
                          // echo "</pre>";
                          $date = date("d F, Y", strtotime($headerInfo->date));
                          // $message = quoted_printable_decode(imap_fetchbody($inbox,$email_number,1.1)); 
                          $message = imap_body($inbox, $mail, FT_PEEK); 
                          $ClearText = preg_replace( "/\n\s+/", "\n", rtrim(html_entity_decode(strip_tags($message))));
                        ?>
                          <tr class="unread" class="tablinks" onclick="openCity(event, 'box')">
                            <td class="inbox-small-cells">
                              <input type="checkbox" id="checkItem" class="mail-checkbox">
                            </td>
                            <td class="inbox-small-cells">
                              <i class="fa fa-star"></i>
                            </td>
                            <td class="view-message  dont-show"><?php echo $headerInfo->subject; ?></td>
                            <td class="view-message "><?php echo $ClearText; ?></td>
                            <td class="view-message  inbox-small-cells">
                              <!-- <i class="fa fa-paperclip"></i> &nbsp;  -->
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </td>
                            <td class="view-message  text-right"><?php echo date('H:i:A',strtotime($date)); ?></td>
                            <input type="hidden" name="" id="email_count" value="<?php echo count($emails); ?>">
                          </tr>
                        <?php } ?>
                      <!-- <tr class="">
                        <td class="inbox-small-cells">
                          <input type="checkbox" id="checkItem" class="mail-checkbox">
                        </td>
                        <td class="inbox-small-cells">
                          <i class="fa fa-star inbox-started"></i>
                        </td>
                        <td class="view-message dont-show">Freelancer.com</td>
                        <td class="view-message">Stop wasting your visitors </td>
                        <td class="view-message  inbox-small-cells">
                          
                           <i class="fa fa-trash" aria-hidden="true"></i>
                        </td>
                        <td class="view-message text-right"> <?php echo date('M d'); ?> </td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
                <!-- Table inbox end -->
                <div id="Sentbox" class="tabcontent">
                  <table class="table table-inbox table-hover">
                    <tbody>
                      <?php 
                       $conn = mysqli_connect('localhost', 'wwwstockeai_stockie_user_uat', 'amoriotech2022', 'wwwstockeai_stockeai_test');
                        $id = $this->session->userdata('user_id');
                        $sql = "SELECT * FROM `email_data` WHERE created_by = $id and is_deleted!= 1";
                        $result = mysqli_query($conn, $sql); 
                        foreach ($result as $key => $value) { ?>
                        <tr class="unread" class="tablinks" onclick="openCity(event, 'View')">
                          <td class="inbox-small-cells">
                            <input type="checkbox" id="checkItem" class="mail-checkbox">
                          </td>
                          <td class="inbox-small-cells">
                            <i class="fa fa-star"></i>
                          </td>
                          <td><input type="hidden" name="sentmsg" id="sentmsg" value="<?php echo $value['id']; ?>"></td>

                          <td class="view-message  dont-show">
                             To: <span><?php echo $value['to_email']; ?></span>
                          </td>
                          <td class="view-message "><?php echo $value['subject']; ?> - <span style="font-weight: normal;"><?php echo $value['message']; ?></span>
                          </td>
                          <td class="view-message  inbox-small-cells">
                            <!-- <i class="fa fa-paperclip"></i> &nbsp;  -->
                            <a href="<?php echo base_url('Cweb_setting/email_setting') ?>?id=<?php echo $value['id']; ?>" style="color: #000;" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this email?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </td>
                          <td class="view-message  text-right"><?php echo date('H:i:A',strtotime($value['time'])); ?> </td>
                        </tr>
                      <?php } ?> 
                    </tbody>
                  </table>
                </div>
                <div id="Trash" class="tabcontent">
                  <table class="table table-inbox table-hover">
                    <tbody>
                        <?php 
                        $conn = mysqli_connect('localhost', 'wwwstockeai_stockie_user_uat', 'amoriotech2022', 'wwwstockeai_stockeai_test');
                        $id = $this->session->userdata('user_id');
                        $sql_draft = "SELECT * FROM `email_data` WHERE created_by = $id and is_deleted = 1";
                        // echo $sql_draft;
                        $result_draft = mysqli_query($conn, $sql_draft); 
                        $i=1;
                        foreach ($result_draft as $key => $value) { ?>
                         
                          <tr class="unread">
                            <td class="inbox-small-cells">
                              <input type="checkbox" id="checkItem" class="mail-checkbox">
                            </td>
                            <td class="inbox-small-cells">
                              <i class="fa fa-star"></i>
                            </td>
                            <td class="view-message  dont-show">To: <?php echo $value['to_email']; ?></td>
                            <td class="view-message "><?php echo $value['subject']; ?> - <?php echo $value['message']; ?></td>
                            <td class="view-message  inbox-small-cells">
                              <!-- <a href="" data-toggle="tooltip" title="Restore" style="color: #000;"><i class="fa fa-undo" aria-hidden="true"></i></a>&nbsp; -->
                              <a href="<?php echo base_url('Cweb_setting/email_setting') ?>?id=<?php echo $value['id']; ?>" style="color: #000;" data-toggle="tooltip" title="Delete Forever" onclick="return confirm('Are you sure you want to delete this email?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                            <td class="view-message  text-right"><?php echo date('H:i:A',strtotime($value['time'])); ?> </td>
                          </tr>
                        <?php $i++; } ?> 
                    </tbody>
                  </table>
                </div>
                <div id="View" class="tabcontent">
                  <table class="table table-inbox table-hover">
                    <tbody>
                      <tr class="unread">
                        <td class="view-message" onclick="openCity(event, 'Sentbox')">
                          <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;&nbsp; Added a new class: Sent Box
                        </td>
                        <td class="view-message  inbox-small-cells text-right">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; <span style="font-weight: normal;"> <?php echo date('H:i:A'); ?> </span>
                        </td>
                        <td class="view-message  inbox-small-cells text-right">
                          <i class="fa fa-print" aria-hidden="true"></i> &nbsp; <i class="fa fa-star"></i>
                          </i>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <table class="table table-inbox table-hover">
                    <tbody>
                      <!-- <?php 

                        if(isset($_GET['sentmsg'])){
                          echo $_GET['sentmsg'];
                        }else{
                          echo "error";
                        }

                      ?> -->

                        <tr class="unread">
                          <td class="view-message dont-show">
                            <img width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                          </td>
                          <td class="view-message text-left" style="max-width: 340px;"> Test <br>
                            <br>
                            <address style="font-weight: normal;">Test</address>
                          </td>
                          <td class="view-message text-left"></td>
                          <td class="view-message  inbox-small-cells">
                            <a href="#myModal" data-toggle="modal" title="Compose">
                              <i class="fa fa-reply" aria-hidden="true"></i>
                            </a>
                          </td>
                          <td class="view-message  text-right">Test</td>
                        </tr>
                     
                    </tbody>
                  </table>
                </div>

                  <div id="box" class="tabcontent">
                  <table class="table table-inbox table-hover">
                    <tbody>
                      <tr class="unread">
                        <td class="view-message" onclick="openCity(event, 'Inbox')">
                          <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;&nbsp; Added a new class: Sent Box
                        </td>
                        <td class="view-message  inbox-small-cells text-right">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; <span style="font-weight: normal;"> <?php echo date('H:i:A'); ?> </span>
                        </td>
                        <td class="view-message  inbox-small-cells text-right">
                          <i class="fa fa-print" aria-hidden="true"></i> &nbsp; <i class="fa fa-star"></i>
                          </i>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <table class="table table-inbox table-hover">
                    <tbody>
                        <tr class="unread">
                          <td class="view-message dont-show">
                            <img width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                          </td>
                          <td class="view-message text-left" style="max-width: 340px;"> Hello <br>
                            <br>
                            <address style="font-weight: normal;">ryhush</address>
                          </td>
                          <td class="view-message text-left"></td>
                          <td class="view-message  inbox-small-cells">
                            <a href="#myModal" data-toggle="modal" title="Compose">
                              <i class="fa fa-reply" aria-hidden="true"></i>
                            </a>
                          </td>
                          <td class="view-message  text-right">Time </td>
                        </tr>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
      <!-- 
      <?php echo form_open_multipart('Cweb_setting/update_invoice_setting/new_sale', array('class' => 'form-vertical', 'id' => '')) ?><div class="panel-body"><iframe src="https://webmail.afterlogic.com/" style="width: 1000px; height: 640px;"></iframe></div><?php echo form_close() ?> -->
    </div>
</div>
</div>
</section>
</div>

 <div class="modal fade" id="composeModal" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="color:white;background-color:#38469f;">
                        <a href="#" class="close" data-dismiss="modal">&times;</a>
                        <h4 class="modal-title"><?php echo display('title') ?></h4>
                      </div>
                      <div class="modal-body">
                        <?php echo form_open_multipart('Cweb_setting/sendemail')?>
                        <!-- <form action="Cweb_setting/sendemail" method="post"> -->
                          <div class="panel-body">
                            <div class="form-group row">
                              <label style="width: auto;" class="col-sm-3 col-form-label">To:
                              </label>
                              <div class="col-lg-12">
                                <input type="email" placeholder="" name="to_email" id="inputEmail1" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label style="width: auto;" class="col-sm-3 col-form-label">Cc / Bcc
                              </label>
                              <div class="col-lg-12">
                                <input type="email" placeholder="" name="cc_email" id="inputEmail1" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label style="width: auto;" class="col-sm-3 col-form-label">Subject
                              </label>
                              <div class="col-lg-12">
                                <input type="text" placeholder="" name="subject" id="inputEmail1" class="form-control">
                              </div>
                            </div>
                            </div>
                            <div class="form-group row">
                              <label style="width: auto;" class="col-sm-3 col-form-label">Message
                              </label>
                              <div class="col-lg-12">
                                <textarea rows="10" cols="30" class="form-control" name="message"></textarea>
                              </div>
                            </div>
                            <!-- <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a> -->
                          <input type="submit" class="btn" name="submit_btn" style="color:white;background-color: #38469F; float: right;" value="Send">
                          <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                           <br> <br> 
                          </div>
                         
                      </div>
                    <!--   <div class="modal-footer">
                        <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn" style="color:white;background-color: #38469F;" value="Send">
                      </div> -->
                       <?php echo form_close()?>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>


<!-- Add new customer end -->

<!-- <script>
  CKEDITOR.replace("text_editor");
</script> -->
<script type="text/javascript">
  $("#checkAll").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
</script>
<style type="text/css">
  .cke_bottom {
    padding-bottom: 3px;
    display: none;
  }

  .label-danger {
    background-color: #38469f;
    border: 2px solid #38469f;
  }

</style>


<?php 

 $conn = mysqli_connect('localhost', 'wwwstockeai_stockie_user_uat', 'amoriotech2022', 'wwwstockeai_stockeai_test');
$id = $_GET['id'];
$sql = "UPDATE `email_data` SET is_deleted = 1 WHERE id =$id";
$result = mysqli_query($conn, $sql);
?>

<script>
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';


  $( document ).ready(function() {

    var email = $('#instant_email').submit(function (event) {

    var dataString = {
        dataString : $("#instant_email").serialize()
   };
   dataString[csrfName] = csrfHash;
    $.ajax({
        type:"POST",
        // dataType:"json",
        url:"<?php echo base_url(); ?>Cweb_setting/sendemail",
        data:$("#instant_email").serialize(),
        success:function (data) {
            
        }
    });
    event.preventDefault();
});

});


var count_value = $('#email_count').val();
$("#count_app").append(count_value);


var sent = $('#sentmsg').val();
// console.log(sent);
// alert(sent);



$("#search").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  // console.log(value);
  $("#live_search tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});

</script>


<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();

  $('li > a').click(function() {
    $('li').removeClass();
    $(this).parent().addClass('active');
});
</script>