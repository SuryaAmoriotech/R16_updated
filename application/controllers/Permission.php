<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Permission extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('lpermission');
        $this->load->library('session');
        $this->load->model('Permission_model');
         $this->auth->check_admin_auth();
    }

    //Permission form
    public function index()
    {
        $content = $this->lpermission->permission_form();
        $this->template->full_admin_html_view($content);
    }

    
     public function create()
            {
                $sql = "insert into sec_role (type,uid)values ('".$_POST['rolename']."','".$this->session->userdata('user_id')."')";
        $this->db->query($sql);
          $id = $this->db->insert_id();
          foreach($_POST as $key=>$value)
              {
                if($key!='rolename')
                {
                    $input=explode('_',$key);
                     $menu=strtolower($input[0]);
                     $col=strtolower($input[1]);
                      $sql="insert into  role_permission(`".$col."`,`menu`,`role_id`) values(1,'$menu',$id)";
                    //   echo $sql; die();
                     $this->db->query($sql);
                     $this->session->set_flashdata('message', display('role_permission_added_successfully'));
                            }
              }
         redirect("Permission/add_role");
            }
        
        




















    

    public function user_assign()
    {
        $CI =& get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpermission');
        $content = $this->lpermission->assign_form();
        $this->template->full_admin_html_view($content);
    }




    public function usercreate($id = null)
    {
        $data['title'] = display('list_Role_setup');
        #-------------------------------#
        $this->form_validation->set_rules('user_id', display('user_id'), 'required');
        $this->form_validation->set_rules('user_type', display('user_type'), 'required|max_length[30]');

        $user_id = $this->input->post('user_id',true);
        $create_by = $this->session->userdata('user_id');
        $roleid = $this->input->post('user_type',true);

        
        $create_date = date('Y-m-d h:i:s');
        #-------------------------------#
        $data['role_data'] = (Object)$postData = array(
            'id'         => $this->input->post('id',TRUE),
            'user_id'    => $user_id,
             'roleid'     => $roleid,
            'createby'   => $create_by,
            'createdate' => $create_date
        );


        // print_r($data);

        $this->db->select('*');
        $this->db->from('sec_userrole ');
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $query = $this->db->get();
        //echo $this->db->last_query();
 
 
        if ($query->num_rows() > 0) {
            // $this->db->update('roleid',$data);
             $this->db->where('user_id', $this->session->userdata('user_id'));
             $this->db->update('sec_userrole',array('roleid' => $roleid));
             redirect("Permission/user_assign");
        }else{
          

        if ($this->form_validation->run()) {

            if (empty($postData['id'])) {
                if ($this->Permission_model->role_create($postData)) {
                    $id = $this->db->insert_id();
                    $this->session->set_flashdata('exception', display('please_try_again'));
                } else {


                }
                $this->session->set_flashdata('message', display('save_successfully'));
                redirect("Permission/user_assign");

            } else {

                $this->permission->method('dashboard', 'update')->redirect();

                if ($this->user_model->update_role($postData)) {
                   
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    $this->session->set_flashdata('exception', display('please_try_again'));
                }

                redirect("dashboard/user/create_user_role/" . $postData['id']);
            }

        } else {
            if (!empty($id)) {
                $data['title'] = display('update');
                $data['role']  = $this->user_model->findById($id);
            }
            $data['module']    = "dashboard";
            $data['user_list'] = $this->user_model->dropdown();
            $data['role_list'] = $this->user_model->role_list();
            $data['roles']     = $this->user_model->viewRole();
            $data['page']      = "user/role_setupform";
            redirect("Permission/user_assign");
        }
    }
    }







    public function select_to_rol($id)
    {
        $role_reult = $this->db->select('sec_role.*,sec_userrole.*')
            ->from('sec_userrole')
            ->join('sec_role', 'sec_userrole.roleid=sec_role.id')
            ->where('sec_userrole.user_id', $id)
            ->group_by('sec_role.type')
            ->get()
            ->result();
        if ($role_reult) {
            $html = "";
            $html .= "<table id=\"dataTableExample2\" class=\"table table-bordered table-striped table-hover\">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>role_name</th>
                            </tr>
                        </thead>
                       <tbody>";
            $i = 1;
            foreach ($role_reult as $key => $role) {
                $html .= "<tr>
                                <td>$i</td>
                                <td>$role->type</td>
                            </tr>";
                $i++;
            }
            $html .= "</tbody>
                    </table>";
        }
        echo json_encode($html);
    }

    public function add_role()
    {
          $CI=& get_instance();
        $CI->load->model('Permission_model');
        $account=$CI->Permission_model->permission_list();
   //   $data['modules'] =  $this->db->select('*')->from('module')->get()->result();
        $data = array(
            'title'    => 'Create role name',
            'accounts' => $account,
            'modules' => $this->db->select('*')->from('sub_module')->group_by('module')->get()->result()
        );
        
        $account = $CI->parser->parse('permission/role_form',$data,true);
  
        $this->template->full_admin_html_view($account);
    }
    public function role_list(){

        $content = $this->lpermission->role_view();
        $this->template->full_admin_html_view($content);
    }
    public function insert_role_user(){
        $CI =& get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpermission');

        $data = array(
            'type' => $this->input->post('type',TRUE),
        );

        $this->lpermission->roleinsert_user($data);
        $this->session->set_userdata(array('message' => display('successfully_added')));
        redirect("Permission/add_role");
    }




   

//     public function insert_role()
//     {


// // die("aa");
//         $sql='select * from sec_role where type="'.$_POST['rolename'].'"';

//         // echo 

//         $query=$this->db->query($sql);

        

//          $num=$query->num_rows();
        
//         if($num<1)
//         {
//             $sql = "insert into sec_role (type,uid)values ('".$_POST['rolename']."','".$this->session->userdata('user_id')."')";

//             //  echo "insert into sec_role (type,uid)values ('".$_POST['rolename']."','".$this->session->userdata('user_id')."')";

//         //    die();

// $this->db->query($sql);

// $insert_id = $this->db->insert_id();

// //print_r($_REQUEST);
// if(isset($_POST['read']))
// {
// $read=$_POST['read'];

// }
// if(isset($_POST['create']))
// {
// $create=$_POST['create'];
// }
// if(isset($_POST['update']))
// {
// $update=$_POST['update'];
// }
// if(isset($_POST['delete']))
// {
// $delete=$_POST['delete'];

// }

// $uid=$_POST['uid'];

// $this->load->model('Permission_model');
//  $res = $this->Permission_model->module();

//          $array = json_decode(json_encode($res),true);

//          for($i=0;$i<count($array);$i++)
//          {
//             $j=$i+1;
            
//             if(isset($read[$j]))
//             {
//                 $reads=1;
//             }
//             else
//             {
//                 $reads=0;
//             }
//             if(isset($create[$j]))
//             {
//                 $creates=1;
//             }
//             else
//             {
//                 $creates=0;
//             }
//             if(isset($update[$j]))
//             {
//                 $updates=1;
//             }
//             else
//             {
//                 $updates=0;
//             }
//             if(isset($delete[$j]))
//             {
//                 $deletes=1;
//             }
//             else
//             {
//                 $deletes=0;
//             }


//                 $sql = "insert into role_permission 
//          values (null,'".$array[$i]['name']."','".$insert_id."','".$creates."','".$reads."','".$updates."','".$deletes."')";
//  $this->db->query($sql);
//          }
//           $this->load->helper('url');
//           $this->session->set_userdata(array('message' => display('successfully_added')));
//           redirect('/Permission/role_list', 'refresh');  
//     }

// }










public function update_roles()
{

    $rolename=$_POST['rolename'];
     $rid=$_POST['rid'];
    

     $sql='update sec_role set type="'.$rolename.'" where  id='.$rid;
         $query=$this->db->query($sql);
        

        $sql='DELETE FROM `role_permission` WHERE `role_permission`.`role_id` = '.$rid;
         $query=$this->db->query($sql);  

        if($query)
        {



//print_r($_REQUEST);
if(isset($_POST['read']))
{
$read=$_POST['read'];

}
if(isset($_POST['create']))
{
$create=$_POST['create'];
}
if(isset($_POST['update']))
{
$update=$_POST['update'];
}
if(isset($_POST['delete']))
{
$delete=$_POST['delete'];

}

$uid=$_POST['uid'];

$this->load->model('Permission_model');
 $res = $this->Permission_model->module();

         $array = json_decode(json_encode($res),true);

         for($i=0;$i<count($array);$i++)
         {
            $j=$i+1;
            
            if(isset($read[$j]))
            {
                $reads=1;
            }
            else
            {
                $reads=0;
            }
            if(isset($create[$j]))
            {
                $creates=1;
            }
            else
            {
                $creates=0;
            }
            if(isset($update[$j]))
            {
                $updates=1;
            }
            else
            {
                $updates=0;
            }
            if(isset($delete[$j]))
            {
                $deletes=1;
            }
            else
            {
                $deletes=0;
            }


                $sql = "insert into role_permission 
         values (null,'".$array[$i]['name']."','".$_POST['rid']."','".$creates."','".$reads."','".$updates."','".$deletes."')";
 $this->db->query($sql);
         }
        }
$this->session->set_userdata(array('message' => display('successfully_updated')));
redirect("Permission/role_list");
}




    public function edit_user($id){

        $content = $this->lpermission->user_edit_data($id);
        $this->template->full_admin_html_view($content);
    }

    public function role_update(){
        $this->load->model('Permission_model');
        $id = $this->input->post('id',TRUE);
        $data = array(
            'type' => $this->input->post('type',TRUE),

        );
        $this->Permission_model->update_role($data, $id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect("Permission/add_role");
    }

    public function role_delete($id){
        $this->load->model('Permission_model');
        $role=$this->Permission_model->delete_role($id);
        $role_per=$this->Permission_model->delete_role_permission($id);

             $data=array(
                 'role'     => $role,
                 'role_per' => $role_per
             );

        if($data){
            $this->session->set_userdata(array('message' => display('successfully_delete')));
        }
        else{
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect("Permission/role_list");
    }
    public function edit_role($id){

        $content = $this->lpermission->edit_role_data($id);
        $this->template->full_admin_html_view($content);
    }

    public function update(){

        $CI =& get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Permission_model');

        $id = $this->input->post('rid',TRUE);

        $data = array(
            'type' => $this->input->post('role_id',TRUE),
            'id'   => $this->input->post('rid',TRUE),
        );

        $CI->Permission_model->role_update($data,$id);


        $fk_module_id = $this->input->post('fk_module_id',true);
        $create       = $this->input->post('create',true);
        $read         = $this->input->post('read',true);
        $update       = $this->input->post('update',true);
        $delete       = $this->input->post('delete',true);


        $new_array = array();
        for ($m = 0; $m < sizeof($fk_module_id); $m++) {
            for ($i = 0; $i < sizeof($fk_module_id[$m]); $i++) {
                for ($j = 0; $j < sizeof($fk_module_id[$m][$i]); $j++) {
                    $dataStore = array(
                        'role_id' =>$this->input->post('rid',TRUE),
                        'fk_module_id' => $fk_module_id[$m][$i][$j],
                        'create' => (!empty($create[$m][$i][$j]) ? $create[$m][$i][$j] : 0),
                        'read'   =>   (!empty($read[$m][$i][$j]) ? $read[$m][$i][$j] : 0),
                        'update' => (!empty($update[$m][$i][$j]) ? $update[$m][$i][$j] : 0),
                        'delete' => (!empty($delete[$m][$i][$j]) ? $delete[$m][$i][$j] : 0),
                    );
                    array_push($new_array, $dataStore);
                }
            }
        }
        if($this->Permission_model->create($new_array)){
            $id = $this->db->insert_id();
            $this->session->set_flashdata('message', display('role_permission_updated_successfully'));
        }
        else{
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect("Permission/role_list");
    }
    public function module_form($id = null){
    if(!empty($id)){
            $data['title'] = 'Module Update';
        }else{
             $data['title'] = 'Add Module';
        }
    $data['moduleinfo'] = $this->Permission_model->moduleinfo($id);
    $content = $this->parser->parse('permission/add_module', $data, true);
    $this->template->full_admin_html_view($content); 
    }

     public function add_module(){
    $data = [
   'id'          => $this->input->post('id',TRUE),
   'name'        => $this->input->post('module_name',true),
   'description' => null,
   'image'       => null,
   'directory'   => null,
   'status'      => 1,
    ];
    if(!empty($this->input->post('id',TRUE))){
         $this->db->where('id',$this->input->post('id',TRUE))
         ->update('module',$data);
          $this->session->set_userdata(array('message' => display('successfully_updated')));
          redirect("Permission/module_form");
    }else{
        $this->db->insert('module',$data);
         $this->session->set_userdata(array('message' => display('successfully_inserted')));
         redirect("Permission/module_form");
    }

    }
    //Menu add 
    public function menu_form($id = null){
      if(!empty($id)){
            $data['title'] = 'Menu Update';
        }else{
             $data['title'] = 'Add Menu';
        }
    $data['module_list'] = $this->Permission_model->module_list($id);
    $data['menuinfo'] = $this->Permission_model->menuinfo($id);
    $content = $this->parser->parse('permission/add_menu', $data, true);
    $this->template->full_admin_html_view($content);    
    }
    // menu submit info
    public function add_menu(){
     $data = [
   'id'          => $this->input->post('id',true),
   'mid'         => $this->input->post('module_id',true),
   'name'        => $this->input->post('menu_name',true),
   'description' => null,
   'image'       => null,
   'directory'   => null,
   'status'      => 1,
    ];
    if(!empty($this->input->post('id',TRUE))){
         $this->db->where('id',$this->input->post('id',true))
         ->update('sub_module',$data);
          $this->session->set_userdata(array('message' => display('successfully_updated')));
          redirect("Permission/menu_form");
    }else{
        $this->db->insert('sub_module',$data);
         $this->session->set_userdata(array('message' => display('successfully_inserted')));
         redirect("Permission/menu_form");
    }   
    }
}