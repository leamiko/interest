<?php

/**
 * 服务中心Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class ServiceAction extends HomeAction {

    /**
     * 服务中心
     */
    public function index() {
        // 渲染TDK
        $this->tdk(2);
        // 导航高亮
        $this->assign('highline', 2);
        // 渲染导航条
        $this->navigation();
        // 渲染右边悬浮框
        $this->right();
        // 渲染服务类型
        $this->assign('service', array_map(function ($value) {
            $value['image'] = "http://{$_SERVER['HTTP_HOST']}{$value['image']}";
            return $value;
        }, M('Service')->field(array(
            'id',
            'title',
            'image',
            'description'
        ))->select()));
        $this->display();
    }

}