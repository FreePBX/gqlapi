<?php

namespace FreePBX\modules\Api\Includes;

abstract class ApiBase {
	protected $validScopes = [];

	protected $freepbx;
	protected $module;
	public function __construct($freepbx,$module) {
		$this->freepbx = $freepbx;
		$this->module = $module;
	}

	public static function getScopes() {
		return [];
	}

	public function setAllowedScopes($scopes) {
		$this->validScopes = $scopes;
	}

	protected function checkScope($scope) {
		//all of API type
		if(in_array($this->type,$this->validScopes)) {
			return true;
		}

		$parts = explode(":",$scope);
		//all of api type + module
		if(in_array($this->type.":".$this->module,$this->validScopes)) {
			return true;
		}
		//all of api type + module + write/read
		if(count($parts) === 1 && in_array($parts[0],["read","write"]) && in_array($this->type.":".$this->module.":".$parts[0],$this->validScopes)) {
			return true;
		}
		//specific query
		return in_array($this->type.":".$this->module.":".$scope,$this->validScopes);
	}

	public function setUserId($userId=null) {

	}
}
