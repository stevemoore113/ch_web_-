<?php 
class index11 extends CI_Controller {

        public function index()// 登入首頁  
        {    
                

        	    $data['title'] = '早期醫療研究 教學開發中';
                $data['mode1'] = '修改登入'; 
                $data['mode2'] = '教師登入';
                $data['id'] = '帳號';
                $data['pwd'] = '密碼';
                $lachart = $this->load->view('lachart','',true);
                $data['lachart']= $lachart;

                
                $this->load->view('ooo',$data);  
                

        }
        public function single()//登入成功後顯示狀態
        {      

        	     $data2['title']='';
                $this->load->view('CCEI/member_join',$data2);  
                    
        }
           public function succesed()//註冊頁面

        {       
                $data1['title'] = '早期醫療研究 教學開發中';
                $data['mode1'] = '修改登入'; 
                $data['mode2'] = '教師登入';
                $data['id'] = '帳號';
                $data['pwd'] = '密碼';
                $lachart = $this->load->view('lachart','',true);
                $data1['lachart']= $lachart;

                $this->load->view('pro_main',$data1);  
            }
                    
        

}