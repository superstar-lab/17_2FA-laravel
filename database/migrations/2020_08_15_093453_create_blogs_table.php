<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->index();  //to generate seo friendly urls
            $table->text('body_md');  // the article body in mardkdown
            $table->text('summary_md'); // the summary in markdown
            $table->text('body_html')->nullable();  //the article body in html
            $table->text('summary_html')->nullable();  //the summary in html
            $table->char('online', 1);  // we'll use this to have articles published or in draft mode
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
