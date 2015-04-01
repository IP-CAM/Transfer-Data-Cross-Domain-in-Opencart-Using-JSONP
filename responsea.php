<?php
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");

class ControllerAccountResponsea extends Controller {  

    public function yourfunction() { 
    $data1 = array();    
    $this->load->model('account/order');
    $this->load->model('account/download'); 

$this->load->model('account/customer');
if ($this->customer->login($_POST['email'], $_POST['password'])) 
  { 
    $results = $this->model_account_download->getDownloads();
    foreach ($results as $result) {
      if (file_exists(DIR_DOWNLOAD . $result['filename'])) {        
        $i = 0;   

          $url  = 'download_id=' . $result['download_id'];
          $url .= '&order_product_id=' . $result['order_product_id'];
            $data1['json'][] = array(
            'bookname'   => $result['bookname'],          
            'download_count'=> $result['download_count'],
            'href'       => $this->url->link('account/download/download', $url,'SSL')
        );
      }
    }
    $data1["json"] = json_encode($data1);
    echo json_encode($data1);} 
else  
  { $return = $_POST;
    $return["json"] = json_encode($return);
    echo json_encode($return);}  
    }
} ?>
