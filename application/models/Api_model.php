<?php
/**
 * Created by PhpStorm.
 * User: paulstolk
 * Date: 21-10-17
 * Time: 11:00:29
 */

/**
 * Class Api_model
 */
class Api_model extends CI_Model
{

    /**
     * Api_model constructor.
     */
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * Get the available currencies
     * @return array
     */
    public function getCurrencies() {
        $this->db->order_by("currency", "ASC");
        return $this->db->get("currencies")->result_array();
    }

    /**
     * Get the most recent rate by currency
     * @param $currency
     * @return mixed
     */
    public function getLatestRate($currency) {
        $this->db->order_by("date", "DESC");
        $this->db->where("base", "EUR");
        $this->db->where("currency", $currency);
        return $this->db->get("rates")->row()->rate;
    }
}