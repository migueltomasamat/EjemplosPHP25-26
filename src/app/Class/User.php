<?php

namespace App\Class;

use App\Enum\UserType;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class User implements \JsonSerializable
{
    private UuidInterface $uuid;
    private string $username;
    private string $password;
    private string $email;
    private int $edad;
    private array $visualizaciones;
    private UserType $type;

    public function __construct(UuidInterface $uuid, string $username, string $password, string $email, UserType $type=UserType::NORMAL){
        $this->uuid=$uuid;
        $this->username=$username;
        $this->password=$password;
        $this->email=$email;
        $this->type=$type;
        $this->visualizaciones=[];
    }

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    public function setUuid(UuidInterface $uuid): User
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): User
    {
        $this->edad = $edad;
        return $this;
    }

    public function getVisualizaciones(): array
    {
        return $this->visualizaciones;
    }

    public function setVisualizaciones(array $visualizaciones): User
    {
        $this->visualizaciones = $visualizaciones;
        return $this;
    }

    public function getType(): UserType
    {
        return $this->type;
    }

    public function isAdmin():bool{

        $retorno=$this->type==UserType::ADMIN?true:false;

        return $retorno;

    }

    public function setType(UserType $tipo): User
    {
        $this->type = $tipo;
        return $this;
    }


    public function jsonSerialize(): mixed
    {
        return [
          "username"=>$this->username,
          "email"=>$this->email,
          "edad"=>$this->edad??null,
          "tipo"=>$this->type->name,
          "visualizaciones"=>$this->visualizaciones
        ];
    }

    public static function createFromArray(array $userData):User{
        $usuario = new User(
            Uuid::uuid4(),
            $userData['username'],
            $userData['password'],
            $userData['email']);

        $usuario->setEdad($userData['edad']);
        $usuario->setType(UserType::stringToUserType($userData['type']));

        return $usuario;
    }

    public static function validateUserCreation(array $userData):User|array{

        try {
            v::key('username', v::stringType())
                ->key('password', v::stringType()->length(3, 16))
                ->key('email', v::email())
                ->key('edad', v::intVal()->min(18),true)
                ->key('type', v::in(["normal", "anuncios", "Admin"]),true)
                ->assert($userData);
        }catch(NestedValidationException $errores){

            return $errores->getMessages();
        }

        return User::createFromArray($userData);
    }

    public static function validateUserEdit(array $userData):User|array{
        try {
            v::key('uuid',v::uuid(),true)
                ->key('username', v::stringType(),false)
                ->key('password', v::stringType()->length(3, 16),false)
                ->key('email', v::email(),false)
                ->key('edad', v::intVal()->min(18),false)
                ->key('type', v::in(["normal", "anuncios", "admin"]),false)->assert($userData);
        }catch(NestedValidationException $errores){
            return $errores->getMessages();
        }


        //TODO Buscar el usuario en la base de datos y luego modificarlo
        // isset($userData['username'])  $userData['username']??user->getUsername()
        return new User(
            Uuid::fromString($userData['uuid']),
            $userData['username'],
            'leugim',
            'miguel@miguel.com',
            UserType::stringToUserType($userData['type']??'normal')
        );



    }
}