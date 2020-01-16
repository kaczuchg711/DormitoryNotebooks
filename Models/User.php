<?php
	require_once 'config.php';

	class User
	{
		private $login;
		private $email;
		private $password;
		private $name;
		private $surname;
		private $flat_nr;
		private $type;

		public function __construct($login, $email, $password, $name, $surname, $flat_nr, $type)
		{
			$this->login = $login;
			$this->email = $email;
			$this->password = $password;
			$this->name = $name;
			$this->surname = $surname;
			$this->flat_nr = $flat_nr;
			$this->type = $type;
		}

		public function getLogin()
		{
			return $this->login;
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function getPassword()
		{
			return $this->password;
		}

		public function getName()
		{
			return $this->name;
		}

		public function getSurname()
		{
			return $this->surname;
		}

		public function getFlatNr()
		{
			return $this->flat_nr;
		}

		public function getType()
		{
			return $this->type;
		}
	}

	$u = User::user_from_sql();

?>
