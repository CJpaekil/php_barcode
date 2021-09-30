<?php
// namespace App\Controllers;
// use App\Models\UserModel;
// use CodeIgniter\Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL

	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>

	 */
	function __construct(){
        parent::__construct();
        $this->load->helper('url');
        //$this->load->library('session');
      	$this->load->model('UserProduct');
    }
	public function index()
	{


        // $string = 'code39';
        // // $this->set_barcode($string);
        //     $this->load->library('zend');
        // // Load in folder Zend
        // $this->zend->load('Zend/Barcode');
        // // Generate barcode
        // Zend_Barcode::render('code128', 'image', array('text'=>'code39'), array());



        $data=$this->UserProduct->get();
        $data["products"]=$data;
		$this->load->view('welcome_message', $data);



	}
    public function get_barcode()
    {
$array_orderID = $this->input->post('postdata');
            $data=$this->UserProduct->getData($array_orderID);
            // Folder path to be flushed
            $folder_path = "cache";
               
            // List of name of files inside
            // specified folder
            $files = glob($folder_path.'/*'); 
               
            // Deleting all the files in the list
            foreach($files as $file) {
               
                if(is_file($file)) 
                
                    // Delete the given file
                    unlink($file); 
            }
            $print_data="";
            $order_count=0;
            for ($i=0;$i<count($data);$i++)
            {
                $labelgroup=$data[$i];
                for ($j=0;$j<count($labelgroup);$j++)
                {
                    $label=$labelgroup[$j];
                    $Product_QTY=$label->product_qty;
                    $Product_Title=$label->product_title;
                    $Order_ID=$label->order_id;
                    for ($k=0;$k<(int)$Product_QTY;$k++)
                    {
                                $dataBar=[];
                                $temp = (int)$Order_ID;
                                $dataBar['barcode']=$this->set_barcode($temp,$Product_Title,$order_count);
                                $print_data.="<div style='page-break-before: always'><img src="."'".$dataBar['barcode']."'"." alt='' width='176' height='62'><p style='margin-top:2px;font-size:10px'>".$Product_Title."</p><p style='margin-top:-8px;font-size:10px'>".$Order_ID."</p></div>";
                                $order_count++;

                    }
                    // break;
                    
                }
            }
             echo file_put_contents("test.txt",$print_data);

    }
    private function set_barcode($code,$title,$order)
    {

        $this->load->library('zend');
        //load in folder Zend
        $this->zend->load('Zend/Barcode');
            // $file = Zend_Barcode::draw('code128', 'image', array('text' => $code, 'drawText' => false), array());
            $file = Zend_Barcode::draw('code128', 'image', array('text'=>$title, 'drawText' => false), array());
            // $code = time().$code;
            $barcodeRealPath = 'cache/'.$code.$order.'.png';
            $barcodePath = 'cache/';

            header('Content-Type: image/png');
            $store_image = imagepng($file,$barcodeRealPath);
            return $barcodePath.$code.$order.'.png';
    }    
}
