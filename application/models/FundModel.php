<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class FundModel extends CI_Model 
{
	/**
	 * File : fundModel.php
	 * Functionalities : Get and Set Data in Database
	**/

 	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get NAV value on that date.
     * 
     * @param date
     * 
     * @return object
    */
    public function getNavByDate($dateOfInvestment)
    {
        $resultSql = $this->db->select("net_asset_value");
        $resultSql = $resultSql->where("tbl_fund.fund_date", $dateOfInvestment);
        $result = $resultSql->get("tbl_fund")->result();
        return $result;
    }
}