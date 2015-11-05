<?php

class Extractdata extends CI_Model{
    
   function __construct()
   {
     parent::__construct() ;
   }


   
   
   function getcases($filter)                   // Function for getting data  of cases
   { 
	  
	  $this->load->database() ;  
      $this->db->distinct() ;
     
	 // echo "HELLO " ;
	  $i= 0 ;  
	   $result=['',''];   
       $query= $this->db->query('SELECT * FROM cases WHERE Type="'.$filter[1].'" AND region="'.$filter[0].'"') ;                
       //$query= $this->db->query('SELECT * FROM cases ') ;           
	   //return $query  ;
     	 foreach($query->result() as  $row) 
         {  $result['Name'][$i] = $row->Name ;                                         
			$result['Type'][$i]= $row->Type ;        
			$result['Title'][$i] = $row->Title ;
			$result['Address'][$i] =$row->Address ;
			$result['Description'][$i]= $row->Description ;
			$result['region'][$i]= $row->region ;
			
			$i=$i+1 ;
			
			
		 }
		
		 $result['length'][0]= $i ;
		return $result ; 
	
	}
	
	
	
	function getlawyers($filter)                   // Function for getting data  of cases
   {  $this->load->database() ;  
      $this->db->distinct() ;
     
	  
	  $i= 0 ;  
	   $result=['',''];   
       $query= $this->db->query('SELECT * FROM lawyers WHERE Type="'.$filter[1].'" AND region="'.$filter[0].'"') ;                
       //$query= $this->db->query('SELECT * FROM lawyers ') ;           
	   //return $query  ;
     	 foreach($query->result() as  $row) 
         {  $result['Name'][$i] = $row->Name ;                                         
			$result['Type'][$i]= $row->type ;        
			$result['region'][$i] = $row->region ;
			$result['qualification'][$i] =$row->qualification ;
			$result['Availability'][$i]= $row->Availability ;
			$result['rating'][$i]= $row->rating ;
			$result['no_of_rating'][$i] =$row->no_of_rating ;
			$result['photo'][$i]=$row->photo ;
			$result['email'][$i]=$row->email ;
			$i=$i+1 ;
			
			
		 }
		
		 $result['length'][0]= $i ;
		return $result ; 
	
	}
	
	

	function makeprofile($profile)
	{
		$this->load->database() ;  
        $this->db->distinct() ;
		
		function decode($word)
	    {
			$word = rawurldecode($word) ;
			return $word ;
	    }
		
		
		foreach ( $profile as &$val ){
			$val = decode($val) ;			
		}
		
		$data = array(
		   'Name' => $profile[0] ,
		   'region' => $profile[1] ,
		   'type' => $profile[2] ,
		   'qualification' => $profile[3] ,
		   'Availability' => $profile[4] ,
		   'email' => $profile[5] ,
		   'phone' => $profile[6] ,
		   'password' => $profile[7] ,
		   'photo' => $profile[8]
		);

		$this->db->insert('lawyers', $data); 
	
	}  
	
	function updateprofile($profile)
	{
		$this->load->database() ;  
        $this->db->distinct() ;
		
	    function decode($word)
	    {
			$word = rawurldecode($word) ;
			return $word ;
	    }
		
		$data = array();		
		if(!is_null($profile[1])){
			$profile[1] = decode($profile[1]) ;
			$data['region'] = $profile[1] ;
		}
		if(!is_null($profile[2])){
			$profile[2] = decode($profile[2]) ;
			$data['type'] = $profile[2] ;
		}
		if(!is_null($profile[3])){
			$profile[3] = decode($profile[3]) ;
			$data['qualification'] = $profile[3] ;
		}
		if(!is_null($profile[4])){
			$profile[4] = decode($profile[4]) ;
			$data['Availability'] = $profile[4] ;
		}
		if(!is_null($profile[5])){
			$profile[5] = decode($profile[5]) ;
			$data['email'] = $profile[5] ;
		}
		if(!is_null($profile[6])){
			$profile[6] = decode($profile[6]) ;
			$data['phone'] = $profile[6] ;
		}
		if(!is_null($profile[7])){
			$profile[7] = decode($profile[7]) ;
			$data['password'] = $profile[7] ;
		}
		

		$this->db->where('Name', $profile[0]);
		$this->db->update('lawyers', $data); 
	
	}  
	
	function makecase($case)
	{
		$this->load->database() ;  
        $this->db->distinct() ;
		
		function decode($word)
	    {
			$word = rawurldecode($word) ;
			return $word ;
	    }
		
		
		foreach ( $case as &$val ){
			$val = decode($val) ;			
		}
		
		$data = array(
		   'Name' => $case[0] ,
		   'Type' => $case[1] ,
		   'Title' => $case[2] ,
		   'Address' => $case[3] ,
		   'Region' => $case[4] ,
		   'Description' => $case[5]
		);

		$this->db->insert('cases', $data); 
	
	}
	
	/* function updatecase($case)
	{
		$this->load->database() ;  
        $this->db->distinct() ;
		
	    function decode($word)
	    {
			$word = rawurldecode($word) ;
			return $word ;
	    }
		
		$data = array();		
		if(!is_null($case[1])){
			$case[1] = decode($case[1]) ;
			$data['Type'] = $case[1] ;
		}
		if(!is_null($case[2])){
			$case[2] = decode($case[2]) ;
			$data['Title'] = $case[2] ;
		}
		if(!is_null($case[3])){
			$case[3] = decode($case[3]) ;
			$data['Address'] = $case[3] ;
		}
		if(!is_null($case[4])){
			$case[4] = decode($case[4]) ;
			$data['Description'] = $case[4] ;
		}
		if(!is_null($case[5])){
			$case[5] = decode($case[5]) ;
			$data['Region'] = $case[5] ;
		}
		

		$this->db->where('Name', $case[0]);
		$this->db->update('lawyers', $data); 
	
	}  */
	
	function checklogin($data)
   {
		 $this->load->database() ;  
		$this->db->distinct() ;
	  
	  function decode($word)
	    {
			$word = rawurldecode($word) ;
			return $word ;
	    }
		
		foreach ( $data as &$val ){
			$val = decode($val) ;			
		}
	  
	  $query= $this->db->query('SELECT * FROM lawyers WHERE email="'. $data[0].'"') ;      
		$i= 0 ;  
	   $result=['',''];
	   $result1 = array();
		foreach($query->result() as  $row) 
         {  $result['Password'][$i] = $row->password ;                                         
			
			
			$i=$i+1 ;
			
			
		 }
		 if($i==0)
		 { $result1='false' ;
		 }
		 else if($data[1]==$result['Password'][0])
		 {  $result1= 'true' ;
		 }
		 else
		 { $result1 ='false' ;
		 }
		 return $result1 ;
		
   }
   
   
    function login3($data)
   {
		$this->load->database() ;  
		$this->db->distinct() ;
	  
	  function decode($word)
	    {
			$word = rawurldecode($word) ;
			return $word ;
	    }
		
		foreach ( $data as &$val ){
			$val = decode($val) ;			
		}
		
	  $query= $this->db->query('SELECT * FROM lawyers WHERE email="'. $data[0].'"') ;      
		$i= 0 ;  
	   $result=['',''];
		 foreach($query->result() as  $row) 
         {  $result['Name'][$i] = $row->Name ;                                         
			$result['Type'][$i]= $row->type ;        
			$result['region'][$i] = $row->region ;
			$result['qualification'][$i] =$row->qualification ;
			$result['Availability'][$i]= $row->Availability ;
			$result['rating'][$i]= $row->rating ;
			$result['no_of_rating'][$i] =$row->no_of_rating ;
			$result['email'][$i] =$row->email ;
			$result['phone'][$i]= $row->phone ;
			$i=$i+1 ;
			
			
		 }
		
		 $result['length'][0]= $i ;
		return $result ; 
		
		
   }
  
}