<?php

/**
 * 关于我们Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class AboutAction extends HomeAction {

    /**
     * 关于我们
     */
    public function index() {
        // 渲染TDK
        $this->tdk(6);
        // 导航高亮
        $this->assign('highline', 6);
        // 渲染导航条
        $this->navigation();
        // 渲染右边悬浮框
        $this->right();
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