public function print($distrito)
    {
        ini_set('memory_limit', '-1');
        set_time_limit ( 0 );
        $po  = Porcentajes::where('distrito','=',$distrito)->get();
        //$po  = Porcentajes::find(1);
        //mkdir(storage_path().'/'.$distrito);
            $pdf    = PDF::loadView('pdf.seccion', ['valores' => $po ]);
            //echo 'oli';

            //$pdf->save("Seccion".$value->id.".pdf");
            $pdf->setPaper('A4');
            $pdf->output();
            $dom_pdf    = $pdf->getDomPDF();
            $canvas     = $dom_pdf ->get_canvas();
            $canvas->page_text(50, 750, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

            $pdf->save(storage_path().'/'.$distrito.'.pdf');
        
        
        //print_r($po);
        

        //
        
    }


        public function printSeccion($seccion)
    {
        ini_set('memory_limit', '-1');
        set_time_limit ( 0 );
        $po  = Porcentajes::where('seccion','=',$seccion)->get();
        //$po  = Porcentajes::find(1);
        //mkdir(storage_path().'/'.$distrito);
            $pdf    = PDF::loadView('pdf.seccion', ['valores' => $po ]);
            //echo 'oli';

            //$pdf->save("Seccion".$value->id.".pdf");
            // $pdf->setPaper('A4');
            // $pdf->output();
            // $dom_pdf    = $pdf->getDomPDF();
            // $canvas     = $dom_pdf ->get_canvas();
            // $canvas->page_text(50, 750, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

            $pdf->save(storage_path().'/'.$seccion.'.pdf');
        
        
        //print_r($po);
        

        //
        
    }