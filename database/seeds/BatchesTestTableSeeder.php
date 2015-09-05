<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BatchesTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("batches")->insert([


            array("batch_name"=>"Batch_name1",  "concentration"=>"1.1",  "volume"=>"10.1",  "user_id"=>"1",  "tube_bar_code"=>"TUBE1",  "tube_location"=>"LOC_1",  "tape_station_length"=>"51",  "charge_code"=>"1234-12345-12-121",  "project_group_id"=>"1",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name2",  "concentration"=>"2.1",  "volume"=>"11.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE2",  "tube_location"=>"LOC_2",  "tape_station_length"=>"52",  "charge_code"=>"1234-12345-12-122",  "project_group_id"=>"2",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name3",  "concentration"=>"3.1",  "volume"=>"12.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE3",  "tube_location"=>"LOC_3",  "tape_station_length"=>"53",  "charge_code"=>"1234-12345-12-123",  "project_group_id"=>"3",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name4",  "concentration"=>"4.1",  "volume"=>"13.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE4",  "tube_location"=>"LOC_4",  "tape_station_length"=>"54",  "charge_code"=>"1234-12345-12-124",  "project_group_id"=>"4",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name5",  "concentration"=>"5.1",  "volume"=>"14.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE5",  "tube_location"=>"LOC_5",  "tape_station_length"=>"55",  "charge_code"=>"1234-12345-12-125",  "project_group_id"=>"5",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name6",  "concentration"=>"6.1",  "volume"=>"15.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE6",  "tube_location"=>"LOC_6",  "tape_station_length"=>"56",  "charge_code"=>"1234-12345-12-126",  "project_group_id"=>"6",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name7",  "concentration"=>"7.1",  "volume"=>"16.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE7",  "tube_location"=>"LOC_7",  "tape_station_length"=>"57",  "charge_code"=>"1234-12345-12-127",  "project_group_id"=>"7",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name8",  "concentration"=>"8.1",  "volume"=>"17.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE8",  "tube_location"=>"LOC_8",  "tape_station_length"=>"58",  "charge_code"=>"1234-12345-12-128",  "project_group_id"=>"8",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name9",  "concentration"=>"9.1",  "volume"=>"18.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE9",  "tube_location"=>"LOC_9",  "tape_station_length"=>"59",  "charge_code"=>"1234-12345-12-129",  "project_group_id"=>"9",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name10",  "concentration"=>"10.1",  "volume"=>"19.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE10",  "tube_location"=>"LOC_10",  "tape_station_length"=>"60",  "charge_code"=>"1234-12345-12-120",  "project_group_id"=>"10",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name11",  "concentration"=>"11.1",  "volume"=>"20.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE11",  "tube_location"=>"LOC_11",  "tape_station_length"=>"61",  "charge_code"=>"1234-12345-12-121",  "project_group_id"=>"1",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name12",  "concentration"=>"12.1",  "volume"=>"21.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE12",  "tube_location"=>"LOC_12",  "tape_station_length"=>"62",  "charge_code"=>"1234-12345-12-122",  "project_group_id"=>"2",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name13",  "concentration"=>"13.1",  "volume"=>"22.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE13",  "tube_location"=>"LOC_13",  "tape_station_length"=>"63",  "charge_code"=>"1234-12345-12-123",  "project_group_id"=>"3",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name14",  "concentration"=>"14.1",  "volume"=>"23.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE14",  "tube_location"=>"LOC_14",  "tape_station_length"=>"64",  "charge_code"=>"1234-12345-12-124",  "project_group_id"=>"4",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name15",  "concentration"=>"15.1",  "volume"=>"24.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE15",  "tube_location"=>"LOC_15",  "tape_station_length"=>"65",  "charge_code"=>"1234-12345-12-125",  "project_group_id"=>"5",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name16",  "concentration"=>"16.1",  "volume"=>"25.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE16",  "tube_location"=>"LOC_16",  "tape_station_length"=>"66",  "charge_code"=>"1234-12345-12-126",  "project_group_id"=>"6",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name17",  "concentration"=>"17.1",  "volume"=>"26.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE17",  "tube_location"=>"LOC_17",  "tape_station_length"=>"67",  "charge_code"=>"1234-12345-12-127",  "project_group_id"=>"7",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name18",  "concentration"=>"18.1",  "volume"=>"27.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE18",  "tube_location"=>"LOC_18",  "tape_station_length"=>"68",  "charge_code"=>"1234-12345-12-128",  "project_group_id"=>"8",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name19",  "concentration"=>"19.1",  "volume"=>"28.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE19",  "tube_location"=>"LOC_19",  "tape_station_length"=>"69",  "charge_code"=>"1234-12345-12-129",  "project_group_id"=>"9",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),
            array("batch_name"=>"Batch_name20",  "concentration"=>"20.1",  "volume"=>"29.1",  "user_id"=>"2",  "tube_bar_code"=>"TUBE20",  "tube_location"=>"LOC_20",  "tape_station_length"=>"70",  "charge_code"=>"1234-12345-12-120",  "project_group_id"=>"10",  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now()),

        ]);
    }
}
