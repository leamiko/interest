<?php

/**
 * 前台基类
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class HomeAction extends Action {

    /**
     * 初始化
     */
    public function _initialize() {
        $this->copyright();
    }

    /**
     * 渲染导航条
     */
    protected function navigation() {
        $this->assign('navigation', array(
            array(
                'url' => "http://{$_SERVER['HTTP_HOST']}/",
                'name' => L('_HOME_PAGE_')
            ),
            array(
                'url' => "http://{$_SERVER['HTTP_HOST']}/service",
                'name' => L('_SERVICE_')
            ),
            array(
                'url' => "http://{$_SERVER['HTTP_HOST']}/case",
                'name' => L('_CASE_')
            ),
            array(
                'url' => "http://{$_SERVER['HTTP_HOST']}/news",
                'name' => L('_NEWS_')
            ),
            array(
                'url' => "http://{$_SERVER['HTTP_HOST']}/cooperation",
                'name' => L('_COOPERATION_')
            ),
            array(
                'url' => "http://{$_SERVER['HTTP_HOST']}/about",
                'name' => L('_ABOUT_US_')
            )
        ));
    }

    /**
     * 渲染右边悬浮框
     */
    protected function right() {
        $max_id = M('RightSetting')->field(array(
            'id'
        ))->order("id DESC")->find();
        if ($max_id) {
            $right = M('RightSetting')->where(array(
                'id' => $max_id['id']
            ))->find();
            $this->assign('right', $right);
        }
    }

    /**
     * 渲染TDK
     *
     * @param int $page
     *            页面（1：网站首页，2：服务中心，3：案例中心，4：最新资讯，5：申请合作，6：关于我们）
     */
    protected function tdk($page) {
        $this->assign('tdk', M('Tdk')->where(array(
            'page' => $page
        ))->find());
    }

    /**
     * 渲染版权信息
     */
    private function copyright() {
        $this->assign('copyright', M('Copyright')->order('id DESC')->find());
    }

}