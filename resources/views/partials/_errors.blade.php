 <?php
 if ($errors->any()) {foreach ($errors->all() as $error) {toastr()->error("$error");}}
 if (Session::has('flash_message_succes')) {toastr()->success(session('flash_message_succes')); }
 if (Session::has('flash_message_error')) {toastr()->error(session('flash_message_error'));}
 
  ?>
