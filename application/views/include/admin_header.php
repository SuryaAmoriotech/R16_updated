<script src="https://kit.fontawesome.com/38e0f06f81.js" crossorigin="anonymous"></script>


<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$CI->load->model('Reports');
$CI->load->model('Users');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
$users = $CI->Users->profile_edit_data();
$out_of_stock = $CI->Reports->out_of_stock_count();
      


?>
  
<style>

.navbar-custom-menu>.navbar-nav>li>.dropdown-menu {
    position: absolute;
    right: 0;
    left: auto;
    width: 850px;
    top: 111%;
    padding: 20px;

    border-radius: 10px;
    background-color: #fff;
}

ul.dropdown-submenu {
    padding: 0;
}

ul.dropdown-submenu>li {
    list-style: none;
}
    ul.dropdown-submenu>li>a {
    padding: 5px 10px;
    color: #777;
    display: block;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    white-space: nowrap;
}

ul.dropdown-submenu>li>.menu-title a{
    color: #777;
    font-size: 16px;
    font-weight: 500;

}

ul.dropdown-submenu>li>a:hover{
    background-color: #e1e3e9;
    color: #333;
}

 ul.dropdown-submenu>li>a>i {

    font-size: 16px;
    margin-right: 10px;

 }

</style>

<header class="main-header"> 
    <a href="<?php echo base_url() ?>" class="logo"> <!-- Logo -->
        <span class="logo-mini">
            <!--<b>A</b>BD-->
            <img src="<?php
            if (isset($Web_settings[0]['favicon'])) {
                echo html_escape($Web_settings[0]['favicon']);
            }
            ?>" alt="">
        </span>

        <span class="logo-lg">
            <!--<b>Admin</b>BD-->
            <img src="<?php
            echo base_url().html_escape($_SESSION['logo']);
            ?>" alt="">
        </span>
    </a>
    <!-- Header Navbar -->


    <nav class="navbar navbar-static-top text-center">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>

            <span class="pe-7s-keypad"></span>
        </a>

     
          <?php
          $urcolp = '0';
          if($this->uri->segment(2) =="gui_pos" ){
            $urcolp = "gui_pos";
          }
          if($this->uri->segment(2) =="pos_invoice" ){
            $urcolp = "pos_invoice";
          }

           if($this->uri->segment(2) != $urcolp ){

           if($this->permission1->method('new_invoice','create')->access()){
         

           ?>
           <a href="<?php echo base_url('Cinvoice')?>" class="btn btn-success btn-outline"><i class="fa fa-balance-scale"></i> <?php  echo display('invoice') ?></a>
     <?php }?>

     
        <?php if($this->permission1->method('customer_receive','create')->access()){ ?>
           <a href="<?php echo base_url('accounts/customer_receive')?>" class="btn btn-success btn-outline"><i class="fa fa-money"></i> Sales Payments</a>
       <?php } ?>
      
  <?php if($this->permission1->method('supplier_payment','create')->access()){ ?>
          <a href="<?php echo base_url('accounts/supplier_payment')?>" class="btn btn-success btn-outline"><i class="fa fa-money" aria-hidden="true"></i> Expenses Payment</a>
      <?php } ?>

<?php if($this->permission1->method('add_purchase','create')->access()){ ?>
          <a href="<?php echo base_url('Cpurchase')?>" class="btn btn-success btn-outline"><i class="ti-shopping-cart"></i> <?php echo display('purchase') ?></a>
 <?php }} ?>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="<?php echo base_url('Cinvoice/addCart') ?>">
                        <i class="pe-7s-cart" title="View Cart"></i>
                        <span class="label total-count"></span>
                    </a>
                </li>

                 <li class="dropdown notifications-menu">
                    <a href="<?php echo base_url('Cservice/help_desk_show') ?>" >
                        <i class="pe-7s-help1" title="Help"></i>
                        <span class="label" style="background-color: #e53952;">?</span>
                    </a>
                </li>


                <li class="dropdown notifications-menu">
                    <a href="<?php echo base_url('Creport/out_of_stock') ?>" >
                        <i class="pe-7s-attention" title="<?php echo display('out_of_stock') ?>"></i>
                        <span class="label"><?php echo html_escape($out_of_stock) ?></span>
                    </a>
                </li>
                <!-- settings -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-settings"></i></a>
                  <!--   <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i><?php echo display('user_profile') ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i><?php echo 'Dashboard Settings' ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i><?php echo display('change_password') ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i><?php echo display('logout') ?></a></li>
                    </ul> -->


                <div class="dropdown-menu">
                <?php 
                if($_SESSION['u_type']==2 || $_SESSION['u_type']==3)
                    { ?>
    <div class="row">
                  <!-- <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                       <li class="menu-title" style="color:#17202a"><b>Manage Setting</b></li>
                       <li><a href="<?php //echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i>myManage Companys</a></li>
                        <li><a href="<?php //echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i>Add Company5</a></li>
                        <li><a href="<?php //echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i>Manage Company </a></li> -->
                        <!-- <li><a href="<?php //echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>Language </a></li> -->
                        <!-- <li><a href="<?php //echo base_url('Currency') ?>"><i class="pe-7s-key"></i>Currency</a></li>
                        <li><a href="<?php //echo base_url('Cweb_setting') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;Setting </a></li>
                        <li><a href="<?php //echo base_url('Cweb_setting/mail_setting') ?>"><i class="pe-7s-key"></i>Mail Setting </a></li>
                        <li><a href="<?php //echo base_url('Admin_dashboard/Help') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;Help</a></li>
                    </ul>
                  </div> -->
                  <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                          <li class="menu-title" style="color:#17202a"><b>Role Permission</b></li>
                        <li><a href=" <?php echo base_url('Permission/add_role') ?>"><i class="pe-7s-users"></i>Add Role</a></li>
                        <li><a href="<?php echo base_url('Permission/role_list') ?>"><i class="ti-dashboard"></i>Role List</a></li>
                        <li><a href=" <?php echo base_url('Permission/user_assign') ?>"><i class="pe-7s-settings"></i>User Assign Role</a></li>
                    </ul>
                  </div>
                   <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                         <li class="menu-title" style="color:#17202a"><b>SMS</b></li>
                        <li><a href=" <?php echo base_url('Csms/configure') ?>"><i class="pe-7s-users"></i>SMS Configure</a></li>
                    </ul>
                  </div>
                
                  <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                         <li class="menu-title" style="color:#17202a"><b>Admin Details</b></li>
                        <li><a href="  <?php echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i>User Profile</a></li>
                        <!-- <li><a href=" <?php echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i>Dashboard Settings</a></li> -->
                        <li><a href=" <?php echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i>Change Password</a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;Logout</a></li>
                    </ul>
                  </div>
                  <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                         <li class="menu-title" style="color:#17202a"><b>User Setting</b></li>
                         <!-- <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;Language </a></li> -->
                         <li><a href="<?php echo base_url('Currency/currency_form') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;Currency</a></li>
                         <li><a href="<?php echo base_url('Cweb_setting/mail_setting') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;Mail Setting </a></li>
                        <li><a href=" <?php echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i>Dashboard Settings</a></li>
                    </ul>
                  </div>
              </div>
              <?php } ?>
              <?php 
                if($_SESSION['u_type']==1 )
                    { ?>

<div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                         <li class="menu-title" style="color:#17202a"><b>Admin Details</b></li>
                        <li><a href="  <?php echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i>User Profile</a></li>
                        <!-- <li><a href=" <?php echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i>Dashboard Settings</a></li> -->
                        <li><a href=" <?php echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i>Change Password</a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;Logout</a></li>
                    </ul>
                  </div>
                         <?php } ?>
</div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
       
        <!-- Sidebar user panel -->
        <div class="user-panel text-center row" style="display: flex; align-items: center;">
            <div class="image col-md-6">
                <?php 
                if($_SESSION['u_type']==1)
                    { ?>
                         <img src="<?php
            if (isset($Web_settings[0]['logo'])) {
                echo html_escape($Web_settings[0]['logo']);
            }
            ?>" class="img-circle" alt="User Image">
                    <?php  } elseif($_SESSION['u_type']==2) {?>
             <img src="<?php
            if (isset($Web_settings[0]['logo'])) {
                echo html_escape($Web_settings[0]['logo']);
            }
            ?>" class="img-circle" alt="User Image">
            <?php } 
             elseif($_SESSION['u_type']==3)
             {
                ?>
               <img src="<?php
            if (isset($Web_settings[0]['logo'])) {
                echo html_escape($Web_settings[0]['logo']);
            }
            ?>" class="img-circle" alt="User Image">
                <?php 
             }
            ?>
            </div>
            <div class="info col-md-6">
                <?php 

                if($_SESSION['u_type']==1)
                { 

                    ?>
                <p>Super User </p>
           <?php } elseif($_SESSION['u_type']==2) { ?>
            <p>Admin User 
            </p>
            
          <p style="color:white;"> <?php echo $_SESSION['unique_id']; ?>   </p>



           <?php } elseif($_SESSION['u_type']==3) { ?>


            <p>User <?php 
           
            $data=$this->session->all_userdata();
//print_r($data) ;
 ?></p>
  <p style="color:white;"> <?php  echo $_SESSION['unique_id']; ?>   </p>
           <?php } ?>
            </div>
        </div>

        <?php 

if($_SESSION['u_type']==1)
{ 

    ?>
        <!-- sidebar menu -->
        <!-- user 1 -->

<ul class="sidebar-menu">

            <li class="active">
                <a href="<?php echo base_url(); ?>/"><i class="ti-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>
            <!-- <li >
                <a href="<?php //echo base_url(); ?>user"><i class="ti-dashboard"></i> <span>Add Company</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li> -->
            <li >
                <a href="<?php echo base_url(); ?>user/managecompany"><i class="ti-dashboard"></i> <span>Manage Company</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>
            <li >
                <a href="<?php echo base_url(); ?>user/adadmin"><i class="ti-dashboard"></i> <span>Add Admin</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>
            <!-- <li >
                <a ><i class="ti-dashboard"></i> <span>Assign Admin Permission</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li> -->



        </ul>
        <!-- /.User 1 -->

<?php 

}
if($_SESSION['u_type']==2)
{ 

    ?>


        <!-- user 2 -->

<ul class="sidebar-menu">

            <li class="active">
                <a href="<?php echo base_url(); ?>/"><i class="ti-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>




    <!-- Invoice menu start -->
   
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span>Sale</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_invoice">Create Invoice</a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_profarma_invoice">Quote</a></li>
                                                     <!--       <li class="treeview  "><a href="<?php //echo base_url(); ?>/Cinvoice/manage_packing_list">Packing List</a></li>-->
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_ocean_export_tracking">Ocean Export Tracking</a></li>
                    

                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_trucking">Road Transport</a></li>
                    

                </ul>
            </li>
 
                         <!-- Invoice menu end -->

       


                <!-- Customer menu start -->
                        <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Ccustomer/manage_customer">
                    <i class="fa fa-handshake-o"></i><span>Customer</span>
                 <!--    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
                </a>


              <!--   <a href="<?php echo base_url(); ?>/Cinvoice/manage_invoice">
                    <i class="fa fa-balance-scale"></i><span>Sale</span> -->
                    <!-- <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
              <!--   </a> -->
          
            </li>
                         <!-- Customer menu end -->


            <!-- Customer menu start -->
            <!--             <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-handshake-o"></i><span>Customer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "> <a href="<?php echo base_url(); ?>/Ccustomer/manage_customer">Manage Customer</a></li>
                                                    <li class="treeview  ">
             <a href="<?php echo base_url(); ?>/Ccustomer/manage_customer">Manage Customer</a> 
        </li>
                                                     <li class="treeview  ">
             <a href="<?php echo base_url(); ?>/Ccustomer/customer_ledger_report">Customer Ledger</a>
        </li>
                                                         <li class="treeview  ">
             <a href="<?php echo base_url(); ?>/Ccustomer/credit_customer">Credit Customer</a> 
        </li>
                      
                                         <li class="treeview  ">
             <a href="<?php echo base_url(); ?>/Ccustomer/paid_customer">Paid Customer</a> 
        </li>
                      
                                           <li class="treeview  ">
            <a href="<?php echo base_url(); ?>/Ccustomer/customer_advance">Customer Advance</a> 
        </li>
                                      </ul>
            </li>
         -->
            <!-- Customer menu end -->




               <!-- Product menu start -->
                       <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Cproduct/manage_product">
                    <i class="ti-bag"></i><span>Product</span>
                 
                </a>

       
          
            </li>
                         <!-- Product menu end -->




                    <!-- Supplier menu start -->
                       <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Csupplier/manage_supplier">
                    <i class="ti-user"></i><span>Vendor</span>
                 
                </a>

           
       
          
            </li>
                         <!-- Supplier menu end -->



            
                     <!-- Purchase menu start -->



                                  <li class="treeview  ">
                <a href="#">
                    <i class="ti-shopping-cart"></i><span>Expenses</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Cpurchase/manage_purchase">Create Expense</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Cpurchase/manage_purchase_order">Purchase Order</a></li>
                       


                             <!--    <li class="treeview  "><a href="<?php //echo base_url(); ?>/Cpurchase/manage_packing_list">Packing List</a></li>-->
            

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Ccpurchase/manage_ocean_import_tracking">Ocean Import Tracking</a></li>
                       

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Ccpurchase/manage_trucking">Road Transport</a></li>
                                       </ul>
            </li>
        


           <!--              <li  class="treeview  ">
                <a href="<?php echo base_url(); ?>/Cpurchase/manage_purchase">
                    <i class="ti-shopping-cart"></i><span>Expenses</span> -->
                    <!-- <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
              <!--   </a>
                
            </li>
         -->
            <!-- Purchase menu end -->  
             <!-- Quotation Menu Start -->
                     <li class="treeview  ">
                <a href="<?php echo base_url(); ?>/Cquotation/manage_quotation">
                    <i class="fa fa-book"></i><span>Quotation</span>
                   
                </a>
                <!-- <ul class="treeview-menu" >
                                <li><a href="<?php echo base_url(); ?>/Cquotation">Add Quotation</a></li>
                                                    <li><a href="<?php echo base_url(); ?>/Cquotation/manage_quotation">Manage Quotation</a></li>
                                </ul> -->
            </li>
                    <!-- quotation Menu end -->
            




        <!-- Taxes menu start -->
          
 <li class="treeview  ">

<a href="<?php echo base_url(); ?>/Caccounts/manage_tax">
       <i class="ti-bar-chart"></i><span>Taxes</span>
    
</a>

</li>
           

      
            <!-- Taxes menu end -->



                    <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-retweet" aria-hidden="true"></i><span>Return</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m">Return</a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/return_list">Stock Return List</a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/supplier_return_list">Supplier Return List</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/wastage_return_list">Wastage Return List</a></li>
                      
                </ul>
            </li>


            <!-- Report menu start -->
                         <li class="treeview  ">
                <a href="#">
                    <i class="ti-book"></i><span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/closing">Closing</a></li>
                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/closing_report">Closing Report</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/all_report">Todays Report</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_customer_receipt">Todays Customer Receipt</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_sales_report">Sales Report</a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/user_sales_report">User Wise Sales Report</a></li>
                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_DueReports">Due Report</a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_Shippingcost">Shipping Cost Report</a></li>
                                                        <li><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_purchase_report">Expenses Report</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/purchase_report_category_wise">Expenses Report (Category wise)</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/product_sales_reports_date_wise">Sales Report (Product Wise)</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/sales_report_category_wise">Sales Report (Category wise)</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/sales_return">Sales Return</a></li>
                                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/supplier_return">Supplier Return</a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_tax">Tax Report</a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/total_profit_report">Profit Report (Sale Wise)</a></li>
                                                                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Creport/product_stock">Stock Report (Product wise)</a></li>
                                    </ul>
            </li>
                    <!-- Report menu end -->


<!--New Account start-->
             <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-money"></i><span>Accounts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                      <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/financial_year">Financial Year</a></li>
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/financial_year_end">Financial Year Ending</a></li>
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/show_tree">Chart of Account</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/supplier_payment">Supplier Payment</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/customer_receive">Customer Receive</a></li>
                    
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_adjustment">Cash Adjustment</a></li>
                                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/debit_voucher">Debit Voucher</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/credit_voucher">Credit Voucher</a></li>
                                         
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/contra_voucher">Contra Voucher</a></li>
                                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/journal_voucher">Journal Voucher</a></li> 
                     
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/aprove_v">Vouchar Approval</a></li> 
                                                                      <li class="treeview  "><a href="">Report                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                               <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/voucher_report">Voucher Report</a></li>
                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_book">Cash Book</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/inventory_ledger">Inventory Ledger</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/bank_book">Bank Book</a></li>
                                                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/general_ledger">General Ledger</a></li>
                                                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/trial_balance">Trial Balance</a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/profit_loss_report">Profit Loss</a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_flow_report">Cash Flow</a></li>
                                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/coa_print">Coa Print</a></li>
                                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/balance_sheet">Balance Sheet</a></li>
                                            </ul>   

            </li>
                        </ul>
            </li>
           <!-- New Account End -->

            <!-- Bank menu start -->
                          <li class="treeview  ">
                <a href="#">
                    <i class="ti-briefcase"></i><span>Bank</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/index">Add New Bank</a></li>
                                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_list">Manage Bank</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_transaction">Bank Transaction</a></li>
                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_ledger">Bank Ledger</a></li>
                                </ul>
            </li>
                    <!-- Bank menu end -->

           



           






                <!-- Human Resource New menu start -->
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span>Human Resource</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/add_employee">Employee Info (W4 form)</a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/manage_employee">Time sheet</a></li>
                                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/pay_slip_list">Pay slip / Checks per user</a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/payroll_setting">Payroll settings</a></li>
                    

                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/add_expense_item">Expense</a></li>
                    



                                           <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/add_office_loan">Office loan</a></li>
                    


                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/payroll_reports">Payroll reports</a></li>
                    


                </ul>
            </li>
                         <!-- Human Resource New menu end -->











                              
            <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Cweb_setting/email_setting">
                    <i class="ti-user"></i><span>Email</span>
                 
                </a>


                

           
       
          
            </li>
             

              
         





      
          



                              
            <li class="treeview  ">

             <a href="fa fa-asl-interpreting">
                    <i class="ti-user"></i><span>Manage Invoice Template</span>
                 
                </a>


                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="<?php echo base_url('Cweb_setting/invoice_template') ?>">Sales Invoice</a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url('Cweb_setting/invoice_design') ?>"> Invoice Design</a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url('Cweb_setting/invoice_content') ?>">Invoice Content</a>
                    </li>
                   
            </ul>
           
       
          
            </li>
             



      

           

            

            <!-- Software Settings menu start -->
            <li class="treeview  ">
                <a href="#">
                    <i class="ti-settings"></i><span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">




                <li class="treeview  ">

<a href="fa fa-asl-interpreting">
       <i class="ti-user"></i><span>Manage Invoice Template</span>
    
   </a>


   <ul class="treeview-menu">
       <li class="treeview">
           <a href="<?php echo base_url('Cweb_setting/invoice_template') ?>">Sales Invoice</a>
       </li>
       <li class="treeview">
           <a href="<?php echo base_url('Cweb_setting/invoice_design') ?>"> Invoice Design</a>
       </li>
       <li class="treeview">
           <a href="<?php echo base_url('Cweb_setting/invoice_content') ?>">Invoice Content</a>
       </li>
   



</ul>
</li>

 






                      <li class="treeview  ">
                <a href="">
                  
               <i class="fa-solid fa-list"></i> <span>Template Content</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                
                        <li class="treeview"><a href="">Email Template</a></li>


                   


                        <li class="treeview  ">
                <a href="#">
                    <i class=" "></i> <span>Alerts Template</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                                     
                    
                <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span>Sale Template</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                     
 
         



                      <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span>New Sale</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href="">Payment Due date</a></li>
                      <li class="treeview  "><a href="">Estimated Time of Arrival </a></li>
                      <li class="treeview  "><a href="">Estimated Time of Departure</a></li>


 
                </ul>
             </li>


             <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span>Ocean Export tracking</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href="">Estimated Time of Arrival  </a></li>
                      <li class="treeview  "><a href="">Estimated Time of Departure</a></li>
                   


 
                </ul>
             </li>


             <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span>Trucking</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href=""> Container / Goods Pick up date</a></li>
                      <li class="treeview  "><a href=""> Delivery date</a></li>
                 


 
                </ul>
             </li>
         
              </ul>
             </li> 
         
                    




                    </li>







                        
                      <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span>Expense Template</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                    

            <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span>New Expense</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                      <li class="treeview  "><a href="">Payment Due Date      </a></li>
                      <li class="treeview  "><a href="">Estimated Time of Arrival      </a></li>
                      <li class="treeview  "><a href="">Estimated Time of Departure </a></li>

                </ul>
             </li>






         <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span>Purchase Order</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                      <li class="treeview  "><a href="">Est. Shipment date  </a></li>
                </ul>
             </li>




           <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span>Ocean Import tracking</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                      <li class="treeview  "><a href="">Estimated Time of Arrival  </a></li>
                      <li class="treeview  "><a href="">Estimated Time of Departure</a></li>            
                </ul>
             </li>




                      <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span>Trucking</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href=""> Container / Goods Pick up date  </a></li>
                      <li class="treeview  "><a href="">Delivery date</a></li>
                   


 
                </ul>
             </li>


 
                </ul>
             </li>

                        
 
                </ul>
             </li>
         

       

                </ul>
             </li>









                      <!-- Software Settings menu start -->
                          <li class="treeview  ">
                <a href="#">
                    <i class="ti-settings"></i> <span>Manage Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Company_setup/manage_company">Manage my Company</a></li>
                                                
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Language">Language </a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Currency">Currency </a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Cweb_setting">Setting </a></li>
                
                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/Cweb_setting/mail_setting">Mail Setting </a></li>
                                 <li style="display:none" class="treeview  "><a href="<?php echo base_url(); ?>/Cweb_setting/app_setting">App Settings </a></li>
                </ul>
            </li>
                 <!-- Role permission start -->




              <li class="treeview  ">
                <a href="#">
                    <i class="ti-key"></i> <span>Role Permission</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
             
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Permission/add_role">Add Role</a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Permission/role_list">Role List</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Permission/user_assign">User Assign Role</a></li>
                                     

                    </ul>
                </li>
                            <!-- Role permission End -->
                 <!-- sms menu start -->
                 <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-comments"></i> <span>SMS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csms/configure">SMS Configure</a></li>
                     
 
                </ul>
             </li>
         


                          <!-- sms menu start -->
                 <li class="treeview  ">
                <a href="<?php echo base_url(); ?>/Cservice/help_desk">
                    <i class="fa fa-comments"></i> <span>Help</span>
                   
                </a>
         
             </li>
         



                <!-- sms menu end -->
                 <!-- Synchronizer setting start -->
                          <li style="display:none;" class="treeview  ">
                <a href="#">
                    <i class="ti-reload"></i>  <span>Data Synchronizer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul style="display:none" class="treeview-menu">
                
                               <li class="treeview  "><a href="<?php echo base_url(); ?>/Backup_restore/restore_form">Restore</a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Backup_restore/import_form">Import</a></li>
                
                     <li class="treeview  "><a href="<?php echo base_url(); ?>/Backup_restore/download">Back Up</a></li>
                </ul>
            </li>
                    <!-- Synchronizer setting end -->
                
                </ul>
            </li>
                    <!-- Software Settings menu end -->
 <li class="treeview  "><a href="<?php echo base_url(); ?>User/add_user">Add User</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>User/manage_user">Manage User </a></li>
        </ul>   
        <!-- /.User 2 -->


<?php 

}



if($_SESSION['u_type']==3)
{ 

    ?>
        <!-- user 3 -->

<ul class="sidebar-menu">

            <li class="active">
                <a href="<?php echo base_url(); ?>/"><i class="ti-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>



 <?php 
foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='sales'){

    
    
    
        ?>
    <!-- Invoice menu start -->
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span>Sale</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_invoice">New Sale</a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_profarma_invoice">Profarma Invoice</a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_ocean_export_tracking">Ocean Export Tracking</a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_trucking">Road Transport</a></li>
                    

                </ul>
            </li>
                   
                        <!-- Invoice menu end -->

       
<?php 
break;
}
}
foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);

    if(trim($split[0])=='customer'){


   
        ?>

                <!-- Customer menu start -->
                        <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Ccustomer/manage_customer">
                    <i class="fa fa-handshake-o"></i><span>Customer</span>
                 <!--    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
                </a>


              <!--   <a href="<?php echo base_url(); ?>/Cinvoice/manage_invoice">
                    <i class="fa fa-balance-scale"></i><span>Sale</span> -->
                    <!-- <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
              <!--   </a> -->
          
            </li>
                         <!-- Customer menu end -->



            <!-- Customer menu start -->
            <!--             <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-handshake-o"></i><span>Customer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "> <a href="<?php echo base_url(); ?>/Ccustomer/manage_customer">Manage Customer</a></li>
                                                    <li class="treeview  ">
             <a href="<?php echo base_url(); ?>/Ccustomer/manage_customer">Manage Customer</a> 
        </li>
                                                     <li class="treeview  ">
             <a href="<?php echo base_url(); ?>/Ccustomer/customer_ledger_report">Customer Ledger</a>
        </li>
                                                         <li class="treeview  ">
             <a href="<?php echo base_url(); ?>/Ccustomer/credit_customer">Credit Customer</a> 
        </li>
                      
                                         <li class="treeview  ">
             <a href="<?php echo base_url(); ?>/Ccustomer/paid_customer">Paid Customer</a> 
        </li>
                      
                                           <li class="treeview  ">
            <a href="<?php echo base_url(); ?>/Ccustomer/customer_advance">Customer Advance</a> 
        </li>
                                      </ul>
            </li>
         -->
            <!-- Customer menu end -->

<?php 
break;
}
//break;
}
  foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='product'){
        ?>


               <!-- Product menu start -->
                       <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Cproduct/manage_product">
                    <i class="ti-bag"></i><span>Product</span>
                 
                </a>

       
          
            </li>
                         <!-- Product menu end -->


<?php 
break;
}
  }
 foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='supplier'){
  
        ?>

                    <!-- Supplier menu start -->
                       <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Csupplier/manage_supplier">
                    <i class="ti-user"></i><span>Vendor</span>
                 
                </a>

           
       
          
            </li>
                         <!-- Supplier menu end -->

<?php break;
}
 }
  foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='expenses'){
 
        ?>

            
                     <!-- Purchase menu start -->



                                  <li class="treeview  ">
                <a href="#">
                    <i class="ti-shopping-cart"></i><span>Expenses</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Cpurchase/manage_purchase">New Expenses</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Cpurchase/manage_purchase_order">Purchase Order</a></li>
                       


            

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Ccpurchase/manage_ocean_import_tracking">Ocean Import Tracking</a></li>
                       

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Ccpurchase/manage_trucking">Trucking</a></li>
                                       </ul>
            </li>
        
<?php 
break;
}
  }
    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='quotation'){

        ?>

          
            <!-- Purchase menu end -->  
             <!-- Quotation Menu Start -->
                     <li class="treeview  ">
                <a href="<?php echo base_url(); ?>/Cquotation/manage_quotation">
                    <i class="fa fa-book"></i><span>Quotation</span>
                   
                </a>
              
            </li>
              <?php break;
}
    }

 foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='stock'){
        ?>      <!-- quotation Menu end -->
             <!-- Stock menu start -->
                    <li class="treeview ">
            <a href="#">
                <i class="ti-bar-chart"></i><span>Stock</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Creport">Stock Report</a></li>
            
            </ul>
        </li>
            <!-- Stock menu end -->

<?php break;
}
 }

  foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='tax'){

        ?>


        <!-- Taxes menu start -->
                    <li class="treeview ">
            <a href="<?php echo base_url(); ?>/Caccounts/manage_tax">
                <i class="ti-bar-chart"></i><span>Taxes</span>
           
            </a>
         

        </li>
            <!-- Taxes menu end -->


<?php 
break;
}
  }


    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='return'){

        ?>
                    <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-retweet" aria-hidden="true"></i><span>Return</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m">Return</a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/return_list">Stock Return List</a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/supplier_return_list">Supplier Return List</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/wastage_return_list">Wastage Return List</a></li>
                      
                </ul>
            </li>

<?php 
break;
}
    }


    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='report'){
  
        ?>

            <!-- Report menu start -->
                         <li class="treeview  ">
                <a href="#">
                    <i class="ti-book"></i><span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/closing">Closing</a></li>
                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/closing_report">Closing Report</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/all_report">Todays Report</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_customer_receipt">Todays Customer Receipt</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_sales_report">Sales Report</a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/user_sales_report">User Wise Sales Report</a></li>
                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_DueReports">Due Report</a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_Shippingcost">Shipping Cost Report</a></li>
                                                        <li><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_purchase_report">Expenses Report</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/purchase_report_category_wise">Expenses Report (Category wise)</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/product_sales_reports_date_wise">Sales Report (Product Wise)</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/sales_report_category_wise">Sales Report (Category wise)</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/sales_return">Sales Return</a></li>
                                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/supplier_return">Supplier Return</a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_tax">Tax Report</a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/total_profit_report">Profit Report (Sale Wise)</a></li>
                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Creport/product_stock">Stock Report (Product wise)</a></li>
                                                                </ul>
            </li>
                    <!-- Report menu end -->

<?php 
break;
}
    }
    
    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='accounts'){

        ?>
<!--New Account start-->
             <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-money"></i><span>Accounts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/financial_year">Financial Year</a></li>
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/financial_year_end">Financial Year Ending</a></li>           
                <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/show_tree">Chart of Account</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/supplier_payment">Supplier Payment</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/customer_receive">Customer Receive</a></li>
                    
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_adjustment">Cash Adjustment</a></li>
                                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/debit_voucher">Debit Voucher</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/credit_voucher">Credit Voucher</a></li>
                                         
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/contra_voucher">Contra Voucher</a></li>
                                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/journal_voucher">Journal Voucher</a></li> 
                     
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/aprove_v">Vouchar Approval</a></li> 
                                                                      <li class="treeview  "><a href="">Report                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/voucher_report">Voucher Report</a></li>
                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_book">Cash Book</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/inventory_ledger">Inventory Ledger</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/bank_book">Bank Book</a></li>
                                                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/general_ledger">General Ledger</a></li>
                                                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/trial_balance">Trial Balance</a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/profit_loss_report">Profit Loss</a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_flow_report">Cash Flow</a></li>
                                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/coa_print">Coa Print</a></li>
                                           <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/balance_sheet">Balance Sheet</a></li>
                                            </ul>   

            </li>
                        </ul>
            </li>
            <?php 
            break;

}
    }


foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='bank'){
   
        ?>
           <!-- New Account End -->

            <!-- Bank menu start -->
                          <li class="treeview  ">
                <a href="#">
                    <i class="ti-briefcase"></i><span>Bank</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/index">Add New Bank</a></li>
                                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_list">Manage Bank</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_transaction">Bank Transaction</a></li>
                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_ledger">Bank Ledger</a></li>
                                </ul>
            </li>
                    <!-- Bank menu end -->

           
<?php 
break;
}
}
    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='hrm_management'){
  
        ?>


           






                <!-- Human Resource New menu start -->
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span>Human Resource</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/add_employee">Employee Info (W4 form)</a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/manage_employee">Time sheet</a></li>
                                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/pay_slip_list">Pay slip / Checks per user</a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/payroll_setting">Payroll settings</a></li>
                    

                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/add_expense_item">Expense</a></li>
                    



                                           <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/add_office_loan">Office loan</a></li>
                    


                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/payroll_reports">Payroll reports</a></li>
                    


                </ul>
            </li>
               

              
         <?php 
         break;
}
    }


       foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='service'){


        ?>





      
            <!-- service menu start -->


                            
                             
            <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Cservice/manage_service">
                    <i class="ti-user"></i><span>Service</span>
                 
            </a>

           
       
          
            </li>
                         <!-- service menu end -->



<?php 
break;
}

       }    
                              
     ?>       
             


<!-- 

                        
            <li  class="treeview  ">
                <a href="#">
                    <i class="fa fa-asl-interpreting"></i><span>Service</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/Cservice">Add Service</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/Cservice/manage_service">Manage Service</a></li>
                                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Cservice/service_invoice_form">Service Invoice</a></li>
                                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Cservice/manage_service_invoice">Manage Service Invoice</a></li>
                                       </ul>
            </li>
         -->


      

           

        </ul>
        <!-- /.User 3 -->
    </div> <!-- /.sidebar -->

<?php } ?>
</aside>
