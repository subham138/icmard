<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->model('Master');

        if (!$this->session->userdata('user_id')) {

            redirect(base_url());
        }
    }

    public function in_list()
    {

        $data['customer']  =  $this->Master->f_get_stockin_dtls();
        $this->load->view('common/header');
        $this->load->view('stockin/stockin_list', $data);
        $this->load->view('common/footer');
    }

    public function add_in()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $input_data = $this->input->post();
            $data_array = array(
                "item"               =>  $input_data['item'],
                "inventry_no"        =>  $input_data['inventry_no'],
                "vendor"             =>  $input_data['vendor'],
                "pur_dt"             =>  $input_data['pur_dt'],
                "inv_no"             =>  $input_data['inv_no'],
                "challan_no"         =>  $input_data['challan_no'],
                "sl_no"              =>  $input_data['sl_no'],
                "amt"                =>  $input_data['amt'],
                "gst_rt"             =>  $input_data['gst_rt'],
                "cgst"               =>  $input_data['cgst'],
                "sgst"               =>  $input_data['sgst'],
                "total"              =>  $input_data['total'],
                "stock"              =>  $input_data['stock'],
                "description"           =>  $input_data['tem_desc'],
                "remarks"            =>  $input_data['remarks'],
                "in_out_flag"        =>  'I',
                "created_by"         =>  $this->session->userdata('user_name'),
                "created_dt"         =>  date('Y-m-d H:i:s')

            );

            $this->Master->f_insert('td_stockin', $data_array);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Added!');

            redirect('stock/in_list');
        } else {

            $this->load->view('common/header');
            $select        = array("uin", "cust_name");
            $where  =   array(

                'cust_type in ("V")'     => NULL
            );

            $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer', $select, $where, 0);
            //    echo $this->db->last_query();
            //  exit();
            $data['itemdtls']   = $this->Master->f_get_particulars('md_stk_item', NULL, NULL, 0);
            //  echo $this->db->last_query();
            //  exit();
            $this->load->view('stockin/add_stockin', $data);
            $this->load->view('common/footer');
        }
    }

    public function edit_in()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $input_data = $this->input->post();
            $data_array = array(
                "item"               =>  $input_data['item'],
                "inventry_no"        =>  $input_data['inventry_no'],
                "vendor"             =>  $input_data['vendor'],
                "pur_dt"             =>  $input_data['pur_dt'],
                "inv_no"             =>  $input_data['inv_no'],
                "challan_no"         =>  $input_data['challan_no'],
                "sl_no"              =>  $input_data['sl_no'],
                "amt"                =>  $input_data['amt'],
                "gst_rt"             =>  $input_data['gst_rt'],
                "cgst"               =>  $input_data['cgst'],
                "sgst"               =>  $input_data['sgst'],
                "total"              =>  $input_data['total'],
                "stock"              =>  $input_data['stock'],
                "description"        =>  $input_data['tem_desc'],
                "remarks"            =>  $input_data['remarks'],
                "modified_by"        =>  $this->session->userdata('user_name'),
                "modified_dt"        =>  date('Y-m-d H:i:s')
            );
            $where   =  array('id' => $this->input->post('id'));

            $this->Master->f_edit('td_stockin', $data_array, $where);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Updated!');
            redirect('stock/in_list');
        } else {

            $where   =  array('id' => $this->input->get('id'));

            $data['cust']  =  $this->Master->f_get_particulars("td_stockin", NULL, $where, 1);
            // echo $this->db->last_query();
            // exit;
            $select        = array("uin", "cust_name");
            $where  =   array(

                'cust_type in ("V")'     => NULL
            );
            $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer', $select, $where, 0);
            //    echo $this->db->last_query();
            //  exit();
            $data['itemdtls']   = $this->Master->f_get_particulars('md_stk_item', NULL, NULL, 0);

            $this->load->view('common/header');
            $this->load->view('stockin/edit_stockin', $data);
            $this->load->view('common/footer');
        }
    }

    public function del_in()
    {
        $where = array(

            'id' => $this->input->get('id')

        );
        $this->Master->f_delete('td_stockin', $where);

        //For notification storing message
        $this->session->set_flashdata('msg', 'Successfully deleted!');

        redirect("adm/stockin_list");
    }

    function mul_in_list()
    {
        $data['customer']  =  $this->Master->f_get_stockin_dtls();
        $this->load->view('common/header');
        $this->load->view('stockin/mul_stockin_list', $data);
        $this->load->view('common/footer');
    }

    function mul_in()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $input_data = $this->input->post();
            // echo '<pre>';
            // var_dump(count($input_data['item']));
            // exit;
            for ($i = 0; $i < count($input_data['item']); $i++) {
                // var_dump($input_data['amt'][$i]);
                $data_array = array(
                    "item"               =>  $input_data['item'][$i],
                    "inventry_no"        =>  $input_data['inventry_no'][$i],
                    "vendor"             =>  $input_data['vendor'][$i],
                    "pur_dt"             =>  $input_data['pur_dt'],
                    "inv_no"             =>  $input_data['inv_no'][$i],
                    "challan_no"         =>  $input_data['challan_no'][$i],
                    "sl_no"              =>  $input_data['sl_no'][$i],
                    "amt"                =>  $input_data['amt'][$i],
                    "gst_rt"             =>  $input_data['gst_rt'][$i],
                    "cgst"               =>  $input_data['cgst'][$i],
                    "sgst"               =>  $input_data['sgst'][$i],
                    "total"              =>  $input_data['total'][$i],
                    "stock"              =>  $input_data['stock'][$i],
                    "description"        =>  $input_data['tem_desc'],
                    "remarks"            =>  $input_data['remarks'],
                    "in_out_flag"        =>  'I',
                    "created_by"         =>  $this->session->userdata('user_name'),
                    "created_dt"         =>  date('Y-m-d H:i:s')
                );

                $this->Master->f_insert('td_stockin', $data_array);
            }
            // exit;

            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Added!');
            // alert('Successfully Added!');
            // redirect('adm/add_tenant');
            redirect('stock/mul_in_list');
        } else {
            $select = array("uin", "cust_name");
            $where  =   array(
                'cust_type in ("V")'     => NULL
            );

            $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer', $select, $where, 0);

            $data['itemdtls']   = $this->Master->f_get_particulars('md_stk_item', NULL, NULL, 0);

            $this->load->view('common/header');
            $this->load->view('stockin/mul_stockin', $data);
            $this->load->view('common/footer');
        }
    }

    function out_list()
    {
        $data['customer']  =  $this->Master->f_get_stockout_dtls();
        $this->load->view('common/header');
        $this->load->view('stockout/stockout_list', $data);
        $this->load->view('common/footer');
    }

    public function add_out()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $input_data = $this->input->post();
            $data_array = array(
                "item"               =>  $input_data['item'],
                "vendor"             =>  $input_data['vendor'],
                "pur_dt"             =>  $input_data['pur_dt'],
                "stock"              =>  $input_data['stock'],
                "received_by"        =>  $input_data['recived_by'],
                "remarks"            =>  $input_data['remarks'],
                "in_out_flag"        =>  'O',
                "created_by"         =>  $this->session->userdata('user_name'),
                "created_dt"         =>  date('Y-m-d H:i:s')
            );

            $this->Master->f_insert('td_stockin', $data_array);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Added!');

            redirect('stock/out_list');
        } else {
            $select =   array("uin", "cust_name", "cust_type");
            $where  =   array(
                'cust_type in ("V", "C", "T")'     => NULL
            );

            $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer', $select, $where, 0);

            $data['itemdtls']   = $this->Master->f_get_particulars('md_stk_item', NULL, NULL, 0);

            $this->load->view('common/header');
            $this->load->view('stockout/add_stockout', $data);
            $this->load->view('common/footer');
        }
    }

    public function edit_out()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $input_data = $this->input->post();
            $data_array = array(
                "item"               =>  $input_data['item'],
                "vendor"             =>  $input_data['vendor'],
                "pur_dt"             =>  $input_data['pur_dt'],
                // "stock"              =>  $input_data['stock'],
                "received_by"        =>  $input_data['recived_by'],
                "remarks"            =>  $input_data['remarks'],
                "in_out_flag"        =>  'O',
                "modified_by"        =>  $this->session->userdata('user_name'),
                "modified_dt"        =>  date('Y-m-d H:i:s')
            );
            $where   =  array('id' => $this->input->post('id'));

            $this->Master->f_edit('td_stockin', $data_array, $where);
            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Updated!');
            redirect('stock/out_list');
        } else {

            $where   =  array('id' => $this->input->get('id'));

            $data['cust']  =  $this->Master->f_get_particulars("td_stockin", NULL, $where, 1);

            $select =   array("uin", "cust_name", "cust_type");
            $where  =   array(
                'cust_type in ("V", "C", "T")'     => NULL
            );

            $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer', $select, $where, 0);

            $data['itemdtls']   = $this->Master->f_get_particulars('md_stk_item', NULL, NULL, 0);

            $this->load->view('common/header');
            $this->load->view('stockout/edit_stockout', $data);
            $this->load->view('common/footer');
        }
    }

    function mul_out_list()
    {
        $data['customer']  =  $this->Master->f_get_stockout_dtls();
        $this->load->view('common/header');
        $this->load->view('stockout/mul_stockout_list', $data);
        $this->load->view('common/footer');
    }

    function mul_stockout()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $input_data = $this->input->post();
            // echo '<pre>';
            // var_dump(count($input_data['item']));
            // exit;
            for ($i = 0; $i < count($input_data['item']); $i++) {
                // var_dump($input_data['amt'][$i]);
                $data_array = array(
                    "item"               =>  $input_data['item'][$i],
                    "vendor"             =>  $input_data['vendor'][$i],
                    "pur_dt"             =>  $input_data['pur_dt'],
                    "stock"              =>  $input_data['stock'][$i],
                    "received_by"        =>  $input_data['received_by'][$i],
                    "remarks"            =>  $input_data['remarks'],
                    "in_out_flag"        =>  'O',
                    "created_by"         =>  $this->session->userdata('user_name'),
                    "created_dt"         =>  date('Y-m-d H:i:s')
                );

                $this->Master->f_insert('td_stockin', $data_array);
            }
            // exit;

            //For notification storing message
            $this->session->set_flashdata('msg', 'Successfully Added!');
            // alert('Successfully Added!');
            // redirect('adm/add_tenant');
            redirect('stock/mul_out_list');
        } else {
            $select = array("uin", "cust_name");
            $where  =   array(
                'cust_type in ("V", "C", "T")'     => NULL
            );

            $data['tenantdtls']   = $this->Master->f_get_particulars('md_customer', $select, $where, 0);

            $data['itemdtls']   = $this->Master->f_get_particulars('md_stk_item', NULL, NULL, 0);

            $this->load->view('common/header');
            $this->load->view('stockout/mul_stockout', $data);
            $this->load->view('common/footer');
        }
    }

    function calculate_SIH()
    {
        $item_id = $this->input->get('item_id');
        $result = $this->Master->calculate_stock_in_hand($item_id);
        // var_dump($result);
        echo json_encode($result);
    }
}
