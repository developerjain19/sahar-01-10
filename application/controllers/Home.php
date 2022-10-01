<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Home |  SaharDirectory - Get a Personal Visiting Card";

        $data['companycate'] = $this->CommonModal->getRowByIdWithLimit('company_category', 'premium', '0', '7');
        $data['category'] = $this->CommonModal->getAllRowsWithLimit('company_category', '12', 'cate_id');
        $data['blogs'] = $this->CommonModal->getAllRows('blog');

        $data['search_subcategory'] = $this->CommonModal->getAllRows('company_subcategory');
        $data['search_category'] = $this->CommonModal->getAllRows('company_category');
        $data['search_state'] = $this->CommonModal->getAllRows('tbl_state');
        $data['search_cities'] = $this->CommonModal->getAllRows('tbl_cities');
        $data['search_company'] = $this->CommonModal->getAllRows('company');
        $this->load->view('home', $data);
    }

    public function mailcheck()
    {

        $this->load->view('check-mail');
    }


    public function blog()
    {
        $data['title'] = "Blogs |  SaharDirectory - Get a Personal Visiting Card";
        $data['blogs'] = $this->CommonModal->getAllRows('blog');

        $this->load->view('blog', $data);
    }

    public function privacy_policy()
    {
        $data['title'] = "Privacy Policy |  SaharDirectory - Get a Personal Visiting Card";
        $data['pp'] = runQuery("SELECT * FROM privacy_policy WHERE id = 3 ");

        $this->load->view('privacy-policy', $data);
    }

    public function term_condition()
    {
        $data['title'] = "Term and Condition |  SaharDirectory - Get a Personal Visiting Card";
        $data['tc'] = runQuery("SELECT * FROM termsandcondition WHERE id = 4 ");

        $this->load->view('term-condition', $data);
    }




    public function allcategory()
    {
        $data['title'] = "Home |  SaharDirectory - Get a Personal Visiting Card";
        $data['category'] = $this->CommonModal->getAllRowsInOrder('company_category', 'cate_id', 'DESC');

        $this->load->view('category-list', $data);
    }




    public function subcate_list()
    {
        $cateid = $this->input->get('category');
        $data['cateid'] = decryptId($cateid);

        $data['title'] = "Home |  SaharDirectory - Get a Personal Visiting Card";
        $data['category'] = $this->CommonModal->getAllRowsInOrder('company_category', 'cate_id', 'DESC');
        $data['subcategory'] = $this->CommonModal->getAllRowsInOrder('company_subcategory', 'subcat_id', 'DESC');

        $this->load->view('subcate-list', $data);
    }

    public function filterData()
    {

        $category = ((isset($_POST['category'])) ? $_POST['category'] : '');

        $query = "SELECT * FROM `company_subcategory`  ";
        if (($category != '')) {

            if ($category != '') {
                $cate = implode("','", $category);
                $query .= "WHERE category_id IN('" . $cate . "')";
            }
        }
        //  echo $query;
        $data['all_data'] = $this->CommonModal->runQuery($query);

        $this->load->view('get_subcate', $data);
    }


    public function listing()
    {
        $subcate = $this->input->get('subcate');;
        $subcategory = decryptId($subcate);
        $cateid = $this->input->get('category');
        $data['cateid'] = decryptId($cateid);
        $data['subcateid'] = decryptId($subcate);

        $data['search_subcategory'] = $this->CommonModal->getAllRows('company_subcategory');
        $data['search_category'] = $this->CommonModal->getAllRows('company_category');
        $data['search_state'] = $this->CommonModal->getAllRows('tbl_state');
        $data['search_cities'] = $this->CommonModal->getAllRows('tbl_cities');
        $data['search_company'] = $this->CommonModal->getAllRows('company');


        if ($subcategory != '') {
            $data['listing'] = $this->CommonModal->getRowByIdInOrder('company',  array('company_subcategory' => $subcategory),  'company_id ', 'DESC');
        } else {
            $data['listing'] = $this->CommonModal->getAllRowsInOrder('company', 'company_id ', 'DESC');
        }
        $data['title'] = "Listings |  SaharDirectory - Get a Personal Visiting Card";
        $data['category'] = $this->CommonModal->getAllRowsInOrder('company_category', 'cate_id', 'DESC');

        $this->load->view('listings', $data);
    }



    public function filterDatacompany()
    {

        $category = ((isset($_POST['category'])) ? $_POST['category'] : '');
        $subcategory = ((isset($_POST['subcategory'])) ? $_POST['subcategory'] : '');
        $conditions  = array();
        $query = "SELECT * FROM `company` ";
        if (($category != '') || ($subcategory != '')) {

            if ($category != '') {
                $cate = implode("','", $category);
                $conditions[] = "  company_category IN('" . $cate . "')";
            }

            if ($subcategory != '') {
                $subcate = implode("','", $subcategory);
                $conditions[] = " company_subcategory IN('" . $subcate . "')";
            }
            if (count($conditions) > 0) {
                $query .= " WHERE " . implode(' AND ', $conditions);
            }
        }

        $query .= "ORDER BY company_id DESC";

        //  echo $query;

        $data['listing'] = $this->CommonModal->runQuery($query);



        $this->load->view('filter', $data);
    }




    public function listing_details()
    {
        $comid = $this->uri->segment(5);
        $id = decryptId($comid);

        $data['title'] = "Listings |  SaharDirectory - Get a Personal Visiting Card";
        $data['row'] = $this->CommonModal->getRowById('company', 'company_id', $id);
        $data['state'] = getRowById('tbl_state', 'state_id',  $data['row'][0]['company_state']);
        $data['city'] = getRowById('tbl_cities', 'id',  $data['row'][0]['company_city']);
        $data['cate'] = getRowById('company_category', 'cate_id',  $data['row'][0]['company_category']);
        $data['subcate'] = getRowById('company_subcategory', 'subcat_id',  $data['row'][0]['company_subcategory']);
        $data['search_subcategory'] = $this->CommonModal->getAllRows('company_subcategory');
        $data['search_category'] = $this->CommonModal->getAllRows('company_category');
        $data['search_state'] = $this->CommonModal->getAllRows('tbl_state');
        $data['search_cities'] = $this->CommonModal->getAllRows('tbl_cities');
        $data['search_company'] = $this->CommonModal->getAllRows('company');
        $this->load->view('listing-details', $data);
    }

    public function enquiry_submit()
    {
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('inquiry', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<script type="text/javascript">
                        $(document).ready(function() {
                            swal({
                                title: "Thankyou!",
                                text: "We will contact you as soon as possible",
                                icon: "success",
                                button: "Ok",
                                timer: 4000
                            });
                        });
                    </script>');
            } else {
                $this->session->set_userdata('msg', '<script type="text/javascript">
                        $(document).ready(function() {
                            swal({
                                title: "Something Wrong",
                                text: "Please try again later",
                                icon: "error",
                                button: "Ok",
                                timer: 4000
                            });
                        });
                    </script>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function review_submit()
    {
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('reviews', $post);
            if ($insert) {
                $this->session->set_userdata('rmsg', '<script type="text/javascript">
                        $(document).ready(function() {
                            swal({
                                title: "Thankyou!",
                                text: "Your review has been submited successfully",
                                icon: "success",
                                button: "Ok",
                                timer: 4000
                            });
                        });
                    </script>');
            } else {
                $this->session->set_userdata('rmsg', '<script type="text/javascript">
                        $(document).ready(function() {
                            swal({
                                title: "Something Wrong!",
                                text: "Please try again later",
                                icon: "error",
                                button: "Ok",
                                timer: 4000
                            });
                        });
                    </script>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function search()
    {


  $data['search_subcategory'] = $this->CommonModal->getAllRows('company_subcategory');
        $data['search_category'] = $this->CommonModal->getAllRows('company_category');
        $data['search_state'] = $this->CommonModal->getAllRows('tbl_state');
        $data['search_cities'] = $this->CommonModal->getAllRows('tbl_cities');
        $data['search_company'] = $this->CommonModal->getAllRows('company');

        $conditions = array();
        $serch_sql =  "SELECT * FROM company";

        if ($this->input->post('search') || $this->input->post('company-location') != '') {
            $searchname = trim($this->input->post('search'));
            $searchlocation = trim($this->input->post('company-location'));

            if ($searchname != '') {
                $conditions[] = " `search` LIKE '%{$searchname}%' ";
            }

            if ($searchlocation != '') {
                $conditions[] = " `search` LIKE '%{$searchlocation}%' ";
            }

            if (count($conditions) > 0) {
                $serch_sql .= " WHERE";
                $serch_sql .= implode(' AND ', $conditions);

                // echo $serch_sql;
            }

            $data['listing'] = $this->CommonModal->runQuery($serch_sql);
            // print_r($serch_sql);
            // exit();

            $data['title'] = "Search |  SaharDirectory - Get a Personal Visiting Card";

            $this->load->view('search', $data);
        } else {
            $this->session->set_userdata('msg', '<h6 class="alert alert-warning">Search field empty, Please enter your search query.</h6>');
            redirect(base_url());
        }
    }

    public function forget_password()
    {
        $data['title'] = 'Forget password - Tradingviews USDT Day Trade';

        if (count($_POST) > 0) {
            extract($this->input->post());
            $mobile = $this->input->post('mobile');
            $table = "tbl_registration";
            $post = $this->CommonModal->getSingleRowById($table, array('mobile' => $mobile));

            //   print_r($post);


            if (!empty($post)) {

                $debug = true;
                $msg = 'Hi ' .  $post['name'] . ', Your Login Id- ' . $post['mobile'] . ' and Password-  ' . $post['password'] . '.
Thanks 
Team Sahar Directory
(Ekaum)';

                SMSSend($post['mobile'], $msg, '1707165665533059542', $debug);

                $this->session->set_userdata('msg', '<span class="alert alert-success">Check your Phone to get your Password.</span>');
                $this->session->set_userdata('msg', '<span class="alert alert-success">Check your Phone to get your Password.</span>');

                //   exit();
                redirect(base_url('login'));
            } else {
                $this->session->set_userdata('forget', '<span class="text-danger">No username found</span>');
                redirect(base_url('forget-password'));
            }
        } else {
        }
        $this->load->view('forget_password', $data);
    }

    public function login()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('dashboard'));
        }
        $data['logo'] = 'assets/logo.png';

        $data['title'] = "Login | SaharDirectory - Get a Personal Visiting Card";
        if (count($_POST) > 0) {
            extract($this->input->post());
            $table = "tbl_registration";
            $login_data = $this->CommonModal->getRowByMoreId($table, array('mobile' => $mobile));



            if (!empty($login_data)) {


                if ($login_data[0]['otp_verified'] != 1) {
                    $this->session->set_flashdata('loginError', '<h6 class="alert alert-warning">Oops ! Your number is not varified please Register again </h6>');
                    redirect(base_url('login'));
                } else if ($login_data[0]['password'] == $password) {

                    $this->session->set_userdata(array('login_user_id' => $login_data[0]['rgid'], 'login_user_name' => $login_data[0]['name'], 'login_user_emailid' => $login_data[0]['email'], 'login_user_contact' => $login_data[0]['mobile'], 'login_user_profile' => $login_data[0]['profile']));

                    $profile = $this->CommonModal->getRowById('company', 'rgid', $login_data[0]['rgid']);
                    if ($profile[0]['company_type'] == '' || $profile[0]['company_name'] == '' || $profile[0]['company_person'] == '' || $profile[0]['company_designation'] == '' || $profile[0]['company_category'] == '' || $profile[0]['company_subcategory'] == '' || $profile[0]['company_tagline'] == '' || $profile[0]['company_address'] == '' || $profile[0]['company_city'] == '' || $profile[0]['company_state'] == '' || $profile[0]['pin_code'] == '' || $profile[0]['company_email'] == '' || $profile[0]['company_contact'] == '' || $profile[0]['company_whatsapp'] == '') {
                        redirect(base_url('my-profile'));
                    } else {
                        redirect(base_url('dashboard'));
                    }
                } else {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-danger">The <b>password</b> you entered is <b>incorrect</b> Please try again.</h6>');
                    redirect(base_url('login'));
                }
            } else {
                $this->session->set_flashdata('loginError', '<h6 class="alert alert-warning">Username or password doesnt match</h6>');
                redirect(base_url('login'));
            }
        } else {
            $this->load->view('login', $data);
        }
    }

    public function register()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('dashboard'));
        }

        $data['title'] = 'Register | SaharDirectory - Get a Personal Visiting Card';
        if (count($_POST) > 0) {
            $contact = $this->input->post('mobile');
            $count_mobile = $this->CommonModal->getNumRows('tbl_registration', array('mobile' => $this->input->post('mobile')));
            $count_email = $this->CommonModal->getNumRows('tbl_registration', array('email' => $this->input->post('email')));
            $company_count = $this->CommonModal->getNumRows('company', array('company_contact' => $this->input->post('mobile'), 'company_email' => $this->input->post('email')));
            if ($count_mobile > 0 || $company_count > 0 || $count_email > 0) {
                $this->session->set_userdata('msg', '<h6 class="alert alert-danger">You have already registered with this email id or contact no.</h6>');
                redirect(base_url('signup'));
            } else {
                $post = $this->input->post();
                $formdata = $this->input->post();
                if ($post['password'] !=  $post['cpassword']) {
                    $this->session->set_userdata('msg', '<h6 class="alert alert-warning">Your Password and Confirm Password are not match f.</h6>');
                    redirect(base_url('signup'));
                } else {
                    $post['otp'] =   rand(1111, 9999);
                    sendOTP($contact, "Your OTP is " . $post['otp'] . " to verify your phone number with sahardirectory.com Pl doesn't share this with anyone else. Thanks Team Sahar Directory (Ekaum Enterprises)");
                    $lastid = $this->CommonModal->insertRowReturnId('tbl_registration', $post);
                    $this->session->set_userdata(array('login_user_contact' => $post['mobile'], 'otp' => $post['otp'], 'login_user_otp_id' => $lastid));
                    redirect(base_url('phoneverification'));
                }
            }
        } else {


            $this->load->view('signup', $data);
        }
    }


    public function resendotp()
    {
        $contact = $this->input->post('vid');
        $otp =   rand(1111, 9999);

        $this->session->set_userdata('otp', $otp);
        sendOTP($contact, "Your OTP is " . $otp . " to verify your phone number with sahardirectory.com Pl doesn't share this with anyone else. Thanks Team Sahar Directory (Ekaum Enterprises)");
    }

    public function phoneverification()
    {
        $data['title'] = "OTP Varification |  SaharDirectory - Get a Personal Visiting Card";
        $this->load->view('phone_verification', $data);
    }

    public function checkotp()
    {
        $vid = $this->input->post('vid');
        $otp = $this->session->userdata('otp');
        if ($vid == $otp) {

            $post =  $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_otp_id'));
            $update =  $this->CommonModal->updateRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_otp_id'), array('otp_verified' => '1'));
            if ($update) {
                $message = sendmail($post[0]['name'], $post[0]['mobile'],  $post[0]['password']);
                mailmsg($post[0]['email'], 'Registered with sahardirectory | Welcome User', $message);
                $debug = true;

                $msg = 'Hi ' .  $post[0]['name'] . ', Your Login Id- ' . $post[0]['mobile'] . 'and Password-  ' . $post[0]['password'] . '.
Thanks 
Team Sahar Directory 
(Ekaum)';

                SMSSend($post[0]['mobile'], $msg, '1707165665533059542', $debug);
                $this->session->set_userdata('msg', '<span class="alert alert-success">OTP verified , Login with your contact no. to continue.</span>');
                

            } else {
                $this->session->set_userdata('msg', '<span class="alert alert-success">Your Mobile no has been verified. 
                Pl wait our team is reviewing your profile and will update you soon. Thanks.</span>');
            }
            echo '1';

            $this->session->unset_userdata('otp');
            $this->session->unset_userdata('doctor');
            $this->session->unset_userdata('login_user_otp_id');
        } else {
            echo '0';
        }
    }



    public function my_profile()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }

        if (count($_POST) > 0) {


            $post = $this->input->post();
            extract($this->input->post());



            $state = getRowById('tbl_state', 'state_id',  $_POST['company_state']);
            $city = getRowById('tbl_cities', 'id',  $_POST['company_city']);
            $cate = getRowById('company_category', 'cate_id',  $_POST['company_category']);
            $subcate  = getRowById('company_subcategory', 'subcat_id',  $_POST['company_subcategory']);


            $search =   $post['company_name'] . ' ' . $post['company_person'] . ' '  . $post['company_tagline']  . ' ' .  $post['company_address'] . ' ' . $state[0]['state_name'] . ' ' . $city[0]['name']  . ' ' . $cate[0]['category'] . ' ' . $subcate[0]['subcategory'];

            $search = trim($search);

            $post['search'] =  strtolower($search);

            // print_r($post['search']);

            // exit();


            $uid = sessionId('login_user_id');


            $datarow = $this->CommonModal->getRowByMoreId('company', array('rgid' => $uid));
            if ($datarow != '') {
                $company_logo = $post['company_logo'];
                if ($_FILES['company_logo_temp']['name'] != '') {
                    $img = imageUpload('company_logo_temp', 'uploads/company/');
                    $post['company_logo'] = $img;
                    if ($company_logo != "") {
                        unlink('uploads/company/' . $company_logo);
                    }
                }

                $company_banner = $post['company_banner'];
                if ($_FILES['company_banner_temp']['name'] != '') {
                    $img = imageUpload('company_banner_temp', 'uploads/company/');
                    $post['company_banner'] = $img;
                    if ($company_banner != "") {
                        unlink('uploads/company/' . $company_banner);
                    }
                }

                $insert = $this->CommonModal->updateRowById('company', 'rgid', $uid, $post);

                redirect(base_url() . 'my-profile');
            } else {

                $post['company_logo'] = imageUpload('company_logo', 'uploads/company/');
                $post['company_banner'] = imageUpload('company_banner', 'uploads/company/');
                $insert = $this->CommonModal->insertRowReturnId('company', $post);
                redirect(base_url('choose-vcard'));
            }

            if ($insert) {
                $this->session->set_flashdata('msg', 'Profile Update  successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Profile Update  successfull');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'my-profile');
        } else {

            $data['title'] = "Complete Your Profile | SaharDirectory - Get a Personal Visiting Card";
            $data['login_user'] = $this->session->userdata();

            $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));

            $data['datacomrow'] = $this->CommonModal->getRowById('company', 'rgid', $this->session->userdata('login_user_id'));
            // $data['category'] = $this->CommonModal->getAllRows('company_category');
            $data['category'] = $this->CommonModal->getAllRowsInOrder('company_category', 'category', 'asc');
            $data['state_list'] = $this->CommonModal->getAllRows('tbl_state');
            $this->load->view('my-profile', $data);
        }
    }

    public function product_list()
    {
        $data['title'] = "Prodcut/Services  Add | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['productdata'] = $this->CommonModal->getRowById('product', 'company_id', $this->session->userdata('login_user_id'));

        $BdID = $this->input->get('BdID');

        if ($BdID != '') {
            $data = $this->CommonModal->getRowById('product', 'product_id', $BdID);


            unlink('uploads/product/' .  $data[0]['product_image']);

            $delete = $this->CommonModal->deleteRowById('product', array('product_id' => $BdID));
            if ($delete) {
                $this->session->set_flashdata('msg', 'Product Delete Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('product-list'));
            exit;
        }
        $this->load->view('product-list', $data);
    }
    public function product_add()
    {
        $data['title'] = "Prodcut/Services Add | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['subcate'] = $this->CommonModal->getAllRows('company_subcategory');

        $data['tag'] = 'Add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['company_id'] = sessionId('login_user_id');
            $post['product_image'] = imageUpload('product_image', 'uploads/product/');

            $insert = $this->CommonModal->insertRowReturnId('product', $post);
            if ($insert) {
                $this->session->set_flashdata('msg', 'Product Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('product-list'));
        } else {
            $this->load->view('product-add', $data);
        }
    }
    public function update_product($pid)
    {
        $data['title'] = "Prodcut/Services Edit | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['subcate'] = $this->CommonModal->getAllRows('company_subcategory');

        $get_id = decryptId($pid);
        $data['tag'] = 'Edit';
        $data['product_list'] = $this->CommonModal->getRowById('product', 'product_id', $get_id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $product_image = $post['product_image'];
            if ($_FILES['product_image_temp']['name'] != '') {
                $img = imageUpload('product_image_temp', 'uploads/product/');
                $post['product_image'] = $img;
                if ($product_image != "") {
                    unlink('uploads/product/' . $product_image);
                }
            }
            $update = $this->CommonModal->updateRowById('product', 'product_id', $get_id, $post);
            if ($update) {
                $this->session->set_flashdata('msg', 'Product Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Product Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url('product-list'));
        } else {
            $this->load->view('product-add', $data);
        }
    }

    public function banner_update()
    {
        if (count($_POST) > 0) {
            $post = $this->input->post();


            $qr = $post['company_card_background'];

            if ($_FILES['company_card_background_temp']['name'] != '') {
                $img = imageUpload('company_card_background_temp', 'uploads/company/');
                $post['company_card_background'] = $img;
                if ($qr != "") {
                    unlink('uploads/company/' . $qr);
                }
            }

            $update = $this->CommonModal->updateRowById('company', 'rgid', sessionId('login_user_id'), $post);
            if ($update) {
                $this->session->set_flashdata('msg', 'Online Payment Updated Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect(base_url('dashboard'));
            } else {
                $this->session->set_flashdata('msg', 'Sction_category Updated Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url('dashboard'));
        } else {
            redirect(base_url('dashboard'));
        }
    }


    public function getcity()
    {
        
        $data['datacomrow'] = $this->CommonModal->getRowById('company', 'rgid', $this->session->userdata('login_user_id'));
        $state = $this->input->post('state');
        $data['city'] = $this->CommonModal->getRowByIdInOrder('tbl_cities', array('state_id' => $state), 'name', 'asc');
        print_r($data['city']);
        $this->load->view('select_city', $data);
    }
    public function searchcontact()
    {
        $contact = $this->input->post('mobile');
        $data['contact'] = runQuery("SELECT * FROM `tbl_registration` WHERE `mobile`='" . $contact . "' ");
        $this->load->view('select_contact', $data);
    }

    public function select_subcat()
    {
        $data['datacomrow'] = $this->CommonModal->getRowById('company', 'rgid', $this->session->userdata('login_user_id'));
        $cate = $this->input->post('company_category');
        $data['subcat'] = $this->CommonModal->getRowByIdInOrder('company_subcategory', array('category_id' => $cate), 'subcategory', 'asc');
        $this->load->view('select_subcategory', $data);
    }

    public function dashboard()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }

        $data['title'] = "Dashboard | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $company_en = $this->CommonModal->getRowById('company', 'rgid', $this->session->userdata('login_user_id'));
        $data['enquiry'] = $this->CommonModal->getRowByIdInOrder('inquiry', array('company_id' => $company_en[0]['company_id']), 'id', 'DESC');

        $data['company_count'] = $this->CommonModal->getNumRows('company', array('rgid' => $this->session->userdata('login_user_id')));
        $data['vcard_count'] = $this->CommonModal->getRowById('company', 'rgid', $this->session->userdata('login_user_id'));
        $data['review_count'] = $this->CommonModal->getNumRows('reviews', array('company_id' => $this->session->userdata('login_user_id')));


        $this->load->view('dashboard', $data);
    }
    public function choose_vcard()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $uid = sessionId('login_user_id');
            $add = $this->CommonModal->updateRowById('company', 'rgid', $uid, $post);

            $get_company = $this->CommonModal->getRowByMoreId('company', array('rgid' => sessionId('login_user_id')));
            $get_category = $this->CommonModal->getRowByMoreId('company_category', array('cate_id' => $get_company[0]['company_category']));
            redirect(base_url('choose-vcard'));


            if ($add) {
                $this->session->set_flashdata('msg', 'Vcard Updated Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'No Changes in Vcard');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
        }

        $data['title'] = "Choose Vcard | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));

        $data['vcard'] = $this->CommonModal->getAllRows('vcard_design');
        $data['getcard'] = $this->CommonModal->getRowByMoreId('company', array('rgid' => sessionId('login_user_id')));

        $this->load->view('choose-vcard', $data);
    }

    public function changePassword()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }

        if (count($_POST) > 0) {


            $oldpassword = $this->input->post('oldpassword');
            $password = $this->input->post('password');
            $confirmpassword = $this->input->post('confirmpassword');
            $profile = $this->CommonModal->getsingleRowById('tbl_registration', array('rgid' => $this->session->userdata('login_user_id')));

            if ($profile['password'] == $oldpassword) {
                if ($password == $confirmpassword) {
                    $update = $this->CommonModal->updateRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'), array('password' => $password));
                    if ($update) {
                        $this->session->set_flashdata('cmsg', 'Password Changed Successfully');
                        $this->session->set_flashdata('cmsg_class', 'alert-success');
                    } else {
                        $this->session->set_flashdata('cmsg', 'Password not changed , try again later');
                        $this->session->set_flashdata('cmsg_class', 'alert-danger');
                    }
                } else {
                    $this->session->set_flashdata('cmsg', 'Password and confirm password doesnt matched.');
                    $this->session->set_flashdata('cmsg_class', 'alert-danger');
                }
            } else {
                $this->session->set_flashdata('cmsg', 'Old password doesnt matched');
                $this->session->set_flashdata('cmsg_class', 'alert-danger');
            }
            redirect(base_url('changePassword'));
        } else {
            $data['title'] = "Change Passowrd | SaharDirectory - Get a Personal Visiting Card";
            $data['login_user'] = $this->session->userdata();
            $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
            $this->load->view('change_password', $data);
        }
    }

    public function enquiry()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }

        $BdID = $this->input->get('BdID');

        if ($BdID != '') {
            $delete = $this->CommonModal->deleteRowById('inquiry', array('id' => $BdID));
            if ($delete) {
                $this->session->set_flashdata('msg', 'Enquiry Delete Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('enquiry'));
            exit;
        }
        $data['title'] = "Enquiry | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));

        $company_en = $this->CommonModal->getRowById('company', 'rgid', $this->session->userdata('login_user_id'));
        $data['enquiry'] = $this->CommonModal->getRowByIdInOrder('inquiry', array('company_id' => $company_en[0]['company_id']), 'id', 'DESC');

        $this->load->view('enquiry', $data);
    }

    public function reviews()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }

        $BdID = $this->input->get('BdID');

        if ($BdID != '') {
            $delete = $this->CommonModal->deleteRowById('reviews', array('id' => $BdID));
            if ($delete) {
                $this->session->set_flashdata('msg', 'Reviews Delete Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('reviews'));
            exit;
        }
        $data['title'] = "Reviews | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));

        $data['company'] = $this->CommonModal->getRowByIdInOrder('company', array('rgid' => sessionId('login_user_id')), 'company_id', 'DESC');
        // $data['reviews'] = $this->CommonModal->getRowByIdInOrder('reviews', array('company_id' => $company['company_id']), 'rid', 'DESC');




        $this->load->view('reviews', $data);
    }


    public function gallery()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }

        $BdID = $this->input->get('BdID');


        if ($BdID != '') {
            $data = $this->CommonModal->getRowById('company_gallery', 'gallery_id', $BdID);


            // unlink('uploads/gallery/' .  $data[0]['image']);

            $delete = $this->CommonModal->deleteRowById('company_gallery', array('gallery_id' => $BdID));
            if ($delete) {
                $this->session->set_flashdata('msg', 'Gallery Delete Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('gallery'));
            exit;
        }

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['company_id'] = sessionId('login_user_id');
            $post['image'] = imageUpload('image', 'uploads/gallery/');

            $insert = $this->CommonModal->insertRowReturnId('company_gallery', $post);
            if ($insert) {
                $this->session->set_flashdata('msg', 'Gallery Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('gallery'));
        }

        $data['title'] = "Gallery | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));

        $data['gallery'] = $this->CommonModal->getRowByIdInOrder('company_gallery', array('company_id' => sessionId('login_user_id')), 'gallery_id', 'ASC');


        $this->load->view('gallery', $data);
    }

    public function video()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }

        $BdID = $this->input->get('BdID');


        if ($BdID != '') {
            $data = $this->CommonModal->getRowById('company_video', 'video_id', $BdID);


            unlink('uploads/video/' .  $data[0]['image']);

            $delete = $this->CommonModal->deleteRowById('company_video', array('video_id' => $BdID));
            if ($delete) {
                $this->session->set_flashdata('msg', 'video Delete Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('video'));
            exit;
        }

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['company_id'] = sessionId('login_user_id');
            $video_path =  $_POST['video_path'];

            $video_path = preg_replace("#.*youtube\.com/watch\?v=#", "", $video_path);
            $video_path = preg_replace("#.*https://youtu.be/#", "", $video_path);


            $insert = $this->CommonModal->insertRowReturnId('company_video', $post);
            if ($insert) {
                $this->session->set_flashdata('msg', 'video Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('video'));
        }

        $data['title'] = "video | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));

        $data['video'] = $this->CommonModal->getRowByIdInOrder('company_video', array('company_id' => sessionId('login_user_id')), 'video_id', 'DESC');


        $this->load->view('video', $data);
    }

    public function about()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            redirect(base_url('login'));
        }

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['company_id'] = sessionId('login_user_id');

            $insert = $this->CommonModal->updateRowByIdwithoutxss('company', 'rgid', sessionId('login_user_id'), $post);
            if ($insert) {
                $this->session->set_flashdata('msg', 'about Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'No changes on current');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('about'));
        }

        $data['title'] = "About | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));

        $data['about'] = $this->CommonModal->getRowByIdInOrder('company', array('rgid' => sessionId('login_user_id')), 'company_id', 'DESC');
        $this->load->view('about', $data);
    }


    public function section_category()
    {
        $data['title'] = "Section Category Add | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['section'] = $this->CommonModal->getRowByIdInOrder('section_category', array('company_id' => sessionId('login_user_id')), 'sec_id', 'ASC');

        $BdID = $this->input->get('BdID');
        if ($BdID != '') {
            $delete = $this->CommonModal->deleteRowById('section_category', array('sec_id' => $BdID));
            if ($delete) {
                $this->session->set_flashdata('msg', 'Section Category Delete Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('section-category'));
            exit;
        }
        $data['tag'] = 'Add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['company_id'] = sessionId('login_user_id');

            $insert = $this->CommonModal->insertRowReturnId('section_category', $post);
            if ($insert) {
                $this->session->set_flashdata('msg', 'Section Category Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('section-category'));
        } else {
            $this->load->view('section-category', $data);
        }
    }

    public function update_section_category($pid)
    {
        $data['title'] = "section Category Edit | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['section'] = $this->CommonModal->getRowByIdInOrder('section_category', array('company_id' => sessionId('login_user_id')), 'sec_id', 'DESC');

        $get_id = decryptId($pid);
        $data['tag'] = 'Edit';
        $data['section_category_list'] = $this->CommonModal->getRowById('section_category', 'sec_id', $get_id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $update = $this->CommonModal->updateRowById('section_category', 'sec_id', $get_id, $post);
            if ($update) {
                $this->session->set_flashdata('msg', 'Section category Updated Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Sction_category Updated Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url('section-category'));
        } else {
            $this->load->view('section-category', $data);
        }
    }

    public function getvalue()
    {
        $data = $this->input->post('nm');
        $sal = $this->CommonModal->getQuery("SELECT * FROM `company` WHERE `company_web_title` IN ('" . $data . "')");
    }

    public function section_list()
    {
        $data['title'] = "section | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['sectiondata'] = $this->CommonModal->getRowById('section', 'company_id', $this->session->userdata('login_user_id'));

        $BdID = $this->input->get('BdID');

        if ($BdID != '') {
            $data = $this->CommonModal->getRowById('section', 'section_id', $BdID);


            unlink('uploads/section/' .  $data[0]['section_image']);

            $delete = $this->CommonModal->deleteRowById('section', array('section_id' => $BdID));
            if ($delete) {
                $this->session->set_flashdata('msg', 'Section Delete Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('section-list'));
            exit;
        }
        $this->load->view('section-list', $data);
    }
    public function section_add()
    {
        $data['title'] = "section Add | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['subcate'] = $this->CommonModal->getRowById('section_category', 'company_id', $this->session->userdata('login_user_id'));

        $data['tag'] = 'Add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['company_id'] = sessionId('login_user_id');

            $post['section_image'] = imageUpload('section_image', 'uploads/section/');


            $insert = $this->CommonModal->insertRowReturnId('section', $post);
            if ($insert) {
                $this->session->set_flashdata('msg', 'Section Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('section-list'));
        } else {
            $this->load->view('section-add', $data);
        }
    }
    public function update_section($pid)
    {
        $data['title'] = "section Edit | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['subcate'] = $this->CommonModal->getRowById('section_category', 'company_id', $this->session->userdata('login_user_id'));

        $get_id = decryptId($pid);
        $data['tag'] = 'Edit';
        $data['section_list'] = $this->CommonModal->getRowById('section', 'section_id', $get_id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $section_image = $post['section_image'];
            if ($_FILES['section_image_temp']['name'] != '') {

                $img = imageUpload('section_image_temp', 'uploads/section/');
                $post['section_image'] = $img;
                if ($section_image != "") {
                    unlink('uploads/section/' . $section_image);
                }
            }
            $update = $this->CommonModal->updateRowById('section', 'section_id', $get_id, $post);
            if ($update) {
                $this->session->set_flashdata('msg', 'Section Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Section Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url('section-list'));
        } else {
            $this->load->view('section-add', $data);
        }
    }

    public function bank_details()
    {
        $data['title'] = "Bank Details  | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['bank'] = $this->CommonModal->getRowById('bank_details', 'company_id', $this->session->userdata('login_user_id'));
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['company_id'] = sessionId('login_user_id');
            $counts = $this->CommonModal->getRowById('bank_details', 'company_id', sessionId('login_user_id'));

            if ($counts > 0) {
                
                $insert = $this->CommonModal->updateRowById('bank_details', 'company_id', sessionId('login_user_id'), $post);
            } else {
                $insert = $this->CommonModal->insertRowReturnId('bank_details', $post);
            }
            if ($insert) {
                $this->session->set_flashdata('msg', 'Bank Details  Updated Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Bank Details  Updated Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url('bank-details'));
        } else {
            $this->load->view('bank-details', $data);
        }
    }


    public function online_payment()
    {
        $data['title'] = "Online Payment | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['payment'] = $this->CommonModal->getRowByIdInOrder('payment_details', array('company_id' => sessionId('login_user_id')), 'pay_id', 'ASC');

        $BdID = $this->input->get('BdID');
        if ($BdID != '') {
            $delete = $this->CommonModal->deleteRowById('payment_details', array('pay_id' => $BdID));
            if ($delete) {
                $this->session->set_flashdata('msg', 'Online Payment Delete Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('online-payment'));
            exit;
        }
        $data['tag'] = 'Add';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['company_id'] = sessionId('login_user_id');
            $post['qr'] = imageUpload('qr', 'uploads/payment/');
            $insert = $this->CommonModal->insertRowReturnId('payment_details', $post);
            if ($insert) {
                $this->session->set_flashdata('msg', 'Online Payment Uploaded Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Somethig Went Wrong try again later');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('online-payment'));
        } else {
            $this->load->view('online-payment', $data);
        }
    }

    public function update_online_payment($pid)
    {
        $data['title'] = "Online Payment Edit | SaharDirectory - Get a Personal Visiting Card";
        $data['login_user'] = $this->session->userdata();
        $data['profiledata'] = $this->CommonModal->getRowById('tbl_registration', 'rgid', $this->session->userdata('login_user_id'));
        $data['payment'] = $this->CommonModal->getRowByIdInOrder('payment_details', array('company_id' => sessionId('login_user_id')), 'pay_id', 'ASC');

        $get_id = decryptId($pid);


        $data['tag'] = 'Edit';
        $data['payment_details_list'] = $this->CommonModal->getRowById('payment_details', 'pay_id', $get_id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $qr = $post['qr'];
            if ($_FILES['qr_temp']['name'] != '') {
                $img = imageUpload('qr_temp', 'uploads/payment/');
                $post['qr'] = $img;
                if ($qr != "") {
                    unlink('uploads/payment/' . $qr);
                }
            }

            $update = $this->CommonModal->updateRowById('payment_details', 'pay_id', $get_id, $post);
            if ($update) {
                $this->session->set_flashdata('msg', 'Online Payment Updated Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Sction_category Updated Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url('online-payment'));
        } else {
            $this->load->view('online-payment', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_user_id');
        $this->session->unset_userdata('login_user_name');
        $this->session->unset_userdata('login_user_emailid');
        $this->session->unset_userdata('login_user_contact');
        $this->session->unset_userdata('login_user_contact');
        redirect(base_url());
    }

    public function get_company_vcontact()
    {
        $id = $this->input->get('id');
        $contactResult = $this->CommonModal->getSingleRowById('company', array('company_id' => $id));

        require_once("./vcardexport_company.php");
        $vcardExport = new VcardExport();
        $vcardExport->contactVcardExportService($contactResult);
        exit;
    }
}
