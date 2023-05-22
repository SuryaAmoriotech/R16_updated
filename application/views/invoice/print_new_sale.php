<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>
<style>
        input {
    border: none;
   
 }
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_details') ?></h1>
            <small><?php echo display('invoice_details') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('invoice_details') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
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
<?php
  $myArray = explode('(',$tax_details); 
 $tax_amt=$myArray[0];
 $tax_des=$myArray[1];


?>
   <div class="container" id="content">
        <?php
    
    if($template==2)
            {
            ?>
        <div class="brand-section">
        <div class="row" >
     
     <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 50%;'>
        
       </div>
     <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
    <div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>
           
          <b> Company name : </b><?php echo $company[0]['company_name']; ?><br>
          <b>   Address : </b><?php echo $company[0]['address']; ?><br>
          <b>   Email : </b><?php echo $company[0]['email']; ?><br>
          <b>   Contact : </b><?php echo $company[0]['mobile']; ?><br>
       </div>
 </div>
        </div>
      <div class="body-section" >
            <div class="row">&nbsp; &nbsp;&nbsp; &nbsp;
            <div class="col-6">
            <table id="one" >
            <tr><td  class="key">Invoice Number</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?></td></tr>

    <tr><td  class="key">Customer Name</td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name; ?></td></tr>
     <tr><td class="key">B/L No</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['bl_no'] ; ?></td></tr>
    <tr><td  class="key">Payment Due date</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['payment_due_date'] ; ?></td></tr>

    <tr><td  class="key">ETA</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['eta'] ; ?></td></tr>
       <tr><td  class="key">Shipping Address</td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['shipping_address'] ; ?> </td></tr>
    
</table>

                </div>
                <div class="col-6">
                <table id="two">
   <tr><td  class="key">Sales Invoice date</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['date'] ; ?></td></tr>


 <tr><td  class="key">Container Number</td><td style="width:10px;">:</td><td calss="value"><?php  echo $container_no ; ?></td></tr>
    <tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"><?php  echo $payment_terms; ?></td></tr>
     <tr><td  class="key">ETD</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['etd'] ; ?></td></tr>

   
   
<tr><td  class="key">Payment Type</td><td style="width:10px;">:</td><td calss="value"><?php  echo $paytype ; ?></td></tr>
     <tr><td  class="key">Billing Address</td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"> <?php  echo $all_invoice[0]['billing_address'] ; ?></td></tr>

</table>
    </div>
            
        </div>     
        </div>

                <div class="body-section">
          <div class="table-responsive">
     
   <div id="content">
        <?php
        // $count='';
        // $list_count=array();
        // foreach($all_invoice as $inv){
        //     $count = substr($inv['tableid'], 0, 1);
        //  $items[] =$count   ;                            
                                      




        // }
  
  
        
?>
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
   <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                <thead>
                    <tr>
                    <th rowspan="1"  class="text-centere">S.No</th>
                        <th rowspan="1" class="absorbing-column text-centere">Product Name</th>
                        <th rowspan="1" class="text-centere">Description</th>
                        <th rowspan="1" class="text-centere">Thick<br/>ness</th>
                        <th rowspan="1" class="text-centere">Bundle No</th>
                        <th rowspan="1" class="text-centere">Slab No</th>
                         <th colspan="2" class="text-centere">Net<br/> Measure<br/>Width&#9474;Height</th>
                           <th rowspan="1" class="text-centere">Net <br/>Sq. Ft</th>
                            <th rowspan="1"  class="text-centere">Sales<br/>Price<br/> per <br/>Sq. Ft</th>
                        <th rowspan="1"  class="text-centere">Sales <br/>Slab<br/> Price</th>
                          <th rowspan="1"  class="text-centere">Total</th>
                    </tr>
                    <!-- <tr>
                    <th  class="text-center"></th>
                                            <th  class="text-center"></th>    
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>  
                                            <th  class="text-center"></th>  
                                             <th  class="text-center">Width </th>
                                            <th  class="text-center">Height</th>  
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>  
                                            <th  class="text-center"></th> 
                                        </tr> -->
                </thead>
              <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                   <tr>
                    <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                       <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['product_name'];  ?></td>
                       <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['description'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $inv['thickness'];  ?></td>
                         <td style="font-size: 9px;"><?php  echo $inv['bundle_no'];  ?></td>
                       <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                       <td style="font-size: 9px;" class="net_width"><?php  echo $inv['n_width'];  ?></td>
                           <td style="font-size: 9px;" class="net_height"><?php  echo $inv['n_height'];  ?></td>
                         <td style="font-size:9px;" class="net_sq_ft"> <?php  echo $inv['net_sqft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_price_sqft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_slab_price'];  ?></td>
                       
                  <td style="text-align:start;" > <span style="font-size: 9px;"><?php  echo $currency; ?> <span class="total_price"><?php  echo  $inv['total_price'];  ?></span></span></td>
        
                    </tr>
                  
                   <?php $n++;   } }  ?>
                </tbody>
                        <tfoot>
                                    <!-- <tr>
                                 
             <td style="text-align:right;font-size: 9px;" colspan="8"><b>Net Sq. Ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="width: 60px;font-size: 9px;"   readonly="readonly"  /> 
            </td>

                                        <td style="text-align:right;font-size: 9px;" colspan="2"><b>TOTAL :</b></td>
                                        <td >
               <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="padding-top: 6px;width: 70px;font-size: 9px;"    readonly="readonly"  />
            </td>                   
                                    </tr> -->

                                            </tfoot>
                            </table>
                            <?php   } ?>
        
<table border="0" class="overall table table-hover">
    <tr>
    <td colspan="3" style="text-align:left;border:none;"><b>Overall TOTAL :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo $all_invoice[0]['total_amount']; ?> </td>
    <td style="text-align:right;border:none;" colspan="13"><b><?php echo  "Tax (".$tax_des;  ?></b></td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
        
</tr>

 </tr>
                                    

<tr>
<td colspan="3"  style="vertical-align:top;text-align:left;border:none;"><b>Overall Net Sq.Ft :</b></td><td style="border:none;" colspan="2"><?php echo  $invoice_detail[0]['total_net'];  ?></td>
                                      <td style="text-align:right;border:none;" colspan="12"><b>GRAND TOTAL :</b></td>
                                    <td style='border:none;'>
             <?php  echo $currency; ?><?php echo $all_invoice[0]['gtotal']; ?></span>
    </td>
                                       

                                           
                                    </tr>
                                  
                                    <tr>
                                        
                                    
                                    
                                    <td style="text-align:right;border:none;"  colspan="17"><b>GRAND TOTAL :</b><br/><b>(Preferred Currency)</b></td>
                                    <td style='border:none;'>
          <table border="0">
      <tr>
        
<td style='border:none;'>    <?php echo $customer_currency." ".$all_invoice[0]['gtotal_preferred_currency'] ;?></td>
          </tr>
   </table>                               

                                            <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr> 
     <?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                        <tr id="amt">
                                       
                                                <td style="border:none;text-align:right;"  colspan="17"><b><?php echo "Amount Paid" ?>:</b></td>
                                              
                                                <td style='border:none;'>
                                           <?php echo $customer_currency." ".$paid_amount ;?>
                                           </td>

                                                
                                              
                                                </tr> 
                                                <tr id="bal">
                                                <td style="border:none;text-align:right;"  colspan="17"><b><?php echo "Balance Amount " ?>:</b></td>
                                                <td style='border:none;'>
                                               
                                              <?php echo $customer_currency." ".$due_amount;?>
                                             
                                                </td>
                                                </tr> 
 </table>
            </table>
            <br/>
            <h3 class="heading">Account Details/Additional Information : </h3><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
            <h3 class="heading">Remarks/Conditions : </h3><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
        </div>
        <?php 

}
elseif($template==1)
{
?>   <div class="brand-section">
<div class="row">
   
   <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 100%;'>
      
     </div>
   <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
  <div class="col-sm-4" id='company_info' style="color:white;">
         
  <b> Company name : </b><?php echo $company[0]['company_name']; ?><br>
          <b>   Address : </b><?php echo $company[0]['address']; ?><br>
          <b>   Email : </b><?php echo $company[0]['email']; ?><br>
          <b>   Contact : </b><?php echo $company[0]['mobile']; ?><br>
     </div>
</div>
     </div>
     <div class="body-section" >
            <div class="row">&nbsp; &nbsp;&nbsp; &nbsp;
            <div class="col-6">
            <table id="one" >
            <tr><td  class="key">Invoice Number</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?></td></tr>

    <tr><td  class="key">Customer Name</td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name; ?></td></tr>
     <tr><td class="key">B/L No</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['bl_no'] ; ?></td></tr>
    <tr><td  class="key">Payment Due date</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['payment_due_date'] ; ?></td></tr>

    <tr><td  class="key">ETA</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['eta'] ; ?></td></tr>
       <tr><td  class="key">Shipping Address</td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['shipping_address'] ; ?> </td></tr>
    
</table>

                </div>
                <div class="col-6">
                <table id="two">
   <tr><td  class="key">Sales Invoice date</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['date'] ; ?></td></tr>


 <tr><td  class="key">Container Number</td><td style="width:10px;">:</td><td calss="value"><?php  echo $container_no ; ?></td></tr>
    <tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"><?php  echo $payment_terms; ?></td></tr>
     <tr><td  class="key">ETD</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['etd'] ; ?></td></tr>

   
   
<tr><td  class="key">Payment Type</td><td style="width:10px;">:</td><td calss="value"><?php  echo $paytype ; ?></td></tr>
     <tr><td  class="key">Billing Address</td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"> <?php  echo $all_invoice[0]['billing_address'] ; ?></td></tr>

</table>
    </div>
            
        </div>     
        </div>

                <div class="body-section">
          <div class="table-responsive">
     
   <div id="content">
        <?php
        // $count='';
        // $list_count=array();
        // foreach($all_invoice as $inv){
        //     $count = substr($inv['tableid'], 0, 1);
        //  $items[] =$count   ;                            
                                      




        // }
  
  
        
?>
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
   <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                <thead>
                    <tr>
                    <th rowspan="1"  class="text-centere">S.No</th>
                        <th rowspan="1" class="absorbing-column text-centere">Product Name</th>
                        <th rowspan="1" class="text-centere">Description</th>
                        <th rowspan="1" class="text-centere">Thick<br/>ness</th>
                        <th rowspan="1" class="text-centere">Bundle No</th>
                        <th rowspan="1" class="text-centere">Slab No</th>
                         <th colspan="2" class="text-centere">Net<br/> Measure<br/>Width&#9474;Height</th>
                           <th rowspan="1" class="text-centere">Net <br/>Sq. Ft</th>
                            <th rowspan="1"  class="text-centere">Sales<br/>Price<br/> per <br/>Sq. Ft</th>
                        <th rowspan="1"  class="text-centere">Sales <br/>Slab<br/> Price</th>
                          <th rowspan="1"  class="text-centere">Total</th>
                    </tr>
                    <!-- <tr>
                    <th  class="text-center"></th>
                                            <th  class="text-center"></th>    
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>  
                                            <th  class="text-center"></th>  
                                             <th  class="text-center">Width </th>
                                            <th  class="text-center">Height</th>  
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>  
                                            <th  class="text-center"></th> 
                                        </tr> -->
                </thead>
              <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>
                    <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                       <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['product_name'];  ?></td>
                       <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['description'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $inv['thickness'];  ?></td>
                         <td style="font-size: 9px;"><?php  echo $inv['bundle_no'];  ?></td>
                       <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                       <td style="font-size: 9px;" class="net_width"><?php  echo $inv['n_width'];  ?></td>
                           <td style="font-size: 9px;" class="net_height"><?php  echo $inv['n_height'];  ?></td>
                         <td style="font-size:9px;" class="net_sq_ft"> <?php  echo $inv['net_sqft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_price_sqft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_slab_price'];  ?></td>
                       
                  <td style="text-align:start;" > <span style="font-size: 9px;"><?php  echo $currency; ?> <span class="total_price"><?php  echo  $inv['total_price'];  ?></span></span></td>
        
                    </tr>
                  
                   <?php $n++;   } }  ?>
                </tbody>
                        <tfoot>
                                    <!-- <tr>
                                 
             <td style="text-align:right;font-size: 9px;" colspan="8"><b>Net Sq. Ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="width: 60px;font-size: 9px;"   readonly="readonly"  /> 
            </td>

                                        <td style="text-align:right;font-size: 9px;" colspan="2"><b>TOTAL :</b></td>
                                        <td >
               <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="padding-top: 6px;width: 70px;font-size: 9px;"    readonly="readonly"  />
            </td>                   
                                    </tr> -->

                                            </tfoot>
                            </table>
                            <?php   } ?>
        
<table border="0" class="overall table table-hover">
    <tr>
    <td colspan="3" style="text-align:left;border:none;"><b>Overall TOTAL :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo $all_invoice[0]['total_amount']; ?> </td>
    <td style="text-align:right;border:none;" colspan="13"><b><?php echo  "Tax (".$tax_des;  ?></b></td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
        
</tr>

 </tr>
                                    

<tr>
<td colspan="3"  style="vertical-align:top;text-align:left;border:none;"><b>Overall Net Sq.Ft :</b></td><td style="border:none;" colspan="2"><?php echo  $invoice_detail[0]['total_net'];  ?></td>
                                      <td style="text-align:right;border:none;" colspan="12"><b>GRAND TOTAL :</b></td>
                                    <td style='border:none;'>
             <?php  echo $currency; ?><?php echo $all_invoice[0]['gtotal']; ?></span>
    </td>
                                       

                                           
                                    </tr>
                                  
                                    <tr>
                                        
                                    
                                    
                                    <td style="text-align:right;border:none;"  colspan="17"><b>GRAND TOTAL :</b><br/><b>(Preferred Currency)</b></td>
                                    <td style='border:none;'>
          <table border="0">
      <tr>
        
<td style='border:none;'>    <?php echo $customer_currency." ".$all_invoice[0]['gtotal_preferred_currency'] ;?></td>
          </tr>
   </table>                               

                                            <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr> 
     <?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                        <tr id="amt">
                                       
                                                <td style="border:none;text-align:right;"  colspan="17"><b><?php echo "Amount Paid" ?>:</b></td>
                                              
                                                <td style='border:none;'>
                                           <?php echo $customer_currency." ".$paid_amount ;?>
                                           </td>

                                                
                                              
                                                </tr> 
                                                <tr id="bal">
                                                <td style="border:none;text-align:right;"  colspan="17"><b><?php echo "Balance Amount " ?>:</b></td>
                                                <td style='border:none;'>
                                               
                                              <?php echo $customer_currency." ".$due_amount;?>
                                             
                                                </td>
                                                </tr> 
 </table>
            </table>
            <br/>
            <h3 class="heading">Account Details/Additional Information : </h3><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
            <h3 class="heading">Remarks/Conditions : </h3><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
        </div>
        <?php 
}
elseif($template==3)
{
?>
<div class="brand-section">
<div class="row">
       
       <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$logo; ?>" style='width: 100%;'>
          
         </div>
       <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
    
   </div>
        </div>

        <div class="body-section">
        <div class="row">
        <div class="col-sm-6 "></div>
            <div class="col-sm-6 " style="width:50%;">
             <table>

        <tr>  <td style="100px;font-weight:bold;"> Company name </td><td style="width:10px;">:</td><td> <?php echo $company[0]['company_name']; ?></td></tr>
        <tr>   <td style="100px;font-weight:bold;"> Address </td><td style="width:10px;">:</td><td> <?php  echo $company[0]['address']; ?></td></tr>
        <tr>   <td style="100px;font-weight:bold;"> Email </td><td style="width:10px;">:</td><td> <?php $company[0]['email']; ?></td></tr>
        <tr>   <td style="100px;font-weight:bold;"> Contact </td><td style="width:10px;">:</td><td> <?php $company[0]['mobile']; ?></td></tr>
</tr>        
             
</table>
            </div></div>
            <div class="body-section" >
            <div class="row">&nbsp; &nbsp;&nbsp; &nbsp;
            <div class="col-6">
            <table id="one" >
            <tr><td  class="key">Invoice Number</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?></td></tr>

    <tr><td  class="key">Customer Name</td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name; ?></td></tr>
     <tr><td class="key">B/L No</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['bl_no'] ; ?></td></tr>
    <tr><td  class="key">Payment Due date</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['payment_due_date'] ; ?></td></tr>

    <tr><td  class="key">ETA</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['eta'] ; ?></td></tr>
       <tr><td  class="key">Shipping Address</td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['shipping_address'] ; ?> </td></tr>
    
</table>

                </div>
                <div class="col-6">
                <table id="two">
   <tr><td  class="key">Sales Invoice date</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['date'] ; ?></td></tr>


 <tr><td  class="key">Container Number</td><td style="width:10px;">:</td><td calss="value"><?php  echo $container_no ; ?></td></tr>
    <tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"><?php  echo $payment_terms; ?></td></tr>
     <tr><td  class="key">ETD</td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['etd'] ; ?></td></tr>

   
   
<tr><td  class="key">Payment Type</td><td style="width:10px;">:</td><td calss="value"><?php  echo $paytype ; ?></td></tr>
     <tr><td  class="key">Billing Address</td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"> <?php  echo $all_invoice[0]['billing_address'] ; ?></td></tr>

</table>
    </div>
            
        </div>     
        </div>

                <div class="body-section">
          <div class="table-responsive">
     
   <div id="content">
        <?php
        // $count='';
        // $list_count=array();
        // foreach($all_invoice as $inv){
        //     $count = substr($inv['tableid'], 0, 1);
        //  $items[] =$count   ;                            
                                      




        // }
  
  
        
?>
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
   <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                <thead>
                    <tr>
                    <th rowspan="1"  class="text-centere">S.No</th>
                        <th rowspan="1" class="absorbing-column text-centere">Product Name</th>
                        <th rowspan="1" class="text-centere">Description</th>
                        <th rowspan="1" class="text-centere">Thick<br/>ness</th>
                        <th rowspan="1" class="text-centere">Bundle No</th>
                        <th rowspan="1" class="text-centere">Slab No</th>
                         <th colspan="2" class="text-centere">Net<br/> Measure<br/>Width&#9474;Height</th>
                           <th rowspan="1" class="text-centere">Net <br/>Sq. Ft</th>
                            <th rowspan="1"  class="text-centere">Sales<br/>Price<br/> per <br/>Sq. Ft</th>
                        <th rowspan="1"  class="text-centere">Sales <br/>Slab<br/> Price</th>
                          <th rowspan="1"  class="text-centere">Total</th>
                    </tr>
                    <!-- <tr>
                    <th  class="text-center"></th>
                                            <th  class="text-center"></th>    
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>  
                                            <th  class="text-center"></th>  
                                             <th  class="text-center">Width </th>
                                            <th  class="text-center">Height</th>  
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>  
                                            <th  class="text-center"></th> 
                                        </tr> -->
                </thead>
              <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                   <tr>
                    <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                       <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['product_name'];  ?></td>
                       <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['description'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $inv['thickness'];  ?></td>
                         <td style="font-size: 9px;"><?php  echo $inv['bundle_no'];  ?></td>
                       <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                       <td style="font-size: 9px;" class="net_width"><?php  echo $inv['n_width'];  ?></td>
                           <td style="font-size: 9px;" class="net_height"><?php  echo $inv['n_height'];  ?></td>
                         <td style="font-size:9px;" class="net_sq_ft"> <?php  echo $inv['net_sqft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_price_sqft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_slab_price'];  ?></td>
                       
                  <td style="text-align:start;" > <span style="font-size: 9px;"><?php  echo $currency; ?> <span class="total_price"><?php  echo  $inv['total_price'];  ?></span></span></td>
        
                    </tr>
                  
                   <?php $n++;   } }  ?>
                </tbody>
                        <tfoot>
                                    <!-- <tr>
                                 
             <td style="text-align:right;font-size: 9px;" colspan="8"><b>Net Sq. Ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="width: 60px;font-size: 9px;"   readonly="readonly"  /> 
            </td>

                                        <td style="text-align:right;font-size: 9px;" colspan="2"><b>TOTAL :</b></td>
                                        <td >
               <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="padding-top: 6px;width: 70px;font-size: 9px;"    readonly="readonly"  />
            </td>                   
                                    </tr> -->

                                            </tfoot>
                            </table>
                            <?php   } ?>
        
<table border="0" class="overall table table-hover">
    <tr>
    <td colspan="3" style="text-align:left;border:none;"><b>Overall TOTAL :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo $all_invoice[0]['total_amount']; ?> </td>
    <td style="text-align:right;border:none;" colspan="13"><b><?php echo  "Tax (".$tax_des;  ?></b></td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
        
</tr>

 </tr>
                                    

<tr>
<td colspan="3"  style="vertical-align:top;text-align:left;border:none;"><b>Overall Net Sq.Ft :</b></td><td style="border:none;" colspan="2"><?php echo  $invoice_detail[0]['total_net'];  ?></td>
                                      <td style="text-align:right;border:none;" colspan="12"><b>GRAND TOTAL :</b></td>
                                    <td style='border:none;'>
             <?php  echo $currency; ?><?php echo $all_invoice[0]['gtotal']; ?></span>
    </td>
                                       

                                           
                                    </tr>
                                  
                                    <tr>
                                        
                                    
                                    
                                    <td style="text-align:right;border:none;"  colspan="17"><b>GRAND TOTAL :</b><br/><b>(Preferred Currency)</b></td>
                                    <td style='border:none;'>
          <table border="0">
      <tr>
        
<td style='border:none;'>    <?php echo $customer_currency." ".$all_invoice[0]['gtotal_preferred_currency'] ;?></td>
          </tr>
   </table>                               

                                            <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr> 
     <?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                        <tr id="amt">
                                       
                                                <td style="border:none;text-align:right;"  colspan="17"><b><?php echo "Amount Paid" ?>:</b></td>
                                              
                                                <td style='border:none;'>
                                           <?php echo $customer_currency." ".$paid_amount ;?>
                                           </td>

                                                
                                              
                                                </tr> 
                                                <tr id="bal">
                                                <td style="border:none;text-align:right;"  colspan="17"><b><?php echo "Balance Amount " ?>:</b></td>
                                                <td style='border:none;'>
                                               
                                              <?php echo $customer_currency." ".$due_amount;?>
                                             
                                                </td>
                                                </tr> 
 </table>
            </table>
            <br/>
            <h3 class="heading">Account Details/Additional Information : </h3><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
            <h3 class="heading">Remarks/Conditions : </h3><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
        </div>
        <?php 

}
?>
        
    </div>   

    
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->


<style>

.key{
    text-align:left;
font-weight:bold;

}
.value{
    text-align:left;
}
/* #one,#two{
float:left;
width:100%;
padding-right:4px;
} */
body{
    background-color: #fcf8f8; 
    margin: 0;
    padding: 0;
}
h1,h2,h3,h4,h5,h6{
    margin: 0;
    padding: 0;
}
p{
    margin: 0;
    padding: 0;
}
.heading_name{
    font-weight: bold;
}
.container{
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
}
.brand-section{
   background-color: #5961b3;
   padding: 10px 40px;
}
.logo{
    width: 50%;
}

.row{
    display: flex;
    flex-wrap: wrap;
    
}
.col-6{
    width: 48%;
    flex: 0 0 auto;
   
}
.text-white{
    color: #fff;
}
.company-details{
    float: right;
    text-align: right;
}

.body-section{
    padding: 1px;
    border: 1px solid gray;
    
}
th{
    font-size: 15px;
    font-weight:bold;
}
.heading{
    font-size: 20px;
    margin-bottom: 08px;
}
.sub-heading{
    color: #262626;
    margin-bottom: 05px;
}
table{
    padding:10px;
   font-size:15px;
    background-color: #fff;
    width: 100%;
    border-collapse: collapse;
   
}

table thead tr{
    border: 1px solid #111;
    background-color: #5961b3;
   
}
.table-bordered td{
    text-align:center;
}
table td {
    vertical-align: middle !important;
  
    word-wrap: break-word;
}
th{
    text-align:center;
    color:white;
    font-size:8px;
}
table th, table td {
    padding-top: 08px;
    padding-bottom: 08px;
}
.table-bordered{
    box-shadow: 0px 0px 5px 0.5px gray !important;
}
.table-bordered td, .table-bordered th {
    border: 1px solid black !important;
}
.text-right{
    text-align: right;
}
.w-20{
    width: 20%;
}
.float-right{
    float: right;
}
@media only screen and (max-width: 600px) {
    
}
.modal {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  width: 100%;
  height: 100vh;
  justify-content: center;
  align-items: center;
  opacity: 0;
  visibility: hidden;
}

.modal .content {
  position: relative;
  padding: 10px;
 
  border-radius: 8px;
  background-color: #fff;
  box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px;
  transform: scale(0);
  transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25);
}

.modal .close {
  position: absolute;
  top: 5px;
  right: 5px;
  width: 30px;
  height: 30px;
  cursor: pointer;
  border-radius: 8px;
  background-color: #7080af;
  clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%);
}

.modal.open {
    background-color:#38469f;
  opacity: 1;
  visibility: visible;
}
.modal.open .content {
  transform: scale(1);
}
.content-wrapper.blur {
  filter: blur(5px);
}
.content {
   min-height: 0px;
}
    @media only print {
      
   
        .content-header{
             display:none;
        }
 
        footer, header, .sidebar {
            display:none;
        }
    }
@page {
    size: auto;
    size: A3;
    margin: 0mm;
}


</style>

<div class="modal fade" id="myModal_sale" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="">
      
          <h4 class="modal-title">New Sale</h4>
        </div>
        <div class="content">

        <div class="modal-body" style="text-align:center;font-weight:bold;">
          
          <h4>New Sale Downloaded Successfully</h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>


$(document).ready(function () {
printDiv('content')
});
function printDiv(elementId) {
    var a = document.getElementById('content').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style> .key{ text-align:left; font-weight:bold;  }, .value{ text-align:left; }, #one,#two{ float:left; width:100%; }, body{ background-color: #fcf8f8; margin: 0; padding: 0; }, h1,h2,h3,h4,h5,h6{ margin: 0; padding: 0; }, p{ margin: 0; padding: 0; }, .heading_name{ font-weight: bold; }, .container{ width: 100%; margin-right: auto; margin-left: auto; margin-top: 50px; }, .brand-section{ background-color: #5961b3; padding: 10px 40px; }, .logo{ width: 50%; },  .row{ display: flex; flex-wrap: wrap;  }, .col-6{ width: 50%; flex: 0 0 auto;  }, .text-white{ color: #fff; }, .company-details{ float: right; text-align: right; },  .body-section{ padding: 1px; border: 1px solid gray;  }, .heading{ font-size: 20px; margin-bottom: 08px; }, .sub-heading{ color: #262626; margin-bottom: 05px; }, table{  background-color: #fff; width: 100%; border-collapse: collapse;  },  table thead tr{ border: 1px solid #111; background-color: #5961b3;  }, .table-bordered td{ text-align:center; }, table td { vertical-align: middle !important;  word-wrap: break-word; }, th{  }, table th, table td { padding-top: 08px; padding-bottom: 08px; }, .table-bordered{ box-shadow: 0px 0px 5px 0.5px gray !important; }, .table-bordered td, .table-bordered th { border: 1px solid #dee2e6 !important; }, .text-right{ text-align: right; }, .w-20{ width: 20%; }, .float-right{ float: right; }, @media only screen and (max-width: 600px) {  }, .modal { position: fixed; top: 0; left: 0; display: flex; width: 100%; height: 100vh; justify-content: center; align-items: center; opacity: 0; visibility: hidden; },  .modal .content { position: relative; padding: 10px;  border-radius: 8px; background-color: #fff; box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px; transform: scale(0); transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25); },  .modal .close { position: absolute; top: 5px; right: 5px; width: 30px; height: 30px; cursor: pointer; border-radius: 8px; background-color: #7080af; clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%); },  .modal.open { background-color:#38469f; opacity: 1; visibility: visible; }, .modal.open .content { transform: scale(1); }, .content-wrapper.blur { filter: blur(5px); }, .content { min-height: 0px; }</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
   </script>
   <script>
                        $(document).ready(function(){
                     
                     $(".normalinvoice").each(function(i,v){
                       if($(this).find("tbody").html().trim().length === 0){
                           $(this).hide()
                       }
                    });
                });
   </script>

