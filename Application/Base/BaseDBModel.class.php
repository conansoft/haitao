<?php

namespace Base;
use Think\Model;

class BaseDBModel extends Model {

    var $Model;

    function __construct($M) {
        parent::__construct();
        $this->Model = M($M);
    }

    /**
     * 根据主键获取查询内容
     * @param $value  主键值
     * @param $field  查询字段
     * @return 查询结果
     */
    public function dbGet($value, $field = "") {
        $record = $this->Model->field($field)->find($value);
        return $record;
    }

    /**
     * 判断记录是否存在
     * @param $where  查询条件
     * @return boolean
     */
    public function dbIsExists($where) {
        $pk = $this->Model->getPk();
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $arr = $this->Model->where($where)->field($pk)->select();
        return count($arr) > 0 ? True : FALSE;
    }

    /**
     * 根据条件返回最后一条数据
     * @param $where  查询条件
     * @param $field  查询字段
     * @param $order  排序
     * @return 查询结果
     */
    public function dbFind($where, $field = "*", $order = "") {
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->where($where)->field($field)->order($order)->find();
        return $record;
    }

    /**
     * 根据条件查询数据
     * @param $where  查询条件
     * @param $field  查询字段
     * @param $order  排序
     * @return 查询结果
     */
    public function dbSelect($where, $field = "*", $order = "") {
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->where($where)->field($field)->order($order)->select();
        return $record;
    }

    /**
     * 根据条件查询前N条数据
     * @param $where  查询条件
     * @param $limit  查询的记录数
     * @param $field  查询字段
     * @param $order  排序
     * @return 查询结果
     */
    public function dbSelectTop($where, $limit, $field = "", $order = "") {
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->where($where)->field($field)->limit($limit)->order($order)->select();
        return $record;
    }

    /**
     * 根据条件查询数据的唯一值
     * @param $where  查询条件
     * @param $field  查询字段
     * @return 查询结果
     */
    public function dbSelectDistinct($where, $field = "") {
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->distinct(true)->where($where)->field($field)->select();
        return $record;
    }

    /**
     * 使用Join进行多表联结查询
     * @param $join  联结条件
     * @param $where  查询条件
     * @param $field  查询字段
     * @param $order  排序
     * @param $limit  查询记录数
     * @return 查询结果
     */
    public function dbJoin($join, $where = "", $field = "", $order = "", $limit = "") {
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->join($join)->where($where)->field($field)->order($order)->limit($limit)->select();
        return $record;
    }

    /**
     * 分页查询
     * @param $page  当前页
     * @param $perNum  每页数量
     * @param $where  查询条件
     * @param $join  联结条件
     * @param $field  查询字段
     * @param $order  排序
     * @return 分页查询结果
     */
    public function dbPage($page, $perNum, $where, $join = "", $field = "", $order = "") {
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->page($page, $perNum)->where($where)->join($join)->field($field)->order($order)->select();
        return $record;
    }

    /**
     * 新增数据
     * @param $data  数组数据
     * @return 
     */
    public function dbAdd($data) {
        return $this->Model->data($data)->add();
    }

    /**
     * 新增数据
     * @param $addModel  模型对象
     * @return 
     */
    public function dbAddModel($addModel) {
        return $addModel->add();
    }

    /**
     * 修改数据
     * @param $where  查询条件
     * @param $data  要修改的数组数据
     * @return 
     */
    public function dbUpdate($where, $data) {
        $record = $this->Model->where($where)->save($data);
        return $record;
    }

    /**
     * 修改数据
     * @param $updateModel  要修改的对象模型
     * @param $where  查询条件
     * @return 
     */
    public function dbUpdateModel($updateModel, $where) {
        $record = $updateModel->where($where)->save();
        return $record;
    }

    /**
     * 删除数据
     * @param $where  查询条件
     * @return 
     */
    public function dbDelete($where) {
        $record = $this->Model->where($where)->delete();
        return $record;
    }

    /**
     * 根据条件查询记录数
     * @param $where  查询条件
     * @return 
     */
    public function dbCount($where,$Join="") {
        $pk = $this->Model->getPk();
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->where($where)->join($Join)->count($pk);
        return $record;
    }

    /**
     * 根据条件统计最大值
     * @param $where  查询条件
     * @param $field  统计字段
     * @return 
     */
    public function dbMax($where = "", $field = "",$Join="") {
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->where($where)->join($Join)->max($field);
        return $record;
    }

    /**
     * 根据条件统计最小值
     * @param $where  查询条件
     * @param $field  统计字段
     * @return 
     */
    public function dbMin($where = "", $field = "",$Join="") {
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->where($where)->join($Join)->min($field);
        return $record;
    }
    /**
     * 根据条件统计最小值
     * @param $where  查询条件
     * @param $field  统计字段
     * @return 
     */
    public function dbAVG($where = "", $field = "",$Join="") {
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->where($where)->join($Join)->avg($field);
        return $record;
    }
    /**
     * 根据条件求和
     * @param $where  查询条件
     * @param $field  求和字段
     * @return 
     */
    public function dbSum($where = "", $field = "",$Join="") {
        if(!isset($where['is_delete']))
        {
            $where['is_delete']=0;
        }
        $record = $this->Model->where($where)->join($Join)->sum($field);
        return $record;
    }

    /**
     * 自定义查询
     * @param $sql  SQL语句
     * @return 
     */
    public function dbQuery($sql, $where = "") {
        $Model = new Model();
        if (is_array($where) && count($where) > 0) {
            return $Model->query($sql, $where);
        } else {
            return $Model->query($sql);
        }
    }

    /**
     * 自定义执行sql
     * @param $sql  SQL语句
     * @return 
     */
    public function dbExecute($sql, $where = "") {
        $Model = new Model();
        if (is_array($where) && count($where) > 0) {
            if(!isset($where['is_delete']))
            {
                $where['is_delete']=0;
            }
            return $Model->execute($sql, $where);
        } else {
            return $Model->execute($sql);
        }
    }

    /**
     * 事务
     * @param 
     * @return 
     */
}

?>
