<?php
/**
 * Created by PhpStorm.
 * User: paulstolk
 * Date: 21-10-17
 * Time: 11:00:29
 */

/**
 * Class Populator_model
 */
class Populator_model extends CI_Model
{

    /**
     * Populator_model constructor.
     */
    public function __construct()
    {
        $this->load->database();
    }

    //get the oldest available currency
    public function getOldestCurrencyUpdate() {
        $this->db->order_by("date", "ASC");
        return $this->db->get("rates")->row()->date;
    }

    //insert multiple rates
    public function insertMultipleRates($insertArray) {
        echo "<pre>";
//        die(var_dump($insertArray));
        return $this->db->insert_batch("rates", $insertArray);
    }
}