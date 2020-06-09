<?php 

class Flasher {
	public function setFlash($type, $message) {
		$_SESSION['flash'] = [
			'type' => $type,
			'message' => $message
		];
	}

	public function flash() {
		if (isset($_SESSION['flash'])) {
			echo '<div class="alert alert-'. $_SESSION['flash']['type'] .' alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong class="text-center">'. $_SESSION['flash']['message'] .'</strong>
                </div>';
            unset($_SESSION['flash']);
		}
	}
}

?>