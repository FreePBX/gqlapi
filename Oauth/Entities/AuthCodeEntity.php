<?php
namespace FreePBX\modules\Api\Oauth\Entities;

use League\OAuth2\Server\Entities\AuthCodeEntityInterface;
use League\OAuth2\Server\Entities\Traits\AuthCodeTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\TokenEntityTrait;
class AuthCodeEntity implements AuthCodeEntityInterface {
	use EntityTrait, TokenEntityTrait, AuthCodeTrait;
}
