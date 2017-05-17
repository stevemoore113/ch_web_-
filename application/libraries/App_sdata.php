<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_sdata {
        private $_ci;
        private $_dbk;
        private $_s2;


        public function __construct()
        {    //parent::__construct();
        	$this ->_ci = &get_instance();
        	$this->_ci ->config->load('dff');
            $this->_s2 = $this->_ci->config->item('default');
            //var_dump($this->_s2);

        	 
            //  var_dump($this->_s2);

             
        	 //echo $_ci;
        	 
       
        	// $this->db_db2 = $_dbchg->load->database('News2', TRUE);

        }


public function dle($dle = false)
{
   
 $query = $query2->query('DELETE FROM news
 WHERE text!="1"');

 return $query;


}





       public function somef($slug = FALSE,$sff = 1)
       {



        

        $sff = rand(1,2);        
        if($sff==1)
        {
        $this->_s2['database'] = "News";      
        $query2 = $this->_ci->load->database($this->_s2,TRUE);
        }
        if($sff==2)
           {
        $this->_s2['database'] = "News2";      
        $query2 = $this->_ci->load->database($this->_s2,TRUE);
        }





       // var_dump($query2);

 if ($slug === FALSE)
        {
        $query = $query2->query('select*from news');
        return $query->result_array();
  }

       // $query = $query2->query('select text form news');
        $query = $query->get_where('news', array('slug' => $slug));
        return $query->row_array();
        


       // $uu->select
        //var_dump($this->_s2);



       }
}
