<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "Users" u LEFT JOIN "User_details" ud 
            ON u.id_user_details = ud.id WHERE email = :email
            ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false)
        {
            return null; // to do zwracac exception
        }

//        print "w user repository: ".$user['email'];

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['enable']
        );
    }

    public function addUser(User $user)
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "User_details" ("name", surname)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO "Users" (email, password, id_user_details, enable, created_at, salt)
            VALUES (?, ?, ?, ?, ?, ?)
        ');



        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsId($user),
            1,
            data,
            null
        ]);
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "User_details" WHERE name = :name AND surname = :surname
        ');
        $name = $user->getName();
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $surname = $user->getSurname();
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }

    function encrypt(string $data): string
    {
        $encryption_key = "samplekey";
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption = openssl_encrypt($data, $ciphering,
            $encryption_key, $options, $encryption_iv);
        return ($encryption);
    }

    function decrypt(string $data): string
    {
        $encryption_key = "samplekey";
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $decryption_iv = '1234567891011121';
        $decryption=openssl_decrypt ($data, $ciphering,
            $encryption_key, $options, $decryption_iv);
        return ($decryption);
    }

}