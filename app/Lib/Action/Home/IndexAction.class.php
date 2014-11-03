<?php

/**
 * 首页Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class IndexAction extends HomeAction {

    /**
     * 首页
     */
    public function index() {
        // 渲染TDK
        $this->tdk(1);
        // 导航高亮
        $this->assign('highline', 1);
        // 渲染导航条
        $this->navigation();
        // 渲染右边悬浮框
        $this->right();
        // 渲染焦点图广告
        $this->assign('flash', M('Flash')->order("id DESC")->select());
        // 渲染服务类型
        $this->assign('service', array_map(function ($value) {
            $value['icon'] = "http://{$_SERVER['HTTP_HOST']}{$value['icon']}";
            return $value;
        }, M('Service')->field(array(
            'id',
            'icon',
            'introduction'
        ))->limit(3)->select()));
        // 精选案例
        $this->assign('selected_case', array_map(function ($value) {
            $value['functions'] = explode("|", $value['functions']);
            $value['image_medium'] = "http://{$_SERVER['HTTP_HOST']}" . str_replace('.', '_m.', $value['image']);
            $value['image_small'] = "http://{$_SERVER['HTTP_HOST']}" . str_replace('.', '_s.', $value['image']);
            $value['image'] = "http://{$_SERVER['HTTP_HOST']}{$value['image']}";
            return $value;
        }, M('Case')->where(array(
            'is_selected' => 1
        ))->order("order_time DESC")->limit(8)->select()));
        // 联系方式
        $max_id = M('Contact')->field(array(
            'id'
        ))->find();
        if ($max_id) {
            $contact = M('Contact')->where(array(
                'id' => $max_id['id']
            ))->find();
            $contact['map'] = "http://{$_SERVER['HTTP_HOST']}{$contact['map']}";
        } else {
            $contact = null;
        }
        $this->assign('contact', $contact);
        $this->display();
    }

}