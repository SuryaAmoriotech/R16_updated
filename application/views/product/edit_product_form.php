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

<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>



<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product.js" type="text/javascript"></script>

<!-- Edit Product Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('product_edit') ?></h1>
            <small><?php echo display('edit_your_product') ?></small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('product') ?></a></li>
                <li class="active"><?php echo display('product_edit') ?></li>
            </ol>
        </div>
    </section>
<style>
    .wrapper:after, .wrapper:before {
   
    background-color: white;
    }
    .select2{
        display:none;
    }
    .input-symbol-euro {
        position: absolute;
          font-size: 14px;
}
.input-symbol-euro input {
  padding-left: 18px;
}
.input-symbol-euro:after {
  position: absolute;
  top: 7px;
 content: '<?php echo $currency; ?>';
  left: 5px;
}
</style>
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
        <?php  // echo $_SERVER['REQUEST_URI']; 
        $link = $_SERVER['PHP_SELF'];
        $link_array = explode('/',$link);
        $page = end($link_array);
       
       ?>
        <!-- Purchase report -->
        


        <form id="insert_product_from_expense"  method="post">

                    <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                        <h4><?php echo display('product_edit') ?> </h4>
                        </div>
                    </div>
                    <div class="panel-body">


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="barcode_or_qrcode" class="col-sm-4 col-form-label"><?php echo display('barcode_or_qrcode') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-8">

         <input type="text" tabindex="3" class="form-control"  style="width: 100%;" value="<?php   echo  $product_detail[0]['barcode'] ?>" name="barcode"  placeholder="Barcode/QR-code" id="barcode"  />
                                    </div>

                                </div>
                            </div>









                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-4 col-form-label"><?php echo 'Quantity' ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="quantity"   value="{p_quantity}" type="number" id="quantity" placeholder="Enter Product Quantity only" required tabindex="1" >
                                    </div>
                                </div>
                            </div>
                           
						
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="product_name" type="text"  value="{product_name}"  id="product_name" placeholder="<?php echo display('product_name') ?>" required tabindex="1" >
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="serial_no" class="col-sm-4 col-form-label">Serial No</label>
                                <div class="col-sm-8">
                                    <input type="text" tabindex="" class="form-control "   value="{serial_no}" id="serial_no" name="serial_no" placeholder="111,abc,XYz"   />
                                </div>
                            </div>
                        </div>


        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="" class="form-control" id="model"  value="{product_model}"  name="model" placeholder="<?php echo display('model') ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                                    <div class="col-sm-7">
                                    <select class="form-control" id="category_id"  style="width:115%;" name="category_id" tabindex="3">
                                            <option value="<?php echo $category_id;  ?>"><?php echo $category_name; ?></option>
                                            <?php if ($category_list) { ?>
                                                {category_list}
                                                <option value="{category_id}">{category_name}</option>
                                                {/category_list}
                                            <?php } ?>
                                        </select>
                                    </div>
                              


                                   
                            </div>
                                    </div>




                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="sell_price" class="col-sm-4 col-form-label"><?php echo display('sell_price') ?> <i class="text-danger">*</i> </label>
                                    <div class="col-sm-8">
                                        <input class="form-control text-left" id="sell_price" name="price" type="text" value="{price}" required="" placeholder="0.00" tabindex="5" min="0">
                                    </div>
                                </div> 
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label"><?php echo display('Supplier') ?> <i class="text-danger">*</i> </label>
                                    <div class="col-sm-7">

                                    <!-- <input class="form-control text-right" id="supplier_id" name="supplier_id" type="text" value="{supplier_name}" required="" style="width:115%;">  -->

                                    <select   name="supplier_id"  style="width: 115%;" class="form-control"  required="">
                                                <option value="<?php echo $sup_names_dropdown[0]['supplier_id'];  ?>"><?php echo $sup_names_dropdown[0]['supplier_name'];  ?> </option>
                                                <?php foreach($sup_names_dropdown as $snd) { ?>           
                                       <option value="<?php echo $snd['supplier_name'];?>"><?php echo $snd['supplier_name'];?></option>
                                                <?php } ?>


                                            </select>


                     







                                            </div>


                                  

                                </div> 

                                </div>



                                 




                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="unit" class="col-sm-4 col-form-label"><?php echo display('unit') ?></label>
                                    <div class="col-sm-7">
                                        <select class=" unit  form-control" id="unit" name="unit" style=" width: 115%;" tabindex="-1" aria-hidden="true">
                                           
                                            <option value="<?php echo "{unit}"  ?>"><?php echo "{unit}"  ?></option>


                                            <?php if ($unit_list) { ?>
                                                {unit_list}
                                                <option value="{unit_name}">{unit_name}</option>
                                                {/unit_list}
                                            <?php } ?>
                                        </select>
                                    </div>
                            
							
                            
                                </div>


                        </div>


                  
                        <div class="col-sm-6">
                            <div class="form-group row">
<label for="product_sub_category" class="col-sm-4 col-form-label">Product Sub Category<i class="text-danger">*</i></label>
<div class="col-sm-8">
    <select   name="product_sub_category" id="product_sub_category" class=" form-control" placeholder="product_sub_category"  required style="width:100%;">
     <option value="<?php (!empty($product_sub_category)?$product_sub_category:'') ; ?>"><?php (!empty($product_sub_category)?$product_sub_category:'');  ?></option>
    <option value="Granite">Granite</option>
    <option value="Marble">Marble</option>
    <option value="Quartz">Quartz</option>
    <option value="Quartzite">Quartzite</option>
    <option value="Lime Stone">Lime Stone</option>
    <option value="Dolomite">Dolomite</option>
    <option value="Sand Stone">Sand Stone</option>
    <option value="Soap Stone">Soap Stone</option>
    </select>
</div>
                            </div>
                        </div>

                  

                            <div class="row">
                  <div class="col-sm-12">
                            <div class="col-sm-6">
                            <div class="form-group row">
                                    <label for="account_category_name" class="col-sm-4 col-form-label">Account Category Name</label>
                                    <div class="col-sm-8">
                                    <input class="form-control" name ="account_category_name" id="account_category_name" value="{account_category_name}" type="text" placeholder=" Account Category Name"   tabindex="1" >
                                 
                                    </div>
                                </div>
                            </div>




       
                            <div class="col-sm-6">
                            <div class="form-group row">
                                    <label for="account_sub_category"  class="col-sm-4 col-form-label">Account Sub Category</label>
                                    <div class="col-sm-8">
                                    <input class="form-control" name ="account_sub_category" id="account_sub_category" value="{account_sub_category}" type="text" placeholder=" Account Sub Category"  tabindex="1" >
                                 
                                    </div>
                                </div>
                            </div>
</div>  
                        </div>      

                      
                        <div class="row">
                           <div class="col-sm-12">
                            <div class="col-sm-6">
                   
                                <div class="form-group row">
<label for="account_category" class="col-sm-4 col-form-label">Account Category</label>
<div class="col-sm-8">

    <select id="ddl"  name="account_category" class="form-control" onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
<option value="<?php echo "{account_category}"  ?>"><?php echo "{account_category}"  ?></option>
<option value="1000 ASSETS">1000 ASSETS</option>
<option value="1200 RECEIVABLES">1200 RECEIVABLES</option>
<option value="1300 INVENTORIES">1300 INVENTORIES</option>
  <option value="1400 PREPAID EXPENSES & OTHER CURRENT ASSETS">1400 PREPAID EXPENSES & OTHER CURRENT ASSETS</option>
<option value="1500 PROPERTY PLANT & EQUIPMENT">1500 PROPERTY PLANT & EQUIPMENT</option>
<option value="1600 ACCUMULATED DEPRECIATION & AMORTIZATION">1600 ACCUMULATED DEPRECIATION & AMORTIZATION</option>
  <option value="1700 NON – CURRENT RECEIVABLES">1700 NON – CURRENT RECEIVABLES</option>
<option value="1800 INTERCOMPANY RECEIVABLES & 1900 OTHER NON-CURRENT ASSETS">1800 INTERCOMPANY RECEIVABLES & 1900 OTHER NON-CURRENT ASSETS</option>
<option value="2000 LIABILITIES & 2100 PAYABLES">2000 LIABILITIES & 2100 PAYABLES</option>
  <option value="2200 ACCRUED COMPENSATION & RELATED ITEMS">2200 ACCRUED COMPENSATION & RELATED ITEMS</option>
<option value="2300 OTHER ACCRUED EXPENSES">2300 OTHER ACCRUED EXPENSES</option>
<option value="2500 ACCRUED TAXES">2500 ACCRUED TAXES</option>
  <option value="2600 DEFERRED TAXES">2600 DEFERRED TAXES</option>
<option value="2700 LONG-TERM DEBT">2700 LONG-TERM DEBT</option>
<option value="2800 INTERCOMPANY PAYABLES & 2900 OTHER NON CURRENT LIABILITIES & 3000 OWNERS EQUITIES">2800 INTERCOMPANY PAYABLES & 2900 OTHER NON CURRENT LIABILITIES & 3000 OWNERS EQUITIES</option>
  <option value="4000 REVENUE">4000 REVENUE</option>
<option value="5000 COST OF GOODS SOLD">5000 COST OF GOODS SOLD</option>
<option value="6000 – 7000 OPERATING EXPENSES">6000 – 7000 OPERATING EXPENSES</option>
  
</select>
</div>
                            </div>
                            </div>









							 <div class="col-sm-6">
                             <div class="form-group row">
                                    <label for="country" class="col-sm-4 col-form-label"  required="" >Country<i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
   
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="<?php echo $country;  ?>"
  name="country" id="country" ></select>   





                                </div>
                                </div>




							 </div>							
                           </div>
                        </div>


 <div class="row">
                           <div class="col-sm-12">
                            <div class="col-sm-6">
							  <div class="form-group row">
                                <label for="account_category" class="col-sm-4 col-form-label">Account Sub Category</label>
<div class="col-sm-8">
							<select class="form-control" name="sub_category" id="ddl2">
                            <option value="<?php echo "{sub_category}"  ?>"><?php echo "{sub_category}"  ?></option>
                   </select>
			</div>		
        </div>
    </div>

                            

                            <div class="col-sm-6">  
                                <div class="form-group row">
                                    <label for="image" class="col-sm-4 col-form-label">Product Image </label>
                                    <div class="col-sm-8">
                                        <input type="file" name="image" class="form-control" id="image"  tabindex="4">
                                    </div>
                                </div> 


                                </div>
             
                       
       
 
                      <div class="row">
                                <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="tax_id" class="col-sm-4 col-form-label">Tax </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tax" class="form-control" id="tax_id" tabindex="4" placeholder=" Tax" style="text-align: left;"  value="{tax}">
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                             <div class="form-group row">
                                 <label for="tax_id" class="col-sm-4 col-form-label">Product Id  </label>
                                 <div class="col-sm-8">
                                     <input class="form-control"  type="text"  id="product_id" value= <?php echo $product_detail[0]['product_id']; ?> name="product_id" readonly  >
                                </div>
                               </div>
                               </div>
                               </div>
                               </div>
<br/>



<div class="table-responsive product-supplier">
    <table class="table table-bordered table-hover normalinvoice"  id="producttable_1">
    <thead>
             <tr>
            
                    <th rowspan="2" style="width: max-content;" class="text-center">Description</th>
                    <th rowspan="2" class="text-center">Thick ness<i class="text-danger">*</i></th>
                    <th rowspan="2" class="text-center">Supplier Block No<i class="text-danger">*</i></th>

                    <th rowspan="2" class="text-center" >Supplier Slab No<i class="text-danger">*</i> </th>
                    <th colspan="2" style="width: max-content;" class="text-center">Gross Measurement<i class="text-danger">*</i> </th>
                    <th rowspan="2" class="text-center">Gross Sq. Ft</th>
                    <th rowspan="2" style="width: min-content;" class="text-center">Bundle No<i class="text-danger">*</i></th>
                    <th rowspan="2" style="width: min-content;" class="text-center">Slab No<i class="text-danger">*</i></th>
                    <th colspan="2" style="width: max-content;" class="text-center">Net Measure<i class="text-danger">*</i></th>
                    <th rowspan="2" class="text-center">Net Sq. Ft</th>
                    <th rowspan="2" style="width: max-content;" class="text-center">Cost per Sq. Ft</th>
                    <th rowspan="2" style="width: max-content;" class="text-center">Cost per Slab</th>
                    <th rowspan="2" style="width: max-content;" class="text-center">Sales<br/>Price per Sq. Ft</th>
                    <th rowspan="2"  class="text-center">Sales Slab Price</th>
                    <th rowspan="2" class="text-center">Weight</th>
                    <th rowspan="2" class="text-center">Origin</th>
                   
                    <th rowspan="2" style="width: 100px" class="text-center">Total</th>
                    <th rowspan="2" class="text-center">Action</th>
                </tr>

                <tr>
                     <th class="text-center">Width</th>
                    <th class="text-center">Height</th>  
                  <th class="text-center">Width</th>
                    <th class="text-center">Height</th>  
                </tr>

        </thead>


                  
        <tbody id="addPurchaseItem">

              <?php 
              
              $k=1;
              if($data_products){
              foreach($data_products as $dps){ ?>

                <tr>
                
           
                <td>
             <input type="text" id="description_table_<?php echo $k;  ?>" value=" <?php echo $dps['description_table']; ?>" name="description_table[]" class="form-control" />
                </td>
              <td >
                  <input type="text" name="thickness[]" id="thickness_<?php echo $k;  ?>" value=" <?php echo $dps['thickness']; ?>" required="" class="form-control"/>
              </td>
              <td>
                  <input type="text" id="supplier_b_no_<?php echo $k;  ?>" name="supplier_block_no[]" value="<?php echo $dps['supplier_block_no']; ?>" required="" class="form-control" />
              </td>
          
              <td >
                  <input type="text"  id="supplier_s_no_<?php echo $k;  ?>" name="supplier_slab_no[]" value="<?php echo $dps['supplier_slab_no']; ?>" required="" class="form-control"/>
              </td>
             <td>
                  <input type="text" id="gross_width_<?php echo $k;  ?>" name="gross_width[]" value="<?php echo $dps['g_width']; ?>" required="" class="gross_width  form-control" />
              </td>
              <td>
                  <input type="text" id="gross_height_<?php echo $k;  ?>" name="gross_height[]" value="<?php echo $dps['g_height']; ?>" required="" class="gross_height form-control" />
              </td>
          
              <td >
                  <input type="text"   style="width:60px;"id="gross_sq_ft_<?php echo $k;  ?>" value=" <?php echo $dps['gross_sqft'] ?>" name="gross_sq_ft[]" class="gross_sq_ft form-control"/>
              </td>
              <td>
                  <input type="text" id="bundle_no_<?php echo $k;  ?>" name="bundle_no[]" value="<?php echo $dps['bundle_no'] ?>" required="" class="bundle_no form-control" />
              </td>
          
             

              <td   style="text-align: left;" >
                                          <input type="text"  id="slab_no_<?php echo $k;  ?>" name="slab_no[]" style="width: 35px;" value="<?php echo $k; ?>" readonly  required="" class="form-control"/>
                                      </td>




              <td>
                  <input type="text" id="net_width_<?php echo $k;  ?>" name="net_width[]"  value="<?php echo $dps['n_width'] ?>" required="" class="net_width form-control" />
              </td>
              <td>
                  <input type="text" id="net_height_<?php echo $k;  ?>" name="net_height[]" value="<?php echo $dps['n_height'] ?>"   required="" class="net_height form-control" />
              </td>
              <td >
                  <input type="text"   style="width:60px;"  id="net_sq_ft_<?php echo $k;  ?>" name="net_sq_ft[]" value="<?php echo $dps['net_sqft'] ?>" class="net_sq_ft form-control"/>
              </td>
              <td>


<span class="input-symbol-euro"><input type="text" id="cost_sq_ft_<?php echo $k;  ?>"  name="cost_sq_ft[]"  style="width:40px;" value=" <?php echo $dps['cost_sqft'] ?>"  class="cost_sq_ft form-control" ></span>

          
              <td >

<span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_<?php echo $k;  ?>" name="cost_sq_slab[]"   style="width:40px;" value="<?php echo $dps['cost_slab'] ?>"  class="form-control"/></span>



                 
              </td>
              <td>
          
<span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_<?php echo $k;  ?>"  name="sales_amt_sq_ft[]"  style="width:40px;"  value="<?php echo $dps['sales_price_sqft'] ?>" class="sales_amt_sq_ft form-control" /></span>



                 
              </td>
          
              <td >
      
<span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_<?php echo $k;  ?>" name="sales_slab_amt[]"  style="width:45px;" value="<?php echo $dps['sales_slab_price'] ?>"  class="sales_slab_amt form-control"/></td> </span>



               
              </td>
              <td>
                  <input type="text" id="weight_<?php echo $k;  ?>" name="weight[]" value="<?php echo $dps['weight'] ?>" class="weight form-control" />
              </td>
          
              <td >
                  <input type="text"  id="origin_<?php echo $k;  ?>" name="origin[]" value="<?php echo $dps['origin'] ?>" class="form-control"/>
              </td>

              <td >
              <span class="input-symbol-euro">        <input  type="text" class="total_amt form-control" style="width:80px;"    id="total_amt_1"   value="<?php echo $dps['total_amt'] ?>"   name="total_amt[]"/></span>
              </td>
             
            
               <td style="text-align:center;">
                                                <button  class='delete btn btn-danger' id="delete_1" type='button' value='Delete'><i class="fa fa-trash"></i></button>
                                            </td>
              
              </tr>



                    <?php $k++; }}else{
   ?>

                <tr>
                
           
                <td>
             <input type="text" id="description_table_<?php echo $k;  ?>" value="" name="description_table[]" class="form-control" />
                </td>
              <td >
                  <input type="text" name="thickness[]" id="thickness_<?php echo $k;  ?>" value="" required="" class="form-control"/>
              </td>
              <td>
                  <input type="text" id="supplier_b_no_<?php echo $k;  ?>" name="supplier_block_no[]" value="" required="" class="form-control" />
              </td>
          
              <td >
                  <input type="text"  id="supplier_s_no_<?php echo $k;  ?>" name="supplier_slab_no[]" value="" required="" class="form-control"/>
              </td>
             <td>
                  <input type="text" id="gross_width_<?php echo $k;  ?>" name="gross_width[]" value="" required="" class="gross_width  form-control" />
              </td>
              <td>
                  <input type="text" id="gross_height_<?php echo $k;  ?>" name="gross_height[]" value="" required="" class="gross_height form-control" />
              </td>
          
              <td >
                  <input type="text"   style="width:60px;"id="gross_sq_ft_<?php echo $k;  ?>" value="" name="gross_sq_ft[]" class="gross_sq_ft form-control"/>
              </td>
              <td>
                  <input type="text" id="bundle_no_<?php echo $k;  ?>" name="bundle_no[]" value="" required="" class="bundle_no form-control" />
              </td>
          
             

              <td   style="text-align: left;" >
                                          <input type="text"  id="slab_no_<?php echo $k;  ?>" name="slab_no[]" style="    width: 35px;" value="<?php echo $k ?>" readonly  required="" class="form-control"/>
                                      </td>




              <td>
                  <input type="text" id="net_width_<?php echo $k;  ?>" name="net_width[]"  value="" required="" class="net_width form-control" />
              </td>
              <td>
                  <input type="text" id="net_height_<?php echo $k;  ?>" name="net_height[]" value=""   required="" class="net_height form-control" />
              </td>
              <td >
                  <input type="text"   style="width:60px;"  id="net_sq_ft_<?php echo $k;  ?>" name="net_sq_ft[]" value="" class="net_sq_ft form-control"/>
              </td>
              <td>


<span class="input-symbol-euro"><input type="text" id="cost_sq_ft_<?php echo $k;  ?>"  name="cost_sq_ft[]"  style="width:40px;" value="0.00"  class="cost_sq_ft form-control" ></span>

          
              <td >

<span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_<?php echo $k;  ?>" name="cost_sq_slab[]"   style="width:40px;" value="0.00"  class="form-control"/></span>



                 
              </td>
              <td>
          
<span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_<?php echo $k;  ?>"  name="sales_amt_sq_ft[]"  style="width:40px;"  value="0.00" class="sales_amt_sq_ft form-control" /></span>



                 
              </td>
          
              <td >
      
<span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_<?php echo $k;  ?>" name="sales_slab_amt[]"  style="width:45px;" value="0.00"  class="sales_slab_amt form-control"/></td> </span>



               
              </td>
              <td>
                  <input type="text" id="weight_<?php echo $k;  ?>" name="weight[]" value="" class="weight form-control" />
              </td>
          
              <td >
                  <input type="text"  id="origin_<?php echo $k;  ?>" name="origin[]" value="" class="form-control"/>
              </td>

              <td >
              <span class="input-symbol-euro">        <input  type="text" class="total_amt form-control" style="width:80px;"    id="total_amt_1"   value="0.00"   name="total_amt[]"/></span>
              </td>
             
            
               <td style="text-align:center;">
                                                <button  class='delete btn btn-danger' id="delete_1" type='button' value='Delete'><i class="fa fa-trash"></i></button>
                                            </td>
              
              </tr>



                    <?php $k++; }

                       ?>


                    </tbody>
                    <tfoot>
                      <?php     if($data_products){   ?>
            <tr>
                                     <td style="text-align:right;" colspan="6"><b>Gross Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_gross_1" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> 
            </td>
             <td style="text-align:right;" colspan="4"><b>Net Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_1" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> 
            </td>
              <td style="text-align:right;" colspan="4"><b>Weight :</b></td>
                                        <td >
             <input type="text" id="overall_weight_1" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  /> 
            </td>

                <td style="text-align:right;" colspan="1"><b>TOTAL :</b></td>

               <td >
                <span class="input-symbol-euro">       <input type="text" id="Total" name="oa_total" readonly  value="0.00"  class="b_total form-control" style="width: 80px" value="0.00"    /> </span>
</td>        
                   
            </tr>
       
            <!-- <tr> <td style="text-align:right;" colspan="18"><b>GRAND TOTAL :</b></td>
           <td>
<span class="input-symbol-euro">   <input type="text" id="gtotal"  style="width: 80px" class="form-control" name="gtotal" value="<?php // echo $gtotal; ?>"  /></span>
</td> 
               

                   
            </tr>  -->
          
      <?php }else{ ?>
  <tr>
                                     <td style="text-align:right;" colspan="6"><b>Gross Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_gross_1" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> 
            </td>
             <td style="text-align:right;" colspan="4"><b>Net Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_1" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> 
            </td>
              <td style="text-align:right;" colspan="4"><b>Weight :</b></td>
                                        <td >
             <input type="text" id="overall_weight_1" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  /> 
            </td>

                <td style="text-align:right;" colspan="1"><b>TOTAL :</b></td>

               <td >
                <span class="input-symbol-euro">       <input type="text" id="Total" name="oa_total" readonly value="<?php  echo $oa_total; ?>"  class="b_total form-control" style="width: 80px" value="0.00"    /> </span>
</td>        
                   
            </tr>

  <?php    }  ?>
                    </tfoot>
    </table>
</div>
                        <div class="row">
                            <div class="col-sm-12">
                                <center><label for="description" class="col-form-label"><?php echo display('product_details') ?></label></center>
                                <input class="form-control" name="description" id="description" rows="2" value="{product_details}" tabindex="2">
                            <!-- </textarea> -->
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <div class="col-sm-6">

                                <input type="submit" id="add-product"  style="color:white;background-color:#38469f;"  class="btn btn-primary btn-large" name="add-product" value="<?php echo display('save') ?>" tabindex="10"/>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                </div>
                </div>

                        <!-- <div class="form-group row">
                            <div class="col-sm-6">


                            </div>
                        </div>
                    </div>
        </form>
                </div>
            </div>
        </div>
    </section>
</div> -->





<!-- Edit Product End -->


<div class="modal fade" id="myModal1" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="  margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
          <h4></h4>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

<script>  






    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';


 $(document).ready(function(){

        $('.normalinvoice').each(function(){
      
var tid=$(this).attr('id');
 const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);

  var sum=0;

 $('#producttable_'+idt  +  '> tbody > tr').find('.total_amt').each(function() {
var v=$(this).val();
  sum += parseFloat(v);

});
 sum = isNaN(sum) ? 0 : sum;
$('#Total').val(sum.toFixed(3));

  var sum_net=0;

 $('#producttable_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
var v=$(this).val();
  sum_net += parseFloat(v);

});
 sum_net = isNaN(sum_net) ? 0 : sum_net;
$('#overall_net_'+idt).val(sum_net.toFixed(3));
   var sum_weight=0;

 $('#producttable_'+idt  +  '> tbody > tr').find('.weight').each(function() {
var v=$(this).val();
  sum_weight += parseFloat(v);

});
  sum_weight = isNaN(sum_weight) ? 0 : sum_weight;
$('#overall_weight_'+idt).val(sum_weight.toFixed(3));
  var sum_gross=0;

 $('#producttable_'+idt  +  '> tbody > tr').find('.gross_sq_ft').each(function() {
var v=$(this).val();
  sum_gross += parseFloat(v);

});
  sum_gross = isNaN(sum_gross) ? 0 : sum_gross;
$('#overall_gross_'+idt).val(sum_gross.toFixed(3));
    

    });
});
  $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
   

//   $('#normalinvoice_'+idt+' tbody tr:last').clone().appendTo('#normalinvoice_'+idt);
    var netheight = $('.normalinvoice').attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);

     var $last = $('#addPurchaseItem tr:last');
   // var num = id+"_"+$last.index() + 2;
    var num = id+($last.index()+1);
    
    $('#addPurchaseItem tr:last').clone().find('input,select').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
        
    }).end().appendTo('#addPurchaseItem');
  
 $.each($('#producttable_1 > tbody > tr'), function (index, el) {
            $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
        })



        });
$('#insert_product_from_expense').submit(function (event) {
var dataString = {
dataString : $("#insert_product_from_expense").serialize()
};
dataString[csrfName] = csrfHash;
$.ajax({
type:"POST",
dataType:"json",
url:"<?php echo base_url(); ?>Cproduct/insert_product_from_expense",
data:$("#insert_product_from_expense").serialize(),
success:function (data) {
$("#bodyModal1").html(" Product Updated  Successfully");
$('#myModal1').modal('show');
$('#product_info').modal('hide');
console.log(data);
console.log(input_hdn);
}
});
event.preventDefault();
 window.setTimeout(function(){
 $('#myModal1').modal('hide');
 window.location.href =" <?php echo base_url()  ?>/Cproduct/manage_product"
 }, 1500);
// window.setTimeout(function(){
// $('#myModal1').modal('hide');
//  

// }, 500);
});
















function configureDropDownLists(ddl1,ddl2) {
    var assets = ['1010 CASH Operating Account', '1020 CASH Debitors', '1030 CASH Petty Cash'];
    var receivables = ['1210 A/REC Trade', '1220 A/REC Trade Notes Receivable', '1230 A/REC Installment Receivables','1240 A/REC Retainage Withheld','1290 A/REC Allowance for Uncollectible Accounts'];
    var inventories = ['1310 INV – Reserved', '1320 INV – Work-in-Progress', '1330 INV – Finished Goods','1340 INV – Reserved','1350 INV – Unbilled Cost & Fees','1390 INV – Reserve for Obsolescence'];
var prepaid_expense = ['1410 PREPAID – Insurance', '1420 PREPAID – Real Estate Taxes', '1430 PREPAID – Repairs & Maintenance','1440 PREPAID – Rent','1450 PREPAID – Deposits'];
  var property_plant = ['1510 PPE – Buildings', '1520 PPE – Machinery & Equipment', '1530 PPE – Vehicles','1540 PPE – Computer Equipment','1550 PPE – Furniture & Fixtures','1560 PPE – Leasehold Improvements'];
  var acc_dep = ['1610 ACCUM DEPR Buildings', '1620 ACCUM DEPR Machinery & Equipment', '1630 ACCUM DEPR Vehicles','1640 ACCUM DEPR Computer Equipment','1650 ACCUM DEPR Furniture & Fixtures','1660 ACCUM DEPR Leasehold Improvements'];
  var noncurrenctreceivables = ['1710 NCA – Notes Receivable', '1720 NCA – Installment Receivables', '1730 NCA – Retainage Withheld'];
  var intercompany_receivables = ['1910 Organization Costs', '1920 Patents & Licenses', '1930 Intangible Assets – Capitalized Software Costs'];
  var liabilities = ['2110 A/P Trade', '2120 A/P Accrued Accounts Payable', '2130 A/P Retainage Withheld','2150 Current Maturities of Long-Term Debt','2160 Bank Notes Payable','2170 Construction Loans Payable'];
    var accrued_compensation = ['2210 Accrued – Payroll', '2220 Accrued – Commissions', '2230 Accrued – FICA','2240 Accrued – Unemployment Taxes','2250 Accrued – Workmen’s Comp'];
  var other_accrued_expenses = ['2310 Accrued – Rent', '2320 Accrued – Interest', '2330 Accrued – Property Taxes', '2340 Accrued – Warranty Expense'];
  var accrued_taxes= ['2510 Accrued – Federal Income Taxes', '2520 Accrued – State Income Taxes', '2530 Accrued – Franchise Taxes','2540 Deferred – FIT Current','2550 Deferred – State Income Taxes'];
  var deferred_taxes= ['2610 D/T – FIT – NON CURRENT', '2620 D/T – SIT – NON CURRENT'];
  var long_term_debt=['2710 LTD – Notes Payable','2720 LTD – Mortgages Payable','2730 LTD – Installment Notes Payable'];
  var intercompany_payables=['3100 Common Stock','3200 Preferred Stock','3300 Paid in Capital','3400 Partners Capital','3500 Member Contributions','3900 Retained Earnings'];
  var revenue=['4010 REVENUE – PRODUCT 1','4020 REVENUE – PRODUCT 2','4030 REVENUE – PRODUCT 3','4040 REVENUE – PRODUCT 4','4600 Interest Income','4700 Other Income','4800 Finance Charge Income','4900 Sales Returns and Allowances','4950 Sales Discounts'];
  var cost_goods= ['5010 COGS – PRODUCT 1', '5020 COGS – PRODUCT 2','5030 COGS – PRODUCT 3','5040 COGS – PRODUCT 4','5700 Freight','5800 Inventory Adjustments','5900 Purchase Returns and Allowances','5950 Reserved'];
  var operating_expenses=['6010 Advertising Expense','6050 Amortization Expense','6100 Auto Expense','6150 Bad Debt Expense','6150 Bad Debt Expense','6200 Bank Charges','6250 Cash Over and Short','6300 Commission Expense','6350 Depreciation Expense','6400 Employee Benefit Program','6550 Freight Expense','6600 Gifts Expense','6650 Insurance – General','6700 Interest Expense','6750 Professional Fees','6800 License Expense','6850 Maintenance Expense','6900 Meals and Entertainment','6950 Office Expense','7000 Payroll Taxes','7050 Printing','7150 Postage','7200 Rent','7250 Repairs Expense','7300 Salaries Expense','7350 Supplies Expense','7400 Taxes – FIT Expense','7500 Utilities Expense','7900 Gain/Loss on Sale of Assets'];
  
    switch (ddl1.value) {
        case '1000 ASSETS':
            ddl2.options.length = 0;
            for (i = 0; i < assets.length; i++) {
                createOption(ddl2, assets[i], assets[i]);
            }
            break;
        case '1200 RECEIVABLES':
            ddl2.options.length = 0; 
        for (i = 0; i < receivables.length; i++) {
            createOption(ddl2, receivables[i], receivables[i]);
            }
            break;
        case '1300 INVENTORIES':
            ddl2.options.length = 0;
            for (i = 0; i < inventories.length; i++) {
                createOption(ddl2, inventories[i], inventories[i]);
            }
            break;
          case '1400 PREPAID EXPENSES & OTHER CURRENT ASSETS':
            ddl2.options.length = 0; 
        for (i = 0; i < prepaid_expense.length; i++) {
            createOption(ddl2, prepaid_expense[i], prepaid_expense[i]);
            }
            break;
          case '1500 PROPERTY PLANT & EQUIPMENT':
            ddl2.options.length = 0; 
        for (i = 0; i < property_plant.length; i++) {
            createOption(ddl2, property_plant[i], property_plant[i]);
            }
            break;
          case '1600 ACCUMULATED DEPRECIATION & AMORTIZATION':
            ddl2.options.length = 0; 
        for (i = 0; i < acc_dep.length; i++) {
            createOption(ddl2, acc_dep[i], acc_dep[i]);
            }
            break;
          case '1700 NON – CURRENT RECEIVABLES':
            ddl2.options.length = 0; 
        for (i = 0; i < noncurrenctreceivables.length; i++) {
            createOption(ddl2, noncurrenctreceivables[i], noncurrenctreceivables[i]);
            }
            break;
          case '1800 INTERCOMPANY RECEIVABLES & 1900 OTHER NON-CURRENT ASSETS':
            ddl2.options.length = 0; 
        for (i = 0; i < intercompany_receivables.length; i++) {
            createOption(ddl2, intercompany_receivables[i], intercompany_receivables[i]);
            }
            break;
          case '2000 LIABILITIES & 2100 PAYABLES':
            ddl2.options.length = 0; 
        for (i = 0; i < liabilities.length; i++) {
            createOption(ddl2, liabilities[i], liabilities[i]);
            }
            break;
           case '2200 ACCRUED COMPENSATION & RELATED ITEMS':
            ddl2.options.length = 0; 
        for (i = 0; i < accrued_compensation.length; i++) {
            createOption(ddl2, accrued_compensation[i], accrued_compensation[i]);
            }
            break;
          case '2300 OTHER ACCRUED EXPENSES':
            ddl2.options.length = 0; 
        for (i = 0; i < other_accrued_expenses.length; i++) {
            createOption(ddl2, other_accrued_expenses[i], other_accrued_expenses[i]);
            }
            break;
          case '2500 ACCRUED TAXES':
            ddl2.options.length = 0; 
        for (i = 0; i < accrued_taxes.length; i++) {
            createOption(ddl2, accrued_taxes[i], accrued_taxes[i]);
            }
            break;
            case '2600 DEFERRED TAXES':
            ddl2.options.length = 0; 
        for (i = 0; i < deferred_taxes.length; i++) {
            createOption(ddl2, deferred_taxes[i], deferred_taxes[i]);
            }
            break;
          case '2700 LONG-TERM DEBT':
            ddl2.options.length = 0; 
        for (i = 0; i < long_term_debt.length; i++) {
            createOption(ddl2, long_term_debt[i], long_term_debt[i]);
            }
            break;
          case '2800 INTERCOMPANY PAYABLES & 2900 OTHER NON CURRENT LIABILITIES & 3000 OWNERS EQUITIES':
            ddl2.options.length = 0; 
        for (i = 0; i < intercompany_payables.length; i++) {
            createOption(ddl2, intercompany_payables[i], intercompany_payables[i]);
            }
            break;
            case '4000 REVENUE':
            ddl2.options.length = 0; 
        for (i = 0; i < revenue.length; i++) {
            createOption(ddl2, revenue[i], revenue[i]);
            }
            break;
          case '5000 COST OF GOODS SOLD':
            ddl2.options.length = 0; 
        for (i = 0; i < cost_goods.length; i++) {
            createOption(ddl2, cost_goods[i], cost_goods[i]);
            }
            break;
          case '6000 – 7000 OPERATING EXPENSES':
            ddl2.options.length = 0; 
        for (i = 0; i < operating_expenses.length; i++) {
            createOption(ddl2, operating_expenses[i], operating_expenses[i]);
            }
            break;
            default:
                ddl2.options.length = 0;
            break;
    }

}

    function createOption(ddl, text, value) {
        var opt = document.createElement('option');
        opt.value = value;
        opt.text = text;
        ddl.options.add(opt);
    }
$(document).on('keyup', '.cost_sq_ft', function(){
var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='net_width_'+id;
var net_height = 'net_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sqft=$('#cost_sq_ft_'+id).val();
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var sales_sqft=cost_sqft *nresult;
var x = $('#slab_no_'+id).val();
var sales_slab_price=cost_sqft *nresult*x;

console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+idt);
sales_slab_price = isNaN(sales_slab_price) ? 0 : sales_slab_price;
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
$(this).closest('tr').find('.total_price').val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
var overall_sum=0;
     $('.table').find('.total_price').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
 $('#Total').val(overall_sum).trigger('change');
});

$(document).on('keyup', '.net_height,.net_width', function(){
 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='net_width_'+id;
var net_height = 'net_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var nresult=netresult.toFixed(3);
var cost_sqft=$('#cost_sq_ft_'+id).val();

var sales_sqft=cost_sqft *nresult;
var sales_slab_price=cost_sqft *nresult*id;
console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+id);
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
$('#'+'total_amt_'+id).val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#overall_net_1').val(total_net.toFixed(3)).trigger('change');
var total=0;
 $('.table').each(function() {
    $(this).find('.total_amt').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#Total').val(total.toFixed(3)).trigger('change');
});
$(document).on('keyup', '.gross_height,.gross_width', function(){

 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='gross_width_'+id;
var net_height = 'gross_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);

$('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));

var total_g=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_g += parseFloat(precio);
        }
      });

     
 //   });

  });
  total_g = isNaN(total_g) ? 0 : total_g;
$('#overall_gross_1').val(total_g.toFixed(3)).trigger('change');
});
$(document).on('keyup', '.weight', function(){
var weight=0;
     $(this).closest('table').find('.weight').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          weight += parseFloat(v);
        }
});
 $(this).closest('table').find('.overall_weight').val(weight.toFixed(3));


});


//  $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
   
// var tid=$(this).closest('table').attr('id');
// const indexLast = tid.lastIndexOf('_');
// var id = tid.slice(indexLast + 1);
// //   $('#normalinvoice_'+idt+' tbody tr:last').clone().appendTo('#normalinvoice_'+idt);
//    //  var netheight = table.attr('id');
// // const indexLastDot = table.lastIndexOf('_');
// // var id = table.slice(indexLastDot + 1);

//      var $last = $('#addPurchaseItem tr:last');
//    // var num = id+"_"+$last.index() + 2;
//     var num = id+($last.index()+1);
    
//     $('#addPurchaseItem tr:last').clone().find('input,select').attr('id', function(i, current) {
//         return current.replace(/\d+$/, num);
        
//     }).end().appendTo('#addPurchaseItem');
  
//  $.each($('.normalinvoice > tbody > tr'), function (index, el) {
//             $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
//         })



//         });
// var addSerialNumber = function () {
//     var i = 1
//     $('#addPurchaseItem tr').each(function(index) {
//         $(this).find('td:nth-child(9)').html(index+1);
//     });
// };

//   function addInputField(table) {
    
//      var $last = $('#addPurchaseItem' + ' tr:last');
//     var num = $last.index() + 2;
//     $('#addPurchaseItem'  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
//         return current.replace(/\d+$/, num);
//     }).end().appendTo('#addPurchaseItem' );
   
//   addSerialNumber();
// }
  $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
   

//   $('#normalinvoice_'+idt+' tbody tr:last').clone().appendTo('#normalinvoice_'+idt);
    var netheight = $('.normalinvoice').attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);

     var $last = $('#addPurchaseItem_1 tr:last');
   // var num = id+"_"+$last.index() + 2;
    var num = id+($last.index()+1);
    
    $('#addPurchaseItem_1 tr:last').clone().find('input,select').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
        
    }).end().appendTo('#addPurchaseItem_1');
  
 $.each($('#producttable_1 > tbody > tr'), function (index, el) {
            $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
        })



        });
$(document).ready(function() {
     var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='gross_width_'+id;
var net_height = 'gross_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);

$('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sqft=$('#cost_sq_ft_'+id).val();

var sales_sqft=cost_sqft *nresult;
var sales_slab_price=cost_sqft *nresult*id;
console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+id);
$('#'+'sales_slab_amt_'+id).val("<?php //echo $currency." ";  ?>"+sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val("<?php //echo $currency." ";  ?>"+sales_sqft.toFixed(3));
    $('#title').hide();
    $('#account_category').bind('change', function() {
        var elements = $('div.container').children().hide(); // hide all the elements
        var value = $(this).val();

        if (value.length) { // if somethings' selected
            $('#title').show();
            elements.filter('.' + value).show(); // show the ones we want
        }
    }).trigger('change');
});
$(document).on('click', '.delete', function(){


var tid=$(this).closest('table').attr('id');
localStorage.setItem("delete_table",tid);
console.log(localStorage.getItem("delete_table"));
$(this).closest('tr').remove();
   var sum=0;
    $('#'+localStorage.getItem("delete_table")).find('.total_amt').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('#Total').val(sum).trigger('change');
   var sumnet=0;
 // var overall_sum=0;
   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }
//  sumnet += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));


    var sumgross=0;
 // var overall_sum=0;
    $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }
//  sumnet += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));


  var sum_w=0;
     $('#'+localStorage.getItem("delete_table")).find('.weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sum_w += parseFloat(precio);
        }
      });
$('#overall_weight_1').val(sum_w).trigger('change');
// var total_w=0;
//  $('.table').each(function() {
//     $(this).find('.weight').each(function() {
//         var precio = $(this).val();
//         if (!isNaN(precio) && precio.length !== 0) {
//           total_w += parseFloat(precio);
//         }
//       });

//   });
// $('.overall_weight').val(total_w.toFixed(3)).trigger('change');
// var overall_sum=0;
//      $('.table').find('.total_price').each(function() {
// var v=$(this).val();
//   overall_sum += parseFloat(v);
//  // overall_sum +=parseFloat(v);
// });
//  $('#Total').val(overall_sum).trigger('change');





//$('#total_net').val(overall_net.toFixed(3));



 });
$(document).on('keyup','.sales_amt_sq_ft', function (e) {

   var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id_num = netheight.slice(indexLastDot + 1);
   var sales_amt_sq_ft=$('#sales_amt_sq_ft_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
 var netresult =parseInt(sales_amt_sq_ft) * parseInt(net_sq_ft);
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'sales_slab_amt_'+id_num).val(netresult.toFixed(3));
$(this).closest('tr').find('.total_amt').val(netresult.toFixed(3));
var overall_sum=0;
     $('.table').find('.total_amt').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
 $('#Total').val(overall_sum.toFixed(3)).trigger('change');

  });
    $(document).on('keyup','.sales_slab_amt', function (e) {
        
  var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id_num = netheight.slice(indexLastDot + 1);
  
   var sales_slab_amt=$('#sales_slab_amt_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
 var netresult =parseInt(sales_slab_amt) / parseInt(net_sq_ft);
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'sales_amt_sq_ft_'+id_num).val(netresult.toFixed(3));
$('#total_'+id_num).val(sales_slab_amt);
var overall_sum=0;
     $('.table').find('.total_amt').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
 $('#Total').val(overall_sum.toFixed(3)).trigger('change');
  });
</script>


