<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

	public function index()
	{
		$data['_view'] = 'admin/dashboard';
		$this->load->view('admin/layout', $data);
	}

	public function ref_agama()
	{
		$this->load->model('M_agama');

		if ($this->uri->segment(3) == "") {
			$data['linkform'] = "administrator/ref_agama/add";
			$data['agama'] = $this->M_agama->get_all();
		} else if ($this->uri->segment(3) == "add") {
			$data = array(
				'agama'  => $this->input->post('agama'),
			);

			$this->M_agama->add($data);

			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_agama');
		} else if ($this->uri->segment(3) == "edit") {
			$id = $this->input->post('idagama');
			$data = array(
				'agama'  => $this->input->post('agama')
			);
			$this->M_agama->edit($data, $id);
			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_agama');
		} else if ($this->uri->segment(3) == "delete") {
			$id = $this->input->post('idagama');
			$this->M_agama->delete($id);
			redirect('administrator/ref_agama');
		}

		$data['_view'] = 'admin/ref_agama';
		$this->load->view('admin/layout', $data);
	}

	public function ref_statusmenikah()
	{
		$this->load->model('M_statusmenikah');

		if ($this->uri->segment(3) == "") {
			$data['linkform'] = "administrator/ref_statusmenikah/add";
			$data['statusmenikah'] = $this->M_statusmenikah->get_all();
		} else if ($this->uri->segment(3) == "add") {
			$data = array(
				'status'  => $this->input->post('statusmenikah'),
			);

			$this->M_statusmenikah->add($data);

			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_statusmenikah');
		} else if ($this->uri->segment(3) == "edit") {
			$id = $this->input->post('idstatusmenikah');
			$data = array(
				'status'  => $this->input->post('statusmenikah')
			);
			$this->M_statusmenikah->edit($data, $id);
			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_statusmenikah');
		} else if ($this->uri->segment(3) == "delete") {
			$id = $this->input->post('idstatusmenikah');
			$this->M_statusmenikah->delete($id);
			redirect('administrator/ref_statusmenikah');
		}

		$data['_view'] = 'admin/ref_statusmenikah';
		$this->load->view('admin/layout', $data);
	}


	public function ref_jenissmta()
	{
		$this->load->model('M_jenissmta');

		if ($this->uri->segment(3) == "") {
			$data['linkform'] = "administrator/ref_jenissmta/add";
			$data['jenissmta'] = $this->M_jenissmta->get_all();
		} else if ($this->uri->segment(3) == "add") {
			$data = array(
				'namajenissmta'  => $this->input->post('jenissmta'),
			);

			$this->M_jenissmta->add($data);

			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_jenissmta');
		} else if ($this->uri->segment(3) == "edit") {
			$id = $this->input->post('idjenissmta');
			$data = array(
				'namajenissmta'  => $this->input->post('jenissmta')
			);
			$this->M_jenissmta->edit($data, $id);
			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_jenissmta');
		} else if ($this->uri->segment(3) == "delete") {
			$id = $this->input->post('idjenissmta');
			$this->M_jenissmta->delete($id);
			redirect('administrator/ref_jenissmta');
		}

		$data['_view'] = 'admin/ref_jenissmta';
		$this->load->view('admin/layout', $data);
	}

	public function ref_jurusansmta()
	{
		$this->load->model('M_jurusansmta');

		if ($this->uri->segment(3) == "") {
			$data['linkform'] = "administrator/ref_jurusansmta/add";
			$data['jurusansmta'] = $this->M_jurusansmta->get_all();
		} else if ($this->uri->segment(3) == "add") {
			$data = array(
				'namajurusan'  => $this->input->post('jurusansmta'),
			);

			$this->M_jurusansmta->add($data);

			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_jurusansmta');
		} else if ($this->uri->segment(3) == "edit") {
			$id = $this->input->post('idjurusansmta');
			$data = array(
				'namajurusan'  => $this->input->post('jurusansmta')
			);
			$this->M_jurusansmta->edit($data, $id);
			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_jurusansmta');
		} else if ($this->uri->segment(3) == "delete") {
			$id = $this->input->post('idjurusansmta');
			$this->M_jurusansmta->delete($id);
			redirect('administrator/ref_jurusansmta');
		}

		$data['_view'] = 'admin/ref_jurusansmta';
		$this->load->view('admin/layout', $data);
	}

	public function ref_pekerjaanortu()
	{
		$this->load->model('M_pekerjaanortu');

		if ($this->uri->segment(3) == "") {
			$data['linkform'] = "administrator/ref_pekerjaanortu/add";
			$data['pekerjaanortu'] = $this->M_pekerjaanortu->get_all();
		} else if ($this->uri->segment(3) == "add") {
			$data = array(
				'namapekerjaan'  => $this->input->post('pekerjaanortu'),
			);

			$this->M_pekerjaanortu->add($data);

			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_pekerjaanortu');
		} else if ($this->uri->segment(3) == "edit") {
			$id = $this->input->post('idpekerjaan');
			$data = array(
				'namapekerjaan'  => $this->input->post('pekerjaanortu')
			);
			$this->M_pekerjaanortu->edit($data, $id);
			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_pekerjaanortu');
		} else if ($this->uri->segment(3) == "delete") {
			$id = $this->input->post('idpekerjaan');
			$this->M_pekerjaanortu->delete($id);
			redirect('administrator/ref_pekerjaanortu');
		}

		$data['_view'] = 'admin/ref_pekerjaanortu';
		$this->load->view('admin/layout', $data);
	}

	public function ref_pendidikanortu()
	{
		$this->load->model('M_pendidikanortu');

		if ($this->uri->segment(3) == "") {
			$data['linkform'] = "administrator/ref_pendidikanortu/add";
			$data['pendidikanortu'] = $this->M_pendidikanortu->get_all();
		} else if ($this->uri->segment(3) == "add") {
			$data = array(
				'namajenjang'  => $this->input->post('pendidikanortu'),
			);

			$this->M_pendidikanortu->add($data);

			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_pendidikanortu');
		} else if ($this->uri->segment(3) == "edit") {
			$id = $this->input->post('idpendidikan');
			$data = array(
				'namajenjang'  => $this->input->post('pendidikanortu')
			);
			$this->M_pendidikanortu->edit($data, $id);
			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_pendidikanortu');
		} else if ($this->uri->segment(3) == "delete") {
			$id = $this->input->post('idpendidikan');
			$this->M_pendidikanortu->delete($id);
			redirect('administrator/ref_pendidikanortu');
		}

		$data['_view'] = 'admin/ref_pendidikanortu';
		$this->load->view('admin/layout', $data);
	}

	public function ref_penghasilanortu()
	{
		$this->load->model('M_penghasilanortu');

		if ($this->uri->segment(3) == "") {
			$data['linkform'] = "administrator/ref_penghasilanortu/add";
			$data['penghasilanortu'] = $this->M_penghasilanortu->get_all();
		} else if ($this->uri->segment(3) == "add") {
			$data = array(
				'penghasilan'  => $this->input->post('penghasilanortu'),
			);

			$this->M_penghasilanortu->add($data);

			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_penghasilanortu');
		} else if ($this->uri->segment(3) == "edit") {
			$id = $this->input->post('idpenghasilan');
			$data = array(
				'penghasilan'  => $this->input->post('penghasilanortu')
			);
			$this->M_penghasilanortu->edit($data, $id);
			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('administrator/ref_penghasilanortu');
		} else if ($this->uri->segment(3) == "delete") {
			$id = $this->input->post('idpenghasilan');
			$this->M_penghasilanortu->delete($id);
			redirect('administrator/ref_penghasilanortu');
		}

		$data['_view'] = 'admin/ref_penghasilanortu';
		$this->load->view('admin/layout', $data);
	}
}
