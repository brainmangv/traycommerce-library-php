<?php
class Pedido extends TrayEndpoints{
    const uri = "orders/";
    
    public function __construct(\Auth $auth) {
        parent::__construct($auth);
    }
    
    /**
     * 
     * @param type $filtros
     * @return type object     
     * @throws Exception
     */
    public function listagem($filtros = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $filtros);

        $resposta = $this->get(self::uri, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $orderId
     * @return type object
     * @throws Exception
     */
    public function dados($orderId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $orderId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $orderId
     * @return type object
     * @throws Exception
     */
    public function dadosCompleto($orderId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $orderId . "/complete", $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $data["Order"]["point_sale"] = "PARTICULAR";
        $data["Order"]["shipment"] = "Sedex";
        $data["Order"]["shipment_value"] = "10.44";
        $data["Order"]["payment_form"] = "Boleto - TrayCheckout";
        $data["Order"]["Customer"]["type"] = "0";
        $data["Order"]["Customer"]["name"] = "Nome do Cliente";
        $data["Order"]["Customer"]["cpf"] = "00000000000";
        $data["Order"]["Customer"]["email"] = "email@docliente.com";
        $data["Order"]["Customer"]["rg"] = "00.000.000-X";
        $data["Order"]["Customer"]["gender"] = "M";
        $data["Order"]["Customer"]["phone"] = "1133330001";
        $data["Order"]["Customer"]["CustomerAddress"][0]["address"] = "Endereço do Cliente";
        $data["Order"]["Customer"]["CustomerAddress"][0]["zip_code"] = "04001001";
        $data["Order"]["Customer"]["CustomerAddress"][0]["number"] = "123";
        $data["Order"]["Customer"]["CustomerAddress"][0]["complement"] = "Sala 123";
        $data["Order"]["Customer"]["CustomerAddress"][0]["neighborhood"] = "Bairro do Cliente";
        $data["Order"]["Customer"]["CustomerAddress"][0]["city"] = "Cidade do Cliente";
        $data["Order"]["Customer"]["CustomerAddress"][0]["state"] = "SP";
        $data["Order"]["Customer"]["CustomerAddress"][0]["country"] = "BRA";
        $data["Order"]["Customer"]["CustomerAddress"][0]["type"] = "1";
        $data["Order"]["Customer"]["ProductsSold"][0]["product_id"] = "1";
        $data["Order"]["Customer"]["ProductsSold"][0]["variant_id"] = "12";
        $data["Order"]["Customer"]["ProductsSold"][0]["price"] = "42.90";
        $data["Order"]["Customer"]["ProductsSold"][0]["original_price"] = "42.90";
        $data["Order"]["Customer"]["ProductsSold"][0]["quantity"] = "1";
     */
    
    /**
     * 
     * @param type $data
     * @return type object
     * @throws Exception
     */
    public function cadastrar($data) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $data);

        $resposta = $this->post(self::uri, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $data["Order"]["status_id"] = "16";
        $data["Order"]["taxes"] = "0.01";
        $data["Order"]["shipment"] = "Sedex";
        $data["Order"]["shipment_value"] = "5.58";
        $data["Order"]["discount"] = "0.01";
        $data["Order"]["sending_code"] = "123456";
        $data["Order"]["sending_date"] = "2015-04-20";
        $data["Order"]["store_note"] = "Pedido em 1 vez de R$ 51,85 através do Boleto.";
        $data["Order"]["customer_note"] = "";
        $data["Order"]["partner_id"] = "2";
     */
    
    /**
     * 
     * @param type $orderId
     * @param type $data
     * @return type object
     * @throws Exception
     */
    public function atualizarDados($orderId, $data) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $data);

        $resposta = $this->put(self::uri . $orderId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $orderId
     * @return type object
     * @throws Exception
     */
    public function cancelar($orderId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->put(self::uri . "cancel/" . $orderId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $orderId
     * @return type object
     * @throws Exception
     */
    public function excluir($orderId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->delete(self::uri . $orderId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $filtros
     * @return type object
     * @throws Exception
     */
    public function listagemNotasFiscais($filtros = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $filtros);
        
        $resposta = $this->get(self::uri . "invoices", $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $orderId
     * @param type $invoiceId
     * @return type object
     * @throws Exception
     */
    public function consultarDadosNotaFiscal($orderId, $invoiceId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->get(self::uri . $orderId . "/" . "invoices/" . $invoiceId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $orderId
     * @return type object
     * @throws Exception
     */
    public function consultarNotaPorPedido($orderId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->get(self::uri . $orderId . "/" . "invoices/", $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $data["issue_date"] = "2016-08-15";
        $data["number"] = "213123213213";
        $data["serie"] = "123";
        $data["value"] = "50.85";
        $data["key"] = "12345678901234567890123456789012345678901234";
        $data["link"] = "http://www.link.com.br/12345678901234567890123456789012345678901234";
        $data["xml_danfe"] = "### XML DANFE ###";
        $data["ProductCfop"]["product_id"] = "123";
        $data["ProductCfop"]["variation_id"] = "0";
        $data["ProductCfop"]["cfop"] = "1234";
     */
    
    /**
     * 
     * @param type $orderId
     * @param type $data
     * @return type object
     * @throws Exception
     */
    public function cadastrarNotaFiscal($orderId, $data) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $data);
        
        $resposta = $this->post(self::uri . $orderId . "/" . "invoices/", $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $data["issue_date"] = "2016-08-15";
        $data["number"] = "213123213213";
        $data["serie"] = "123";
        $data["value"] = "50.85";
        $data["key"] = "12345678901234567890123456789012345678901234";
        $data["link"] = "http://www.link.com.br/12345678901234567890123456789012345678901234";
        $data["xml_danfe"] = "### XML DANFE ###";
        $data["ProductCfop"]["product_id"] = "123";
        $data["ProductCfop"]["variation_id"] = "0";
        $data["ProductCfop"]["cfop"] = "1234";
     */
    
    /**
     * 
     * @param int $orderId
     * @param int $invoiceId
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function atualizarNotaFiscal($orderId, $invoiceId, $data) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $data);
        
        $resposta = $this->put(self::uri . $orderId . "/" . "invoices/" . $invoiceId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $data["ProductsSold"]["product_id"] = "9999";
        $data["ProductsSold"]["variant_id"] = "123";
        $data["ProductsSold"]["price"] = "55.80";
        $data["ProductsSold"]["original_price"] = "55.80";
        $data["ProductsSold"]["quantity"] = "1";
     */
    
    /**
     * 
     * @param int $orderId
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function incluirProduto($orderId, $data) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $data);
        
        $resposta = $this->post(self::uri . "includeProduct/" . $orderId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param int $orderId
     * @param int $productId
     * @return object
     * @throws Exception
     */
    public function excluirProduto($orderId, $productId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $data);
        
        $resposta = $this->put(self::uri . "excludeProduct/" . $orderId . "/" . $productId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
}
?>
