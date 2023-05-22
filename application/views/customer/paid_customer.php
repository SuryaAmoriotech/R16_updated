<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> 





<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('customer') ?></h1>
            <small><?php echo display('paid_customer') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('customer') ?></a></li>
                <li class="active"><?php echo display('paid_customer') ?></li>
            </ol>
        </div>
    </section>
    <section class="content">
        <!-- Alert Message -->
        <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
        ?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message ?>
        </div>
        <?php
            $this->session->unset_userdata('message');
            }
            $error_message = $this->session->userdata('error_message');
            if (isset($error_message)) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error_message ?>
        </div>
        <?php
            $this->session->unset_userdata('error_message');
            }
        ?>

        <div class="row">
            <div class="col-sm-12">
                    <?php
                    if($this->permission1->method('add_customer','create')->access()) { ?>
                        <a   style="background-color:#38469f;color:white;"  href="<?php echo base_url('Ccustomer')?>" class="btn  m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_customer')?> </a>
                    <?php } ?>

                    <?php
                    if($this->permission1->method('manage_customer','read')->access() || $this->permission1->method('manage_customer','update')->access() || $this->permission1->method('manage_customer','delete')->access()) { ?>
                        <a   style="background-color:#38469f;color:white;"  href="<?php echo base_url('Ccustomer/manage_customer')?>" class="btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('manage_customer')?> </a>
                    <?php } ?>

                    <?php
                    if($this->permission1->method('paid_customer','read')->access()) { ?>
                        <a  style="background-color:#38469f;color:white;" href="<?php echo base_url('Ccustomer/credit_customer')?>" class="btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('credit_customer')?> </a>
                    <?php } ?>

                   
                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    
                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i>

    
                    <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

    <span class="glyphicon glyphicon-th-list"></span> Download <br>
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>
                 
    </ul>
  </div>

        </div>
        <div class="row"> 

        </div>

        </div>

            

         <!-- Manage Product report -->
      
         <div class="row">

<div class="col-sm-12">

    <div class="panel panel-bd lobidrag">

        <div class="panel-heading">

        </div>

        <div class="panel-body">

        <div id="customers">
<table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
<thead>
<tr>
<th class="ID" data-resizable-column-id="1"    style="width: 80px; height: 40.0114px;" >ID</th>
<th class="Customer Name" data-resizable-column-id="2"  style="height: 45.0114px; width: 234.011px" >Customer Name</th>
<th class="Address 1" data-resizable-column-id="3"  style="height: 42.0114px;"   >Address 1</th>
<th class="Address 2"  data-resizable-column-id="4"  style="width: 248.011px;"        >Address 2</th>
<th class="Mobile" data-resizable-column-id="5"    style="width: 198.011px;"       >Mobile</th>
<th class="Email" data-resizable-column-id="6" style="width: 190.011px; height: 44.0114px;">Email</th>
<th class="Phone" data-resizable-column-id="7"    style="width: 198.011px;"       >Phone</th>
<th class="Balance" data-resizable-column-id="8"    style="width: 198.011px;"       >Paid Amount</th>
<!-- <div class="myButtonClass Action"> 
<th class="Action text-center" data-column-id="action" data-resizable-column-id="9" data-formatter="commands" data-sortable="false"     >Action</th>
</div> -->
</tr>
</thead>
<tbody>

<?php
$count=1;

if(count($paid_customer)>0){
foreach($paid_customer as $k=>$arr){
?>
<tr style="text-align:center" ><td class="ID"><?php  echo $count;  ?></td>
<td class="Customer Name"><?php   echo $arr['customer_name'];  ?></td>
<td class="Address 1"><?php   echo $arr['customer_address'];  ?></td>
<td class="Address 2"><?php   echo $arr['address2'];  ?></td>
<td class="Mobile"><?php   echo $arr['customer_mobile'];  ?></td>
<td class="Email"><?php   echo $arr['customer_email'];  ?></td>
<td class="Phone"><?php   echo $arr['phone'];  ?></td>
 <td class="Balance"><?php   echo $currency." ".$arr['paid_amount'];  ?></td> 
<!-- <td><a class="btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>Ccustomer/customer_update_form/<?php echo  $arr['customer_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td> -->

</td>


</div>
</tr>
<!-- <td class="paid"><?php // echo $paid_amount; ?></td>  -->

<?php   
$count++;


  
    
} }  else{
?>
<tr><td colspan="8" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td></tr>
<?php
}

?>

</tbody>

</table>
</div>

</div>

</div>










<div id="myModal_colSwitch"  class="modal_colSwitch">
        <div class="modal-content_colSwitch">
              <span class="close_colSwitch">&times;</span>
              <input type="checkbox"  data-control-column="1" checked = "checked" class="opt ID" value="ID"/> ID<br>

<input type="checkbox"  data-control-column="2" checked = "checked" class="opt Customer Name" value="Customer Name"/>Customer Name<br>

<input type="checkbox"  data-control-column="3" checked = "checked" class="opt Address 1" value="Address 1"/>Address 1<br>

<input type="checkbox"  data-control-column="4" checked = "checked" class="opt Address 2" value="Address 2"/>Address 2<br>

<input type="checkbox"  data-control-column="5" checked = "checked" class="opt Mobile" value="Mobile"/>Mobile<br>

<input type="checkbox"  data-control-column="6" checked = "checked" class="opt Email" value="Email"/>Email<br>

<input type="checkbox"  data-control-column="7" checked = "checked" class="opt Phone" value="Phone"/>Phone<br>


<input type="checkbox"  data-control-column="8" checked = "checked" class="opt Paid Amount" value="Paid Amount"/>Paid Amount<br>


<!-- <input type="checkbox"  data-control-column="15" checked = "checked" class="opt Action" value="Action"/>Action<br> -->
<!--      <input type="submit" value="submit" id="submit"/>-->    
        </div>
    </div>
</div>

</section>

</div>

<input type="hidden" value="Customer/Customer" id="url"/>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>

    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$editor = $('#submit'),
  $editor.on('click', function(e) {
    if (this.checkValidity && !this.checkValidity()) return;
    e.preventDefault();
    var yourArray = [];
    //loop through all checkboxes which is checked
    $('.modal-content_colSwitch input[type=checkbox]:not(:checked)').each(function() {
      yourArray.push($(this).val());//push value in array
    });
   
    values = {
    
      extralist_text: yourArray
    
    };
    console.log(values)
    var json=values;
    var data = {
        page:$('#url').val(),
          content: yourArray
       
       };
       data[csrfName] = csrfHash;
$.ajax({
    
    type: "POST",  
    url:'<?php echo base_url();?>Ccustomer/setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
        if(data) {
           console.log(data);
        }
    }  
});
  });

  $( document ).ready(function() {
   var page=$('#url').val();
   page=page.split('/');
    var data = {
        'menu':page[0],
        'submenu':page[1]
         
       
       };
      
       data[csrfName] = csrfHash;
    $.ajax({
    
    type: "POST",  
    url:'<?php echo base_url();?>Ccustomer/get_setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
     var menu=data.menu;
     var submenu=data.submenu;
     if(menu=='Customer' && submenu=='Customer'){
     var s=data.setting;
s=JSON.parse(s);
console.log(s);
for (var i = 0; i < s.length; i++) {
    console.log(s[i]);
    $('td.'+s[i]).hide(); // hide the column header th
    $('th.'+s[i]).hide();
$('tr').each(function(){
     $(this).find('td:eq('+$('td.'+s[i]).index()+')').hide();
});
    }
    for (var i = 0; i < s.length; i++) {
        if( $('.'+s[i]))
  $('.'+s[i]).prop('checked', false); //check the box from the array, note: you need to add a class to your checkbox group to only select the checkboxes, right now it selects all input elements that have the values in the array 
    }  
}
    }
});


});

    </script>