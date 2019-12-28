<?php

class adm_export extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('form_validation');
	}
	public function exp_excel()
	{
		echo '
        <html>
		<head>
			<title>Export Data List Admin ke Excel</title>
		</head>
		<body>
			<style type="text/css">
			body{
				font-family: sans-serif;
			}
			table{
				margin: 20px auto;
				border-collapse: collapse;
			}
			table th,
			table td{
				border: 1px solid #3c3c3c;
				padding: 3px 8px;
		
			}
			a{
				background: blue;
				color: #fff;
				padding: 8px 10px;
				text-decoration: none;
				border-radius: 2px;
			}
			</style>
		';
		$data = [
			'admins' => $this->admin_model->getAllAdmins()
		];
		$filename = "Data_Admin_TravelingEropa.xls";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");

		echo '
		<center>
		<h1>List Data Admin Traveling Eropa <br/></h1>
		</center>
		
		Ket role :<br>
		adm = Admin<br>
		spadm = Super Admin<br>
		<table id="tab1" class="table table-bordered">
			<thead>
				<tr bgcolor="#417ee0">
					<th>Nama</th>
                    <th>Email</th>
                    <th>No. Tlp</th>
                    <th>Alamat</th>
                    <th>Role</th>
                    <th>Password</th>>
				</tr>
			</thead>
			<tbody>
		';
		foreach ($data['admins'] as $record) {
			echo '
			<tr>
				<td>' . $record['nama'] . '</td>
				<td>' . $record['email'] . '</td>
				<td>' . $record['notlp'] . '</td>
				<td>' . $record['alamat'] . '</td>
				<td>' . $record['role'] . '</td>
				<td>
					Encrypted
				</td>
			</tr>';
		}
		echo '
			</tbody>
			<tfoot>
				<tr bgcolor="#417ee0">
					<th>Nama</th>
					<th>Email</th>
					<th>No. Tlp</th>
					<th>Alamat</th>
					<th>Role</th>
					<th>Password</th>>
				</tr>
			</tfoot>
		</table>
		</body>
		</html>';
		exit();
	}
}
