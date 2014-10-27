<?php

/**
 * 案例中心Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class CaseAction extends AdminAction {

    /**
     * 添加案例
     */
    public function add() {
        if ($this->isAjax()) {
            $name = isset($_POST['name']) ? trim($_POST['name']) : $this->redirect('/');
            $type = isset($_POST['type']) ? trim($_POST['type']) : $this->redirect('/');
            $case_type = isset($_POST['case_type']) ? intval($_POST['case_type']) : $this->redirect('/');
            $cooperation = isset($_POST['cooperation']) ? trim($_POST['cooperation']) : $this->redirect('/');
            $functions = isset($_POST['functions']) ? trim($_POST['functions']) : $this->redirect('/');
            $description = isset($_POST['description']) ? trim($_POST['description']) : $this->redirect('/');
            $image = isset($_POST['image']) ? trim($_POST['image']) : $this->redirect('/');
            $cover = isset($_POST['cover']) ? trim($_POST['cover']) : $this->redirect('/');
            $is_selected = isset($_POST['is_selected']) ? intval($_POST['is_selected']) : $this->redirect('/');
            $this->ajaxReturn(D('Case')->addCase($name, $type, $case_type, $cooperation, $functions, $description, $image, $cover, $is_selected));
        } else {
            $this->assign('case_type', M('CaseType')->field(array(
                'id',
                'name'
            ))->select());
            $this->display();
        }
    }

    /**
     * 添加案例分类
     */
    public function add_type() {
        if ($this->isAjax()) {
            $name = isset($_POST['name']) ? trim($_POST['name']) : $this->redirect('/');
            $this->ajaxReturn(D('CaseType')->addCaseType($name));
        } else {
            $this->display();
        }
    }

    /**
     * 删除案例
     */
    public function delete() {
        if ($this->isAjax()) {
            $id = isset($_POST['id']) ? explode(',', $_POST['id']) : $this->redirect('/');
            $this->ajaxReturn(D('Case')->deleteCase((array) $id));
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
     * 删除案例分类
     */
    public function delete_type() {
        if ($this->isAjax()) {
            $id = isset($_POST['id']) ? explode(',', $_POST['id']) : $this->redirect('/');
            $this->ajaxReturn(D('CaseType')->deleteCaseType((array) $id));
        } else {
            $this->redirect('/');
        }
    }

    /**
     * 所有案例
     */
    public function index() {
        if ($this->isAjax()) {
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $pageSize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 20;
            $order = isset($_GET['sortname']) ? $_GET['sortname'] : 'id';
            $sort = isset($_GET['sortorder']) ? $_GET['sortorder'] : 'ASC';
            $case = D('Case');
            $total = $case->getCaseCount();
            if ($total) {
                $rows = array_map(function ($value) {
                    $value['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
                    $value['order_time'] = date("Y-m-d H:i:s", $value['order_time']);
                    $value['update_time'] = $value['update_time'] ? date("Y-m-d H:i:s", $value['update_time']) : $value['update_time'];
                    $value['src'] = "http://{$_SERVER['HTTP_HOST']}{$value['image']}";
                    $value['cover_src'] = "http://{$_SERVER['HTTP_HOST']}{$value['cover']}";
                    return $value;
                }, $case->getCaseList($page, $pageSize, $order, $sort));
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
     * 案例分类
     */
    public function type() {
        if ($this->isAjax()) {
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $pageSize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 20;
            $order = isset($_GET['sortname']) ? $_GET['sortname'] : 'id';
            $sort = isset($_GET['sortorder']) ? $_GET['sortorder'] : 'ASC';
            $type = D('CaseType');
            $total = $type->getCaseTypeCount();
            if ($total) {
                $rows = array_map(function ($value) {
                    $value['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
                    $value['update_time'] = $value['update_time'] ? date("Y-m-d H:i:s", $value['update_time']) : $value['update_time'];
                    return $value;
                }, $type->getCaseTypeList($page, $pageSize, $order, $sort));
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
     * 编辑案例
     */
    public function update() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $id || $this->redirect('/');
        $case = D('Case');
        if ($this->isAjax()) {
            $name = isset($_POST['name']) ? trim($_POST['name']) : $this->redirect('/');
            $type = isset($_POST['type']) ? trim($_POST['type']) : $this->redirect('/');
            $case_type = isset($_POST['case_type']) ? intval($_POST['case_type']) : $this->redirect('/');
            $cooperation = isset($_POST['cooperation']) ? trim($_POST['cooperation']) : $this->redirect('/');
            $functions = isset($_POST['functions']) ? trim($_POST['functions']) : $this->redirect('/');
            $description = isset($_POST['description']) ? trim($_POST['description']) : $this->redirect('/');
            $image = isset($_POST['image']) ? trim($_POST['image']) : $this->redirect('/');
            $cover = isset($_POST['cover']) ? trim($_POST['cover']) : $this->redirect('/');
            $is_selected = isset($_POST['is_selected']) ? intval($_POST['is_selected']) : $this->redirect('/');
            $this->ajaxReturn($case->updateCase($id, $name, $type, $case_type, $cooperation, $functions, $description, $image, $cover, $is_selected));
        } else {
            $caseAssign = $case->where(array(
                'id' => $id
            ))->find();
            $caseAssign['src'] = 'http://' . $_SERVER['HTTP_HOST'] . $caseAssign['image'];
            $caseAssign['cover_src'] = 'http://' . $_SERVER['HTTP_HOST'] . $caseAssign['cover'];
            $this->assign('case', $caseAssign);
            $this->assign('case_type', M('CaseType')->field(array(
                'id',
                'name'
            ))->select());
            $this->display();
        }
    }

    /**
     * 更新排序
     */
    public function update_order() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $id || $this->redirect('/');
        $case = D('Case');
        if ($this->isAjax()) {
            $order_time = isset($_POST['order_time']) ? trim($_POST['order_time']) : $this->redirect('/');
            $this->ajaxReturn($case->updateOrder($id, $order_time));
        } else {
            $this->assign('case', $case->field(array(
                'id',
                'order_time'
            ))->where(array(
                'id' => $id
            ))->find());
            $this->display();
        }
    }

    /**
     * 更新案例的精选状态
     */
    public function update_selected() {
        if ($this->isAjax()) {
            $id = isset($_POST['id']) ? intval($_POST['id']) : $this->redirect('/');
            $is_selected = isset($_POST['is_selected']) ? intval($_POST['is_selected']) : $this->redirect('/');
            $this->ajaxReturn(D('Case')->updateCaseSelected($id, $is_selected));
        } else {
            $this->redirect('/');
        }
    }

    /**
     * 编辑案例分类
     */
    public function update_type() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $id || $this->redirect('/');
        $caseType = D('CaseType');
        if ($this->isAjax()) {
            $name = isset($_POST['name']) ? trim($_POST['name']) : $this->redirect('/');
            $this->ajaxReturn($caseType->updateCaseType($id, $name));
        } else {
            $this->assign('caseType', $caseType->where(array(
                'id' => $id
            ))->find());
            $this->display();
        }
    }

    /**
     * 文件上传
     */
    public function upload() {
        if (!empty($_FILES)) {
            $this->ajaxReturn(upload($_FILES, C('MAX_SIZE'), C('ALLOW_EXTENSIONS'), 1, array(
                array(
                    240,
                    180,
                    '_s'
                ),
                array(
                    800,
                    600,
                    '_m'
                )
            )));
        } else {
            $this->redirect('/');
        }
    }

    /**
     * 上传封面
     */
    public function upload_cover() {
        if (!empty($_FILES)) {
            $this->ajaxReturn(upload($_FILES, C('MAX_SIZE'), C('ALLOW_EXTENSIONS')));
        } else {
            $this->redirect('/');
        }
    }

}