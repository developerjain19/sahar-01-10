<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



//---------- User dashboard----------

$route['my-profile'] = "Home/my_profile";
$route['choose-vcard'] = "Home/choose_vcard";
$route['dashboard'] = "Home/dashboard";
$route['enquiry'] = "Home/enquiry";
$route['reviews'] = "Home/reviews";
$route['product-list'] = "Home/product_list";
$route['product-add'] = "Home/product_add";
$route['logout'] = 'Home/logout';
$route['changePassword'] = 'Home/changePassword';
$route['gallery'] = 'Home/gallery';
$route['video'] = 'Home/video';
$route['search_contact'] = "Home/searchcontact";
$route['update-product/(:any)'] = 'home/update_product/$1';
$route['section-category'] = 'Home/section_category';
$route['update-section-category/(:any)'] = 'home/update_section_category/$1';
$route['section-list'] = "Home/section_list";
$route['section-add'] = "Home/section_add";
$route['update-section/(:any)'] = 'home/update_section/$1';
$route['bank-details'] = "Home/bank_details";
$route['online-payment'] = 'Home/online_payment';
$route['get_company_vcontact'] = 'Home/get_company_vcontact';

$route['update-online-payment/(:any)'] = 'home/update_online_payment/$1';

//----------website Route----------

$route['search'] = "Home/search";
$route['login'] = "Home/login";
$route['signup'] = "Home/register";
$route['about'] = 'Home/about';
$route['phoneverification'] = 'Home/phoneverification';
$route['allcategory'] = 'Home/allcategory';
$route['browse_service'] = 'Home/subcate_list';
$route['listing'] = 'Home/listing';
$route['blogs'] = 'Home/blog';
$route['privacy-policy'] = 'Home/privacy_policy';
$route['term-condition'] = 'Home/term_condition';
$route['checkotp'] = 'Home/checkotp';

$route['listing/(:any)/(:any)/(:any)/(:any)'] = 'Home/listing_details/$1/$2/$3/$4';
$route['forget-password'] = 'Home/forget_password';
$route['track'] = 'Home/track';
$route['graphics-motivational'] = 'Home/graphics_motivational';



//-------------Vacrd -------

$route['sahar/(:any)/(:any)/(:any)'] = 'Vcard/sahar/$1/$2/$3';

