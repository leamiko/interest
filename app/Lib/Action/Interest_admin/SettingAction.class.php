<?php

/**
 * 基本设置Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class SettingAction extends AdminAction {

    /**
     * 添加服务类型
     */
    public function add_flash() {
        if ($this->isAjax()) {
            $title = isset($_POST['title']) ? trim($_POST['title']) : $this->redirect('/');
            $description = isset($_POST['description']) ? trim($_POST['description']) : $this->redirect('/');
            $url = isset($_POST['url']) ? trim($_POST['url']) : $this->redirect('/');
            $image = isset($_POST['image']) ? trim($_POST['image']) : $this->redirect('/');
            $this->ajaxReturn(D('Flash')->addFlash($title, $description, $url, $image));
        } else {
            $this->display();
        }
    }

    /**
     * 添加TDK
     */
    public function add_tdk() {
        if ($this->isAjax()) {
            $page = isset($_POST['page']) ? intval($_POST['page']) : $this->redirect('/');
            $title = isset($_POST['title']) ? trim($_POST['title']) : $this->redirect('/');
            $description = isset($_POST['description']) ? trim($_POST['description']) : $this->redirect('/');
            $keywords = isset($_POST['keywords']) ? trim($_POST['keywords']) : $this->redirect('/');
            $this->ajaxReturn(D('Tdk')->addTdk($page, $title, $description, $keywords));
        } else {
            $this->display();
        }
    }

    /**
     * 版权信息设置
     */
    public function copyright() {
        $max_id = M('Copyright')->field(array(
            'id'
        ))->order("id DESC")->find();
        $max_id = $max_id ? $max_id['id'] : 1;
        if ($this->isAjax()) {
            $content = isset($_POST['content']) ? trim($_POST['content']) : $this->redirect('/');
            if (M('Copyright')->count()) {
                if (M('Copyright')->where(array(
                    'id' => $max_id
                ))->save(array(
                    'content' => $content
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
                if (M('Copyright')->add(array(
                    'content' => $content
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
            $this->assign('copyright', M('Copyright')->order('id DESC')->find());
            $this->display();
        }
    }

    /**
     * 删除广告
     */
    public function delete_flash() {
        if ($this->isAjax()) {
            $id = isset($_POST['id']) ? explode(',', $_POST['id']) : $this->redirect('/');
            $this->ajaxReturn(D('Flash')->deleteFlash((array) $id));
        } else {
            $this->redirect('/');
        }
    }

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
     * 删除TDK
     */
    public function delete_tdk() {
        if ($this->isAjax()) {
            $id = isset($_POST['id']) ? explode(',', $_POST['id']) : $this->redirect('/');
            $this->ajaxReturn(D('Tdk')->deleteTdk((array) $id));
        } else {
            $this->redirect('/');
        }
    }

    /**
     * 焦点图广告
     */
    public function flash() {
        if ($this->isAjax()) {
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $pageSize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 20;
            $order = isset($_GET['sortname']) ? $_GET['sortname'] : 'id';
            $sort = isset($_GET['sortorder']) ? $_GET['sortorder'] : 'ASC';
            $flash = D('Flash');
            $total = $flash->getFlashCount();
            if ($total) {
                $rows = array_map(function ($value) {
                    $value['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
                    $value['update_time'] = $value['update_time'] ? date("Y-m-d H:i:s", $value['update_time']) : $value['update_time'];
                    return $value;
                }, $flash->getFlashList($page, $pageSize, $order, $sort));
            } else {
                $rows = null;
            }
            $this->ajaxReturn(array(
                'Total' => $total,
                'Rows' => $rows
            ));
        } else {
            $this->display();
        }
    }

    /**
     * 右边悬浮窗设置
     */
    public function right() {
        $max_id = M('RightSetting')->field(array(
            'id'
        ))->order("id DESC")->find();
        $max_id = $max_id ? $max_id['id'] : 1;
        if ($this->isAjax()) {
            $qq = isset($_POST['qq']) ? trim($_POST['qq']) : $this->redirect('/');
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : $this->redirect('/');
            $qr_code = isset($_POST['qr_code']) ? trim($_POST['qr_code']) : $this->redirect('/');
            if (M('RightSetting')->count()) {
                if (M('RightSetting')->where(array(
                    'id' => $max_id
                ))->save(array(
                    'qq' => $qq,
                    'phone' => $phone,
                    'qr_code' => $qr_code
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
                if (M('RightSetting')->add(array(
                    'qq' => $qq,
                    'phone' => $phone,
                    'qr_code' => $qr_code
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
            $right = M('RightSetting')->find();
            if ($right) {
                $right['src'] = "http://{$_SERVER['HTTP_HOST']}{$right['qr_code']}";
            }
            $this->assign('right', $right);
            $this->display();
        }
    }

    /**
     * TDK管理
     */
    public function tdk() {
        if ($this->isAjax()) {
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $pageSize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 20;
            $order = isset($_GET['sortname']) ? $_GET['sortname'] : 'id';
            $sort = isset($_GET['sortorder']) ? $_GET['sortorder'] : 'ASC';
            $tdk = D('Tdk');
            $total = $tdk->getTdkCount();
            if ($total) {
                $rows = array_map(function ($value) {
                    $value['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
                    $value['update_time'] = $value['update_time'] ? date("Y-m-d H:i:s", $value['update_time']) : $value['update_time'];
                    return $value;
                }, $tdk->getTdkList($page, $pageSize, $order, $sort));
            } else {
                $rows = null;
            }
            $this->ajaxReturn(array(
                'Total' => $total,
                'Rows' => $rows
            ));
        } else {
            $this->display();
        }
    }

    /**
     * 编辑广告
     */
    public function update_flash() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $id || $this->redirect('/');
        $flash = D('Flash');
        if ($this->isAjax()) {
            $title = isset($_POST['title']) ? trim($_POST['title']) : $this->redirect('/');
            $description = isset($_POST['description']) ? trim($_POST['description']) : $this->redirect('/');
            $url = isset($_POST['url']) ? trim($_POST['url']) : $this->redirect('/');
            $image = isset($_POST['image']) ? trim($_POST['image']) : $this->redirect('/');
            $this->ajaxReturn($flash->updateFlash($id, $title, $description, $url, $image));
        } else {
            $flashAssign = $flash->where(array(
                'id' => $id
            ))->find();
            $flashAssign['src'] = 'http://' . $_SERVER['HTTP_HOST'] . $flashAssign['image'];
            $this->assign('flash', $flashAssign);
            $this->display();
        }
    }

    /**
     * 编辑TDK
     */
    public function update_tdk() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $id || $this->redirect('/');
        $tdk = D('Tdk');
        if ($this->isAjax()) {
            $page = isset($_POST['page']) ? intval($_POST['page']) : $this->redirect('/');
            $title = isset($_POST['title']) ? trim($_POST['title']) : $this->redirect('/');
            $description = isset($_POST['description']) ? trim($_POST['description']) : $this->redirect('/');
            $keywords = isset($_POST['keywords']) ? trim($_POST['keywords']) : $this->redirect('/');
            $this->ajaxReturn($tdk->updateTdk($id, $page, $title, $description, $keywords));
        } else {
            $this->assign('tdk', $tdk->where(array(
                'id' => $id
            ))->find());
            $this->display();
        }
    }

    /**
     * 上传图片
     */
    public function upload() {
        if (!empty($_FILES)) {
            $this->ajaxReturn(upload($_FILES, C('MAX_SIZE'), C('ALLOW_EXTENSIONS')));
        } else {
            $this->redirect('/');
        }
    }

}