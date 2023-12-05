<?php namespace App\models;

class User
{
    public function __construct(
        public string $Name = '',
        public string $Username = '',
        public string $Email = '',
        public string $PhoneNumber = '',
        public string $Password = '')
    {}

    /**
     * @param string $Name
     */
    public function setName(string $Name): void
    {
        $this->Name = $Name;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @param string $Email
     */
    public function setEmail(string $Email): void
    {
        $this->Email = $Email;
    }
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     * @param string $Username
     */
    public function setUsername(string $Username): void
    {
        $this->Username = $Username;
    }
    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->Username;
    }

    /**
     * @param string $PhoneNumber
     */
    public function setPhoneNumber(string $PhoneNumber): void
    {
        $this->PhoneNumber = $PhoneNumber;
    }
    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->PhoneNumber;
    }

    /**
     * @param string $Password
     */
    public function setPassword(string $Password): void
    {
        $this->Password = $Password;
    }
    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->Password;
    }
}