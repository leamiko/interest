<?php

/**
 * int_news_category表模型
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class NewsCategoryModel extends Model {

    /**
     * 添加分类
     *
     * @param string $name
     *            分类名称
     * @return array
     */
    public function addCategory($name) {
        if ($this->add(array(
            'name' => $name,
            'add_time' => time()
        ))) {
            return array(
                'status' => true,
                'msg' => '添加分类成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '添加分类失败'
            );
        }
    }

    /**
     * 删除分类
     *
     * @param array $id
     *            分类ID
     * @return array
     */
    public function deleteCategory(array $id) {
        if ($this->where(array(
            'id' => array(
                'in',
                $id
            )
        ))->delete()) {
            return array(
                'status' => true,
                'msg' => '删除分类成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '删除分类失败'
            );
        }
    }

    /**
     * 获取分类数
     *
     * @return int
     */
    public function getCategoryCount() {
        return (int) $this->count();
    }

    /**
     * 获取分类列表
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
    public function getCategoryList($page, $pageSize, $order, $sort) {
        $offset = ($page - 1) * $pageSize;
        return $this->table($this->getTableName() . " AS c ")->field(array(
            'id',
            'name',
            'add_time',
            'update_time',
            "(SELECT COUNT(1) FROM " . M('News')->getTableName() . " WHERE category_id = c.id)" => 'news_count'
        ))->order($order . " " . $sort)->limit($offset, $pageSize)->select();
    }

    /**
     * 更新分类
     *
     * @param int $id
     *            分类ID
     * @param string $name
     *            分类名
     * @return array
     */
    public function updateCategory($id, $name) {
        if ($this->where(array(
            'id' => $id
        ))->save(array(
            'name' => $name,
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