<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctf_challenges', function (Blueprint $table) {
            $table->string('name')->primary();
            $table->string('description');
            $table->string('answer')->invisable();
            $table->string('URL')->nullable($value = true);
            $table->unsignedInteger('score');
        });

        DB::table('ctf_challenges')->insert([
            'name' => 'Cryptography 1',
            'description' => 'The answer is all lowercase',
            'answer' => 'thisistheway2019',
            'URL' => 'http://192.168.92.129/cryptography',
            'score'=> 20
        ]);

        DB::table('ctf_challenges')->insert([
            'name' => 'Free Space',
            'description' => 'Free points. Answer: free',
            'answer' => 'free',
            'score'=> 10
        ]);

        DB::table('ctf_challenges')->insert([
            'name' => 'Password Cracking 1',
            'description' => 'Crack this hashed password: 9106f5ae5fb364af8c667773451d9b29',
            'answer' => 'kasiakasiunia',
            'score'=> 20
        ]);

        DB::table('ctf_challenges')->insert([
            'name' => 'Password Cracking 2',
            'description' => 'Crack this hashed password. The password is a movie title with four integers after. 17bffddf5ac32fa91d9873958814eee1f6a2e499a40a31643c0c47c6d4e9019c',
            'answer' => 'TheEnglishPatient1996',
            'score'=> 40
        ]);

        DB::table('ctf_challenges')->insert([
            'name' => 'Preqls and the Sqls',
            'description' => 'Ask the Holocron',
            'answer' => 'SeismicCharge58',
            'URL' => 'http://192.168.92.129/PreqlAndSql',
            'score'=> 20
        ]);

        DB::table('ctf_challenges')->insert([
            'name' => 'Secret Agent',
            'description' => 'HTTP header',
            'answer' => '2BubbleMeadow8',
            'URL' => 'http://192.168.92.129/agent',
            'score'=> 30
        ]);

        DB::table('ctf_challenges')->insert([
            'name' => "That's Pcap",
            'description' => 'Investigate this packet capture.',
            'answer' => 'honeybadgerdontcare',
            'URL' => 'http://192.168.92.129/pcap',
            'score'=> 30
        ]);

        DB::table('ctf_challenges')->insert([
            'name' => 'Chorme History',
            'description' => 'Download the folder from the link',
            'answer' => 'BoeingAH64Apache',
            'URL' => 'https://drive.google.com/drive/folders/1vj0J3Xyvqyh3McTlLcVegTp2WKxFeTIf?usp=share_link',
            'score'=> 30
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctf_challenges');
    }
};
