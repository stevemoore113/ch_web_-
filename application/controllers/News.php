

<?php 

 //   echo BASEPATH;
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('App_sdata');
                $this->load->model('news_model');
                $this->app_sdata->somef(); 
        }


        public function index()
        {
            //$this->load->library('App_sdata');
            //$this->app_sdata->somef(); 
        $this->app_sdata->somef();
        $data['news'] = $this->app_sdata->somef();
        $data['title'] ='node30';
        $hh = $this->load->view('news/view','', true);
        $h2 =$this->load->view('rr','',true); 
        $h3 = $this->load->view('abc','',true); 
        $h1 = $this->load->view('acc','',true); 
        $forc = $this->load->view('ex','',true);

        $data['forc'] = $forc;
        $data['hh'] = $hh;
        $data['h1'] = $h1;
        $data['h2'] = $h2;
        $data['h3'] = $h3;
        //$helsss =  $this->load->helper('ss','',true);
       // $data['helponeone'] = $helsss;
        $this->load->view('news/index',$data);  //主頁

        }

public function create()
{    
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Create a news item';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'text', 'required');

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('news/create');
    }
    else
    {
       $this->load->view('news/crea');

    }
}



          public function message($to = 'World')
        {
                echo "Hello {$to}!".PHP_EOL;
        }


        public function page1($ss=false)
        {
             echo "succesd";

             if($ss==3)
                 echo "3";
               if($ss==4)
                 echo "4";
               if($ss==5)
                 echo "5";
        }




        public function view($slug = NULL)
        {
        $data['news_item'] = $this->app_sdata->somef($slug);
        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];


        $this->load->view('templates/header',$data);
        $hh = $this->load->view('news/view','', true);
        $data['hh'] = 'dfdfdf';
        //$this->load->view('news/index',$data);
       // $this->load->view('news', $aiyxw);
        //$this->load->view('');

        }
}
