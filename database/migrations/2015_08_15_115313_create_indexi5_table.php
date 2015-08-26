<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexi5Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i5_index', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('i5_index_set_id')->unsigned();
            $table->string('index', 16);
            $table->string('sequence', 16);

            $table->timestamps();

        });
        Schema::table('i5_index', function (Blueprint $table) {
            $table->foreign('i5_index_set_id')->references('id')->on('i5_index_set');
            $table->unique('index');

        });;
        DB::table('i5_index')->insert(
            array(

                array("i5_index_set_id"=>"3",  "index"=>"N501",  "sequence"=>"TAGATCGC"),
                array("i5_index_set_id"=>"3",  "index"=>"N502",  "sequence"=>"CTCTCTAT"),
                array("i5_index_set_id"=>"3",  "index"=>"N503",  "sequence"=>"TATCCTCT"),
                array("i5_index_set_id"=>"3",  "index"=>"N504",  "sequence"=>"AGAGTAGA"),
                array("i5_index_set_id"=>"3",  "index"=>"N505",  "sequence"=>"GTAAGGAG"),
                array("i5_index_set_id"=>"3",  "index"=>"N506",  "sequence"=>"ACTGCATA"),
                array("i5_index_set_id"=>"3",  "index"=>"N507",  "sequence"=>"AAGGAGTA"),
                array("i5_index_set_id"=>"3",  "index"=>"N508",  "sequence"=>"CTAAGCCT"),


                array("i5_index_set_id"=>"4",  "index"=>"S502",  "sequence"=>"CTCTCTAT"),
                array("i5_index_set_id"=>"4",  "index"=>"S503",  "sequence"=>"TATCCTCT"),
                array("i5_index_set_id"=>"4",  "index"=>"S505",  "sequence"=>"GTAAGGAG"),
                array("i5_index_set_id"=>"4",  "index"=>"S506",  "sequence"=>"ACTGCATA"),
                array("i5_index_set_id"=>"4",  "index"=>"S507",  "sequence"=>"AAGGAGTA"),
                array("i5_index_set_id"=>"4",  "index"=>"S508",  "sequence"=>"CTAAGCCT"),
                array("i5_index_set_id"=>"4",  "index"=>"S510",  "sequence"=>"CGTCTAAT"),
                array("i5_index_set_id"=>"4",  "index"=>"S511",  "sequence"=>"TCTCTCCG"),
                array("i5_index_set_id"=>"4",  "index"=>"S513",  "sequence"=>"TCGACTAG"),
                array("i5_index_set_id"=>"4",  "index"=>"S515",  "sequence"=>"TTCTAGCT"),
                array("i5_index_set_id"=>"4",  "index"=>"S516",  "sequence"=>"CCTAGAGT"),
                array("i5_index_set_id"=>"4",  "index"=>"S517",  "sequence"=>"GCGTAAGA"),
                array("i5_index_set_id"=>"4",  "index"=>"S518",  "sequence"=>"CTATTAAG"),
                array("i5_index_set_id"=>"4",  "index"=>"S520",  "sequence"=>"AAGGCTAT"),
                array("i5_index_set_id"=>"4",  "index"=>"S521",  "sequence"=>"GAGCCTTA"),
                array("i5_index_set_id"=>"4",  "index"=>"S522",  "sequence"=>"TTATGCGA"),


                array("i5_index_set_id"=>"5",  "index"=>"D501",  "sequence"=>"TATAGCCT"),
                array("i5_index_set_id"=>"5",  "index"=>"D502",  "sequence"=>"ATAGAGGC"),
                array("i5_index_set_id"=>"5",  "index"=>"D503",  "sequence"=>"CCTATCCT"),
                array("i5_index_set_id"=>"5",  "index"=>"D504",  "sequence"=>"GGCTCTGA"),
                array("i5_index_set_id"=>"5",  "index"=>"D505",  "sequence"=>"AGGCGAAG"),
                array("i5_index_set_id"=>"5",  "index"=>"D506",  "sequence"=>"TAATCTTA"),
                array("i5_index_set_id"=>"5",  "index"=>"D507",  "sequence"=>"CAGGACGT"),
                array("i5_index_set_id"=>"5",  "index"=>"D508",  "sequence"=>"GTACTGAC"),



                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc001",  "sequence"=>"GACTTCGT"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc002",  "sequence"=>"AATCTCGT"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc003",  "sequence"=>"TTGCCACT"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc004",  "sequence"=>"GCGTTAAT"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc005",  "sequence"=>"CTTCAACG"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc006",  "sequence"=>"AGCGTACT"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc007",  "sequence"=>"TACGGTGA"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc008",  "sequence"=>"AACTGTCC"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc009",  "sequence"=>"TCCACGAT"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc010",  "sequence"=>"GACTGATA"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc011",  "sequence"=>"ACATCTGC"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc012",  "sequence"=>"ACGTTAGG"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc013",  "sequence"=>"CACTAGAC"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc014",  "sequence"=>"TGGCATTC"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc015",  "sequence"=>"ACATTGCA"),
                array("i5_index_set_id"=>"9",  "index"=>"mpxPEI_bc016",  "sequence"=>"TATGCCAC")



            ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('i5_index');
    }
}
