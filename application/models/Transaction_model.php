<?php
class Transaction_model extends MY_Model{
    public $table ='giaodich';
    public function __construct()
    {
        parent::__construct();
    }
    public function get_new_transaction(){
        $this->db->order_by('NGAY_GIAODICH','DESC');
        $this->db->limit(1,0);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}