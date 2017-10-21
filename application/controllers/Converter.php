<?php
/**
 * Created by PhpStorm.
 * User: paulstolk
 * Date: 21-10-17
 * Time: 10:37:51
 */

/**
 * Class Converter
 */
class Converter extends CI_Controller
{
    /**
     * Converter constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('parser');
        $this->load->helper('form');

        $this->ApiURL = "http://paultest.dev/";
    }

    /**
     * Index page, homepage / converter
     */
    public function index() {
        $data = array(
            'header_title' => "Convert exchange rates | Paul UniTrust",
            'header_description' => "The best echange rate converter there is",
            'page_title' => "Convert exchange rates",
        );

        $availableCurrencies = array();
        foreach($this->getAvailableCurrencies() as $availableCurrency) {
            $availableCurrencies[$availableCurrency['currency']] = $availableCurrency['currency'];
        }
        $data['available_currencies'] = $availableCurrencies;

        $this->parser->parse('templates/header', $data);
        $this->parser->parse('templates/navigation', $data);
        $this->parser->parse('calculator', $data);
        $this->parser->parse('templates/footer', $data);
    }

    public function getAvailableCurrencies() {
        $json = file_get_contents($this->ApiURL . 'api/get-available-currencies');
        $availableCurrencies = json_decode($json, true);
        return $availableCurrencies;
    }

    //get currencies from DB
    public function getLatestCurrencies() {

    }
}