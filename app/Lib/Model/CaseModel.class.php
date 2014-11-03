<?php

/**
 * int_case表模型
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class CaseModel extends Model {

    /**
     * 添加案例
     *
     * @param string $name
     *            案例名称
     * @param string $type
     *            项目类型
     * @param int $case_type
     *            案例类型
     * @param string $cooperation
     *            合作方
     * @param string $functions
     *            功能
     * @param string $description
     *            简介
     * @param string $image
     *            简介图片
     * @param string $cover
     *            封面图片
     * @param int $is_selected
     *            是否精选案例（0：否，1：是）
     * @return array
     */
    public function addCase($name, $type, $case_type, $cooperation, $functions, $description, $image, $cover, $is_selected) {
        $now = time();
        if ($this->add(array(
            'name' => $name,
            'type' => $type,
            'case_type' => $case_type,
            'cooperation' => $cooperation,
            'functions' => $functions,
            'description' => $description,
            'image' => $image,
            'cover' => $cover,
            'is_selected' => $is_selected,
            'add_time' => $now,
            'order_time' => $now
        ))) {
            return array(
                'status' => true,
                'msg' => '添加案例成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '添加案例失败'
            );
        }
    }

    /**
     * 删除案例
     *
     * @param array $id
     *            案例ID
     * @return array
     */
    public function deleteCase(array $id) {
        if ($this->where(array(
            'id' => array(
                'in',
                $id
            )
        ))->delete()) {
            return array(
                'status' => true,
                'msg' => '删除案例成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '删除案例失败'
            );
        }
    }

    /**
     * 获取案例数
     *
     * @return int
     */
    public function getCaseCount() {
        return (int) $this->count();
    }

    /**
     * 获取案例列表
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
    public function getCaseList($page, $pageSize, $order, $sort) {
        $offset = ($page - 1) * $pageSize;
        return $this->table($this->getTableName() . " AS c ")->join(array(
            " LEFT JOIN " . M('CaseType')->getTableName() . " AS ct ON ct.id = c.case_type "
        ))->field(array(
            'c.id',
            'c.name',
            'c.type',
            'c.case_type',
            'c.cooperation',
            'c.functions',
            'c.description',
            'c.image',
            'c.cover',
            'c.is_selected',
            'c.add_time',
            'c.order_time',
            'c.update_time',
            'ct.name' => 'title'
        ))->order("c." . $order . " " . $sort)->limit($offset, $pageSize)->select();
    }

    /**
     * 更新案例
     *
     * @param int $id
     *            案例ID
     * @param string $name
     *            案例名称
     * @param string $type
     *            项目类型
     * @param int $case_type
     *            案例类型
     * @param string $cooperation
     *            合作方
     * @param string $functions
     *            功能
     * @param string $description
     *            简介
     * @param string $image
     *            简介图片
     * @param string $cover
     *            封面图片
     * @param int $is_selected
     *            是否精选案例（0：否，1：是）
     * @return array
     */
    public function updateCase($id, $name, $type, $case_type, $cooperation, $functions, $description, $image, $cover, $is_selected) {
        if ($this->where(array(
            'id' => $id
        ))->save(array(
            'name' => $name,
            'type' => $type,
            'case_type' => $case_type,
            'cooperation' => $cooperation,
            'functions' => $functions,
            'description' => $description,
            'image' => $image,
            'cover' => $cover,
            'is_selected' => $is_selected,
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

    /**
     * 更新案例精选状态
     *
     * @param int $id
     *            案例ID
     * @param int $is_selected
     *            是否精选案例（0：否，1：是）
     * @return array
     */
    public function updateCaseSelected($id, $is_selected) {
        if ($this->where(array(
            'id' => $id
        ))->save(array(
            'is_selected' => $is_selected
        ))) {
            return array(
                'status' => true,
                'msg' => '设置成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '设置失败'
            );
        }
    }

    /**
     * 修改排序时间
     *
     * @param int $id
     *            案例ID
     * @param string $order_time
     *            排序时间
     * @return array
     */
    public function updateOrder($id, $order_time) {
        if ($this->where(array(
            'id' => $id
        ))->save(array(
            'order_time' => strtotime($order_time)
        ))) {
            return array(
                'status' => true,
                'msg' => '设置成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '设置失败'
            );
        }
    }

}