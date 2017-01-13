<?php
	class User {
		public $id;
		public $name;
		public $password;
		public $email;
		public $contactNum;
		public $role;

		private $db;

		function __construct($id = null, $name = null, $password = null, $email=null, $contactNum = null,$role=null) {
			
			$this->id = $id;
			$this->name = $name;
			$this->password = $password;
			$this->email = $email;
			$this->contactNum = $contactNum;
			$this->role = $role;

			$this->db = new DB();
		}
		public function create() {
			return $this->db->run("INSERT INTO users (name, password, id) VALUES (?,?,?)", array($this->name, $this->password, $this->id));
		}
		public function update() {
			return $this->db->run("UPDATE users SET password = ? WHERE name = ? AND id = ?", array($this->password, $this->name, $this->id));
		}
		public function delete() {
			return $this->db->run("DELETE FROM users WHERE name = ? AND id = ?", array($this->id));
		}
		public static function getById($id) {
			$db = new DB();
			$db->run("SELECT * FROM users WHERE id = ?", array($id));
			
			$user = new User;
			foreach ($db->result()[0] as $attr => $value) {
				$user->$attr = $value;
			}
			return $user;
		}
		public static function getByname($name) {
			$db = new DB();
			$db->run("SELECT * FROM users WHERE name = ?", array($name));
			
			$user = new User;
			foreach ($db->result()[0] as $attr => $value) {
				$user->$attr = $value;
			}
			return $user;
		}
		public static function exist($name) {
			$db = new DB();
			$db->run("SELECT count('x') AS count FROM users WHERE name = ?", array($name));
			return $db->result()[0]['count'] > 0;
		}
	}