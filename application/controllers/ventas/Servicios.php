<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {
	
	public function getClientes()
	{
		$this->load->model('ventas/Clientes_Model','climod');
		$result = $this->climod->get_clientes();
	$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}


	public function getProductosToVenta()
	{
		$this->load->model('logistica/Producto_model','prodm');
		$productos = $this->prodm->get_toventas();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $productos)));
	}	

	public function getMovimientos($Desde,$Hasta)
	{
		$this->load->model('ventas/Movimientos_Model','amm');		
		$result = $this->amm->get_fromrange($Desde,$Hasta);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getClientes_cronograma()
	{
		$this->load->model('ventas/Clientes_Model','climod');
		$result = $this->climod->get_clientes();
		foreach ($result as $key => $value) {							
				$result[$key]["boton"] = "<a class='btn btn-success btn-pagar' href='cronogramas_detalle/".$value["nCliente_id"]."' ><i class='icon-zoom-in icon-white'></i>
									Ver Creditos</a>";
		}
	$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_detallecronograma_bycliente($nCliente_id)
	{
		$this->load->model('ventas/VentaCredito_Model','cred');
		$result = $this->cred->get_Creditos_ByClientes($nCliente_id);
			foreach ($result as $key => $value) {
				if($value["creditoest"] == 2)
				{
					$result[$key]["estadolabel"] = "<span class='label label-success'>Pagada</span>";
					$result[$key]["btnpagar"] = "";
					$result[$key]["btnreporte"] = "<button type='button' class='btn btn-success btn-cronograma' data-loading-text='Cargando...'>Reporte del Crédito</button>";		
				}else{
					$result[$key]["estadolabel"] = "<span class='label label-important'>Pendiente</span>";
					$result[$key]["btnpagar"] = "<a class='btn btn-success btn-pagar' href='#'>Pagar Cuotas</a>";
					$result[$key]["btnreporte"] = "<a  class='btn btn-success btn-cronograma'>Reporte del Crédito</a>";
				}
			}
	$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}	


	public function getVentas($Desde,$Hasta)
	{
		$this->load->model('ventas/Venta_Model','venm');
		$result = $this->venm->get_fromrange($Desde,$Hasta);

		foreach ($result as $key => $value) {
			switch ($value["cVentaEst"]) {		
			    case 0:
			        $result[$key]["estadolabel"] = '<span class="label">Anulada</span>';
			        break;
			    case 1:
			        $result[$key]["estadolabel"] = '<span class="label label-info">Credito</span>';
			        break;
			    case 2:
			        $result[$key]["estadolabel"] = '<span class="label label-success">Pagada</span>';
			        break;
			    case 3:
			        $result[$key]["estadolabel"] = '<span class="label label-warning">Separacion</span>';
			        break;
			}
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getClienteZona($nZona_id)
	{
		$this->load->model('ventas/ReporteZonas_Model','rptzm');
		$result = $this->rptzm->get_clinZon($nZona_id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_clientemorosos()
	{
		$this->load->model('ventas/Clientes_Model','cli');
		$result = $this->cli->get_clientesmorosos();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}
	public function get_clientemorosos_detallado()
	{
		$this->load->model('ventas/Clientes_Model','cli');
		$result = $this->cli->get_clientesmorosos_detallado();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}	

	public function get_reporteIngEgre_byfecha($fecha){
			$fec = date_create_from_format('Y-m-d', $fecha);
			$this->load->model('ventas/ReporteIngEgr_Model','rpteim');
			$result = $this->rpteim->get_reporteIngEgre_byfecha($fec);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}
	
}