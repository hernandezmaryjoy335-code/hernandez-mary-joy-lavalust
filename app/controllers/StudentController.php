<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller {

    public function index() {
        $this->call->view('student/index');
    }

    public function profile() {
        $data['student'] = [
            'student_id' => '2024-00215',
            'name'       => 'Mary Joy S. Hernandez',
            'course'     => 'BS Information Technology',
            'year'       => '3nd Year',
            'section'    => 'F5',
            'email'      => 'your.hernandezmaryjoy335@gmail.com',
            'address'    => 'Balingayan Calapan City',
            'skills'     => 'Problem solving'
        ];

        $this->call->view('student/profile', $data);
    }
}