<?php
	/**
	 * 数据库连接单例类
	 */
	class Singleton {

		private $db_conn; //数据库连接

		private static $instance; //定义实例属性变量

		private function __construct($host, $username, $password, $database) {
			$this->db_conn = new mysqli($host, $username, $password, $database);
			if (!$this->db_conn) {
				die('数据库连接失败' . $this->db_conn->connect_error);
			}
		}

		/**
		 * 获取实例
		 * @param  [type] $host     [数据库地址]
		 * @param  [type] $username [数据库账号]
		 * @param  [type] $password [数据库密码]
		 * @param  [type] $database [数据库名]
		 * @return [type]           [实例]
		 */
		public static function getInstance($host, $username, $password,$database) {
			if (empty(self::$instance)) {
				self::$instance = new Singleton($host, $username, $password,$database);
			}

			return self::$instance;
		}

		/**
		 * 定义私有__clone方法,防止被克隆
		 * @return [type] [description]
		 */
		private function __clone() {}

		/**
		 * 数据库查询
		 * @param  [type] $sql [sql查询语句]
		 * @return [type]      [description]
		 */
		public function query($sql)
		{
			return $this->db_conn->query($sql);
		}

		/**
		 * 关闭数据库连接
		 * @return [type] [description]
		 */
		public function close()
		{
			return $this->db_conn->close();
		}
	}