<?php
class Payment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insert($data)
    {
        $record = array(
            'category' => $data['category'],
            'category_id' => $data['category_id'],
            'payment_id' => $data['payment_id'],
            'payment_method' => $data['payment_method'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'brand' => $data['brand'],
            'card_number' => $data['card_number'],
            'expired_date' => $data['expired_date'],
            'status' => $data['status'],
        );
        return $this->db->insert("payment_transactions", $record);
    }
}
