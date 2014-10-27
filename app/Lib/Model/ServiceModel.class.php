<?php

/**
 * int_service表模型
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class ServiceModel extends Model {

    /**
     * 添加服务类型
     *
     * @param string $title
     *            服务类型标题
     * @param string $description
     *            服务类型简介
     * @param string $introduction
     *            首页介绍
     * @param string $image
     *            服务类型图标
     * @param string $icon
     *            首页ICON
     * @return array
     */
    public function addService($title, $description, $introduction, $image, $icon) {
        if ($this->add(array(
            'title' => $title,
            'description' => $description,
            'introduction' => $introduction,
            'image' => $image,
            'icon' => $icon,
            'add_time' => time()
        ))) {
            return array(
                'status' => true,
                'msg' => '添加服务类型成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '添加服务类型失败'
            );
        }
    }

    /**
     * 删除服务类型
     *
     * @param array $id
     *            服务类型ID
     * @return array
     */
    public function deleteService(array $id) {
        if ($this->where(array(
            'id' => array(
                'in',
                $id
            )
        ))->delete()) {
            return array(
                'status' => true,
                'msg' => '删除服务类型成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '删除服务类型失败'
            );
        }
    }

    /**
     * 获取服务类型数
     *
     * @return int
     */
    public function getServiceCount() {
        return (int) $this->count();
    }

    /**
     * 获取客服列表
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
    public function getServiceList($page, $pageSize, $order, $sort) {
        $offset = ($page - 1) * $pageSize;
        return $this->order($order . " " . $sort)->limit($offset, $pageSize)->select();
    }

    /**
     * 更新服务类型
     *
     * @param int $id
     *            服务类型ID
     * @param string $title
     *            标题
     * @param string $description
     *            简介
     * @param string $introduction
     *            首页介绍
     * @param string $image
     *            图标
     * @param string $icon
     *            首页ICON
     * @return array
     */
    public function updateService($id, $title, $description, $introduction, $image, $icon) {
        if ($this->where(array(
            'id' => $id
        ))->save(array(
            'title' => $title,
            'description' => $description,
            'introduction' => $introduction,
            'image' => $image,
            'icon' => $icon,
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