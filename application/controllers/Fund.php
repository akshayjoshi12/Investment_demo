<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fund extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Fund
	 *	- or -
	 * 		http://example.com/index.php/fund/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/fund/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('fundModel'));
    }
	public function index()
	{
		$this->load->view('index');
	}

    public function process_calculate_investment()
    {
        $dateOfInvestment = $this->input->post('txtDate');
        $amountOfInvestment = $this->input->post('txtAmount');
        $today = TODAY_DATE;
        $objFund = $this->fundModel->getNavByDate($dateOfInvestment);
        $objFundToday = $this->fundModel->getNavByDate($today);
        $prevInvestment = 0;
        $todayInvestment = 0;
        if(!empty($objFund))
        {
            $prevInvestment = ($amountOfInvestment*100)/$objFund[0]->net_asset_value;
        }
        if(!empty($objFundToday))
        {
            $todayInvestment = ($amountOfInvestment*100)/$objFundToday[0]->net_asset_value;
        }

        $response = array('error'=>false, 'todayInvestment'=>round($todayInvestment,2), 'prevInvestment'=>round($prevInvestment,2));

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(
                json_encode($response)
            );
    }
}
