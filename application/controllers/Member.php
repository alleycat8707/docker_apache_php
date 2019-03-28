<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Member extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
    }

    //회원조회
    public function members_get()
    {
        $id = $this->uri->segment(3);
        $page = ($this->get('page')) ? $this->get('page') : 1;
        $limit = ($this->get('limit')) ? $this->get('limit') : 5;
        $offset =  ($page - 1)*$limit;

        $data = array( );
        $data['member_idx'] = $id;

        // 모델 생성부분
        $members_cnt = $this->member_model->members_count_get();
        $tot_cnt = $members_cnt->cnt;

        $members = $this->member_model->members_get($data, $limit, $offset);

        // 총 페이지
        $tot_page = ceil($tot_cnt/$limit);

        //DB result 확인
        if ($members) {
            if ($id) {
                $this->response($members, REST_Controller::HTTP_OK);
            }else {
                $message = [
                    'tot_page' => $tot_page,
                    'cur_page' => $page,
                    'members' => $members
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }

        }else{
            // response 생성 메서드종료 실패 결과없음
            $this->response([
                'status' => FALSE,
                'message' => '결과가 없습니다.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function members_put()
    {
        $email = $this->put('email');
        $password = $this->put('password');
        $name = $this->put('name');
        $phone = $this->put('phone');
        $recome_code = $this->put('recom_code');
        $event_auth = $this->put('event_auth');

        $data = array();
        $data['member_email'] = $email;
        $data['member_password'] = $password;
        $data['member_name'] = $name;
        $data['member_phone'] = $phone;
        $data['member_recom_code'] = $recome_code;
        $data['member_event_auth'] = $event_auth;
        $data['member_ins_date'] = date('Y-m-d H:i:s');
        $data['member_mod_date'] = date('Y-m-d H:i:s');

        $result = $this->member_model->members_put($data, $id);

        if ($result < 0) {
            $message = [
                'message' => '가입에 실패하였습니다#error.'
            ];
        }else {
            $message = [
                'id' => $result,
                'message' => '가입 되었습니다.'
            ];
        }

        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function members_post()
    {
        $id = $this->post('id');
        $email = $this->post('email');
        $password = $this->post('password');
        $name = $this->post('name');
        $phone = $this->post('phone');
        $recome_code = $this->post('recom_code');
        $event_auth = $this->post('event_auth');

        $data = array();
        $data['member_email'] = $email;
        $data['member_password'] = $password;
        $data['member_name'] = $name;
        $data['member_phone'] = $phone;
        $data['member_recom_code'] = $recome_code;
        $data['member_event_auth'] = $event_auth;
        $data['member_mod_date'] = date('Y-m-d H:i:s');

        $result = $this->member_model->members_post($data, $id);
        if ($result < 0) {
            $message = [
                'id' => $id, // Automatically generated by the model
                'message' => '변경에 실패하였습니다#error.'
            ];
        }else {
            $message = [
                'id' => $id, // Automatically generated by the model
                'message' => '변경 되었습니다.'
            ];
        }

        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function members_delete()
    {
        $id = $this->uri->segment(3);

        if ($id <= 0)
        {
            $message = [
                'message' => '아이디 오류입니다.'
            ];

            $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
        }

        $result = $this->member_model->members_delete($id);

        if ($result < 0) {
            $message = [
                'id' => $id, // Automatically generated by the model
                'message' => '삭제에 실패하였습니다#error.'
            ];
        }else {
            $message = [
                'id' => $id, // Automatically generated by the model
                'message' => '삭제 되었습니다.'
            ];
        }

        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

}
