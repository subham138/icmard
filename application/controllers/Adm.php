<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adm extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->model('Auth_model');
        $this->load->model('Master');

        if (!$this->session->userdata('user_id')) {

            redirect(base_url());
        }
    }

    /// Start Code For Listing  Item    On 12/05/2021    ///

    public function index()
    {
        $data['items']  =  $this->Master->f_get_particulars("md_item", NULL, NULL, 0);
        $this->load->view('common/header');
        $this->load->view('item/item_list', $data);
        $this->load->view('common/footer');
    }

    /// Start Code For Listing  Item    On 12/05/2021    ///


    /// Start Code For Add  Item    On 12/05/2021    ///

    public function add_item()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {


            $row = $this->db->get_where('md_item', array('item_name' => $this->input->post('item_name')))->num_rows();
            // if( 1 == $this->input->post('license') ){
            //     $license = 1;
            // }else{
            //     $license = 0;
            // }

            //  if( 1 == $this->input->post('Insurance') ){
            //     $Insurance = 1;
            // }else{
            //     $Insurance = 0;
            // }

            //  if( 1 == $this->input->post('amc') ){
            //     $amc = 1;
            // }else{
            //     $amc = 0;
            // }

            $data_array = array(
                //   "catg"        => $this->input->post('catg'),
                "item_name"     =>  $this->input->post('item_name'),

                // "license"       =>  $license,
                // "Insurance"     =>  $Insurance,
                // "amc"           =>  $amc,
                "created_by"    =>  $this->session->userdata('user_name'),
                "created_dt"    =>  date('Y-m-d H:i:s')

            );

            if ($row > 0) {

                //For notification storing message
                $this->session->set_flashdata('msg', 'Item Already Exist!');

                redirect('adm/add_item');
                //redirect('adm');

            } else {

                $this->Master->f_insert('md_item', $data_array);
                //For notification storing message
                $this->session->set_flashdata('msg', 'Successfully added!');

                //redirect('adm/add_item');
                redirect('adm');
            }
        } else {

            $this->load->view('common/header');
            $data['catgdtls']   = $this->Master->f_get_particulars('md_catg', NULL, NULL, 0);
            //  echo $this->db->last_query();
            //  exit;
            $this->load->view('item/add_item', $data);
            $this->load->view('common/footer');
        }
    }

    /// End Code For Add  Item    On 12/05/2021    ///

    /// Start Code For Edit  Item    On 12/05/2021    ///

    public function edit_item()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // if( 1 == $this->input->post('license') ){
            //     $license = 1;
            // }else{
            //     $license = 0;
            // }

            //  if( 1 == $this->input->post('Insurance') ){
            //     $Insurance = 1;
            // }else{
            //     $Insurance = 0;
            // }

            //  if( 1 == $this->input->post('amc') ){
            //     $amc = 1;
            // }else{
            //     $amc = 0;
            // }

            $data_array = array(

                "item_name"     =>  $this->input->post('item_name'),

                // "license"       =>  $license,
                // "Insurance"     =>  $Insurance,
                // "amc"           =>  $amc,
                "modified_by"    =>  $this->session->userdata('user_name'),
                "modified_dt"    =>  date('Y-m-d H:i:s')

            );
            $where   =  array('id' => $this->input->post('id'));


            $this->Master->f_edit('md_item', $data_array, $where);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Updated!');

            // redirect('adm/edit_item?id='.$this->input->post('id'));
            redirect('adm');
        } else {

            $where   =  array('id' => $this->input->get('id'));

            $data['item']  =  $this->Master->f_get_particulars("md_item", NULL, $where, 1);

            $this->load->view('common/header');
            $this->load->view('item/edit_item', $data);
            $this->load->view('common/footer');
        }
    }
    /// End Code For Edit  Item    On 12/05/2021    ///

    /// **** Start Code For Delete Item   *********** //
    public function del_item()
    {
        $where = array(

            'id' => $this->input->get('id')

        );

        $this->Master->f_delete('md_item', $where);
        //For notification storing message
        $this->session->set_flashdata('msg', 'Successfully deleted!');

        redirect("adm");
    }
    /// **** End Code For Delete Item  *********** //

    public function stkitem_list()
    {
        $data['stkitems']  =  $this->Master->f_get_particulars("md_stk_item ", NULL, NULL, 0);
        $this->load->view('common/header');
        $this->load->view('stkitem/item_list', $data);
        $this->load->view('common/footer');
    }

    public function del_stkitem()
    {

        // echo "hi";
        // exit;
        $where = array(

            'id' => $this->input->get('id')

        );

        $this->Master->f_delete('md_stk_item', $where);
        //  echo $this->db->last_query();
        //  exit;
        //For notification storing message
        $this->session->set_flashdata('msg', 'Successfully deleted!');

        redirect('adm/stkitem_list');
    }
    public function add_stkitem()
    {

        // echo 'hi';
        // exit;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {


            $row = $this->db->get_where('md_stk_item', array('item_name' => $this->input->post('item_name')))->num_rows();
            // if( 1 == $this->input->post('license') ){
            //     $license = 1;
            // }else{
            //     $license = 0;
            // }

            //  if( 1 == $this->input->post('Insurance') ){
            //     $Insurance = 1;
            // }else{
            //     $Insurance = 0;
            // }

            //  if( 1 == $this->input->post('amc') ){
            //     $amc = 1;
            // }else{
            //     $amc = 0;
            // }

            $data_array = array(
                "catg"        => $this->input->post('catg'),
                "item_name"     =>  $this->input->post('item_name'),

                // "license"       =>  $license,
                // "Insurance"     =>  $Insurance,
                // "amc"           =>  $amc,
                "created_by"    =>  $this->session->userdata('user_name'),
                "created_dt"    =>  date('Y-m-d H:i:s')

            );

            if ($row > 0) {

                //For notification storing message
                $this->session->set_flashdata('msg', 'Item Already Exist!');

                redirect('adm/add_stkitem');
                //redirect('adm');

            } else {

                $this->Master->f_insert('md_stk_item', $data_array);
                //For notification storing message
                $this->session->set_flashdata('msg', 'Successfully added!');

                //redirect('adm/add_item');
                redirect('adm/stkitem_list');
            }
        } else {

            $this->load->view('common/header');
            $data['catgdtls']   = $this->Master->f_get_particulars('md_catg', NULL, NULL, 0);
            //  echo $this->db->last_query();
            //  exit;
            $this->load->view('stkitem/add_item', $data);
            $this->load->view('common/footer');
        }
    }

    public function edit_stkitem()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // if( 1 == $this->input->post('license') ){
            //     $license = 1;
            // }else{
            //     $license = 0;
            // }

            //  if( 1 == $this->input->post('Insurance') ){
            //     $Insurance = 1;
            // }else{
            //     $Insurance = 0;
            // }

            //  if( 1 == $this->input->post('amc') ){
            //     $amc = 1;
            // }else{
            //     $amc = 0;
            // }

            $data_array = array(

                "item_name"     =>  $this->input->post('item_name'),

                // "license"       =>  $license,
                // "Insurance"     =>  $Insurance,
                // "amc"           =>  $amc,
                "modified_by"    =>  $this->session->userdata('user_name'),
                "modified_dt"    =>  date('Y-m-d H:i:s')

            );
            $where   =  array('id' => $this->input->post('id'));


            $this->Master->f_edit('md_stk_item', $data_array, $where);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Updated!');

            // redirect('adm/edit_item?id='.$this->input->post('id'));
            redirect('adm/stkitem_list');
        } else {

            $where   =  array('id' => $this->input->get('id'));

            $data['item']  =  $this->Master->f_get_particulars("md_stk_item", NULL, $where, 1);

            $this->load->view('common/header');
            $this->load->view('stkitem/edit_item', $data);
            $this->load->view('common/footer');
        }
    }


    public function itemcatg_list()
    {
        $data['itemcatg']  =  $this->Master->f_get_particulars("md_catg", NULL, NULL, 0);
        $this->load->view('common/header');
        $this->load->view('itemcatg/itemcatg_list', $data);
        $this->load->view('common/footer');
    }


    public function add_itemcatg()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {


            $row = $this->db->get_where('md_catg', array('category' => $this->input->post('category')))->num_rows();
            // if( 1 == $this->input->post('license') ){
            //     $license = 1;
            // }else{
            //     $license = 0;
            // }

            //  if( 1 == $this->input->post('Insurance') ){
            //     $Insurance = 1;
            // }else{
            //     $Insurance = 0;
            // }

            //  if( 1 == $this->input->post('amc') ){
            //     $amc = 1;
            // }else{
            //     $amc = 0;
            // }

            $data_array = array(

                "category"     =>  $this->input->post('catg'),

                // "license"       =>  $license,
                // "Insurance"     =>  $Insurance,
                // "amc"           =>  $amc,
                "created_by"    =>  $this->session->userdata('user_name'),
                "created_dt"    =>  date('Y-m-d H:i:s')

            );

            if ($row > 0) {

                //For notification storing message
                $this->session->set_flashdata('msg', 'Item Category Already Exist!');

                redirect('adm/add_itemcatg');
            } else {

                $this->Master->f_insert('md_catg', $data_array);
                //For notification storing message
                $this->session->set_flashdata('msg', 'Successfully added!');

                redirect('adm/itemcatg_list');
            }
        } else {

            $this->load->view('common/header');

            $this->load->view('itemcatg/add_itemcatg');
            $this->load->view('common/footer');
        }
    }

    public function edit_itemcatg()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {


            $data_array = array(

                "category"     =>  $this->input->post('category'),
                "modified_by"    =>  $this->session->userdata('user_name'),
                "modified_dt"    =>  date('Y-m-d H:i:s')

            );
            $where = array(

                'sl_no' => $this->input->post('sl_no')

            );



            $this->Master->f_edit('md_catg', $data_array, $where);
            // echo $this->db->last_query();
            // exit();
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Updated!');

            // redirect('adm/edit_itemcatg?sl_no='.$this->input->post('sl_no'));
            redirect('adm/itemcatg_list');
        } else {

            $where   =  array('sl_no' => $this->input->get('sl_no'));

            $data['item']  =  $this->Master->f_get_particulars("md_catg", NULL, $where, 1);

            $this->load->view('common/header');
            $this->load->view('itemcatg/edit_itemcatg', $data);
            $this->load->view('common/footer');
        }
    }


    public function del_itemcatg()
    {

        // echo "hi";
        // exit;
        $where = array(

            'sl_no' => $this->input->get('sl_no')

        );

        $this->Master->f_delete('md_catg', $where);
        echo $this->db->last_query();
        exit;
        //For notification storing message
        $this->session->set_flashdata('msg', 'Successfully deleted!');

        redirect('adm/itemcatg_list');
    }

    public function insu_list()
    {
        $select    =    array(
            "a.id", "b.item_name",
            "a.frm_dt", "a.to_dt"

        );
        $where    =    array(

            "a.item = b.id"    =>    NULL

        );
        // $data['dr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_ferti_soc b,mm_company_dtls c ",$select,$where,0);
        $data['customer']  =  $this->Master->f_get_particulars("md_insu a, md_item b", $select, $where, 0);
        $this->load->view('common/header');
        $this->load->view('insu/insu_list', $data);
        $this->load->view('common/footer');
    }


    public function add_insu()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            //    $row = $this->db->get_where('md_item', array('item_name' => $this->input->post('item_name')))->num_rows();
            //     $uin = $this->Master->f_get_particulars("md_tenant",array("ifnull(MAX(uin),9999999) uin"),NULL, 1);
            //    $uid = $uin->uin+1;

            $data_array = array(

                //  "id"                =>  $id, 

                "item"               =>  $this->input->post('item'),
                "frm_dt"             =>  $this->input->post('frm_dt'),
                "to_dt"              =>  $this->input->post('to_dt'),
                "to_dt"              =>  $this->input->post('to_dt'),
                "remarks"           =>  $this->input->post('remarks'),
                // "rnw_to"              =>  $this->input->post('rnw_to'),
                "auth_person"        =>  $this->input->post('auth_person'),
                "created_by"         =>  $this->session->userdata('user_name'),
                "created_dt"         =>  date('Y-m-d H:i:s')

            );

            $this->Master->f_insert('md_insu', $data_array);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Added!');
            // alert('Successfully Added!');
            // redirect('adm/add_tenant');
            redirect('adm/insu_list');
        } else {

            $this->load->view('common/header');
            //  $select        = array("uin","cust_name");
            //  $where  =   array(

            //      'cust_type'     => 'V');

            //  $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer',$select,$where,0);
            $data['itemdtls']   = $this->Master->f_get_particulars('md_item', NULL, NULL, 0);
            //  echo $this->db->last_query();
            //  exit();
            $this->load->view('insu/add_insu', $data);
            $this->load->view('common/footer');
        }
    }

    public function edit_insu()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data_array = array(

                "item"               =>  $this->input->post('item'),
                "frm_dt"             =>  $this->input->post('frm_dt'),
                "to_dt"              =>  $this->input->post('to_dt'),
                // "to_dt"              =>  $this->input->post('to_dt'),
                "remarks"           =>  $this->input->post('remarks'),
                // "rnw_to"              =>  $this->input->post('rnw_to'),
                "auth_person"        =>  $this->input->post('auth_person'),

                "modified_by"      =>  $this->session->userdata('user_name'),
                "modified_dt"      =>  date('Y-m-d H:i:s')

            );
            $where   =  array('id' => $this->input->post('id'));

            $this->Master->f_edit('md_insu', $data_array, $where);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Updated!');
            // alert('Successfully Updated!');
            // redirect('adm/edit_tenant?id='.$this->input->post('id'));
            redirect('adm/insu_list');
        } else {

            $where   =  array('id' => $this->input->get('id'));

            $data['cust']  =  $this->Master->f_get_particulars("md_insu", NULL, $where, 1);
            $data['item']  =  $this->Master->f_get_particulars("md_item", NULL, NULL, 0);
            // echo $this->db->last_query();
            // exit;
            $this->load->view('common/header');
            $this->load->view('insu/edit_insu', $data);
            $this->load->view('common/footer');
        }
    }


    public function del_insu()
    {
        $where = array(

            'id' => $this->input->get('id')

        );
        $this->Master->f_delete('md_insu', $where);
        // echo $this->db->last_query();
        // exit();
        //For notification storing message
        $this->session->set_flashdata('msg', 'Successfully deleted!');
        //  alert('Successfully deleted!');
        redirect("adm/insu_list");
    }

    public function lic_list()
    {
        $select    =    array(
            "a.id", "b.item_name",
            "a.frm_dt", "a.to_dt"

        );
        $where    =    array(

            "a.item = b.id"    =>    NULL

        );
        // $data['dr_notes']    = $this->DrcrnoteModel->f_select("tdf_dr_cr_note a,mm_ferti_soc b,mm_company_dtls c ",$select,$where,0);
        $data['customer']  =  $this->Master->f_get_particulars("md_licence a, md_item b", $select, $where, 0);
        $this->load->view('common/header');
        $this->load->view('lic/lic_list', $data);
        $this->load->view('common/footer');
    }

    public function add_lic()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            //    $row = $this->db->get_where('md_item', array('item_name' => $this->input->post('item_name')))->num_rows();
            //     $uin = $this->Master->f_get_particulars("md_tenant",array("ifnull(MAX(uin),9999999) uin"),NULL, 1);
            //    $uid = $uin->uin+1;

            $data_array = array(

                //  "id"                =>  $id, 

                "item"               =>  $this->input->post('item'),
                "frm_dt"             =>  $this->input->post('frm_dt'),
                "to_dt"              =>  $this->input->post('to_dt'),
                "to_dt"              =>  $this->input->post('to_dt'),
                "rnw_from"           =>  $this->input->post('rnw_from'),
                "rnw_to"              =>  $this->input->post('rnw_to'),
                "auth_person"        =>  $this->input->post('auth_person'),
                "created_by"         =>  $this->session->userdata('user_name'),
                "created_dt"         =>  date('Y-m-d H:i:s')

            );

            $this->Master->f_insert('md_licence', $data_array);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Added!');
            // alert('Successfully Added!');
            // redirect('adm/add_tenant');
            redirect('adm/lic_list');
        } else {

            $this->load->view('common/header');
            //  $select        = array("uin","cust_name");
            //  $where  =   array(

            //      'cust_type'     => 'V');

            //  $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer',$select,$where,0);
            $data['itemdtls']   = $this->Master->f_get_particulars('md_item', NULL, NULL, 0);
            //  echo $this->db->last_query();
            //  exit();
            $this->load->view('lic/add_lic', $data);
            $this->load->view('common/footer');
        }
    }


    public function edit_lic()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data_array = array(

                "item"               =>  $this->input->post('item'),
                "frm_dt"             =>  $this->input->post('frm_dt'),
                "to_dt"              =>  $this->input->post('to_dt'),
                "rnw_from"           =>  $this->input->post('rnw_from'),
                "rnw_to"             =>  $this->input->post('rnw_to'),
                "auth_person"        =>  $this->input->post('auth_person'),
                "modified_by"        =>  $this->session->userdata('user_name'),
                "modified_dt"        =>  date('Y-m-d H:i:s')

            );
            $where   =  array('id' => $this->input->post('id'));

            $this->Master->f_edit('md_licence', $data_array, $where);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Updated!');
            // alert('Successfully Updated!');
            // redirect('adm/edit_tenant?id='.$this->input->post('id'));
            redirect('adm/lic_list');
        } else {

            $where   =  array('id' => $this->input->get('id'));

            $data['cust']  =  $this->Master->f_get_particulars("md_licence", NULL, $where, 1);
            $data['item']  =  $this->Master->f_get_particulars("md_item", NULL, NULL, 0);
            // echo $this->db->last_query();
            // exit;
            $this->load->view('common/header');
            $this->load->view('lic/edit_lic', $data);
            $this->load->view('common/footer');
        }
    }


    public function del_lic()
    {
        $where = array(

            'id' => $this->input->get('id')

        );
        $this->Master->f_delete('md_licence', $where);
        // echo $this->db->last_query();
        // exit();
        //For notification storing message
        $this->session->set_flashdata('msg', 'Successfully deleted!');
        //  alert('Successfully deleted!');
        redirect("adm/lic_list");
    }


    ///*******************************Stock In************** */
    // public function stockin_list()
    // {

    //     $data['customer']  =  $this->Master->f_get_stockin_dtls();
    //     $this->load->view('common/header');
    //     $this->load->view('stockin/stockin_list', $data);
    //     $this->load->view('common/footer');
    // }

    // public function add_stockin()
    // {

    //     if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //         $data_array = array(

    //             //  "id"                =>  $id, 
    //             // "comp_id"            =>  $this->input->post('comp_id'),
    //             "item"               =>  $this->input->post('item'),
    //             "inventry_no"        =>  $this->input->post('inventry_no'),
    //             "vendor"             =>  $this->input->post('vendor'),
    //             "pur_dt"             =>  $this->input->post('pur_dt'),
    //             "inv_no"             =>  $this->input->post('inv_no'),
    //             "challan_no"         =>  $this->input->post('challan_no'),
    //             "amt"                =>  $this->input->post('amt'),
    //             "gst_rt"             =>  $this->input->post('gst_rt'),
    //             "cgst"               =>  $this->input->post('cgst'),
    //             "sgst"               =>  $this->input->post('sgst'),
    //             "total"              =>  $this->input->post('total'),
    //             // "remarks"            =>  $this->input->post('remarks'),
    //             "stock"              =>  $this->input->post('stock'),
    //             "created_by"         =>  $this->session->userdata('user_name'),
    //             "created_dt"         =>  date('Y-m-d H:i:s')

    //         );

    //         $this->Master->f_insert('td_stockin', $data_array);
    //         //For notification storing message
    //         $this->session->set_flashdata('msg', 'Successfully Added!');
    //         // alert('Successfully Added!');
    //         // redirect('adm/add_tenant');
    //         redirect('adm/stockin_list');
    //     } else {

    //         $this->load->view('common/header');
    //         $select        = array("uin", "cust_name");
    //         $where  =   array(

    //             'cust_type in ("V")'     => NULL
    //         );

    //         $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer', $select, $where, 0);
    //         //    echo $this->db->last_query();
    //         //  exit();
    //         $data['itemdtls']   = $this->Master->f_get_particulars('md_stk_item', NULL, NULL, 0);
    //         //  echo $this->db->last_query();
    //         //  exit();
    //         $this->load->view('stockin/add_stockin', $data);
    //         $this->load->view('common/footer');
    //     }
    // }

    // public function edit_stockin()
    // {


    //     if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //         $data_array = array(

    //             "item"               =>  $this->input->post('item'),
    //             "inventry_no"        =>  $this->input->post('inventry_no'),
    //             "vendor"             =>  $this->input->post('vendor'),
    //             "pur_dt"             =>  $this->input->post('pur_dt'),
    //             "inv_no"             =>  $this->input->post('inv_no'),
    //             "challan_no"         =>  $this->input->post('challan_no'),
    //             "amt"                =>  $this->input->post('amt'),
    //             "gst_rt"             =>  $this->input->post('gst_rt'),
    //             "cgst"               =>  $this->input->post('cgst'),
    //             "sgst"               =>  $this->input->post('sgst'),
    //             "total"              =>  $this->input->post('total'),
    //             // "remarks"            =>  $this->input->post('remarks'),
    //             "stock"              =>  $this->input->post('stock'),
    //             "modified_by"      =>  $this->session->userdata('user_name'),
    //             "modified_dt"      =>  date('Y-m-d H:i:s')

    //         );
    //         $where   =  array('sl_no' => $this->input->post('id'));

    //         $this->Master->f_edit('td_stockin', $data_array, $where);
    //         //For notification storing message
    //         $this->session->set_flashdata('msg', 'Successfully Updated!');
    //         // alert('Successfully Updated!');
    //         // redirect('adm/edit_tenant?id='.$this->input->post('id'));
    //         redirect('adm/stockin_list');
    //     } else {

    //         $where   =  array('sl_no' => $this->input->get('id'));

    //         $data['cust']  =  $this->Master->f_get_particulars("td_stockin", NULL, $where, 1);
    //         // echo $this->db->last_query();
    //         // exit;
    //         $data['item']  =  $this->Master->f_get_particulars("md_stk_item", NULL, NULL, 0);
    //         $data['custdtls']  =  $this->Master->f_get_particulars("md_customer", NULL, NULL, 0);

    //         $this->load->view('common/header');
    //         $this->load->view('stockin/edit_stockin', $data);
    //         $this->load->view('common/footer');
    //     }
    // }




    // public function del_stockin()
    // {
    //     $where = array(

    //         'sl_no' => $this->input->get('id')

    //     );
    //     $this->Master->f_delete('td_stockin', $where);
    //     // echo $this->db->last_query();
    //     // exit();
    //     //For notification storing message
    //     $this->session->set_flashdata('msg', 'Successfully deleted!');
    //     //  alert('Successfully deleted!');
    //     redirect("adm/stockin_list");
    // }

    // function mul_stockin()
    // {
    //     $select = array("uin", "cust_name");
    //     $where  =   array(
    //         'cust_type in ("V")'     => NULL
    //     );

    //     $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer', $select, $where, 0);

    //     $data['itemdtls']   = $this->Master->f_get_particulars('md_stk_item', NULL, NULL, 0);

    //     $this->load->view('common/header');
    //     $this->load->view('stockin/mul_stockin', $data);
    //     $this->load->view('common/footer');
    // }

    //********************************************************/
    public function del_amc()
    {
        $where = array(

            'id' => $this->input->get('id')

        );
        $this->Master->f_delete('md_amc', $where);
        // echo $this->db->last_query();
        // exit();
        //For notification storing message
        $this->session->set_flashdata('msg', 'Successfully deleted!');
        //  alert('Successfully deleted!');
        redirect("adm/amc_list");
    }
    public function amc_list()
    {

        $data['customer']  =  $this->Master->f_get_amc_dtls();
        $this->load->view('common/header');
        $this->load->view('amc/amc_list', $data);
        $this->load->view('common/footer');
    }

    public function add_amc()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            //    $row = $this->db->get_where('md_item', array('item_name' => $this->input->post('item_name')))->num_rows();
            //     $uin = $this->Master->f_get_particulars("md_tenant",array("ifnull(MAX(uin),9999999) uin"),NULL, 1);
            //    $uid = $uin->uin+1;

            $data_array = array(

                //  "id"                =>  $id, 
                "comp_id"            =>  $this->input->post('comp_id'),
                "item"               =>  $this->input->post('item'),
                "item_serial"        =>  $this->input->post('item_serial'),
                "instl_loc"          =>  $this->input->post('instl_loc'),
                "instl_dt"           =>  $this->input->post('instl_dt'),
                "frm_dt"             =>  $this->input->post('frm_dt'),
                "to_dt"              =>  $this->input->post('to_dt'),
                "period"             =>  $this->input->post('period'),
                "amc_chrg"           =>  $this->input->post('amc_chrg'),
                "gst_rt"             =>  $this->input->post('gst_rt'),
                "cgst"               =>  $this->input->post('cgst'),
                "sgst"               =>  $this->input->post('sgst'),
                "total"              =>  $this->input->post('total'),
                "remarks"            =>  $this->input->post('remarks'),
                "created_by"         =>  $this->session->userdata('user_name'),
                "created_dt"         =>  date('Y-m-d H:i:s')

            );

            $this->Master->f_insert('md_amc', $data_array);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Added!');
            // alert('Successfully Added!');
            // redirect('adm/add_tenant');
            redirect('adm/amc_list');
        } else {

            $this->load->view('common/header');
            $select        = array("uin", "cust_name");
            $where  =   array(

                'cust_type in ("V","C")'     => NULL
            );

            $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer', $select, $where, 0);
            //    echo $this->db->last_query();
            //  exit();
            $data['itemdtls']   = $this->Master->f_get_particulars('md_item', NULL, NULL, 0);
            //  echo $this->db->last_query();
            //  exit();
            $this->load->view('amc/add_amc', $data);
            $this->load->view('common/footer');
        }
    }

    public function edit_amc()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data_array = array(

                "comp_id"            =>  $this->input->post('comp_id'),
                "item"               =>  $this->input->post('item'),
                "item_serial"        =>  $this->input->post('item_serial'),
                "instl_loc"          =>  $this->input->post('instl_loc'),
                "instl_dt"           =>  $this->input->post('instl_dt'),
                "frm_dt"             =>  $this->input->post('frm_dt'),
                "to_dt"              =>  $this->input->post('to_dt'),
                "period"             =>  $this->input->post('period'),
                "amc_chrg"           =>  $this->input->post('amc_chrg'),
                "gst_rt"             =>  $this->input->post('gst_rt'),
                "cgst"               =>  $this->input->post('cgst'),
                "sgst"               =>  $this->input->post('sgst'),
                "total"              =>  $this->input->post('total'),
                "remarks"            =>  $this->input->post('remarks'),
                "modified_by"      =>  $this->session->userdata('user_name'),
                "modified_dt"      =>  date('Y-m-d H:i:s')

            );
            $where   =  array('id' => $this->input->post('id'));

            $this->Master->f_edit('md_amc', $data_array, $where);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Updated!');
            // alert('Successfully Updated!');
            // redirect('adm/edit_tenant?id='.$this->input->post('id'));
            redirect('adm/amc_list');
        } else {

            $where   =  array('id' => $this->input->get('id'));

            $data['cust']  =  $this->Master->f_get_particulars("md_amc", NULL, $where, 1);
            $data['item']  =  $this->Master->f_get_particulars("md_item", NULL, NULL, 0);
            $data['custdtls']  =  $this->Master->f_get_particulars("md_customer", NULL, NULL, 0);
            // echo $this->db->last_query();
            // exit;
            $this->load->view('common/header');
            $this->load->view('amc/edit_amc', $data);
            $this->load->view('common/footer');
        }
    }

    //     public function del_amc()
    //     {
    //         $where = array(

    //             'id' => $this->input->get('id')

    //         );
    //         $this->Master->f_delete('md_amc', $where);
    //         // echo $this->db->last_query();
    //         // exit();
    //          //For notification storing message
    //         $this->session->set_flashdata('msg', 'Successfully deleted!');
    //         //  alert('Successfully deleted!');
    //         redirect("adm/amc_list");   
    // }

    public function del_tenant()
    {
        $where = array(

            'id' => $this->input->get('id')

        );

        $this->Master->f_delete('md_tenant', $where);
        // echo $this->db->last_query();
        // exit();
        //For notification storing message
        $this->session->set_flashdata('msg', 'Successfully deleted!');
        //  alert('Successfully deleted!');
        redirect("adm/tenant_list");
    }

    //*********************/Tenant View************************//
    public function tenant_list()
    {
        $data['customer']  =  $this->Master->f_get_particulars("md_tenant", NULL, NULL, 0);
        $this->load->view('common/header');
        $this->load->view('tenant/tenant_list', $data);
        $this->load->view('common/footer');
    }

    //*********************/Add Tenant Details************************//
    public function add_tenant()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            //    $row = $this->db->get_where('md_item', array('item_name' => $this->input->post('item_name')))->num_rows();
            $uin = $this->Master->f_get_particulars("md_tenant", array("ifnull(MAX(uin),9999999) uin"), NULL, 1);
            $uid = $uin->uin + 1;

            $data_array = array(

                // "uin"              =>  $uid, 
                "name"            =>  $this->input->post('t_name'),
                "floor_no"        =>  $this->input->post('floor_no'),
                "room_no"         =>  $this->input->post('room_no'),
                "agree_st_dt"     =>  $this->input->post('agree_st_dt'),
                "agree_end_dt"    =>  $this->input->post('agree_end_dt'),
                "covd_area"       =>  $this->input->post('covd_area'),
                "rent_per_sqrt"   =>  $this->input->post('rent_per_sqrt'),
                "rent_per_mnth"   =>  $this->input->post('rent_per_mnth'),
                "water_chrg"      => $this->input->post('water_chrg'),
                "electric_chrg"   => $this->input->post('electric_chrg'),
                "car_pk_chrg"     => $this->input->post('car_park'),
                "gst_rt"         => $this->input->post('gst_rt'),
                "cgst"           => $this->input->post('cgst'),
                "sgst"           => $this->input->post('sgst'),
                "created_by"      =>  $this->session->userdata('user_name'),
                "created_dt"      =>  date('Y-m-d H:i:s')

            );

            $this->Master->f_insert('md_tenant', $data_array);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Added!');
            // alert('Successfully Added!');
            // redirect('adm/add_tenant');
            redirect('adm/tenant_list');
        } else {

            $this->load->view('common/header');
            $select        = array("uin", "cust_name");
            $where  =   array(

                'cust_type'     => 'T'
            );

            $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer', $select, $where, 0);
            //  echo $this->db->last_query();
            //  exit();
            $this->load->view('tenant/add_tenant', $data);
            $this->load->view('common/footer');
        }
    }

    public function edit_tenant()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data_array = array(

                "name"            =>  $this->input->post('t_name'),
                "floor_no"        =>  $this->input->post('floor_no'),
                "room_no"         =>  $this->input->post('room_no'),
                "agree_st_dt"     =>  $this->input->post('agree_st_dt'),
                "agree_end_dt"    =>  $this->input->post('agree_end_dt'),
                "covd_area"       =>  $this->input->post('covd_area'),
                "rent_per_sqrt"   =>  $this->input->post('rent_per_sqrt'),
                "rent_per_mnth"   =>  $this->input->post('rent_per_mnth'),
                "water_chrg"      => $this->input->post('water_chrg'),
                "electric_chrg"   => $this->input->post('electric_chrg'),
                "car_pk_chrg"     => $this->input->post('car_park'),
                "gst_rt"         => $this->input->post('gst_rt'),
                "cgst"           => $this->input->post('cgst'),
                "sgst"           => $this->input->post('sgst'),
                "modified_by"      =>  $this->session->userdata('user_name'),
                "modified_dt"      =>  date('Y-m-d H:i:s')

            );
            $where   =  array('id' => $this->input->post('id'));

            $this->Master->f_edit('md_tenant', $data_array, $where);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Updated!');
            // alert('Successfully Updated!');
            // redirect('adm/edit_tenant?id='.$this->input->post('id'));
            redirect('adm/tenant_list');
        } else {

            $where   =  array('id' => $this->input->get('id'));

            $data['cust']  =  $this->Master->f_get_particulars("md_tenant", NULL, $where, 1);
            // echo $this->db->last_query();
            // exit;
            $this->load->view('common/header');
            $this->load->view('tenant/edit_tenant', $data);
            $this->load->view('common/footer');
        }
    }


    /// Start Code For Listing  Customer    On 12/05/2021    ///

    public function cust_list()
    {
        $data['customer']  =  $this->Master->f_get_particulars("md_customer", NULL, NULL, 0);
        $this->load->view('common/header');
        $this->load->view('customer/cust_list', $data);
        $this->load->view('common/footer');
    }

    /// End Code For Listing  Customer    On 12/05/2021    ///



    /// Start Code For Add  Customer  On 12/05/2021    ///

    public function add_customer()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {


            //$row = $this->db->get_where('md_item', array('item_name' => $this->input->post('item_name')))->num_rows();
            $uin = $this->Master->f_get_particulars("md_customer", array("ifnull(MAX(uin),9999999) uin"), NULL, 1);
            $uid = $uin->uin + 1;


            $data_array = array(

                "uin"              =>  $uid,
                "cust_name"        =>  $this->input->post('cust_name'),
                "cust_type"        =>  $this->input->post('cust_type'),
                "addr_line1"       =>  $this->input->post('addr_line1'),
                "addr_line2"       =>  $this->input->post('addr_line2'),
                "pin"              =>  $this->input->post('pin'),
                "gstin"            =>  $this->input->post('gstin'),
                "pan"              =>  $this->input->post('pan'),
                "tan"              =>  $this->input->post('tan'),
                "propieter_namr"   =>  $this->input->post('propieter_namr'),
                "contact_person"   =>  $this->input->post('contact_person'),
                "mobile_no"        =>  $this->input->post('mobile_no'),
                "email"            =>  $this->input->post('email'),
                "company_type"     =>  $this->input->post('company_type'),
                "bank_name"        =>  $this->input->post('bank_name'),
                "branch_name"      =>  $this->input->post('branch_name'),
                "ac_no"            =>  $this->input->post('ac_no'),
                "ifs_code"           =>  $this->input->post('ifs_code'),
                "created_by"       =>  $this->session->userdata('user_name'),
                "created_dt"       =>  date('Y-m-d H:i:s')

            );



            $this->Master->f_insert('md_customer', $data_array);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully added!');

            redirect('adm/add_customer');
        } else {

            $this->load->view('common/header');
            $this->load->view('customer/add_cust');
            $this->load->view('common/footer');
        }
    }

    /// End Code For Add Customer  On 12/05/2021    ///


    /// Start Code For Edit  Customer    On 13/05/2021    ///

    public function edit_cust()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {



            $data_array = array(

                "cust_name"        =>  $this->input->post('cust_name'),
                "cust_type"        =>  $this->input->post('cust_type'),
                "addr_line1"       =>  $this->input->post('addr_line1'),
                "addr_line2"       =>  $this->input->post('addr_line2'),
                "pin"              =>  $this->input->post('pin'),
                "gstin"            =>  $this->input->post('gstin'),
                "pan"              =>  $this->input->post('pan'),
                "tan"              =>  $this->input->post('tan'),
                "propieter_namr"   =>  $this->input->post('propieter_namr'),
                "contact_person"   =>  $this->input->post('contact_person'),
                "mobile_no"        =>  $this->input->post('mobile_no'),
                "email"            =>  $this->input->post('email'),
                "company_type"     =>  $this->input->post('company_type'),
                "bank_name"        =>  $this->input->post('bank_name'),
                "branch_name"      =>  $this->input->post('branch_name'),
                "ac_no"            =>  $this->input->post('ac_no'),
                "ifs_code"           =>  $this->input->post('ifs_code'),
                "created_by"       =>  $this->session->userdata('user_name'),
                "created_dt"       =>  date('Y-m-d H:i:s')

            );
            $where   =  array('uin' => $this->input->post('uin'));


            $this->Master->f_edit('md_customer', $data_array, $where);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Updated!');

            redirect('adm/edit_cust?id=' . $this->input->post('uin'));
        } else {

            $where   =  array('uin' => $this->input->get('id'));

            $data['cust']  =  $this->Master->f_get_particulars("md_customer", NULL, $where, 1);

            $this->load->view('common/header');
            $this->load->view('customer/edit_cust', $data);
            $this->load->view('common/footer');
        }
    }
    /// End Code For Customer  On 13/05/2021    ///

    /// **** Start Code For Delete Customer   *********** //
    public function del_cust()
    {
        $where = array(

            'uin' => $this->input->get('id')

        );

        $this->Master->f_delete('md_customer', $where);
        //For notification storing message
        $this->session->set_flashdata('msg', 'Successfully deleted!');

        redirect("adm/cust_list");
    }
    /// **** End Code For Delete Customer  *********** //




}
