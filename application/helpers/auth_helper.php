<?php

function permission()
{
    $ci = get_instance();
    $loggedUser = $ci->session->userdata("logged_user");

    if(!$loggedUser) {
        $ci->session->set_flashdata("error", "Você precisa estar logado para acessar esta página");
        redirect("login");
    }
    return $loggedUser;
}

function permissionDiretoria()
{
    $ci = get_instance();
    $loggedUser = $ci->session->userdata("logged_user");
    
    if(!$loggedUser) {
        $ci->session->set_flashdata("error", "Você precisa estar logado para acessar esta página!");
        redirect("login");
    } elseif($loggedUser["role"] == "Funcionarios") {
        $ci->session->set_flashdata("block", "Você não tem permissão para entrar nesta página!");
        redirect("dashboard");
    } else {
        return $loggedUser;
    }
}


?>