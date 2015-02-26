<?php
/**
 * Created by PhpStorm.
 * User: jeferson
 * Date: 25/02/15
 * Time: 04:56 PM
 */

class Reto_controller extends CI_Controller {

    private $data_cotizacion;
    protected  $mount_milla=array(
                                    array(0,'','0 ­ 350'),
                                    array(1000,'','350 - 500'),
                                    array(2000,'','500 - 1000'),
                                    array(5000,'','1000 o Mas')
                                );
    protected  $mount_perdidas=array(
                                        array(1000,'-','0'),
                                        array(100,'+','entre 1 y 1000 USD'),
                                        array(500,'+','entre 1000 y 10000 USD'),
                                        array(2000,'+','entre 10000 y 50000 USD'),
                                        array(5000,'+','entre 50000 y 100000 USD'),
                                        array(10000,'+','mas de 100000 USD')
                                    );
    protected  $mount_negocio=array(
                                        array(5000,'+','Nuevo negocio'),
                                        array(0,'','1­3'),
                                        array(0,'','3-5'),
                                        array(1000,'-','6-10'),
                                        array(3000,'-','11-15'),
                                        array(5000,'+','16-20'),
                                        array(7000,'+','Mas de 20')
                                    );

    protected $monto_total;

    function __construct(){
        parent::__construct();
        $this->data_cotizacion=array();
        $this->monto_total=0;
    }

    public function index(){

        $this->load->view('header_v');
        $this->load->view('create_cotizacion_v');
        $this->load->view('footer_v');
    }

    public function resultados_cotizacion(){

        $data=$this->input->post();
        if(!empty($data)) {
            $this->set_data_cotizacion($data);

            $return = $this->get_data_cotizacion();
            $return['representante'] = $data['rcompany'];
            $return['empresa'] = $data['company'];

            $this->load->view('header_v');
            $this->load->view('resultado_cotizacion_v', $return);

        }else{
            $this->index();
        }
    }


    private function set_data_cotizacion($value){

        $this->calculo_camiones($value['ncamiones']);
        $this->calculo_driver($value['ndrivers']);
        $this->calculo_driver_menor($value['dmenor'],$value['cant_menor']);
        $this->calculo_driver_sexp($value['dexp'],$value['cant_sexp']);
        $this->calculo_millas($value['millas']);
        $this->calculo_perdidas($value['perdidas']);
        $this->calculo_negocio($value['anion']);

    }
    private function get_data_cotizacion(){

        return array(
               'items'=>$this->data_cotizacion,
                'total'=>number_format($this->monto_total,2,",",".")
                );
    }

    private function calculo_camiones($valor){

        if($valor>0) {
            $this->data_cotizacion[0] = array(
                'items' => 'Camiones',
                'cantidad' => $valor,
                'valor' => number_format(10000,2,",","."),
                'total' => number_format(($valor * 10000),2,",",".")
            );

            $this->monto_total = ($this->monto_total + ($valor * 10000));
        }

        return;
    }

    private function calculo_driver($valor){

        if($valor>0) {
            $this->data_cotizacion[1] = array(
                'items' => 'Drivers',
                'cantidad' => $valor,
                'valor' => number_format(2000,2,",","."),
                'total' => number_format(($valor * 2000),2,",",".")
            );
            $this->monto_total = ($this->monto_total + ($valor * 2000));
        }
        return;
    }

    private function calculo_driver_menor($valor,$c){
        if($valor==1) {
            $this->data_cotizacion[2] = array(
                'items' => 'Drivers Menores',
                'cantidad' => $c,
                'valor' => number_format(2000,2,",","."),
                'total' => number_format(($c * 2000),2,",",".")
            );
            $this->monto_total = ($this->monto_total + ($c * 2000));
        }
        return;
    }
    private function calculo_driver_sexp($valor,$c){
        if($valor==1){
            $this->data_cotizacion[3] = array(
                'items' => 'Drivers Sin Experiencia',
                'cantidad' => $c,
                'valor' => number_format(500,2,",","."),
                'total' => number_format(($c * 500),2,",",".")
            );
            $this->monto_total = ($this->monto_total + ($c * 500));
        }
    }

    private function calculo_millas($valor){
        $monto=$valor>0?$this->mount_milla[$valor] : '';

        if(!empty($monto)){
            $this->data_cotizacion[4]=array(
                'items'=>'Milla',
                'cantidad'=>$monto[2],
                'valor'=>'+',
                'total'=>number_format($monto[0],2,",",".")
            );

            $this->monto_total = ($this->monto_total + $monto[0]);
        }

        return;
    }
    private function calculo_perdidas($valor){
        $items=$this->mount_perdidas[$valor];
        $this->data_cotizacion[5]=array(
            'items'=>'Perdidas',
            'cantidad'=>$items[2],
            'valor'=>$items[1],
            'total'=>number_format($items[0],2,",",".")
        );
        if($items[1]=='+')
            $this->monto_total = ($this->monto_total+$items[0]);
        if($items[1]=='-')
            $this->monto_total = ($this->monto_total-$items[0]);

        return;
    }

    private function calculo_negocio($valor){

        if($valor!=1 && $valor!=2) {
            $items = $this->mount_negocio[$valor];
            $this->data_cotizacion[6] = array(
                'items' => 'Negocio',
                'cantidad' => $items[2],
                'valor' => $items[1],
                'total' => number_format($items[0],2,",",".")
            );
            if($items[1]=='+')
                $this->monto_total = ($this->monto_total+$items[0]);
            if($items[1]=='-')
                $this->monto_total = ($this->monto_total-$items[0]);
        }
        return;
    }

} 