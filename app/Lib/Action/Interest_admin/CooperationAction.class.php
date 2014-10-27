<?php

/**
 * 申请合作Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class CooperationAction extends AdminAction {

    /**
     * 删除合作申请
     */
    public function delete() {
        if ($this->isAjax()) {
            $id = isset($_POST['id']) ? explode(',', $_POST['id']) : $this->redirect('/');
            $this->ajaxReturn(D('Cooperation')->deleteCooperation((array) $id));
        } else {
            $this->redirect('/');
        }
    }

    /**
     * 申请合作
     */
    public function index() {
        if ($this->isAjax()) {
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $pageSize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 20;
            $order = isset($_GET['sortname']) ? $_GET['sortname'] : 'id';
            $sort = isset($_GET['sortorder']) ? $_GET['sortorder'] : 'ASC';
            $cooperation = D('Cooperation');
            $total = $cooperation->getCooperationCount();
            if ($total) {
                $rows = array_map(function ($value) {
                    $value['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
                    return $value;
                }, $cooperation->getCooperationList($page, $pageSize, $order, $sort));
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
     * 致客户
     */
    public function to_customer() {
        $max_id = M('ToCustomer')->field(array(
            'id'
        ))->order("id DESC")->find();
        $max_id = $max_id ? $max_id['id'] : 1;
        if ($this->isAjax()) {
            $greeting = isset($_POST['greeting']) ? trim($_POST['greeting']) : $this->redirect('/');
            $content = isset($_POST['content']) ? trim($_POST['content']) : $this->redirect('/');
            if (M('ToCustomer')->count()) {
                if (M('ToCustomer')->where(array(
                    'id' => $max_id
                ))->save(array(
                    'greeting' => $greeting,
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
                if (M('ToCustomer')->add(array(
                    'greeting' => $greeting,
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
            $this->assign('toCustomer', M('ToCustomer')->order('id DESC')->find());
            $this->display();
        }
    }

}