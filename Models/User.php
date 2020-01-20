<?php
	require_once 'config.php';

	class User
	{
		private $id;
		private $login;
		private $email;
		private $password;
		private $name;
		private $surname;
		private $flat_nr;
		private $type;

		public function __construct($id, $login, $email, $password, $name, $surname, $flat_nr, $type)
		{
			$this->id = $id;
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


		public function getId()
		{
			return $this->id;
		}

		public function __toString()
		{
			return
				$this->id.
				$this->login .
				$this->email .
				$this->password .
				$this->name .
				$this->surname .
				$this->flat_nr .
				$this->type;
		}

	}

