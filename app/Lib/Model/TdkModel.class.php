<?php

/**
 * int_tdk表模型
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class TdkModel extends Model {

    /**
     * 添加TDK
     *
     * @param int $page
     *            页面
     * @param string $title
     *            标题
     * @param string $description
     *            描述
     * @param string $keywords
     *            关键词
     * @return array
     */
    public function addTdk($page, $title, $description, $keywords) {
        if ($this->where(array(
            'page' => $page
        ))->count()) {
            return array(
                'status' => false,
                'msg' => '页面已经存在'
            );
        }
        if ($this->add(array(
            'page' => $page,
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
            'add_time' => time()
        ))) {
            return array(
                'status' => true,
                'msg' => '添加TDK成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '添加TDK失败'
            );
        }
    }

    /**
     * 删除TDK
     *
     * @param array $id
     *            TDK ID
     * @return array
     */
    public function deleteTdk(array $id) {
        if ($this->where(array(
            'id' => array(
                'in',
                $id
            )
        ))->delete()) {
            return array(
                'status' => true,
                'msg' => '删除TDK'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '删除TDK'
            );
        }
    }

    /**
     * 获取TDK数量
     *
     * @return int
     */
    public function getTdkCount() {
        return (int) $this->count();
    }

    /**
     * 获取TDK列表
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
    public function getTdkList($page, $pageSize, $order, $sort) {
        $offset = ($page - 1) * $pageSize;
        return $this->order($order . " " . $sort)->limit($offset, $pageSize)->select();
    }

    /**
     * 更新TDK
     *
     * @param int $id
     *            TDK ID
     * @param int $page
     *            页面
     * @param string $title
     *            标题
     * @param string $description
     *            描述
     * @param string $keywords
     *            关键词
     * @return array
     */
    public function updateTdk($id, $page, $title, $description, $keywords) {
        if ($this->where(array(
            'page' => $page,
            'id' => array(
                'neq',
                $id
            )
        ))->count()) {
            return array(
                'status' => false,
                'msg' => '页面已经存在'
            );
        }
        if ($this->where(array(
            'id' => $id
        ))->save(array(
            'page' => $page,
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
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