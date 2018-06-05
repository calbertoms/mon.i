<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'entidades/Transportes.php');
require_once(APPPATH . 'entidades/Recargas.php');
require_once(APPPATH . 'entidades/MonitorInteligente.php');
require_once(APPPATH . 'entidades/Leitura.php');

class Driver_ctrl extends CI_Controller {
    
    private $model;

    public function __construct() {
        parent::__construct();
        $this->load->model('Monitor_model','monitor',TRUE);        
        $this->model = $this->monitor;
        
    }
    
    public function index(){
       
        $this->inseriLeituras();
        
    }
       
    
    private function inseriLeituras(){
        //pega dados do arduino via post 
        $mac = $this->input->get("mac");
        
        try {            
             //cria um novo monitor
            $monitor = new MonitorInteligente($this->model);
            //verifica se existe monitor no banco com o mac passado pelo arduino
            $monitor->setMac($mac);
            if($monitor->monitorExiste($monitor->getMac())){
                 //pega informações do arduino como o nivel do tanque
                //cria uma nova leitura
                $leitura = new Leitura();
                //guarda a data e hora da leitura
                $leitura->setDataHora(date('Y-m-d H:i:s'));
                //guarda o nível
                $leitura->setNivel($this->input->get("nivel"));                                
            }else{
                throw new Exception('Não existe esse monitor no sistema') ;
            }
            
            //guarda a leitura do monitor
            $monitor->setLeitura($leitura);
            //salva a leitura no banco de dados
            if ($monitor->insereLeitura()) {
                 //tudo certo, leitura cadastrada com sucesso.
            }
            else{
                 throw new Exception('houve um erro no cadastro');
            }            
            //verifica nível de alarme
            if($monitor->verificaNivelAlarme($leitura->getNivel())){
              //alarme ativo                               
            }else{
                throw new Exception('Nível OK');
            }                         

            //verificar se tem recarga em aberto            
            if($monitor->verificaRecargaMonitor($monitor->getMac())){                                               
                //livre pra receber recarga
            }else{
                throw new Exception('Recarga em aberto');
            }                        

            //verifica transporte disponivel
            if(!empty($lista_transporte = $monitor->verificaTransportesDisponiveisPorTipo($monitor->getTipo()))){
                //contador de transportes usandos para a recarga
                $i = 0;
                //armazena a soma das taras dos transportes usados
                $tara_total = 0;
                //Transporte disponivel para a regarga                  
                foreach ($lista_transporte AS $t){
                    //objetos transportes
                    $transporte[$i] = new Transportes($this->model);
                    //set id do transporte no objeto
                    $transporte[$i]->setIdTransporte($t->idTransporte);
                    //total da tara de todos os objetos criados
                    $tara_total += $t->tara;
                    $i++;
                    //verifica se a quantidade de transporte é suficiente
                    if($tara_total >= $monitor->calcularRecarga($leitura->getNivel())){
                        break;
                    }
                } 
                //verifica se a carga solicitada é menor igual a tara total para criar a recarga
                if($monitor->calcularRecarga($leitura->getNivel()) <= $tara_total){
                    $recarga = new Recargas($this->model);
                    for ($j = 0; $j < $i; $j++){
                        $recarga->adicionaTransporte($transporte[$j]);
                    }
                    
                    $fornecedorCliente = $monitor->verificaFornecedorCliente($monitor->getTipo(), $monitor->getId());
                    
                    $fornecedor = new Fornecedores($this->model);
                    $fornecedor->setId($fornecedorCliente->idFornecedor);
                    
                    $cliente = new Clientes($this->model);
                    $cliente->setId($fornecedorCliente->idCliente);
                                        
                    $recarga->setIdFornecedores($fornecedor);
                    $recarga->setIdClientes($cliente);
                    $recarga->setIdMonitor($monitor);
                    $recarga->setData(date('Y-m-d'));
                    $recarga->setVolumeRecarga($monitor->calcularRecarga($leitura->getNivel()));
                    $recarga->setSituacaoRecarga(1);
                    $recarga->setStatus(0);
                    
                    if($recarga->cadastrarClass()== TRUE){
                        //recarga armazenada no banco
                    }else{
                        throw new Exception('Houve algum erro ao armazanar recarga no banco');
                    }
                    
                    
                }else{

                }

            }else{
                throw new Exception('Não tem transporte disponivel ou insuficiente');
            }    
                       

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
    }
        
}
