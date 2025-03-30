<?php
date_default_timezone_set("Etc/GMT+3");
class Departamento{
    public function __construct($nome) {
        $this->nome = $nome;
        $this->funcionarios = array(); //Recebe um array de objetos "Funcionario".
    }
    public function inserir_funcionario($obj_funcionario){
        if(!in_array($obj_funcionario, $this->funcionarios)){
            array_push($this->funcionarios, $obj_funcionario);
        }
    }
    public function remove_funcionario($obj_funcionario){
        if(in_array($obj_funcionario, $this->funcionarios)){
            $indice = array_search($obj_funcionario, $this->funcionarios);
            unset($this->funcionarios[$indice]);
        }
    }
    public function get_nome_departamento(){
        return $this->nome;
    }
}

class Funcionario{
    public function __construct($nome, $email, $cpf, $idade, $obj_departamento="") { //"$obj_departamento" é o objeto "Departamento" criado previamente que deve ser passado para o funcionário.
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->idade = $idade;
        $this->departamento = ""; //Recebe o objeto "Departamento" no qual este funcionário pertence.
        $this->lista_de_trabalho = ""; //Recebe o objeto "ListaDeTrabalho" no qual este funcionário possui.
        $this->atribuir_departamento($obj_departamento);
    }
    public function atribuir_departamento($obj_departamento){//Impoe ao funcionário um departamento.
        if($this->departamento instanceof Departamento){
            $this->departamento->remove_funcionario($this);
        }
        $this->departamento = $obj_departamento;
        if($this->departamento instanceof Departamento){
            $this->departamento->inserir_funcionario($this);
        }
    }
    public function atribuir_lista_de_trabalho($obj_lista_de_trabalho){ //Impoe ao funcionário uma lista de trabalho.
        $this->lista_de_trabalho = $obj_lista_de_trabalho;
    }

    public function obter_nome_funcionario(){
        return $this->nome;
    }
    public function obter_email_funcionario(){
        return $this->email;
    }
    public function obter_cpf_funcionario(){
        return $this->cpf;
    }
    public function obter_idade_funcionario(){
        return $this->idade;
    }
    public function obter_departamento(){
        if($this->departamento){
            return $this->departamento;
        }
    }
    public function obter_lista_de_trabalho(){
        if($this->lista_de_trabalho){
            return $this->lista_de_trabalho;
        }
    }
}

class ListaDeTrabalho{

    public function __construct($nome, $obj_funcionario=""){ //"$funcionário" é o objeto "Funcionário" que receberá esta "ListaDeTrabalho".
        $this->nome = $nome; //Nome da lista de trabalho.
        $this->dias = array(); //Armazena um array com todos os dias da lista, e cada dia armaeza um array com todas as suas horas, e cada hora é atribuída uma tarefa.
        $this->funcionario = ""; //Funcionário dono da lista de trabalho.
        $this->atribuir_funcionario($obj_funcionario);
    }

    public function atribuir_funcionario($obj_funcionario){
        if($this->funcionario instanceof Funcionario){
            $this->funcionario->atribuir_lista_de_trabalho("");
        }
        $this->funcionario = $obj_funcionario;
        if($this->funcionario instanceof Funcionario){
            $this->funcionario->atribuir_lista_de_trabalho($this);
        }
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