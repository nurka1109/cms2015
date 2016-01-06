<?php
  class PagesController {
    public function club_president($f_name,$l_name) {
      $first_name = $f_name;
      $last_name  = $l_name;
      require_once('views/pages/club_president.php');
    }
	public function student($f_name,$l_name) {
      $first_name = $f_name;
      $last_name  = $l_name;
      require_once('views/pages/student.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>