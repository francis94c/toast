<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ToastTest {
  function testToast(&$ci) {
    $params = array("toast_class" => "w3-green");
    $ci->load->splint("francis94c/toast", "+Toast", $params, "toast");
    $ci->unit->run($ci->toast->getToastClass(), "w3-green", "Check Constructor");
    $ci->load->splint("francis94c/toast", "+Toast", null, "temp_toast");
    $ci->unit->run($ci->temp_toast->getToastClass(), "", "Check null params");
    $ci->temp_toast->latch("message");
    $ci->unit->run($ci->session->userdata(TOAST_TEXT), "message", "Test temp text Commit to session");
    $ci->unit->run($ci->session->userdata(TOAST_CLASS) == "" ||
      $ci->session->userdata(TOAST_CLASS) == null, true, "Test temp class commit to session");
    $ci->toast->latch("hello");
    $ci->unit->run($ci->session->userdata(TOAST_TEXT), "hello", "Test Test Commit to session");
    $ci->unit->run($ci->session->userdata(TOAST_CLASS), "w3-green", "Test class commit to session");
    $ci->toast->toast();
    $ci->unit->run($ci->session->userdata(TOAST_TEXT) === "" ||
      $ci->session->userdata(TOAST_TEXT) == null, true,
      "Test for empty session variable {text}");
    $ci->unit->run($ci->toast->getMessage() === "" ||
      $ci->toast->getMessage() === null, true, "Test for empty message");
    $ci->unit->run($ci->session->userdata(TOAST_CLASS) === "" ||
      $ci->session->userdata(TOAST_CLASS) == null, true,
      "Test for empty session variable {class}");
    $ci->toast->toast("message");
    $ci->unit->run($ci->session->userdata(TOAST_TEXT) === "" ||
      $ci->session->userdata(TOAST_TEXT) == null, true,
      "Test for empty session variable {text}");
    $ci->session->unset_userdata(array(TOAST_TEXT, TOAST_CLASS));
  }
}
?>
