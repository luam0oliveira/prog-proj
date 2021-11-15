<?php

class Livro{
    private int $id;
    private String $isbn;
    private String $titulo;
    private float $preco;
    private int $editora;
    private int $quantidade;
    private int $ano_publicacao;
    private String $descricao;
    private String $imagem;
    private String $promocao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }    

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getPreco()
    {
        return $this->preco;
    }
 
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    public function getEditora()
    {
        return $this->editora;
    }

    public function setEditora($editora)
    {
        $this->editora = $editora;

        return $this;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getAno_publicacao()
    {
        return $this->ano_publicacao;
    }

    public function setAno_publicacao($ano_publicacao)
    {
        $this->ano_publicacao = $ano_publicacao;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    public function getPromocao(): String
    {
        return $this->promocao;
    }

    public function setPromocao(String $promocao): self
    {
        $this->promocao = $promocao;

        return $this;
    }
}