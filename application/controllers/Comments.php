<?php
	class Comments extends CI_Controller{

        public function showAllComments(){
            $res = $this->comments_model->showAllComments();
            echo json_encode($res);
        }

        public function addComment(){
            $result = $this->comments_model->addComment();
            $msg['success'] = false;
            $msg['type'] = 'add';
            if($result){
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }

        public function deleteComment(){
            $result = $this->comments_model->deleteComment();
            $msg['success'] = false;
            if($result){
                $msg['success'] = true;
            }
            echo json_encode($msg);
	   }
        //without js
        /*
		public function createCom(){

            $recipe = $this->input->post('recipe');
            $this->form_validation->set_rules('body', 'Comment', 'required');
            $data['comments'] = $this->comments_model->get_comments();
            if($this->form_validation->run() == FALSE){
                $this->load->view('templates/header');
                $this->load->view('pages/'.$recipe, $data);
                $this->load->view('templates/footer');
            }
            else{
                $this->comments_model->create_comment($recipe);
                $this->session->set_flashdata('comment_posted', 'Comment has been posted. ');
                redirect($recipe);
            }

		}

        public function deleteCom($id){
            $recipe = $this->input->post('recipe');
            $this->comments_model->delete_comment($id);

            $this->session->set_flashdata('comment_deleted', 'Your comment has been deleted.');
            redirect($recipe);
        }
        */

	}
