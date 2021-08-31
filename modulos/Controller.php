<?php

class Controller 
{

    //datatable
    protected $datatable;
    protected $datatableTh;
    protected $datatableNoSort = [];

    public function __construct()
    {

        //Modulo
        $this->modulo = get_called_class();

        //Sem método ir para view
        if (!METODO) {
            $this->view();
        }
    }

    protected function setLista()
    {
        $ordem = 0;
        foreach ($this->listagem as $col => $data) {
            $data = explode('|', $data);

            $style = [];
            foreach ($data as $dt) {

                //sort
                if (substr($dt, 0, 4) == 'sort') {
                    $sort = explode(':', $dt)[1];

                    //sort no
                    if ($sort == 'no') {
                        $this->datatableNoSort[] = $ordem;
                    }

                }

            }

            $this->datatable[] = $col;
            $this->datatableTh .= "<th style='" . implode(', ', $style) . "'>$data[0]</th>";
            $ordem++;
        }

        $this->datatableNoSort[] = count($this->datatable);
        $this->datatableTh .= "<th style='width: 1%'></th>";

    }

    protected function addPagina($pagina)
    {
        require_once RAIZ . "/modulos/$this->modulo/paginas/" . strtolower($this->modulo) . "_$pagina.php";
    }
}
