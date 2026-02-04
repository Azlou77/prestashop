<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class Ps_Shoppingcart extends Module{
    public function __construct(){
        $this->name = "ps_shoppingcart";
        $this->version = 1.7;
        $this->author = "Nguyen Louis";

        parent::__construct();

        $this->displayName = $this->l("Module Cart");
        $this->description = $this->l("Module Cart Description");
    }

    public function install(){
        return parent::install() && $this->registerHook("displayTop");
    }

    public function hookDisplayTop($params){
        $message_perso= "Welcome to Gecodis company";
        $this->context->smarty->assign (
            [
                "mon_message" => $message_perso, 
                "nb_produits" => (int)$this->context->cart->nbProducts()
            ]
        );
    return $this->display(__FILE__, "views/templates/hook/ps_shoppingcart.tpl");
    }
}

