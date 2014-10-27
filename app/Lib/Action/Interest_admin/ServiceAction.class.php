<?php

/**
 * 服务中心 Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class ServiceAction extends AdminAction {

    /**
     * 添加服务类型
     */
    public function add() {
        if ($this->isAjax()) {
            $title = isset($_POST['title']) ? trim($_POST['title']) : $this->redirect('/');
            $description = isset($_POST['description']) ? trim($_POST['description']) : $this->redirect('/');
            $introduction = isset($_POST['introduction']) ? trim($_POST['introduction']) : $this->redirect('/');
            $image = isset($_POST['image']) ? trim($_POST['image']) : $this->redirect('/');
            $icon = isset($_POST['icon']) ? trim($_POST['icon']) : $this->redirect('/');
            $this->ajaxReturn(D('Service')->addService($title, $description, $introduction, $image, $icon));
        } else {
            $this->display();
        }
    }

    /**
     * 删除服务类型
     */
    public function delete() {
        if ($this->isAjax()) {
            $id = isset($_POST['id']) ? explode(',', $_POST['id']) : $this->redirect('/');
            $this->ajaxReturn(D('Service')->deleteService((array) $id));
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
     * 服务类型
     */
    public function index() {
        if ($this->isAjax()) {
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $pageSize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 20;
            $order = isset($_GET['sortname']) ? $_GET['sortname'] : 'id';
            $sort = isset($_GET['sortorder']) ? $_GET['sortorder'] : 'ASC';
            $service = D('Service');
            $total = $service->getServiceCount();
            if ($total) {
                $rows = array_map(function ($value) {
                    $value['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
                    $value['update_time'] = $value['update_time'] ? date("Y-m-d H:i:s", $value['update_time']) : $value['update_time'];
                    return $value;
                }, $service->getServiceList($page, $pageSize, $order, $sort));
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
     * 编辑服务类型
     */
    public function update() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $id || $this->redirect('/');
        $service = D('Service');
        if ($this->isAjax()) {
            $title = isset($_POST['title']) ? trim($_POST['title']) : $this->redirect('/');
            $description = isset($_POST['description']) ? trim($_POST['description']) : $this->redirect('/');
            $introduction = isset($_POST['introduction']) ? trim($_POST['introduction']) : $this->redirect('/');
            $image = isset($_POST['image']) ? trim($_POST['image']) : $this->redirect('/');
            $icon = isset($_POST['icon']) ? trim($_POST['icon']) : $this->redirect('/');
            $this->ajaxReturn($service->updateService($id, $title, $description, $introduction, $image, $icon));
        } else {
            $serviceAssign = $service->where(array(
                'id' => $id
            ))->find();
            $serviceAssign['src'] = 'http://' . $_SERVER['HTTP_HOST'] . $serviceAssign['image'];
            $serviceAssign['icon_src'] = 'http://' . $_SERVER['HTTP_HOST'] . $serviceAssign['icon'];
            $this->assign('service', $serviceAssign);
            $this->display();
        }
    }

    /**
     * 文件上传
     */
    public function upload() {
        if (!empty($_FILES)) {
            $this->ajaxReturn(upload($_FILES, C('MAX_SIZE'), C('ALLOW_EXTENSIONS')));
        } else {
            $this->redirect('/');
        }
    }

}