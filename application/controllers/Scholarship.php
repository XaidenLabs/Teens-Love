<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scholarship extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $page_data['page_name']  = 'scholarship_application';
        $page_data['page_title'] = 'Scholarship Application Form';
        $page_data['user_login'] = $this->session->userdata('user_login');
        $page_data['admin_login'] = $this->session->userdata('admin_login');
        $page_data['user_id'] = $this->session->userdata('user_id');
        $page_data['cart_items'] = $this->session->userdata('cart_items') ? $this->session->userdata('cart_items') : [];
        $this->load->view('frontend/default-new/index', $page_data);
    }

    public function modal_form() {
        $page_data['page_name']  = 'scholarship_application';
        $page_data['page_title'] = 'Scholarship Application Form';
        $this->load->view('frontend/default-new/scholarship_application', $page_data);
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['full_name'] = html_escape($this->input->post('full_name') ?? '');
            $data['gender'] = html_escape($this->input->post('gender') ?? '');
            $data['dob'] = html_escape($this->input->post('dob') ?? '');
            $data['nationality'] = html_escape($this->input->post('nationality') ?? '');
            $data['address'] = html_escape($this->input->post('residential_address') ?? '');
            $data['phone'] = html_escape($this->input->post('phone') ?? '');
            $data['whatsapp'] = html_escape($this->input->post('whatsapp') ?? '');
            $data['email'] = html_escape($this->input->post('email') ?? '');
            
            $data['reason_for_applying'] = html_escape($this->input->post('why_applying') ?? '');
            $data['scholarship_pathway'] = html_escape($this->input->post('scholarship_pathway') ?? '');
            $data['intended_course'] = html_escape($this->input->post('intended_course') ?? '');
            $data['financial_situation'] = html_escape($this->input->post('financial_situation') ?? '');
            $data['academic_achievements'] = html_escape($this->input->post('academic_achievements') ?? '');
            $data['christian_faith'] = html_escape($this->input->post('christian_faith') ?? '');
            
            $redd_commitment = html_escape($this->input->post('redd_commitment') ?? '');
            $redd_commitment_details = html_escape($this->input->post('redd_commitment_details') ?? '');
            $data['redd_commitment'] = $redd_commitment . ' - ' . $redd_commitment_details;
            
            $data['community_service'] = html_escape($this->input->post('community_service') ?? '');
            $data['five_year_goal'] = html_escape($this->input->post('five_year_goal') ?? '');
            $data['why_select_you'] = html_escape($this->input->post('why_select_you') ?? '');
            $data['created_at'] = time();

            // Handle file upload
            if (isset($_FILES['passport_photo']) && $_FILES['passport_photo']['name'] != "") {
                if (!is_dir('uploads/scholarships')) {
                    mkdir('uploads/scholarships', 0777, true);
                }
                $file_extension = pathinfo($_FILES['passport_photo']['name'], PATHINFO_EXTENSION);
                $new_filename = time() . '_' . rand(1000, 9999) . '.' . $file_extension;
                move_uploaded_file($_FILES['passport_photo']['tmp_name'], 'uploads/scholarships/' . $new_filename);
                $data['passport_photo'] = $new_filename;
            } else {
                $data['passport_photo'] = '';
            }

            $this->db->insert('scholarship_applications', $data);
            
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                echo json_encode(['status' => 'success', 'message' => 'Application submitted successfully!']);
            } else {
                $this->session->set_flashdata('flash_message', 'Application submitted successfully!');
                redirect(site_url('scholarship'), 'refresh');
            }
        }
    }
}
