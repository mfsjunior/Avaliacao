<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ClienteDAO;
use App\Models\Entidades\Cliente;

class ClienteController extends Controller
{
    public function cadastro()
    {
        $this->render('/cliente/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    public function salvar()
    {
        $cliente = new Cliente();
        $cliente->setNome($_POST['nome']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setDTNasc($_POST['dtnasc']);
        $cliente->setCPF($_POST['cpf']);
        

        Sessao::gravaFormulario($_POST);

        $clienteDAO = new CLienteDAO();

        if($clienteDAO->salvar($cliente)){
            $this->redirect('/cliente/sucesso');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    
    public function sucesso()
    {
        if(Sessao::retornaValorFormulario('nome')) {
            $this->render('/cliente/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->redirect('/cliente/cadastro');
    }

}