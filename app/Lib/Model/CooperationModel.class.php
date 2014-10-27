<?php

/**
 * int_cooperation表模型
 *
 * @author Zonkee
 * @version 1.0.0
 * @since 1.0.0
 */
class CooperationModel extends Model {

    /**
     * 自动完成
     *
     * @var unknown
     */
    protected $_auto = array(
        array(
            'email',
            'getEmail',
            1,
            'callback'
        ),
        array(
            'address',
            'getAddress',
            1,
            'callback'
        ),
        array(
            'content',
            'getContent',
            1,
            'callback'
        ),
        array(
            'add_time',
            'time',
            1,
            'function'
        )
    );

    /**
     * 自动验证
     *
     * @var unknown
     */
    protected $_validate = array(
        array(
            'contact',
            'require',
            '请输入联系人'
        ),
        array(
            'contact',
            'checkLength',
            '请输入正确的联系人',
            0,
            'callback'
        ),
        array(
            'phone',
            'require',
            '请填写您的电话以便我们联系到您'
        ),
        array(
            'phone',
            'isPhone',
            '不是正确的联系电话',
            0,
            'callback'
        ),
        array(
            'email',
            'email',
            '邮箱格式不正确',
            2
        ),
        array(
            'service',
            'checkService',
            '请选择合作业务',
            0,
            'callback'
        )
    );

    /**
     * 删除合作申请
     *
     * @param array $id
     *            合作申请ID
     * @return array
     */
    public function deleteCooperation(array $id) {
        if ($this->where(array(
            'id' => array(
                'in',
                $id
            )
        ))->delete()) {
            return array(
                'status' => true,
                'msg' => '删除合作申请成功'
            );
        } else {
            return array(
                'status' => false,
                'msg' => '删除合作申请失败'
            );
        }
    }

    /**
     * 获取申请合作数
     *
     * @return int
     */
    public function getCooperationCount() {
        return (int) $this->count();
    }

    /**
     * 获取申请合作列表
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
    public function getCooperationList($page, $pageSize, $order, $sort) {
        $offset = ($page - 1) * $pageSize;
        return $this->table($this->getTableName() . " AS c ")->join(array(
            " LEFT JOIN " . M('Service')->getTableName() . " AS s ON c.service = s.id "
        ))->field(array(
            'c.id',
            'c.contact',
            'c.phone',
            'c.email',
            'c.address',
            'c.service',
            'c.content',
            'c.add_time',
            's.title'
        ))->order($order . " " . $sort)->limit($offset, $pageSize)->select();
    }

    /**
     * 名字长度自动验证回调
     *
     * @param string $data
     *            名字字符串
     * @return boolean
     */
    protected function checkLength($data) {
        if (mb_strlen($data, "utf-8") >= 2 && mb_strlen($data, "utf-8") <= 8) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 合作业务自动验证回掉
     *
     * @param int $data
     *            合作业务
     * @return boolean
     */
    protected function checkService($data) {
        return ($data != 0);
    }

    /**
     * 自动完成获取公司地址
     *
     * @return Ambigous <NULL, string>
     */
    protected function getAddress() {
        $address = isset($_POST['address']) ? trim($_POST['address']) : '';
        return empty($address) ? null : $address;
    }

    /**
     * 自动完成获取合作内容
     *
     * @return Ambigous <NULL, string>
     */
    protected function getContent() {
        $content = isset($_POST['content']) ? trim($_POST['content']) : '';
        return empty($content) ? null : $content;
    }

    /**
     * 自动完成获取邮箱
     *
     * @return Ambigous <NULL, string>
     */
    protected function getEmail() {
        $data = trim($_POST['email']);
        return empty($data) ? null : $data;
    }

    /**
     * 号码自动验证回调
     *
     * @param string $data
     *            要判断的字符串
     * @return boolean
     */
    protected function isPhone($data) {
        if (preg_match("/^\+?\d+\-?\d+$/", $data)) {
            return true;
        } else {
            return false;
        }
    }

}