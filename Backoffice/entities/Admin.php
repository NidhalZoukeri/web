<?php

	class Admin
	{
		private $Login;
		private $Password;

		function __construct($Login,$Password)
		{
			$this->Login=$Login;
			$this->Password=$Password;
		}


		function Get_Login()
		{
			return $this->Login;
		}


		function Get_Password()
		{
			return $this->Password;
		}

		function Set_Login($Login)
		{
			$this->Login=$Login;
		}

		function Set_Password($Password)
		{
			$this->Password=$Password;
		}
	}

?>