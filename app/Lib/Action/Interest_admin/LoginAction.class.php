<?php

/**
 * 登录/退出/修改密码Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class LoginAction extends Action {

    /**
     * 修改密码
     */
    public function chpwd() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $id || $this->redirect('/');
        if ($this->isAjax()) {
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            empty($password) && $this->redirect('/');
            $adminUser = D('AdminUser');
            echo json_encode($adminUser->changePassword($id, $password));
        } else {
            $this->assign('adminId', $id);
            $this->display();
        }
    }

    /**
     * 登录
     */
    public function index() {
        if ($this->isPost()) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $adminUser = D('AdminUser');
            $check = $adminUser->auth($username, $password);
            if ($check['status']) {
                session('admin_info', $check['admin_info']);
                $adminUser->where("id = {$check['admin_info']['id']}")->save(array(
                    'last_time' => time()
                ));
                $this->redirect(U('/interest_admin'));
            } else {
                vendor('Message.Message');
                Message::showMsg($check['msg'], U('/interest_admin/login'));
            }
        } else {
            if (session('admin_info')) {
                vendor('Message.Message');
                Message::showMsg('您已登录');
            } else {
                $this->display();
            }
        }
    }

    /**
     * 退出
     */
    public function logout() {
        session('admin_info', null);
        $this->redirect('/interest_admin/login');
    }

}