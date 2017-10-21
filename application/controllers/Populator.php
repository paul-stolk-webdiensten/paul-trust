<?php
/**
 * Created by PhpStorm.
 * User: paulstolk
 * Date: 21-10-17
 * Time: 10:37:51
 */

/**
 * Class Populator
 * This class is for communicating with the fixer.io API and saving the output
 */
class Populator extends CI_Controller
{

    /**
     * Populator constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('populator_model');
    }

    /**
     * Get the latest currencies
     * @param string $base
     */
    public function getLatestCurrencies($base = "EUR") {
        $json = file_get_contents('https://api.fixer.io/latest');
        $obj = json_decode($json);
        if(!$this->populator_model->checkDateExists($obj->date)) {

            //create the data to sent to the model
            $base = $obj->base;
            $date = $obj->date;
            foreach($obj->rates as $currency => $rate) {
                $rateInfo[$currency] = array();
                $rateInfo[$currency]['base'] = $base;
                $rateInfo[$currency]['date'] = $date;
                $rateInfo[$currency]['currency'] = $currency;
                $rateInfo[$currency]['rate'] = $rate;
            }

            if($amountInserted = $this->populator_model->insertMultipleRates($rateInfo)) {
                echo $amountInserted . " new rates inserted";
            } else {
                echo "Rates inserting failed";
            }
        } else {
            echo "Rates are up to date";
        }
    }

    /**
     * Retrieve historical rates and sent them to the model
     */
    public function retrieveHistory() {
        //get oldest available currency
        $oldestDate = $this->populator_model->getOldestCurrencyUpdate();
        if(empty($oldestDate)) { $oldestDate = date("Y-m-d"); }

        //get the date to retrieve currency of
        $historyDate = date("Y-m-d", strtotime("-1 day", strtotime($oldestDate)));

        //oldest available data is from 1999-01-04
        if($historyDate == "1999-01-03") {
            echo "Updated all the way, no more data to retrieve!";
            exit;
        }

        //stop the import because it is for testing purposes only
        if($historyDate == "2010-01-01") {
            echo "Stop the import because it is for testing purposes only";
            exit;
        }

        //amount of requests until page refresh
        $maxRequests = 10;

        $rateInfo = array();
        for($counter = 0; $counter < $maxRequests; $counter++) {
            $json = file_get_contents('https://api.fixer.io/' . $historyDate);
            $obj = json_decode($json);

            //create the data to sent to the model
            $base = $obj->base;
            $date = $obj->date;
            foreach($obj->rates as $currency => $rate) {
                $rateInfo[$counter . $currency] = array();
                $rateInfo[$counter . $currency]['base'] = $base;
                $rateInfo[$counter . $currency]['date'] = $date;
                $rateInfo[$counter . $currency]['currency'] = $currency;
                $rateInfo[$counter . $currency]['rate'] = $rate;
            }

            //update the date to retrieve currency of
            $historyDate = date("Y-m-d", strtotime("-1 day", strtotime($historyDate)));
        }

        if($amountInserted = $this->populator_model->insertMultipleRates($rateInfo)) {
            echo $amountInserted . " rates inserted, starting over in 3 seconds...";
            header("Refresh: 3");
        } else {
            echo "Something went wrong! Please try again";
        }
    }
}