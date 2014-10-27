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
     * 删除图片
     */
    public function delete_image() {
        if ($this->isAjax()) {
            $filename = isset($_POST['filename']) ? $_SERVER['DOCUMENT_ROOT'] . $_POST['filename'] : $this->redirect('/');
            if (file_exists($filename)) {
                if (unlink($filename)) {
                    $this->ajaxReturn(array(
                        'status' => true
                    ));
                } else {
                    $this->ajaxReturn(array(
                        'status' => false,
                        'msg' => '删除图片失败'
                    ));
                }
            } else {
                $this->ajaxReturn(array(
                    'status' => false,
                    'msg' => '图片已经删除'
                ));
            }
        } else {
            $this->redirect('/');
        }
    }

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
            $map = isset($_POST['map']) ? trim($_POST['map']) : $this->redirect('/');
            if (M('Contact')->count()) {
                if (M('Contact')->where(array(
                    'id' => $max_id
                ))->save(array(
                    'company' => $company,
                    'contact' => $contact,
                    'phone' => $phone,
                    'address' => $address,
                    'description' => $description,
                    'map' => $map
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
                    'description' => $description,
                    'map' => $map
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
            $contact = M('Contact')->find();
            if ($contact) {
                $contact['src'] = "http://{$_SERVER['HTTP_HOST']}{$contact['map']}";
            }
            $this->assign('contact', $contact);
            $this->display();
        }
    }

    /**
     * 上传地图
     */
    public function upload() {
        if (!empty($_FILES)) {
            $this->ajaxReturn(upload($_FILES, C('MAX_SIZE'), C('ALLOW_EXTENSIONS')));
        } else {
            $this->redirect('/');
        }
    }

}