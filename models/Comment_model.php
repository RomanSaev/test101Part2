<?php
class Comment_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function get_comments()
	{		
		$query = $this->db->get('comment');
		return $query->result_array();

	}
	public function add_comment($data)
	{
		$this->db->insert('comment', $data);
		return $this->db->insert_id();//id последней добавленной записи в бд
	}
	public function delete_comment()
	{
		$data = array(
			'id' => $this->input->post('id'),
		);

		return $this->db->delete('comment', $data);
	}
}
?>
