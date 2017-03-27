<?php

use Illuminate\Database\Seeder;
use App\pensions;
class PensioInvalidesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row = 1;
		if (($handle = fopen("pensions_invalidesa.csv", "r")) !== FALSE) {
			$columnes = fgetcsv($handle, 1000, ",");
			/*
			echo $columnes[0]."\t".$columnes[1]."\t";
	        $num = count($columnes);
	        for ($c=2; $c<$num; $c++) {
	            echo $columnes[$c] . "\t";
	        }
	        echo "\n";
			*/
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $num = count($data);
		        echo "[REG:$num] ";
		        $row++;
		        $dte = $data[0];
		        $barri = $data[1];
		        /*
		        $invalidesa = new invalidesa();
		        $invalidesa->dte = $dte;
		        $invalidesa->barris = $barri;
		        $invalidesa->quantitat = $quantitat;
		        
		        $invalidesa->save();
		        */
		        
		        for ($c=2; $c < $num; $c++) {
		            //echo $data[$c] . "\t";
		            $pensions = new pensions();
		        	$pensions->dte = $dte;
		        	$pensions->barris = $barri;
		        
		            //$preu->titol = $columnes[$c];
		            $pensions->anys = $columnes[$c];
		            //$preu->semestre = intval(substr($columnes[$c],4));
		            $pensions->quantitat = $data[$c];
		            $pensions->save();
		        }
		  
		        echo "\n";
		    }
		    fclose($handle);
		}
    }
}
