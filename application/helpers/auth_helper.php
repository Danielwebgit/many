<?php 

function check_permission(){
    $ci = get_instance();
    $logged_user = $ci->session->userdata('logged_user');
    
    if(! $logged_user)
    {
        $ci->session->set_flashdata('danger', 'Você não está logado!');
        redirect('login');
    }
    return $logged_user;
}
