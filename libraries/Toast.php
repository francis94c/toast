<?php
defined('BASEPATH') OR exit('No direct script access allowed');

defined("TOAST_TEXT")         OR define("TOAST_TEXT", "com.cynobit.toast_text");
defined("TOAST_CLASS")        OR define("TOAST_CLASS", "com.cynobit.toast_color");

class Toast {

  private $ci;
  private $toast_class = "";
  private $timeout = 4000;
  private $toastCount = 0;

  /**
   * [__construct description]
   */
  function __construct() {
    $this->ci =& get_instance();
    $this->ci->load->library("session");
    if (func_num_args() == 1) {
      $params = func_get_arg(0);
      if (isset($params["toast_class"]) && is_string($params["toast_class"]))
        $this->toast_class = $params["toast_class"];
      if (isset($params["timeout"]) && is_int($params["timeout"]))
        $this->timeout = $params["timeout"];
    }
  }
  /**
   * [latch description]
   * @return [type] [description]
   */
  function latch() {
    if (func_num_args() == 0) return;
    if (is_string(func_get_arg(0)))
      $this->ci->session->set_userdata(TOAST_TEXT, func_get_arg(0));
    if (func_num_args() == 2 && is_string(func_get_arg(1))) {
      $this->ci->session->set_userdata(TOAST_CLASS, func_get_arg(1));
    } elseif ($this->toast_class !== "") {
      $this->ci->session->set_userdata(TOAST_CLASS, $this->toast_class);
    }
  }
  function getMessage() {
    return $this->ci->session->userdata(TOAST_TEXT);
  }
  function getToastClass() {
    return $this->toast_class;
  }
  function setToastClass($toast_class) {
    $this->toast_class = $toast_class;
  }
  function setTimeout($timeout) {
    $this->timeout = $timeout;
  }
  function toast() {
    $data = array();
    if (func_num_args() == 0){
      $data["message"] = $this->ci->session->userdata(TOAST_TEXT);
      $data["toast_class"] = $this->ci->session->userdata(TOAST_CLASS);
      $data["timeout"] = $this->timeout;
    } else {
      if (is_string(func_get_arg(0))){
        $data["message"] = func_get_arg(0);
      } elseif (is_int(func_get_arg(0))) {
        $data["timeout"] = func_get_arg(0);
      }
      if (func_num_args() == 2 && is_string(func_get_arg(1)))
        $data["toast_class"] = func_get_arg(1);
      if (func_num_args() == 3 && is_int(func_get_arg(2)))
        $data["timeout"] = func_get_arg(2);
    }
    $data["count"] = $this->toastCount;
    $this->ci->load->splint("francis94c/toast", "-toast", $data);
    $this->ci->session->unset_userdata(array(TOAST_TEXT, TOAST_CLASS));
    ++$this->toastCount;
  }
}
?>
