<?php
namespace MASCOTCORECARPENTO\Lib;

/**
 * interface Mascot_Core_Carpento_Interface_PostType
 * @package MASCOTCORECARPENTO\Lib;
 */
interface Mascot_Core_Carpento_Interface_PostType {
	/**
	 * Returns PT Key
	 * @return string
	 */
	public function getPTKey();

	/**
	 * It registers custom post type
	 */
	public function register();
}