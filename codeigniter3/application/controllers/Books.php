<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Books extends REST_Controller
{
	function user_get()
    {      

        // $user = $this->some_model->getSomething( $this->get('id') );    
		
    	$specification[0]= $this->get('region');
		$specification[1]=$this->get('type'); 
    	
		//echo $specification[0] ;
		//echo $specification[1] ;
		
		function decode($word)
	    {
			$word = rawurldecode($word) ;
			return $word ;
	    }
		
		foreach ( $specification as &$val ){
			$val = decode($val) ;			
		}
		
		$this->load->model('Extractdata') ;
		$data=$this->Extractdata->getcases($specification);
		
		for($i= 0 ;$i<$data['length'][0] ;$i=$i+1)
		{$obj[$i] = new stdClass();
		$obj[$i]->Title=$data['Title'][$i];
		$obj[$i]->Name = $data['Name'][$i] ;
		$obj[$i]->Type = $data['Name'][$i] ;
		$obj[$i]->Address = $data['Address'][$i] ;
		$obj[$i]->Description = $data['Description'][$i] ;
		$obj[$i]->region = $data['region'][$i] ;
		
		
		
		}
		 json_encode($obj);
		
		$this->response($obj, 200);
     /*   if($user)
        {   $this->response($obj, 200);
           // $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
		*/
    }
    
    function lawyers_get()
    {
        $specification[0]= $this->get('region');
	    $specification[1]=$this->get('type'); 
		
		function decode($word)
	    {
			$word = rawurldecode($word) ;
			return $word ;
	    }
		
		foreach ( $specification as &$val ){
			$val = decode($val) ;			
		}
    	
		/* echo $specification[0] ;
		echo $specification[1] ; */
		
		$this->load->model('Extractdata') ;
		$data=$this->Extractdata->getlawyers($specification);
		
		for($i= 0 ;$i<$data['length'][0] ;$i=$i+1)
		{$obj[$i] = new stdClass();
		$obj[$i]->Type=$data['Type'][$i];
		$obj[$i]->Name = $data['Name'][$i] ;
		$obj[$i]->region = $data['region'][$i] ;
		$obj[$i]->qualification = $data['qualification'][$i] ;
		$obj[$i]->Availability = $data['Availability'][$i] ;
		$obj[$i]->rating = $data['rating'][$i] ;
		$obj[$i]->no_of_rating = $data['no_of_rating'][$i] ;
		$obj[$i]->photo =$data['photo'][$i] ;
		$obj[$i]->email= $data['email'][$i] ;
		
		
		}
		 json_encode($obj);
		
		$this->response($obj, 200);
     /*   if($user)
        {   $this->response($obj, 200);
           // $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
		*/
    }
	
	function makelawyer_put(){
		$profile[0] = $this->get('name');
		$profile[1] = $this->get('region');
		$profile[2] = $this->get('type');
		$profile[3] = $this->get('qualification');
		$profile[4] = $this->get('availability');
		$profile[5] = $this->get('email');
		$profile[6] = $this->get('phone');
		$profile[7] = $this->get('password');
		$profile[8] = $this->get('photo');
		
		
		$this->load->model('Extractdata') ;
		$data=$this->Extractdata->makeprofile($profile);
				
	}
	
	function updatelawyer_put(){
		$profile[0] = $this->get('name');
		$profile[1] = $this->get('region');
		$profile[2] = $this->get('type');
		$profile[3] = $this->get('qualification');
		$profile[4] = $this->get('availability');
		$profile[5] = $this->get('email');
		$profile[6] = $this->get('phone');
		$profile[7] = $this->get('password');
		
		$this->load->model('Extractdata') ;
		$data=$this->Extractdata->updateprofile($profile);
	}
	
	function case_put(){
		$case[0] = $this->get('name');
		$case[1] = $this->get('type');
		$case[2] = $this->get('title');
		$case[3] = $this->get('address');
		$case[4] = $this->get('region');
		$case[5] = $this->get('description');
		
		
		$this->load->model('Extractdata') ;
		$data=$this->Extractdata->makecase($case);
	}
	
	/* function updatecase_put(){
		$case[0] = $this->get('name');
		$case[1] = $this->get('type');
		$case[2] = $this->get('title');
		$case[3] = $this->get('address');
		$case[4] = $this->get('region');
		$case[5] = $this->get('description');
		
		$this->load->model('Extractdata') ;
		$data=$this->Extractdata->updatecase($case);
	} */
	
	function login1_get()
	{ // echo "1234" ;
	  $specification[0]= $this->get('email');
		$specification[1]=$this->get('password');
      //echo $specification[0] ;
	  //echo $specification[1] ;
	  //echo "1234" ;
			$this->load->model('Extractdata') ;
			$data=$this->Extractdata->checklogin($specification);
			
			
			
			$message= array('id' => $data);

			$this->response($message, 200);
	}
	
	function login2_get()
	{  
	  $specification[0]= $this->get('email');
		$specification[1]=$this->get('password');
     
			$this->load->model('Extractdata') ;
			$data=$this->Extractdata->login3($specification);
			
		   $obj= new stdClass();
		$obj->Type=$data['Type'][0];
		$obj->Name = $data['Name'][0] ;
		$obj->region = $data['region'][0] ;
		$obj->qualification = $data['qualification'][0] ;
		$obj->Availability = $data['Availability'][0] ;
		$obj->rating = $data['rating'][0] ;
		$obj->no_of_rating = $data['no_of_rating'][0] ;
		$obj->email = $data['email'][0] ;
		$obj->phone =$data['phone'][0] ;
		
		
		
		
		 json_encode($obj);
		
		$this->response($obj, 200);

			
	}
	
}