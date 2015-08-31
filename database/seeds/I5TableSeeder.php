<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class I5TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('i5_index')->insert(
            array(
                array("index_set_id"=>"3",  "index"=>"N501",  "sequence"=>"TAGATCGC",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"3",  "index"=>"N502",  "sequence"=>"CTCTCTAT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"3",  "index"=>"N503",  "sequence"=>"TATCCTCT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"3",  "index"=>"N504",  "sequence"=>"AGAGTAGA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"3",  "index"=>"N505",  "sequence"=>"GTAAGGAG",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"3",  "index"=>"N506",  "sequence"=>"ACTGCATA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"3",  "index"=>"N507",  "sequence"=>"AAGGAGTA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"3",  "index"=>"N508",  "sequence"=>"CTAAGCCT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),


                array("index_set_id"=>"4",  "index"=>"S502",  "sequence"=>"CTCTCTAT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S503",  "sequence"=>"TATCCTCT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S505",  "sequence"=>"GTAAGGAG",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S506",  "sequence"=>"ACTGCATA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S507",  "sequence"=>"AAGGAGTA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S508",  "sequence"=>"CTAAGCCT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S510",  "sequence"=>"CGTCTAAT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S511",  "sequence"=>"TCTCTCCG",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S513",  "sequence"=>"TCGACTAG",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S515",  "sequence"=>"TTCTAGCT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S516",  "sequence"=>"CCTAGAGT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S517",  "sequence"=>"GCGTAAGA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S518",  "sequence"=>"CTATTAAG",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S520",  "sequence"=>"AAGGCTAT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S521",  "sequence"=>"GAGCCTTA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"4",  "index"=>"S522",  "sequence"=>"TTATGCGA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),


                array("index_set_id"=>"5",  "index"=>"D501",  "sequence"=>"TATAGCCT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"5",  "index"=>"D502",  "sequence"=>"ATAGAGGC",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"5",  "index"=>"D503",  "sequence"=>"CCTATCCT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"5",  "index"=>"D504",  "sequence"=>"GGCTCTGA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"5",  "index"=>"D505",  "sequence"=>"AGGCGAAG",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"5",  "index"=>"D506",  "sequence"=>"TAATCTTA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"5",  "index"=>"D507",  "sequence"=>"CAGGACGT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"5",  "index"=>"D508",  "sequence"=>"GTACTGAC",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),



                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc001",  "sequence"=>"GACTTCGT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc002",  "sequence"=>"AATCTCGT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc003",  "sequence"=>"TTGCCACT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc004",  "sequence"=>"GCGTTAAT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc005",  "sequence"=>"CTTCAACG",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc006",  "sequence"=>"AGCGTACT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc007",  "sequence"=>"TACGGTGA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc008",  "sequence"=>"AACTGTCC",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc009",  "sequence"=>"TCCACGAT",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc010",  "sequence"=>"GACTGATA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc011",  "sequence"=>"ACATCTGC",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc012",  "sequence"=>"ACGTTAGG",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc013",  "sequence"=>"CACTAGAC",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc014",  "sequence"=>"TGGCATTC",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc015",  "sequence"=>"ACATTGCA",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
                array("index_set_id"=>"9",  "index"=>"mpxPEI_bc016",  "sequence"=>"TATGCCAC",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),

            ));
        //
    }
}
