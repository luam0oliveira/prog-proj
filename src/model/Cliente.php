<?php

class Cliente{  
  private int $id;
  private string $nome;
  private string $sobrenome;
  private string $email;
  private string $login;
  private string $password; 
  private string $rua;
  private string $numero;
  private string $bairro;
  private string $cep;
  private string $telefone;

  /**
   * Get the value of id
   *
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @param int $id
   *
   * @return self
   */
  public function setId(int $id): self
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of nome
   *
   * @return string
   */
  public function getNome(): string
  {
    return $this->nome;
  }

  /**
   * Set the value of nome
   *
   * @param string $nome
   *
   * @return self
   */
  public function setNome(string $nome): self
  {
    $this->nome = $nome;

    return $this;
  }

  /**
   * Get the value of sobrenome
   *
   * @return string
   */
  public function getSobrenome(): string
  {
    return $this->sobrenome;
  }

  /**
   * Set the value of sobrenome
   *
   * @param string $sobrenome
   *
   * @return self
   */
  public function setSobrenome(string $sobrenome): self
  {
    $this->sobrenome = $sobrenome;

    return $this;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of login
   *
   * @return string
   */
  public function getLogin(): string
  {
    return $this->login;
  }

  /**
   * Set the value of login
   *
   * @param string $login
   *
   * @return self
   */
  public function setLogin(string $login): self
  {
    $this->login = $login;

    return $this;
  }

  /**
   * Get the value of password
   *
   * @return string
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @param string $password
   *
   * @return self
   */
  public function setPassword(string $password): self
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of rua
   *
   * @return string
   */
  public function getRua(): string
  {
    return $this->rua;
  }

  /**
   * Set the value of rua
   *
   * @param string $rua
   *
   * @return self
   */
  public function setRua(string $rua): self
  {
    $this->rua = $rua;

    return $this;
  }

  /**
   * Get the value of numero
   *
   * @return string
   */
  public function getNumero(): string
  {
    return $this->numero;
  }

  /**
   * Set the value of numero
   *
   * @param string $numero
   *
   * @return self
   */
  public function setNumero(string $numero): self
  {
    $this->numero = $numero;

    return $this;
  }

  /**
   * Get the value of bairro
   *
   * @return string
   */
  public function getBairro(): string
  {
    return $this->bairro;
  }

  /**
   * Set the value of bairro
   *
   * @param string $bairro
   *
   * @return self
   */
  public function setBairro(string $bairro): self
  {
    $this->bairro = $bairro;

    return $this;
  }

  /**
   * Get the value of cep
   *
   * @return string
   */
  public function getCep(): string
  {
    return $this->cep;
  }

  /**
   * Set the value of cep
   *
   * @param string $cep
   *
   * @return self
   */
  public function setCep(string $cep): self
  {
    $this->cep = $cep;

    return $this;
  }

  /**
   * Get the value of telefone
   *
   * @return string
   */
  public function getTelefone(): string
  {
    return $this->telefone;
  }

  /**
   * Set the value of telefone
   *
   * @param string $telefone
   *
   * @return self
   */
  public function setTelefone(string $telefone): self
  {
    $this->telefone = $telefone;

    return $this;
  }
}