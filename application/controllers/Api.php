<?php
/**
 * Created by PhpStorm.
 * User: paulstolk
 * Date: 21-10-17
 * Time: 10:37:51
 */

/**
 * Class Populator
 */
class Api extends CI_Controller
{

    /**
     * Populator constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
    }

    /**
     * Get the available currencies
     */
    public function getAvailableCurrencies() {
        echo json_encode($this->api_model->getCurrencies());
    }

    /**
     * Convert the amount to the requested currency
     */
    public function convert() {
        $base = $this->input->post('base');
        $to = $this->input->post('to');
        $amount = $this->input->post('amount');

        //we don't have to convert to EUR if it is already EUR
        if($base != "EUR") {
            //convert base to EUR
            $amount = $amount / $this->api_model->getLatestRate($base);
        }

        if($to != "EUR") {
            $amount = $amount * $this->api_model->getLatestRate($to);
        }

        echo json_encode($amount);
    }

}