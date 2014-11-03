<?php

/**
 * int_case_type表模型
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class CaseTypeModel extends Model {

    /**
     * 添加案例分类
     *
     * @param string $name
     *            案例分类名称
     * @return array
     */
    public function addCaseType($name) {
        if ($this->add(array(
            'name' => $name,
            'add_time' => time()
        ))) {
            return array(
                'status' => true,
                'msg' => '添加案例分类成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '添加案例分类失败'
            );
        }
    }

    /**
     * 删除案例分类
     *
     * @param array $id
     *            案例ID
     * @return array
     */
    public function deleteCaseType(array $id) {
        if ($this->where(array(
            'id' => array(
                'in',
                $id
            )
        ))->delete()) {
            return array(
                'status' => true,
                'msg' => '删除案例分类成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '删除案例分类失败'
            );
        }
    }

    /**
     * 获取案例分类数
     *
     * @return int
     */
    public function getCaseTypeCount() {
        return (int) $this->count();
    }

    /**
     * 获取案例分类列表
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
    public function getCaseTypeList($page, $pageSize, $order, $sort) {
        $offset = ($page - 1) * $pageSize;
        return $this->table($this->getTableName() . " AS ct ")->field(array(
            'ct.id',
            'ct.name',
            'ct.add_time',
            'ct.update_time',
            "(SELECT COUNT(1) FROM " . M('Case')->getTableName() . " WHERE case_type = ct.id)" => 'case_amount'
        ))->order($order . " " . $sort)->limit($offset, $pageSize)->select();
    }

    /**
     * 编辑案例分类
     *
     * @param int $id
     *            案例分类ID
     * @param string $name
     *            案例分类名称
     * @return array
     */
    public function updateCaseType($id, $name) {
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