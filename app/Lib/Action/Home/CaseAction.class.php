<?php

/**
 * 案例中心Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class CaseAction extends HomeAction {

    /**
     * 案例中心
     */
    public function index() {
        // 渲染TDK
        $this->tdk(3);
        // 导航高亮
        $this->assign('highline', 3);
        // 渲染导航条
        $this->navigation();
        // 渲染右边悬浮框
        $this->right();
        // 案例分类
        $case_type = M('CaseType')->order("add_time ASC")->select();
        if (!empty($case_type)) {
            $id = isset($_GET['id']) ? intval($_GET['id']) : $case_type[0]['id'];
            if (!M('CaseType')->where(array(
                'id' => $id
            ))->count()) {
                $this->redirect('/case/index?id=' . $case_type[0]['id']);
            }
            $this->assign('case_type', $case_type);
            $this->assign('id', $id);
            $this->assign('maxPage', ceil(M('Case')->count() / 10));
        }
        $this->display();
    }

    /**
     * 获取分类案例列表
     */
    public function lists() {
        $page = isset($_GET['page']) ? intval($_GET['page']) : $this->redirect('/');
        $id = isset($_GET['id']) ? intval($_GET['id']) : $this->redirect('/');
        $offset = ($page - 1) * 10;
        $result = M('Case')->where(array(
            'case_type' => $id
        ))->order("order_time DESC")->limit($offset, 10)->select();
        foreach ($result as $k => &$v) {
            $image_info = getimagesize($_SERVER['DOCUMENT_ROOT'] . $v['cover']);
            $v['width'] = 280;
            $v['height'] = ceil($image_info[1] * (280 / $image_info[0]));
            $v['tags'] = explode("|", $v['functions']);
            for ($i = 1; $i <= 3; $i++) {
                $v["tags_{$i}"] = isset($v['tags'][$i - 1]) ? $v['tags'][$i - 1] : '';
            }
            $v['top'] = $v['height'] + 69;
        }
        $this->ajaxReturn(array(
            'total' => count($result),
            'result' => $result
        ));
    }

}