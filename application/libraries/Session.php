<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Session Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Sessions
 * @author		Andrey Andreev
 * @link		https://codeigniter.com/user_guide/libraries/sessions.html
 */
class Session {

	/**
	 * Userdata array
	 *
	 * Just a reference to $_SESSION, for BC purposes.
	 */
	public $userdata;

	protected $_driver = 'files';
	protected $_config;

	// ------------------------------------------------------------------------

	/**
	 * Class constructor
	 *
	 * @param	array	$params	Configuration parameters
	 * @return	void
	 */
	public function __construct(array $params = array())
	{
		session_start();
	}

	// ------------------------------------------------------------------------

	/**
	 * CI Load Classes
	 *
	 * An internal method to load all possible dependency and extension
	 * classes. It kind of emulates the CI_Driver library, but is
	 * self-sufficient.
	 *
	 * @param	string	$driver	Driver name
	 * @return	string	Driver class name
	 */
	
	public function sess_destroy()
	{
		session_destroy();
	}

	
	/**
	 * Get userdata reference
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @returns	array
	 */
	public function &get_userdata()
	{
		return $_SESSION;
	}

	// ------------------------------------------------------------------------

	/**
	 * Userdata (fetch)
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @param	string	$key	Session data key
	 * @return	mixed	Session data value or NULL if not found
	 */
	public function userdata($key = NULL)
	{
		if (isset($key))
		{
			return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;
		}
		elseif (empty($_SESSION))
		{
			return array();
		}

		$userdata = array();
		$_exclude = array_merge(
			array('__ci_vars'),
			$this->get_flash_keys(),
			$this->get_temp_keys()
		);

		foreach (array_keys($_SESSION) as $key)
		{
			if ( ! in_array($key, $_exclude, TRUE))
			{
				$userdata[$key] = $_SESSION[$key];
			}
		}

		return $userdata;
	}

	// ------------------------------------------------------------------------

	/**
	 * Set userdata
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @param	mixed	$data	Session data key or an associative array
	 * @param	mixed	$value	Value to store
	 * @return	void
	 */
	public function set_userdata($data, $value = NULL)
	{
		if (is_array($data))
		{
			foreach ($data as $key => &$value)
			{
				$_SESSION[$key] = $value;
			}

			return;
		}

		$_SESSION[$data] = $value;
	}

	// ------------------------------------------------------------------------

	/**
	 * Unset userdata
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @param	mixed	$data	Session data key(s)
	 * @return	void
	 */
	public function unset_userdata($key)
	{
		if (is_array($key))
		{
			foreach ($key as $k)
			{
				unset($_SESSION[$k]);
			}

			return;
		}

		unset($_SESSION[$key]);
	}

	// ------------------------------------------------------------------------

	/**
	 * All userdata (fetch)
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @return	array	$_SESSION, excluding flash data items
	 */
	public function all_userdata()
	{
		return $this->userdata();
	}

	// ------------------------------------------------------------------------

	/**
	 * Has userdata
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @param	string	$key	Session data key
	 * @return	bool
	 */
	public function has_userdata($key)
	{
		return isset($_SESSION[$key]);
	}

	// ------------------------------------------------------------------------

	/**
	 * Flashdata (fetch)
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @param	string	$key	Session data key
	 * @return	mixed	Session data value or NULL if not found
	 */
	public function flashdata($key = NULL)
	{
		if (isset($key))
		{
			return (isset($_SESSION['__ci_vars'], $_SESSION['__ci_vars'][$key], $_SESSION[$key]) && ! is_int($_SESSION['__ci_vars'][$key]))
				? $_SESSION[$key]
				: NULL;
		}

		$flashdata = array();

		if ( ! empty($_SESSION['__ci_vars']))
		{
			foreach ($_SESSION['__ci_vars'] as $key => &$value)
			{
				is_int($value) OR $flashdata[$key] = $_SESSION[$key];
			}
		}

		return $flashdata;
	}

	// ------------------------------------------------------------------------

	/**
	 * Set flashdata
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @param	mixed	$data	Session data key or an associative array
	 * @param	mixed	$value	Value to store
	 * @return	void
	 */
	public function set_flashdata($data, $value = NULL)
	{
		$this->set_userdata($data, $value);
		$this->mark_as_flash(is_array($data) ? array_keys($data) : $data);
	}

	// ------------------------------------------------------------------------
	public function mark_as_flash($key)
	{
		if (is_array($key))
		{
			for ($i = 0, $c = count($key); $i < $c; $i++)
			{
				if ( ! isset($_SESSION[$key[$i]]))
				{
					return FALSE;
				}
			}

			$new = array_fill_keys($key, 'new');

			$_SESSION['__ci_vars'] = isset($_SESSION['__ci_vars'])
				? array_merge($_SESSION['__ci_vars'], $new)
				: $new;

			return TRUE;
		}

		if ( ! isset($_SESSION[$key]))
		{
			return FALSE;
		}

		$_SESSION['__ci_vars'][$key] = 'new';
		return TRUE;
	}
	/**
	 * Keep flashdata
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @param	mixed	$key	Session data key(s)
	 * @return	void
	 */
	public function keep_flashdata($key)
	{
		$this->mark_as_flash($key);
	}

	// ------------------------------------------------------------------------

	/**
	 * Temp data (fetch)
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @param	string	$key	Session data key
	 * @return	mixed	Session data value or NULL if not found
	 */
	public function tempdata($key = NULL)
	{
		if (isset($key))
		{
			return (isset($_SESSION['__ci_vars'], $_SESSION['__ci_vars'][$key], $_SESSION[$key]) && is_int($_SESSION['__ci_vars'][$key]))
				? $_SESSION[$key]
				: NULL;
		}

		$tempdata = array();

		if ( ! empty($_SESSION['__ci_vars']))
		{
			foreach ($_SESSION['__ci_vars'] as $key => &$value)
			{
				is_int($value) && $tempdata[$key] = $_SESSION[$key];
			}
		}

		return $tempdata;
	}

	// ------------------------------------------------------------------------

	/**
	 * Set tempdata
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @param	mixed	$data	Session data key or an associative array of items
	 * @param	mixed	$value	Value to store
	 * @param	int	$ttl	Time-to-live in seconds
	 * @return	void
	 */
	public function set_tempdata($data, $value = NULL, $ttl = 300)
	{
		$this->set_userdata($data, $value);
		$this->mark_as_temp(is_array($data) ? array_keys($data) : $data, $ttl);
	}

	// ------------------------------------------------------------------------

	/**
	 * Unset tempdata
	 *
	 * Legacy CI_Session compatibility method
	 *
	 * @param	mixed	$data	Session data key(s)
	 * @return	void
	 */
	public function unset_tempdata($key)
	{
		$this->unmark_temp($key);
	}

}
