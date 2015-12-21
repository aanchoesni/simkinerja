<?php
class BaseModel extends \Eloquent {
	/**
	 * Model rules
	 * @var array
	*/
	public static $rules = [];
	/**
	 * Get rules for update by replacing :id with $model->id
	 * @return array
	*/
	public function updateRules()
	{
		$rules = static::$rules;
		foreach ($rules as $field => $rule) {
			// replace :id with $model->id
			$rules[$field] = str_replace(':id', $this->getKey(), $rule);
		}
		return $rules;
	}
}
