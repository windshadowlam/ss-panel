<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Controllers\BaseController;
use App\Utils\Hash;
use App\Services\Config;

class UserController extends BaseController
{
    public function index($request, $response, $args){
        $pageNum = 1;
        if(isset($request->getQueryParams()["page"])){
            $pageNum = $request->getQueryParams()["page"];
        }
        $users = User::paginate(15,['*'],'page',$pageNum);
        $users->setPath('/admin/user');
        return $this->view()->assign('users',$users)->display('admin/user/index.tpl');
    }

    public function edit($request, $response, $args){
        $id = $args['id'];
        $user = User::find($id);
        if ($user == null){

        }
        return $this->view()->assign('user',$user)->display('admin/user/edit.tpl');
    }

    public function update($request, $response, $args){
        $id = $args['id'];
        $user = User::find($id);

        $user->email =  $request->getParam('email');
        if ($request->getParam('pass') != '') {
            $user->pass = Hash::passwordHash($request->getParam('pass'));
        }
        $user->port =  $request->getParam('port');
        $user->passwd = $request->getParam('passwd');
        $user->transfer_enable = $request->getParam('transfer_enable');
        $user->invite_num = $request->getParam('invite_num');
        $user->method = $request->getParam('method');
        $user->enable = $request->getParam('enable');
        $user->is_admin = $request->getParam('is_admin');
        $user->ref_by = $request->getParam('ref_by');
		$user->credit = $request->getParam('credit');
        if(!$user->save()){
            $rs['ret'] = 0;
            $rs['msg'] = "修改失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "修改成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function delete($request, $response, $args){
        $id = $args['id'];
        $user = User::find($id);
        if(!$user->delete()){
            $rs['ret'] = 0;
            $rs['msg'] = "删除失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "删除成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function deleteGet($request, $response, $args){
        $id = $args['id'];
        $user = User::find($id);
        $user->delete();
        $newResponse = $response->withStatus(302)->withHeader('Location', '/admin/user');
        return $newResponse;
    }
	
	public function tools($request, $response, $args){
        $action = $args['action'];
		$pageNum = 1;
        if(isset($request->getQueryParams()["page"])){
            $pageNum = $request->getQueryParams()["page"];
        }
		$actionsql = '';
		switch ($action){
			case 'latecheckin':{$users = User::where('last_check_in_time', '<', Config::get('latecheckin')*86400)->paginate(15,['*'],'page',$pageNum);}break;
			case 'lasthr':{$users = User::where('t', '>',(time()-3600))->paginate(15,['*'],'page',$pageNum);}break;
			
			default:break;
		}
		
        // $users = User::where('last_check_in_time', '<', Config::get('latecheckin')*24*60*60)->paginate(15,['*'],'page',$pageNum);
        $users->setPath('/admin/user');
        return $this->view()->assign('users',$users)->display('admin/user/tools/latecheckin.tpl');
        // $user = User::find($id);
        // $user->delete();
        // $newResponse = $response->withStatus(302)->withHeader('Location', '/admin/user');
        // return $newResponse;
    }
}