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

			$laundrys = $this->free_laundry();

			return $this->render([$array, $laundrys], 'laundry');
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
			$array = $db->set_laundry_log();

			$sql = "INSERT INTO Laundries_logs (date, start_time_occupancy, end_time_occupancy, id_laundry, id_occupying_user)
					VALUES (CURDATE(), CURRENT_TIME(), CURRENT_TIME()+TIME('02:00:00'), 6, 14)";
		}

	}