<?php
	require_once "AppController.php";
	require_once "Models/Database.php";

	class LaundryController extends AppController
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function laundry()
		{
			$db = new Database();

			$array = $db->get_laundry_log_inv_limit_3();

			$occupying_users = $db->get_now_occupying_users();

			$id = $_SESSION['user']->getId();


			if(in_array($id, $occupying_users))
			{
				$occupys_laundry = true;
			}
			else
			{
				$occupys_laundry = false;
			}

			$laundrys = $this->free_laundry();

			return $this->render([$array, $laundrys, $occupys_laundry], 'laundry');
		}

		public function free_laundry()
		{
			$db = new Database();
			$array = $db->get_list_of_free_laundry();
			return $array;
		}

		public function book_laundry()
		{
			$db = new Database();

			$array = $db->set_laundry_log($_POST['laundry_nr']);

			$url = "http://$_SERVER[HTTP_HOST]/";
			header("Location: {$url}/DormitoryNotebooks?page=laundry");
		}

		public function cancel_laundry()
		{
			$db = new Database();



		}

	}