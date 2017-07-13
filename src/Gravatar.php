<?php 

namespace PS;

class Gravatar {
	
	/**
	 * Url to gravatar generator
	 *
	 * @var string
	 */
	protected static $gravatarUrl = 'https://www.gravatar.com/avatar/';

	public static function generate(string $email, array $options = []) {

		if (!self::validateEmail($email)) 
			return false;

		$hash = self::createHashFromEmail($email);
		$url = self::makeGravatarUrl($hash, $options);

		return $url;
	}

	/**
	 * Validate given email address
	 *
	 * @param string $email
	 * @return bool
	 */
	protected static function validateEmail(string $email): bool {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	/**
	 * Create md5 hash from email adress
	 * @see https://pl.gravatar.com/site/implement/hash/
	 *
	 * @param string $email
	 * @return string
	 */
	protected static function createHashFromEmail(string $email): string {
		return md5(strtolower(trim($email)));
	}

	protected static function makeGravatarUrl(string $hash, array $options): string {
		$url = self::$gravatarUrl . $hash;
		if (!empty($options)) {
			$url .= '?';

			foreach ($options as $key => $value) {
				$url .= $key . '=' . $value;
			}
		}

		return $url;
	}
}
