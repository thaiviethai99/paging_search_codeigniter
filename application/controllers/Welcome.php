<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("pagination"));
        $this->load->model('M_welcome');
        $this->load->helper('url');
    }
    public function search($rowno = 0)
    {
        $search = trim($this->input->get('search'));
        // Row per page
        $rowperpage = 3;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        $total_rows = $this->M_welcome->total_rows($search);
        $config     = array();
        if ($this->input->get('search')) {
            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        }

        $config["base_url"]         = site_url('welcome/') . 'search';
        $config['first_url']        = $config['base_url'] . '?' . http_build_query($_GET);
        $config["total_rows"]       = $total_rows;
        $config["per_page"]         = $rowperpage;
        $config['use_page_numbers'] = true;
        $config['num_links']        = 4;
        $config['full_tag_open']    = '<ul class="pagination">';

        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = 'First';

        $config['last_link'] = 'Last';

        $config['first_tag_open'] = '<li>';

        $config['first_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';

        $config['prev_tag_open'] = '<li class="prev">';

        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';

        $config['next_tag_open'] = '<li>';

        $config['next_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li>';

        $config['last_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';

        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';

        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $data['users'] = $this->M_welcome->get_users($rowno, $rowperpage, $search);
        $this->load->view('welcome_message', $data);
    }
}
