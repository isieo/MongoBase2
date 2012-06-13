<?php
class PortfoliosController extends ApplicationController{

 function wildcard($data){
    $all_users = array(
	    'col'	=> 'users'
    ); $users = DB::find($all_users);
    $filter_list = false;
    $edited_users = false;
    foreach($users as $user){
	    if($user['status']=='approved'){
		    $filter_list[$user['type']] = array(
			    'key' => $user['type']
		    );
		    $user['id'] = $GLOBALS['mb']->modules['db']->_id($user['_id']);
		    $edited_users[] = $user;
	    }
    }; $filters = false;
    foreach($filter_list as $key => $value){
	    $filters[] = array(
		    'key' => $value['key']
	    );
    }

    $results['users'] = $edited_users;
    $results['filters'] = $filters;

    $this->view->results = $results;
 }


}
