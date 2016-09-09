<?php
class Validate{
	private $_passed 	= false,
			$_errors 	= array(),
			$_db		= null;

	public function __construct($db=null)
	{
		$this->_db = (isset($db) ? $db : DB::getInstance());
	}

	public function check($source, $items = array())
	{
		# echo "<pre>";
		# print_r($items);
		# die("</pre>");
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				# echo "{$item} {$rule} must be {$rule_value}!<br>";

				$value = trim($source[$item]);
				$item = escape($item);
				if ($rule === 'required' && empty($value)) {
					$this->addError($items[$item]['name'] . " is required");
				} elseif (!empty($value)) {
					switch ($rule) {
						case 'min':
							if (strlen($value) < $rule_value) {
								$this->addError($items[$item]['name'] . " must be a minimum of {$rule_value} characters");
							}
							break;

						case 'max':
							if (strlen($value) > $rule_value) {
								$this->addError($items[$item]['name'] . " must be a maximum of {$rule_value} characters");
							}
							break;

						case 'matches':
							if ($value != $source[$rule_value]) {
								$this->addError($items[$item]['name'] . " must match " . $items[$rule_value]['name']);
							}
							break;

						case 'unique':
							# echo "<pre>", count(array($item, '=', $value)), "</pre>";
							$check = $this->_db->get($rule_value, array($item, '=', $value));
							if ($check->count()) {
								$this->addError("The " . $items[$item]['name'] . " " . Chars::escape($value); . " already exists. Please try another " . $items[$item]['name'] . ".");
							}
							break;
						case 'alnum':
							if(!ctype_alnum($value) or is_numeric($value)){
								$this->addError($items[$item]['name'] . " needs to be English Standerd Keybord Characters of the set: {a-z, A-Z, 1-9} and not compleatly numeric.");
							}
							break;
						case 'email':
							if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
								$this->addError($items[$item]["name"] . " needs to be a valid email. Example: joe@example.com");
							}
							break;
						case 'file':
							$normalizedURL = Chars::urlEncode($value);
							if($normalizedURL != $value){
								$this->addError("The file name &quot;" . Chars::escape($value) . "&quot; is not allowed.");
							} if(file_exists(Config::get('root') . $normalizedURL)){
								$this->addError("The file name &quot;" . Chars::escape($value) . "&quot; already exists.");
							}
							break;
						default:
							$this->addError("Error set is not defined for " $items[$item]["name"]);
							# code...
							break;
					}
				}
			}
		}

		if (empty($this->_errors)) {
			$this->_passed = true;
		}
		return $this;
	}

	private function addError($error)
	{
		$this->_errors[] = $error;
	}

	public function errors()
	{
		return $this->_errors;
	}

	public function passed()
	{
		return $this->_passed;
	}
}
