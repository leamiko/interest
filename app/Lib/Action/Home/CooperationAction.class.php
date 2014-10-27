<?php

/**
 * 申请合作Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class CooperationAction extends HomeAction {

    /**
     * 表单处理
     */
    public function apply() {
        $cooperation = D('Cooperation');
        if ($cooperation->create()) {
            if ($cooperation->add()) {
                $this->success('申请成功，合作愉快');
            } else {
                $this->error($cooperation->getError());
            }
        } else {
            $this->error($cooperation->getError());
        }
    }

    /**
     * 申请合作
     */
    public function index() {
        // 渲染TDK
        $this->tdk(5);
        // 导航高亮
        $this->assign('highline', 4);
        // 渲染导航条
        $this->navigation();
        // 渲染右边悬浮框
        $this->right();
        // 渲染致客户
        $this->assign('to_customer', M('ToCustomer')->find());
        // 渲染服务类型
        $this->assign('service', M('Service')->field(array(
            'id',
            'title'
        ))->select());
        $_service = isset($_GET['service']) ? intval($_GET['service']) : 0;
        if ($_service) {
            if (!M('Service')->where(array(
                'id' => $_service
            ))->count()) {
                $_service = 0;
            }
        }
        $this->assign('_service', $_service);
        $this->display();
    }

}