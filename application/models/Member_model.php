<?php
class Member_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function members_count_get()
    {
        $sql = "
            SELECT
                COUNT(*) AS cnt
            FROM
                TB_MEMBER
        ";

        $query_result = $this->db->query($sql)->row();
        return $query_result;
    }

    function members_get($data, $limit, $offset)
    {
        $sql = "
            SELECT
                *
            FROM
                TB_MEMBER
            WHERE
                1=1
        ";

        if (isset($data['member_idx']) && !empty($data['member_idx'])) {
            $sql.="
                AND member_idx = '".$data['member_idx']."'
            ";
        }

        if (isset($offset)) {
            $sql.="
                LIMIT ".$offset.", ".$limit.";
            ";
        }

        $query_result = $this->db->query($sql)->result_array();
        return $query_result;
    }

    function members_post($data, $id)
    {
        $this->db->where('member_idx', $id);
        $this->db->update('TB_MEMBER', $data);
        $query_result =  $this->db->affected_rows();
        return $query_result;
    }

    function members_put($data, $id)
    {
        $this->db->insert('TB_MEMBER', $data);
        $query_result =  $this->db->insert_id();
        return $query_result;
    }

    function members_delete($id)
    {
        $this->db->where('member_idx', $id);
        $this->db->delete('TB_MEMBER');
        $query_result =  $this->db->affected_rows();
        return $query_result;
    }


}