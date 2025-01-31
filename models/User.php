<?php
    class User{
        private $id;
        private $firstName;
        private $lastName;
        private $email;
        private $password;
        private $phoneNumber;
        private $birthDate;
        private $role;

        public function __construct($id, $firstName, $lastName, $email, $password, $phoneNumber, $birthDate, $role) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->phoneNumber = $phoneNumber;
            $this->birthDate = $birthDate;
            $this->role = $role;
        }

        public function getId() {
            return $this->id;
        }
        public function getFirstName() {
            return $this->firstName;
        }      
        public function getLastName() {
            return $this->lastName;
        }       
        public function getPassword() {
            return $this->password;
        }       
        public function getEmail() {
            return $this->email;
        }
        public function getPhoneNumber() {
            return $this->phoneNumber;
        }
        public function getBirthDate() {
            return $this->birthDate;
        }     
        public function getRole() {
            return $this->role;
        }
        public function setId($id)
    {
        $this->id = $id;
    }
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }    
        public function setLastName($lastName) {
            $this->lastName = $lastName;
        }       
        public function setPassword($password) {
            $this->password = $password;
        }       
        public function setEmail($email) {
            // return $this->email;
            $this->email = $email;
        }
        public function setPhoneNumber($phoneNumber) {
            // return $this->phoneNumber;
            $this->phoneNumber = $phoneNumber;
        }
        public function setBirthDate($birthDate) {
            // return $this->birthDate;
            $this->birthDate = $birthDate;
        }     
        public function setRole($role) {
            // return $this->role;
            $this->role = $role;
        }
        
        // public function __toString() {
        //     return "ID: " . $this->id . ", Emri: " . $this->emri . ", Mbiemri: " . $this->mbiemri . ", Data Lindjes: " . $this->dataLindjes
        //         . ", Email: " . $this->email . ", Gjinia: " . $this->gjinia . ", Viti Akademik: " . $this->vitiAkademik
        //         . ", Niveli Studimeve: " . $this->niveliStudimeve . ", Departamenti: " . $this->departamenti;
        // }
    }
?>
