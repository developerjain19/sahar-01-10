<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vcard extends CI_Controller
{

    public function sahar()
    {
        
         if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('inquiry', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<p class="alert alert-success"> Your query is successfully submit. We will contact you as soon as possible.</p>');
            } else {
                $this->session->set_userdata('msg', '<p class="alert alert-danger"> We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.</p>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['title'] = "Home |  SaharDirectory - Get a Personal Visiting Card";
        $comtitle = $this->uri->segment(4);
        $data['views'] = $this->uri->segment(4);

        $data['website'] = $this->CommonModal->getRowById('company', 'company_web_title', $comtitle);
        $data['link'] = $this->CommonModal->getRowById('social_links', 'id', '1');
        $menu = '';
        $this->load->view('Vcard/vacrd', $data);
    }
}
