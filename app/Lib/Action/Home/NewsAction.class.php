<?php

/**
 * 最新资讯Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class NewsAction extends HomeAction {

    /**
     * 资讯详细页
     */
    public function detail() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : $this->redirect('/');
        // 渲染导航条
        $this->navigation();
        // 渲染右边悬浮框
        $this->right();
        $detail = M('News')->where(array(
            'id' => $id
        ))->find();
        empty($detail) && $this->redirect('/');
        Load('extend');
        if (empty($detail['keywords'])) {
            $temp = M('Tdk')->where(array(
                'page' => 4
            ))->find();
            $detail['keywords'] = $temp['keywords'];
        }
        $category = M('NewsCategory')->order("add_time ASC")->select();
        if (!M('NewsCategory')->where(array(
            'id' => $detail['category_id']
        ))->count()) {
            $this->redirect('/news/index?category=' . $category[0]['id']);
        }
        $this->assign('category', $category);
        $this->assign('detail', $detail);
        $this->display();
    }

    /**
     * 最新资讯
     */
    public function index() {
        // 渲染TDK
        $this->tdk(4);
        // 渲染导航条
        $this->navigation();
        // 渲染右边悬浮框
        $this->right();
        // 资讯分类
        $category = M('NewsCategory')->order("add_time ASC")->select();
        if ($category) {
            $id = isset($_GET['category']) ? intval($_GET['category']) : $category[0]['id'];
            if (!M('NewsCategory')->where(array(
                'id' => $id
            ))->count()) {
                $this->redirect('/news/index?category=' . $category[0]['id']);
            }
            Load('extend');
            import('ORG.Util.Page');
            $news = M('News');
            $count = $news->where(array(
                'category_id' => $id
            ))->count();
            $page = new Page($count, 10);
            $page->setConfig('theme', "共&nbsp;&nbsp;%totalRow%&nbsp;&nbsp;%header%&nbsp;&nbsp;%nowPage%/%totalPage%页&nbsp;&nbsp;%upPage% %downPage% %first% %prePage% %linkPage% %nextPage%&nbsp;&nbsp;%end%");
            $page->setConfig('header', '篇资讯');
            $show = $page->show();
            $newsLists = $news->where(array(
                'category_id' => $id
            ))->order("add_time DESC")->limit($page->firstRow, $page->listRows)->select();
            $this->assign('newsLists', $newsLists);
            $this->assign('count', ceil($count / 10));
            $this->assign('page', $show);
            $this->assign('category', $category);
        }
        $this->assign('id', $id);
        $this->display();
    }

}