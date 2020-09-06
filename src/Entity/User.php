<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Swagger\Annotations as SWG;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity()
 */
class User
{
	/**
	 * @var int/null
	 *
	 * @SWG\Property(description="The unique identifier of the user.")
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id()
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string/null
	 * 
	 * @SWG\Property(description="The unique username.")
	 *
	 * @ORM\Column(name="username", type="string")
	 */
	private $userName;

	/**
	 * @var string/null
	 *
	 * @SWG\Property(description="The full name of the user.")
	 *
	 * @ORM\Column(name="fullname", type="string")
	 */
	private $fullName;

	/**
	 * @var string/null
	 *
	 * @SWG\Property(description="The user email.")
	 *
	 * @ORM\Column(name="email", type="string")
	 */
	private $email;

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getUserName(): string
	{
		return $this->userName;
	}

	/**
	 * @param string $userName
	 */
	public function setUserName(string $userName): void
	{
		$this->userName = $userName;
	}

	/**
	 * @return string
	 */
	public function getFullName(): string
	{
		return $this->fullName;
	}

	/**
	 * @param string $fullName
	 */
	public function setFullName(string $fullName): void
	{
		$this->fullName = $fullName;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail(string $email): void
	{
		$this->email = $email;
	}

}