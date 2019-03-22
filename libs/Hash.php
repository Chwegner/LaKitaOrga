<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */


class Hash
{

	/**
	 * @param string $algo The algorithm (md5, sha1, whirlpool, etc)
	 * @param string $data The data to encode
	 * @param string $salt (This should be the same throughout the system probably)
	 * @return string The hash/salted data
	 */
	public static function create($algo, $data, $salt)
	{
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);

		return hash_final($context);
	}
}