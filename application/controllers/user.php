<?php
	class user extends CI_Controller{
	
		public function index(){
			$data['daftaruser'] = $this->m_user->tampil_data()->result();
			$this->load->view('v_user',$data);
		}
					
			//user
			public function v_user(){
				$this->load->model('m_user');
				$user = new m_user();
				$data["daftaruser"] = $user->tabelUser();
				$this->load->view('v_user',$data);
			}
			
			public function delete($id_user){
				$this->load->model('m_user');
				$where = array('id_user' => $id_user);
				$this->m_user->deleteData($where,'user');
				$user = new m_user();
				$data["daftaruser"] = $user->tabelUser();
				$this->load->view('v_user',$data);
			}
			
			Public function edit($id_user){
				$this->load->model('m_user');
				$where = array('id_user' => $id_user);
				$data['user'] = $this->m_user->editData($where,'user')->result();
				$this->load->view('v_useredit',$data);
			}
			
			Public Function update(){
				$this->load->model('m_user');
				$id_user = $this->input->post('id_user');
				$nip = $this->input->post('nip');
				$nama = $this->input->post('nama');
				$jk = $this->input->post('jk');
				$jabatan = $this->input->post('jabatan');
				$telp = $this->input->post('telp');
				$username = $this->input->post('username');
				$password = $this->input->post('password');

			 
				$data = array(
					'nip' => $nip,
					'nama' => $nama,
					'jk' => $jk,
					'jabatan' => $jabatan,
					'telp' => $telp,
					'username' => $username,
					'password' => $password

				);
			 
				$where = array(
					'id_user' => $id_user
				);
			 
				$this->m_user->updateData($where,$data,'user');
				redirect('user/v_user');
			}
			

			
			public function userentry(){
				$this->load->view('v_userentry');
			}
		
			public function userentry_action(){
				$nip = $this->input->post('nip');
				$nama = $this->input->post('nama');
				$jk = $this->input->post('jk');
				$jabatan = $this->input->post('jabatan');
				$telp = $this->input->post('telp');
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$data = array(
					'nip' => $nip,
					'nama' => $nama,
					'jk' => $jk,
					'jabatan' => $jabatan,
					'telp' => $telp,
					'username' => $username,
					'password' => $password,
					);
				$this->m_user->entryData($data,'user');
				redirect('user/v_user');
			}
	}
?>