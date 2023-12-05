<?php namespace App\validation;
use Exception;
use Respect\Validation\Validator as v;
use App\models\User;
use Respect\Validation\Exceptions\NestedValidationException;

class UserValidation
{
    public function __construct(private ?array $Errors = null, private readonly null|User $User = null){}

    public static function StartValidation(array $PostData): UserValidation
    {
        $thisObj = (new self([] , new User()));
        try {
            //Name Validate
            try {
                v::key('Name')->assert($PostData);
                $Validate = v::stringType()->notBlank()->alpha(' ');
                $thisObj->User->setName($Validate->validate($PostData['Name']) ? $PostData['Name'] : $Validate->assert($PostData['Name']));
            } catch
            (NestedValidationException $e) {
                $array = ($e->getMessages([
                    'Name' => 'Name is not exist',
                    'notBlank' => "Name Type Can't is empty",
                    'alpha' => 'The name must only contain characters [a_z] or [A-Z]',
                ]));
                $thisObj->Errors['Name'] = (reset($array));
            }
            //Email Validate
            try {
                v::key('Email')->assert($PostData);
                $Validate = v::email()->notBlank();
                $thisObj->User->setEmail($Validate->validate($PostData['Email']) ? $PostData['Email'] : $Validate->assert($PostData['Email']));
            } catch (NestedValidationException $e) {
                $array = $e->getMessages([
                    'Email' => 'Email is not exist',
                    'email' => 'Email is correct format',
                    'notBlank' => "Email Type Can't is empty",
                ]);
                $thisObj->Errors['Email'] = (reset($array));
            }
            //Username Validate
            try {
                v::key('Username')->assert($PostData);
                $Validate = v::stringType()->notBlank()->Alnum()->lowercase();
                $thisObj->User->setUsername($Validate->validate($PostData['Username']) ? $PostData['Username'] : $Validate->assert($PostData['Username']));
            } catch (NestedValidationException $e) {
                $array = $e->getMessages([
                    'Username' => 'Username is not exist',
                    'notBlank' => "Username Type Can't is empty",
                    'alnum' => 'The username must only contain characters [a_z] or [0-9]',
                    'lowercase' => 'Use only lowercase letters',

                ]);
                $thisObj->Errors['Username'] = (reset($array));
            }
            try {
                v::key('PhoneNumber')->assert($PostData);
                $Validate = v::notBlank()->digit('+')->length(11 , 13)->not(v::length(12));
                $thisObj->User->setPhoneNumber($Validate->validate($PostData['PhoneNumber']) ? $PostData['PhoneNumber'] : $Validate->assert($PostData['PhoneNumber']));
            } catch (NestedValidationException $e) {
                $array = $e->getMessages([
                    'PhoneNumber' => 'Phone number is not exist',
                    'notBlank' => "Phone number Type Can't is empty",
                    'digit' => 'The phone number must only contain characters [0-9]',
                    'length' => 'The entered format must be between 11 or 13 digits',
                ]);
                $thisObj->Errors['PhoneNumber'] = (reset($array));
            }
            try {
                v::key('Password')->assert($PostData);
                $Validate = v::notBlank()->length(8);
                $thisObj->User->setPassword($Validate->validate($PostData['Password']) ? $PostData['Password'] : $Validate->assert($PostData['Password']));
            } catch (NestedValidationException $e) {
                $array = $e->getMessages([
                    'Password' => 'Password is not exist',
                    'notBlank' => "Password Type Can't is empty",
                    'length' => 'The entered format must be larger than or equal to 8',
                ]);
                $thisObj->Errors['Password'] = (reset($array));
            }
        } catch (Exception $e) {
            $thisObj->Errors['ErrorException'] = $e;
        }
        return $thisObj;
    }


    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->Errors;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->User;
    }

    public function ActionResult():bool
    {
        if ($this->Errors)
        {
            return false;
        }
        return true;
    }

}


