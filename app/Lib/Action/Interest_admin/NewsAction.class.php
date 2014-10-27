<?php

/**
 * 资讯 Action
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class NewsAction extends AdminAction {

    /**
     * 添加资讯
     */
    public function add() {
        if ($this->isAjax()) {
            $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : $this->redirect('/');
            $title = isset($_POST['title']) ? trim($_POST['title']) : $this->redirect('/');
            $keywords = isset($_POST['keywords']) ? trim($_POST['keywords']) : $this->redirect('/');
            $content = isset($_POST['content']) ? trim($_POST['content']) : $this->redirect('/');
            $image = isset($_POST['image']) ? trim($_POST['image']) : $this->redirect('/');
            $this->ajaxReturn(D('News')->addNews($category_id, $title, $keywords, $content, $image));
        } else {
            $this->assign('category', M('NewsCategory')->select());
            $this->display();
        }
    }

    /**
     * 添加分类
     */
    public function add_category() {
        if ($this->isAjax()) {
            $name = isset($_POST['name']) ? trim($_POST['name']) : $this->redirect('/');
            $this->ajaxReturn(D('NewsCategory')->addCategory($name));
        } else {
            $this->display();
        }
    }

    /**
     * 资讯分类
     */
    public function category() {
        if ($this->isAjax()) {
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $pageSize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 20;
            $order = isset($_GET['sortname']) ? $_GET['sortname'] : 'id';
            $sort = isset($_GET['sortorder']) ? $_GET['sortorder'] : 'ASC';
            $category = D('NewsCategory');
            $total = $category->getCategoryCount();
            if ($total) {
                $rows = array_map(function ($value) {
                    $value['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
                    $value['update_time'] = $value['update_time'] ? date("Y-m-d H:i:s", $value['update_time']) : $value['update_time'];
                    return $value;
                }, $category->getCategoryList($page, $pageSize, $order, $sort));
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
     * 删除资讯
     */
    public function delete() {
        if ($this->isAjax()) {
            $id = isset($_POST['id']) ? explode(',', $_POST['id']) : $this->redirect('/');
            $this->ajaxReturn(D('News')->deleteNews((array) $id));
        } else {
            $this->redirect('/');
        }
    }

    /**
     * 删除分类
     */
    public function delete_category() {
        if ($this->isAjax()) {
            $id = isset($_POST['id']) ? explode(',', $_POST['id']) : $this->redirect('/');
            $this->ajaxReturn(D('NewsCategory')->deleteCategory((array) $id));
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
     * 所有资讯
     */
    public function index() {
        if ($this->isAjax()) {
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $pageSize = isset($_GET['pagesize']) ? $_GET['pagesize'] : 20;
            $order = isset($_GET['sortname']) ? $_GET['sortname'] : 'id';
            $sort = isset($_GET['sortorder']) ? $_GET['sortorder'] : 'ASC';
            $news = D('News');
            $total = $news->getNewsCount();
            if ($total) {
                $rows = array_map(function ($value) {
                    $value['add_time'] = date("Y-m-d H:i:s", $value['add_time']);
                    $value['update_time'] = $value['update_time'] ? date("Y-m-d H:i:s", $value['update_time']) : $value['update_time'];
                    $value['url'] = "http://{$_SERVER['HTTP_HOST']}/news/detail/id/{$value['id']}";
                    return $value;
                }, $news->getNewsList($page, $pageSize, $order, $sort));
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
     * 更新资讯
     */
    public function update() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : $this->redirect('/');
        if ($this->isAjax()) {
            $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : $this->redirect('/');
            $title = isset($_POST['title']) ? trim($_POST['title']) : $this->redirect('/');
            $keywords = isset($_POST['keywords']) ? trim($_POST['keywords']) : $this->redirect('/');
            $content = isset($_POST['content']) ? trim($_POST['content']) : $this->redirect('/');
            $image = isset($_POST['image']) ? trim($_POST['image']) : $this->redirect('/');
            $this->ajaxReturn(D('News')->updateNews($id, $category_id, $title, $keywords, $content, $image));
        } else {
            $news = M('News')->where(array(
                'id' => $id
            ))->find();
            if ($news['image']) {
                $news['src'] = "http://{$_SERVER['HTTP_HOST']}{$news['image']}";
            }
            $this->assign('news', $news);
            $this->assign('category', M('NewsCategory')->select());
            $this->display();
        }
    }

    /**
     * 编辑分类
     */
    public function update_category() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $id || $this->redirect('/');
        $category = D('NewsCategory');
        if ($this->isAjax()) {
            $name = isset($_POST['name']) ? trim($_POST['name']) : $this->redirect('/');
            $this->ajaxReturn($category->updateCategory($id, $name));
        } else {
            $this->assign('category', $category->where(array(
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
            $this->ajaxReturn(upload($_FILES, C('MAX_SIZE'), C('ALLOW_EXTENSIONS')));
        } else {
            $this->redirect('/');
        }
    }

    /**
     * 资讯内容图片上传
     */
    public function upload_image() {
        if (!empty($_FILES)) {
            $year = date("Y");
            $month = date("m");
            $day = date("d");
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . "/uploads/{$year}/{$month}/{$day}";
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0755, true);
            }
            if ($_FILES['upload']['size'] > C('MAX_SIZE')) {
                echo "<script type='text/javascript'>
                        window.parent.CKEDITOR.tools.callFunction(0, '', '图片不能大于2M');
                        </script>";
            } else {
                $fileParts = pathinfo($_FILES['upload']['name']);
                $tempFile = $_FILES['upload']['tmp_name'];
                if (in_array(strtolower($fileParts['extension']), C('ALLOW_EXTENSIONS'))) {
                    $uploadFileName = generateTargetFileName($fileParts['extension']);
                    $targetFile = rtrim($targetPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $uploadFileName;
                    move_uploaded_file($tempFile, $targetFile);
                    $fileName = "/uploads/{$year}/{$month}/{$day}/" . $uploadFileName;
                    $funcNum = $_GET['CKEditorFuncNum'];
                    echo "<script type='text/javascript'>
                    window.parent.CKEDITOR.tools.callFunction($funcNum, '$fileName');
                    </script>";
                } else {
                    echo "<script type='text/javascript'>
                            window.parent.CKEDITOR.tools.callFunction(0, '', '不支持的图片格式');
                            </script>";
                }
            }
        } else {
            $this->redirect('/');
        }
    }

}