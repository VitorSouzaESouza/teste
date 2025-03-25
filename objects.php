<?php
date_default_timezone_set("Etc/GMT+3");
class Departamento{
    public function __construct($nome) {
        $this->nome = $nome;
        $this->funcionarios = array();
    }
    public function inserir_funcionario($funcionario){ //"$funcionário" é o objeto "Funcionário".
        if(!in_array($funcionario, $this->funcionarios)){
            array_push($this->funcionarios, $funcionario);
        }
    }
    public function remove_funcionario($funcionario){ //"$funcionário" é o objeto "Funcionário".
        if(in_array($funcionario, $this->funcionarios)){
            $ind = array_search($funcionario, $this->funcionarios);
            unset($this->funcionarios[$ind]);
        }
    }
    public function get_nome_departamento(){
        return $this->nome;
    }
}

class Funcionario{
    public function __construct($nome, $email, $cpf, $idade, $departamento) { //"$departamento" é o objeto "Departamento" criado previamente que deve ser passado para o funcionário.
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->idade = $idade;
        $this->departamento = $departamento->get_nome_departamento(); //Recebe o objeto "Departamento" e atribui seu nome para o atributo do funcionário.
        $this->lista_de_trabalho = "Sem lista";
        $departamento->inserir_funcionario($this); //Leve este objeto funcionário para o objeto "Departamento" em questão e adiciona na lista (array) de funcionários.
    }
    public function pegar_lista_de_trabalho($lista_de_trabalho){ //"$lista_de_trabalho" é o objeto "ListaDeTrabalho".
        $this->lista_de_trabalho = $lista_de_trabalho;
    }
    public function get_nome_funcionario(){
        return $this->nome;
    }
}

class ListaDeTrabalho{

    public function __construct($funcionario){ //"$funcionário" é o objeto "Funcionário" que receberá esta "ListaDeTrabalho".
        $this->funcionario = $funcionario->get_nome_funcionario(); //Funcionário dono da lista de trabalho.
        $this->dias = array(); //Armazena um array com todos os dias da lista, e cada dia armaeza um array com todas as suas horas, e cada hora é atribuída uma tarefa.
        $funcionario->pegar_lista_de_trabalho($this); //Envia esta "ListaDeTrabalho" para o "Funcionário" em questão.
    }

    public function atribuir_dia_hora_tarefa($dia, $hora="", $tarefa=""){ //"A data deve ser no formato (ano-mês-dia), e a hora no formato (hora:minuto)"
        if(!isset($this->dias[$dia])){
            $this->dias[$dia] = array();
        }
        if($hora){
            if(strtotime($hora) >= strtotime("9:00") & strtotime($hora) <= strtotime("11:59") | strtotime($hora) >= strtotime("13:00") & strtotime($hora) <= strtotime("17:59")){
                $this->dias[$dia][$hora] = $tarefa;
                echo "Hora ". $hora. " aceita e cadastrada com sua tarefa neste no dia ". $dia;
            }
                else{
                echo "Hora". $hora. " fora do horário útil e não foi cadastrada.";
            }
        }
    }

    public function remover_dia_hora_tarefa($dia, $hora="all"){
        if($hora == "all"){
            unset($this->dias[$dia]);
        }
        else{
            unset($this->dias[$dia][$hora]);
        }
    }

    public function gerar_lista(){ //Gera a lista de trabalho com os próximos 30 dias, se o dia não tiver alguma hora de trabalho, será criado um dia vazio.
        $proximos_30_dias = array();
        for($i=0;$i<30;$i++){
            $dia = date("Y-m-d", strtotime("+".$i." days"));
            if(!isset($this->dias[$dia])){
                $this->atribuir_dia_hora_tarefa($dia);
            }
            $proximos_30_dias[$dia] = $this->dias[$dia];
        }
        return $proximos_30_dias;
    }

}
?>