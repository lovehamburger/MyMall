<?php
	class DB
	{
		//添加PDO对象
		private $_pdo = null;
		static private $instance = null;//设置静态变量保存数据
		//设置静态方法供客户端调用
		static protected function getInstance(){
			if(!(self::$instance instanceof self)){
				self::$instance = new self();
			}
				return self::$instance;
		}

		//私有克隆
		private function __clone (){}

		private function __construct()
		{
			try {
				$this->_pdo = new PDO(DB_DNS,DB_USER,DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES '.DB_CHARSET));
				$this->_pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				exit('数据库链接失败!').'失败原因:'.$e->getMessage();
			}
		}

		//数据的增加
		protected function addData($_tables,$_addData){
			foreach ($_addData as $key => $value) {
				$_addFields[] = $key;
				$_addValues[] = $value;
			}
			$_addFields = implode(',',$_addFields);
			$_addValues = implode("','",$_addValues);
			$_sql = "INSERT INTO $_tables[0] ($_addFields) VALUES ('$_addValues')";
			return $this->execute($_sql)->rowCount();
		}

		//判断数据是否已经被占用
		protected function isOneData($_tables,Array $_param){
			$_isAnd = '';
			foreach ($_param as $key => $value) {
				$_isAnd .= "$value AND ";
			}
			$_isAnd = substr($_isAnd, 0, -4);
			$_sql = "SELECT id FROM $_tables[0] where $_isAnd LIMIT 1";
			return $this->execute($_sql)->rowCount();
		}

		//查询数据
		protected function selectData($_tables,Array $_fields,Array $_param){
			$_limit = $_order = $_where = $_table = $_like = '';
			if(!empty($_param)){
				$_limit = !empty($_param['limit']) ? 'LIMIT '. $_param['limit'] : '';
				$_order = !empty($_param['order']) ?  'ORDER BY '.$_param['order'] : '';
				$_where = !empty($_param['where']) ? 	$_param['where'] : '';
				if(!empty($_where) && is_array($_where)){
					$_isAnd = '';
					foreach ($_where as $key => $value) {
						$_isAnd .= "$value AND ";
					}
					$_where = 'WHERE '.substr($_isAnd, 0, -4);
				}
				if(!empty($_param['like'])){
					foreach ($_param['like'] as $key => $value) {
						$_like .= "$key like '%$value%' AND ";
					}
					$_like = 'WHERE '.substr($_like, 0, -4);
				}
			}
			if($_fields['0'] == '*'){
				$_fields = '*';
			}else{
				$_fields = implode(',',$_fields);
			}
			/*if(!empty($_tables[1])){
				$_tables= $_tables[0].','.$_tables[1];
			}else{
				$_tables= $_tables[0];
			}*/
			//多表关联
			if(count($_tables) > 1){
				foreach ($_tables as $key => $value) {
					 $_table.= $_tables[$key].',';
				} 
				$_tables = substr($_table, 0, -1);
			}else{
				$_tables= $_tables[0];
			}
			$_sql = "SELECT $_fields FROM $_tables $_where $_like $_order $_limit";
			$_statementObj = $this->execute($_sql);
			$_result = $_statementObj->fetchAll(PDO::FETCH_ASSOC);
			return Tool::setHtmlString($_result);
		}

		//更新数据
		protected function updateData($_tables,Array $_updataData,Array $_param){
			$_where = $_setData = '';
			if(!empty($_param)){
				$_where = isset($_param['where']) ? $_param['where'] : '';
				if(!empty($_where)){
					$_isAnd = '';
					foreach ($_where as $key => $value) {
						$_isAnd .= "$value AND ";
					}
					$_where = 'WHERE '.substr($_isAnd, 0, -4);
				}
			}
			foreach ($_updataData as $_key=>$_value) {
				if (is_array($_value)) {
					$_setData .= "$_key=$_value[0],";
				} else {
					$_setData .= "$_key='$_value',";
				}
			}
			$_setData = substr($_setData, 0, -1);
			$_sql = "UPDATE $_tables[0] SET $_setData $_where";
			$_statementObj = $this->execute($_sql);
			return $_statementObj->rowCount();
		}

		//删除数据
		protected function deleteData($_tables,Array $_param){
			$_where = $_limit = '';
			if(!empty($_param)){
				foreach ($_param as $key => $value) {
					$_where.="$value AND " ;
				}
				$_where ='WHERE '.substr($_where, 0, -4);
				$_limit = 'LIMIT 1';
			}
			$_sql = "DELETE FROM $_tables[0] $_where $_limit";
			$_statementObj = $this->execute($_sql);
			return $_statementObj->rowCount();
		}

		//获取数据条数
		protected function totalData($_tables,Array $_param){
			$_where = '';
				if (isset($_param['where'])) {
					foreach ($_param['where'] as $_key=>$_value) {
						$_where .= "$_value AND ";
					}
					$_where = 'WHERE '.substr($_where, 0, -4);
				}
			$_sql = "SELECT COUNT(*) as count FROM $_tables[0] $_where";
			$_statementObj = $this->execute($_sql);
			$_result = $_statementObj->fetch(PDO::FETCH_ASSOC);
			return $_result['count'];
		}

		//获取表信息，并返回Auto_increment  下一个id值
		protected function tableInfoData($_tables){
			$_sql = "show table status like '$_tables[0]' ";
			$_statementObj = $this->execute($_sql);
			$_result = $_statementObj->fetch(PDO::FETCH_ASSOC);
			return $_result['Auto_increment'];
		}
		//获取最后添加的一条数据
		protected function lastID(){
			return $this->_pdo->lastInsertId();
		}


		//执行并返回受影响函数的方法
		private function execute($_sql){
			try{
				$_statementObj = $this->_pdo->prepare($_sql);
				$_statementObj->execute();
			}catch(PDOException $e){
				exit("SQL语句:".$_sql."  出现错误"."<br/>"."错误信息:".$e->getMessage());
			}
			return $_statementObj;
		}
	}

		
?>