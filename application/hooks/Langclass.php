<?php

   class LangClass{
	
    function cookie($var, $value='', $time=0, $path='', $domain='',$s){ 
      $_COOKIE[$var] = $value; 
      if(is_array($value)){ 
      foreach($value as $k=>$v){ 
      setcookie($var.'['.$k.']', $v, $time, $path, $domain, $s); 
      } 
      }else{ 
      setcookie($var, $value, $time, $path, $domain, $s); 
      } 
    }

    function set_lang() {
        $CFG =& load_class('Config');
        $URI =& load_class('URI');        
      
        //从Uri中分解出当前的语言，如 '', 'sc' 或 'ch'  
        $my_lang =  $URI->segment(1);  

        //默认语言为英语english  
			
        if (in_array($my_lang,config_item('support_language')))  
        {  
		
            //动态设置当前语言为'sc' 或 'ch'     
             $CFG->set_item('language', $my_lang); 
            
             $cookie = array(
               'name'   => 'lang',
               'value'  => $my_lang,
               'expire' => time()+86500,
               'domain' => '',
               'path'   => '/',
               'prefix' => config_item('cookie_prefix'),
             );  

             foreach (array('value', 'expire', 'domain', 'path', 'prefix', 'name') as $item)
            {
                if (isset($cookie[$item]))
                {
                    $$item = $cookie[$item];
                  
                }
            }
            $this->cookie($prefix.$name, $value, $expire, $path, $domain, 0);
                  
        }  

          
   
    }  
  
   }
    

?>