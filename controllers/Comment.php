<?php
class Comment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('comment_model');
		$this->load->helper('url');
		
	}
	public function view()
	{
		$data['comments'] = $this->comment_model->get_comments();

		$this->load->view('comment/header', $data);
		$this->load->view('comment/index', $data);
		$this->load->view('comment/footer', $data);

	}
	public function create()// добавление комментария в базу
	{
		$data = array(
			'text' => htmlspecialchars($this->input->post('text'))
			);

		$id = $this->comment_model->add_comment($data); //id добавленной записи в бд
		$data += array('id' => $id); //формируем массив с id и текстом комментария
		echo json_encode($data);

	}
	public function delete()//удаление комментария из базы
	{

		$data = array(
			'id' => $this->input->post('id')
			);

		echo $this->comment_model->delete_comment($data);
	}

}
?>