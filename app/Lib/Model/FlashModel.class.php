<?php

/**
 * int_flash表模型
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class FlashModel extends Model {

    /**
     * 添加广告
     *
     * @param string $title
     *            标题
     * @param string $description
     *            简介
     * @param string $url
     *            广告URL
     * @param string $image
     *            图片
     * @return array
     */
    public function addFlash($title, $description, $url, $image) {
        if ($this->add(array(
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'image' => $image,
            'add_time' => time()
        ))) {
            return array(
                'status' => true,
                'msg' => '添加广告成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '添加广告失败'
            );
        }
    }

    /**
     * 删除广告
     *
     * @param array $id
     *            广告ID
     * @return array
     */
    public function deleteFlash(array $id) {
        if ($this->where(array(
            'id' => array(
                'in',
                $id
            )
        ))->delete()) {
            return array(
                'status' => true,
                'msg' => '删除广告成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '删除广告失败'
            );
        }
    }

    /**
     * 获取广告数
     *
     * @return int
     */
    public function getFlashCount() {
        return (int) $this->count();
    }

    /**
     * 获取广告列表
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
    public function getFlashList($page, $pageSize, $order, $sort) {
        $offset = ($page - 1) * $pageSize;
        return $this->order($order . " " . $sort)->limit($offset, $pageSize)->select();
    }

    /**
     * 更新广告
     *
     * @param int $id
     *            广告ID
     * @param string $title
     *            标题
     * @param string $description
     *            简介
     * @param string $url
     *            广告URL
     * @param string $image
     *            图片
     * @return array
     */
    public function updateFlash($id, $title, $description, $url, $image) {
        if ($this->where(array(
            'id' => $id
        ))->save(array(
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'image' => $image,
            'update_time' => time()
        ))) {
            return array(
                'status' => true,
                'msg' => '编辑成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '编辑失败'
            );
        }
    }

}