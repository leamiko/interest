<?php

/**
 * easy_news表模型
 *
 * @author lzjjie
 * @version 1.0.0
 * @since 1.0.0
 */
class NewsModel extends Model {

    /**
     * 添加资讯
     *
     * @param int $category_id
     *            分类ID
     * @param string $title
     *            标题
     * @param string $keywords
     *            关键词
     * @param string $content
     *            内容
     * @param string $image
     *            首图
     * @return array
     */
    public function addNews($category_id, $title, $keywords, $content, $image) {
        $data = array(
            'category_id' => $category_id,
            'title' => $title,
            'content' => $content,
            'add_time' => time()
        );
        empty($keywords) || $data['keywords'] = $keywords;
        empty($image) || $data['image'] = $image;
        if ($this->add($data)) {
            return array(
                'status' => true,
                'msg' => '添加资讯成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '添加资讯失败'
            );
        }
    }

    /**
     * 删除资讯
     *
     * @param array $id
     *            资讯ID
     * @return array
     */
    public function deleteNews(array $id) {
        if ($this->where(array(
            'id' => array(
                'in',
                $id
            )
        ))->delete()) {
            return array(
                'status' => true,
                'msg' => '删除资讯成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '删除资讯失败'
            );
        }
    }

    /**
     * 获取资讯数
     *
     * @return int
     */
    public function getNewsCount() {
        return (int) $this->count();
    }

    /**
     * 获取资讯列表
     *
     * @param int $page
     *            当前页
     * @param int $pageSize
     *            每页显示条数
     * @param string $order
     *            排序字段
     * @param string $sort
     *            排序方式
     */
    public function getNewsList($page, $pageSize, $order, $sort, $keyword) {
        $offset = ($page - 1) * $pageSize;
        return $this->table($this->getTableName() . " AS n ")->field(array(
            'n.id',
            'n.category_id',
            'n.title',
            'n.content',
            'n.image',
            'n.add_time',
            'n.update_time',
            'nc.name' => 'category'
        ))->join(array(
            " LEFT JOIN " . M('NewsCategory')->getTableName() . " AS nc ON n.category_id = nc.id "
        ))->order($order . " " . $sort)->limit($offset, $pageSize)->select();
    }

    /**
     * 更新资讯
     *
     * @param int $id
     *            资讯ID
     * @param int $category_id
     *            分类ID
     * @param string $title
     *            标题
     * @param string $keywords
     *            关键词
     * @param string $content
     *            内容
     * @param string $image
     *            首图
     * @return array
     */
    public function updateNews($id, $category_id, $title, $keywords, $content, $image) {
        if ($this->where(array(
            'id' => $id
        ))->save(array(
            'title' => $title,
            'keywords' => empty($keywords) ? null : $keywords,
            'category_id' => $category_id,
            'content' => $content,
            'image' => empty($image) ? null : $image,
            'update_time' => time()
        ))) {
            return array(
                'status' => true,
                'msg' => '编辑资讯成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '编辑资讯失败'
            );
        }
    }

}