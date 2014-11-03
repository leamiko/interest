<?php

/**
 * 联系方式Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class ContactAction extends AdminAction {

    /**
     * 联系方式
     */
    public function index() {
        $max_id = M('Contact')->field(array(
            'id'
        ))->order("id DESC")->find();
        $max_id = $max_id ? $max_id['id'] : 1;
        if ($this->isAjax()) {
            $company = isset($_POST['company']) ? trim($_POST['company']) : $this->redirect('/');
            $contact = isset($_POST['contact']) ? trim($_POST['contact']) : $this->redirect('/');
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : $this->redirect('/');
            $address = isset($_POST['address']) ? trim($_POST['address']) : $this->redirect('/');
            $description = isset($_POST['description']) ? trim($_POST['description']) : $this->redirect('/');
            if (M('Contact')->count()) {
                if (M('Contact')->where(array(
                    'id' => $max_id
                ))->save(array(
                    'company' => $company,
                    'contact' => $contact,
                    'phone' => $phone,
                    'address' => $address,
                    'description' => $description
                ))) {
                    $this->ajaxReturn(array(
                        'status' => true,
                        'msg' => '设置成功'
                    ));
                } else {
                    $this->ajaxReturn(array(
                        'status' => false,
                        'msg' => '设置失败'
                    ));
                }
            } else {
                if (M('Contact')->add(array(
                    'company' => $company,
                    'contact' => $contact,
                    'phone' => $phone,
                    'address' => $address,
                    'description' => $description
                ))) {
                    $this->ajaxReturn(array(
                        'status' => true,
                        'msg' => '设置成功'
                    ));
                } else {
                    $this->ajaxReturn(array(
                        'status' => false,
                        'msg' => '设置失败'
                    ));
                }
            }
        } else {
            $this->assign('contact', M('Contact')->order("id DESC")->find());
            $this->display();
        }
    }

}