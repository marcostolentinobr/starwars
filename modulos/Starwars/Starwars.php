<?php

class Starwars extends Controller
{

    protected $recordsTotal = 83;
    
    protected $listagem = [

        //name - sort:no na primeira coluna não funciona
        'name' => 'Nome|sort:no',

        //height
        'height' => 'Altura|sort:no',

        //mass
        'mass' => 'Peso|sort:no',

        //hair_color
        'hair_color' => 'Cabelo|sort:no',

        //skin_color
        'skin_color' => 'Pele|sort:no',

        //eye_color
        'eye_color' => 'Olhos|sort:no',

        //birth_year
        'birth_year' => 'Nascimento|sort:no',

        //gender
        'gender' => 'Gênero|sort:no',
    ];

    public function dataTable()
    {
 
        //Read value
        $draw = intval($_POST['draw']);
        $start = intval($_POST['start']);
        $searchValue = trim($_POST['search']['value']); // Search value
        
        //lista
        $this->setLista();
        $page = intval((!$start ? 1 : ($start/10) +1));
        $url = "http://swapi.dev/api/people/?format=json&page=$page";
        if ($searchValue != '') {
            $url .= "&search=$searchValue";
        } 

        $empRecords = json_decode(file_get_contents($url));
        $totalRecords = $empRecords->count + 1;
        
        //Fetch records
        $data = [];
        foreach ($empRecords->results as $id => $row) {
            $data[$id] = [];
            foreach ($this->datatable as $col) {
                $data[$id][] = $row->$col;
            }
            $data[$id][] = '
                <button class="btn btn-primary" style="cursor: pointer" onclick="planeta(\'' . $row->homeworld . '\')">Planeta</button>
            ';
        }

        //Response
        $response = [
            "draw" => $draw,
            "recordsTotal" => $this->recordsTotal,
            "recordsFiltered" => $totalRecords,
            "data" => $data
        ];

        //return
        exit(json_encode($response));
    }

    protected function view()
    {
        
        //View
        $this->setLista();

        //datatable
        $this->addPagina('datatable');
    }
}
